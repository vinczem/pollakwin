<?php
if (isset($_POST['roll'])) {
    require __DIR__ . '/dhb.inc.php';
    // Claim and update one entrant atomically, including concurrent drawings.
    $stmt = $conn->query(
        'WITH winner AS (
            SELECT id FROM users WHERE won = FALSE
            ORDER BY RANDOM() LIMIT 1 FOR UPDATE SKIP LOCKED
        )
        UPDATE users SET won = TRUE FROM winner
        WHERE users.id = winner.id RETURNING users.name'
    );
    $winner = $stmt->fetchColumn();
    if ($winner !== false) {
        echo $winner;
    }
}
