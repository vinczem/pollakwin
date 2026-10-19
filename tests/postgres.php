<?php
// Run only against the disposable test database (see tests/compose.yml).
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
require __DIR__ . '/../admin/dhb.inc.php';
if ($conn->query('SELECT current_database()')->fetchColumn() !== 'pollakwin_test') {
    throw new RuntimeException('Tests require DB_NAME=pollakwin_test.');
}

function check($condition, $message) {
    if (!$condition) {
        throw new RuntimeException($message);
    }
    echo "PASS: $message\n";
}

function request($path, $data = null) {
    $options = ['http' => [
        'method' => $data === null ? 'GET' : 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $data === null ? '' : http_build_query($data),
        'follow_location' => 0,
        'ignore_errors' => true,
        'timeout' => 10,
    ]];
    $base = getenv('TEST_BASE_URL') ?: 'http://127.0.0.1';
    $body = file_get_contents($base . $path, false, stream_context_create($options));
    $headers = $http_response_header ?? [];
    check($body !== false && !preg_match('/ 5\d\d /', $headers[0] ?? ' 500 '), "$path responds without server errors");
    return [$body, implode("\n", $headers)];
}

$conn->exec('TRUNCATE feedback, korok, orak, oktatok, users RESTART IDENTITY CASCADE');
$name = "Árvíztűrő O'Neil";
$signup = ['adduser' => '1', 'name' => $name, 'email' => 'winner@example.com'];
[, $headers] = request('/admin/adduser.php', $signup);
check(str_contains($headers, 'signup=success'), 'Registration succeeds');
[, $headers] = request('/admin/adduser.php', $signup);
check(str_contains($headers, 'signup=failed'), 'Duplicate registration is rejected');
check((int) $conn->query('SELECT COUNT(*) FROM users')->fetchColumn() === 1, 'Duplicate registration creates no extra user');
check($conn->query('SELECT won FROM users')->fetchColumn() === false, 'New users start eligible to win');

$feedback = ['addfeedback' => '1', 'name' => $name, 'email' => 'missing@example.com',
    'holhallott' => '2', 'btnradio' => '3', 'szakirany' => '4', 'egyeb' => "Tetszett az órarend!"];
[, $headers] = request('/admin/addfeedback.php', $feedback);
check(str_contains($headers, 'failed=1'), 'Feedback requires a registered email');
$feedback['email'] = $signup['email'];
[, $headers] = request('/admin/addfeedback.php', $feedback);
check(str_contains($headers, '/feedback/success.php'), 'Registered users can submit feedback');
[, $headers] = request('/admin/addfeedback.php', $feedback);
check(str_contains($headers, 'failed=2'), 'Duplicate feedback is rejected');
check((int) $conn->query('SELECT COUNT(*) FROM feedback')->fetchColumn() === 1, 'Only one feedback entry is stored');

// Same names must identify separate entrants, and apostrophes must be safe.
request('/admin/adduser.php', array_replace($signup, ['email' => 'other@example.com']));
$conn->exec("INSERT INTO users (name, email, won) VALUES ('Previous winner', 'old@example.com', TRUE)");
$before = $conn->query('SELECT updated_at FROM users ORDER BY id LIMIT 1')->fetchColumn();
usleep(20000);
[$winner] = request('/admin/roll.inc.php', ['roll' => '1']);
check(html_entity_decode($winner, ENT_QUOTES | ENT_HTML5, 'UTF-8') === $name, 'Drawing returns the Unicode name containing an apostrophe');
check((int) $conn->query('SELECT COUNT(*) FROM users WHERE won')->fetchColumn() === 2, 'One drawing marks exactly one entrant with the same name');
request('/admin/roll.inc.php', ['roll' => '1']);
check($conn->query('SELECT updated_at FROM users ORDER BY id LIMIT 1')->fetchColumn() > $before, 'Updating a winner refreshes updated_at');
[$winner] = request('/admin/roll.inc.php', ['roll' => '1']);
check($winner === '', 'Drawing with no eligible users returns an empty response');

$conn->exec("INSERT INTO users (name, email) VALUES ('Locked entrant', 'locked@example.com'), ('Available entrant', 'available@example.com')");
$conn->beginTransaction();
try {
    $conn->query("SELECT id FROM users WHERE email = 'locked@example.com' FOR UPDATE")->fetchColumn();
    [$winner] = request('/admin/roll.inc.php', ['roll' => '1']);
    check($winner === 'Available entrant', 'Concurrent drawings skip an entrant already locked by another transaction');
} finally {
    $conn->rollBack();
}
[$winner] = request('/admin/roll.inc.php', ['roll' => '1']);
check($winner === 'Locked entrant', 'An unlocked eligible entrant can still win');

$conn->exec("INSERT INTO orak (kezdete, vege) VALUES ('09:00', '09:45'), ('08:00', '08:45');
    INSERT INTO oktatok (nev) VALUES ('Teszt Oktató');
    INSERT INTO korok (ora, oktato, tantargy, tanterem, csoport, holvan, szin, rendezveny)
    VALUES (1, 1, 'Informatika', '101', 'A', 'Emelet', 'piros', 1),
           (2, 1, 'Matematika', '102', 'B', 'Emelet', 'piros', 1),
           (1, 1, 'Más esemény', '103', 'C', 'Emelet', 'piros', 2)");
[$body] = request('/admin/lineup.php', ['szin' => 'piros']);
$rows = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
check(count($rows) === 2 && $rows[0]['tantargy'] === 'Matematika', 'Schedule filters the event and orders lessons by time');
[$body] = request('/admin/lineup.php', ['szin' => "piros' OR '1'='1"]);
check(json_decode($body, true, 512, JSON_THROW_ON_ERROR) === [], 'Schedule treats SQL-like input as a literal color');
[$body] = request('/teszt.php');
check(str_contains($body, 'Informatika'), 'Schedule table renders with PostgreSQL');
echo "All PostgreSQL integration checks passed.\n";
