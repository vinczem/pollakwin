<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pollák Nyitott Kapuk</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="./node_modules/bulma/css/bulma.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/main.js"></script>
    <script>var szin = '<?php echo isset($_GET['szin']) ? $_GET['szin'] : "feher"; echo "'"; ?></script>
</head>

<body>
    <section class="hero is-link is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-6 is-offset-3">
                    <img src="./pics/pollaklogo1.png" alt="pollak">
                    
                    <h1 class="title is-2">Nyitott Kapuk 2023.</h1>
                    <h2 class="mt-5">Válassz kört!</h2>

                    <a href="./nyitottkapuk.php?szin=piros" target="_blank" rel="noopener noreferrer">
                        <button type="button" class="btn btn-danger col-12 my-2">Piros kör</button>
                    </a>

                    <a href="./nyitottkapuk.php?szin=zold" target="_blank" rel="noopener noreferrer">
                        <button type="button" class="btn btn-success col-12 my-2">Zöld kör</button>
                    </a>

                    <a href="./nyitottkapuk.php?szin=kek" target="_blank" rel="noopener noreferrer">
                        <button type="button" class="btn btn-primary col-12 my-2">Kék kör</button>
                    </a>

                    <a href="./nyitottkapuk.php?szin=narancs" target="_blank" rel="noopener noreferrer">
                        <button type="button" class="btn btn-warning col-12 my-2">Narancs kör</button>
                    </a>

                    <a href="./nyitottkapuk.php?szin=sarga" target="_blank" rel="noopener noreferrer">
                        <button type="button" class="btn bg-warning-subtle col-12 my-2">Sárga kör</button>
                    </a>

                </div>
            </div>
        </div>
    </section>
</body>

</html>

<script src="./js/lineup.js"></script>