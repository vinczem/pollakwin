<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pollák Nyereményjáték</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="node_modules/bulma/css/bulma.css" />
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<section class="hero is-link is-fullheight">
    <div class="hero-head">
        <nav class="navbar">
            <div class="navbar-brand">
					<span class="navbar-burger burger" data-target="navbarMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                            <span class="navbar-item">
                                <a class="button is-white is-outlined" href="index.php">
                                    <span>Főoldal</span>
                                </a>
                            </span>
                    <span class="navbar-item">
                                <a class="button is-white is-outlined" href="https://pollak.hu">
                                    <span>Pollák</span>
                                </a>
                            </span>
                </div>
            </div>
        </nav>
    </div>

    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-6 is-offset-3">
                <img src="pics/pollaklogo1.png" alt="pollak">
                <h1 class="title is-1">
                    Nyereményjáték
                </h1>
                <h2 class="subtitle is-3">
                    Regisztrálj email címmel és nyerj egy Pollákos ajándékot!
                </h2>
                <div class="box">
                    <form action="admin/adduser.php" method="post">
                    <div class="field is-grouped">
                            <p class="control is-expanded">
                                <input name="email" class="input" type="text" placeholder="Email cím">
                            </p>
                            <p class="control">
                                <input type="submit" name="adduser" class="button is-info" value="Regisztrálás">
                            </p>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
</body>

</html>