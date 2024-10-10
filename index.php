<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Author: Pollák,
    Nyílt nap">
    <title>Pollák Nyereményjáték</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="node_modules/bulma/css/bulma.css"/>
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
                                <a class="button is-white is-outlined" target="_blank" href="https://pollak.hu">
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
                <h1 class="title is-2">
                    Nyereményjáték
                </h1>
                <h2 class="subtitle is-3">
                    Regisztrálj a neveddel, email címmeddel és nyerj egy Pollákos ajándék csomagot!
                </h2>
                <div class="box">
                    <?php
                    if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
                        echo '<h3 class="title is-3" style="color: hsl(141, 53%, 53%)!important ; 
        animation: fadeout 5s forwards;  
}"">Sikeres regisztráció!</h3>';
                    }
                    if (isset($_GET['signup']) && $_GET['signup'] == 'failed') {
                        echo '<h3 class="title is-3" style="color: rgb(255,0,0)!important ; 
        animation: fadeout 5s forwards;  
}"">Sikertelen regisztráció!</h3>';
                    }
                    ?>
                    <form class="formContainer" action="admin/adduser.php" method="post">
                        <div class="field">
                            <p class="control is-expanded">
                                
                                    <label for="name" class="form__label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/></svg>  
                                        Név</label>
                                
                                <input name="name" class="form__field" type="text" placeholder="Név" required>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control is-expanded">
                                <label for="name" class="form__label">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                </svg>    
                                E-mail</label>
                                <input name="email" class="form__field" type="email" placeholder="Email cím" required>
                            </p>
                        </div>
                        <p class="control">
                            <input type="submit" name="adduser" id="Regist" class="button is-info" value="Regisztrálás">
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