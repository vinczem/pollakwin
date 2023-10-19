<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pollák Nyílt Nap visszajelzés</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
<section class="hero is-link is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-6 is-offset-3">
                <img src="../pics/pollaklogo1.png" alt="pollak">
                <h1 class="title is-2">Elégedettségi kérdőív</h1>

                <p>
                    Örülünk, hogy részt vettél a Pollák Nyílt Napon! <br> 
                    Az alábbiakban egy rövid kérdőív segítségével szeretnénk megtudni a véleményed. <br>
                    <span>A beküldők között 3 db pólót sorsolunk ki!</span>
                <br>
                </p>

                <div class="box">
                    <?php
                    if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
                        echo '<h3 class="title is-3" style="color: hsl(141, 53%, 53%)!important;">A válaszodat megkaptuk, köszönjük!</h3>';
                    }

                    ?>
                    <form action="../admin/addfeedback.php" method="post" id="kerdoiv">
                        <div class="field">
                            <p class="control is-expanded">
                                <input name="name" id="name" class="input" type="text" placeholder="Név" onchange="valtozas()">
                            </p>
                        </div>

                        <div class="field">
                            <p class="control is-expanded">
                                <input name="email" id="email" class="input" type="email" placeholder="Email cím">
                            </p>
                        </div>

                        <div class="row my-4">
                            <div class="col">
                                <span class="fw-bold">Hol hallottál a Nyílt Napról?</span>

                                <select class="form-select" name="holhallott" id="holhallott" onchange="valtozas()">
                                    <option value="0" selected disabled>Válassz az alábbiak közül!</option>
                                    <option value="1">Facebook</option>
                                    <option value="2">Instagram</option>
                                    <option value="3">TikTok</option>
                                    <option value="4">Szüleimtől</option>
                                    <option value="5">Barátaimtól/osztálytársaimtól</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div>
                                <span class="fw-bold">Mennyire voltál elégedett a rendezvénnyel? Pontozz!</span>
                                <br>
                                <span class="fst-italic">(az 1-es pontszám az elégedetlent, a 4-es pedig a nagyon elégedettet jelenti)</span>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="1" checked>
                                <label class="btn btn-outline-primary" for="btnradio1">1</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="2">
                                <label class="btn btn-outline-primary" for="btnradio2">2</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="3">
                                <label class="btn btn-outline-primary" for="btnradio3">3</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="4">
                                <label class="btn btn-outline-primary" for="btnradio4">4</label>

                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col">
                                <span class="fw-bold">Melyik szakirány érdekel jelenleg a legjobban?</span>
                                <select class="form-select" name="szakirany" id="szakirany" onchange="valtozas()">
                                    <option value="0" selected disabled>Válassz az alábbiak közül</option>
                                    <option value="1">Erősáramú elektrotechnikus</option>
                                    <option value="2">Ipari informatikai technikus</option>
                                    <option value="3">Szoftverfejlesztő és -tesztelő</option>
                                    <option value="4">Informatikai rendszer- és alkalmazás-üzemeltető</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="mb-3">
                                <span class="fw-bold">Van olyan kérdésed, amire nem kaptál választ?</span>
                                <br>
                                <span class="fst-italic">Tudasd velünk, és emailben válaszolunk!</span>

                                <textarea class="form-control" id="egyeb" name="egyeb" rows="3"></textarea>
                            </div>
                        </div>
                        
                        <p class="control">
                            <input type="submit" name="addfeedback" id="addfeedbackBtn" class="button is-info" value="Elküldöm a választ" disabled>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
</body>

</html>

<script src="../js/feedback.js"></script>