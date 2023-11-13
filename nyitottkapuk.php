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

                    <span id="valasztottKor" class="text-black badge rounded-pill text-uppercase"></span>

                    <h2 class="mt-3">
                        A következő programokkal várunk:
                    </h2>

                    <div id="ora-2"></div>
                    <div id="ora-3"></div>
                    <div id="ora-4"></div>
                    <div id="ora-5"></div>
                    <div id="ora-99"></div>

                    <div id="ora-kovetkezo" class="my-5">
                        <h2 class="mt-5" id="h2-kovetkezo">A következő esemény:</h2>
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                            </svg>
                            <span id="ora-kovetkezo-kezdete"></span>
                        </div>

                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>                            
                            <span id="ora-kovetkezo-neve"></span>
                        </div>

                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                            </svg>
                            <span id="ora-kovetkezo-terem"></span>
                        </div>

                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                            </svg>
                            <span id="ora-kovetkezo-holvan"></span>
                        </div>
                    </div>

                    <div id="regisztracio">
                        <h2 class="mb-5">
                            Regisztrálj a neveddel, email címeddel és nyerj egy Pollákos pólót!
                        </h2>
                    
                        <div class="box">
                            <?php
                                if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
                                    echo '<h3 class="title is-3" style="color: hsl(141, 53%, 53%)!important;">Sikeres regisztráció!</h3>';
                                }
                            ?>
                        
                            <form action="admin/adduser.php" method="post">
                                <input type="hidden" name="rendezveny" value="nyitottkapuk">

                                <div class="field">
                                    <p class="control is-expanded">
                                        <input name="name" class="input" type="text" placeholder="Név">
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control is-expanded">
                                        <input name="email" class="input" type="email" placeholder="Email cím">
                                    </p>
                                </div>

                                <p class="control">
                                    <input type="submit" name="adduser" class="button is-info" value="Regisztrálok">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<script src="./js/lineup.js"></script>