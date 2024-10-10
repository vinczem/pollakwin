<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pollák Nyílt Nap visszajelzés</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../node_modules/bulma/css/bulma.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/select.css">

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
                    <span>A beküldők között egy ajándékcsomagot!</span>
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
                                
                                <label for="name" class="form__label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/></svg>  
                                    Név</label>
                            
                            <input id="name" class="form__field"  name="name" type="text" placeholder="Név" onkeyup="valtozas();">
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
                                <input name="email" class="form__field" type="email" id="email" placeholder="Email cím">
                            </p>
                        </div>

                        <div class="row my-4">
    <div class="col">
        <label for="holhallott" class="fw-bold" style="color: white;">Hol hallottál a Nyílt Napról?</label> 
        <div class="custom-select-wrapper">
            <select class="form-select" name="holhallott" id="holhallott" onchange="valtozas()">
                <option value="0" selected disabled>Válassz az alábbiak közül!</option>
                <option value="1">&#xf09a;&nbsp;&nbsp; Facebook</option>
                <option value="2">&#xf16d;&nbsp;&nbsp; Instagram</option>
                <option value="3">&nbsp;&nbsp;TikTok</option>
                <option value="4">&#xf0c0;&nbsp;&nbsp;Szüleimtől</option>
                <option value="5">&#xf0c0;&nbsp;&nbsp;Barátaimtól/osztálytársaimtól</option>
            </select>
            <div class="icon"></div>
        </div>
    </div>
</div>
                        <div class="row my-4">
                            <div>
                                <span class="fw-bold" style="color: white;">Mennyire voltál elégedett a rendezvénnyel? Pontozz!</span>
                                <br>
                                <span class="fst-italic" style="color: white;">(az 1-es pontszám az elégedetlent, a 4-es pedig a nagyon elégedettet jelenti)</span>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="1" checked>
                                <label class="btn btn-outline-light" for="btnradio1" style=" border: 2px solid; border-image: linear-gradient(to left, #3cdfd1, #0a60ff);
  border-image-slice: 1;">1</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="2">
                                <label class="btn btn-outline-light" for="btnradio2" style=" border: 2px solid; border-image: linear-gradient(to right, #3cdfd1, #0a60ff);
  border-image-slice: 1;">2</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="3">
                                <label class="btn btn-outline-light" for="btnradio3" style=" border: 2px solid; border-image: linear-gradient(to left, #3cdfd1, #0a60ff);
  border-image-slice: 1;">3</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="4">
                                <label class="btn btn-outline-light" for="btnradio4" style=" border: 2px solid; border-image: linear-gradient(to right, #3cdfd1, #0a60ff);
  border-image-slice: 1;">4</label>

                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col">
                                <span class="fw-bold" style="color: white;">Melyik szakirány érdekel jelenleg a legjobban?</span>
                                <select class="form-select" name="szakirany" id="szakirany" onchange="valtozas()">
                                    <option value="0" selected disabled>Válassz az alábbiak közül</option>
                                    <option value="1">&nbsp;&nbsp;Erősáramú elektrotechnikus</option>
                                    <option value="2">&nbsp;&nbsp;Ipari informatikai technikus</option>
                                    <option value="3">&nbsp;&nbsp;Szoftverfejlesztő és -tesztelő</option>
                                    <option value="4">&nbsp;&nbsp;Informatikai rendszer- és alkalmazás-üzemeltető</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="mb-3">
                                <span class="fw-bold" style="color: white;">Van olyan kérdésed, amire nem kaptál választ?</span>
                                <br>
                                <span class="fst-italic" style="color: white;">Tudasd velünk, és emailben válaszolunk!</span>

                                <textarea class="form-control" id="egyeb" name="egyeb" rows="3" placeholder="Írj ide!"></textarea>
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
