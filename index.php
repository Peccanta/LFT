<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/favicon/site.webmanifest" />
    <!-- css -->
    <link rel="stylesheet" href="css/index.css">
    <title>LFT | Сервис для поиска команды и рекрутинга игроков</title>

</head>

<body>
    <!-- bubbles -->
    <div class="bubbles" id="co">
        <canvas id="c"></canvas>
    </div>
    <!-- rgb -->
    <section class="seperator-wrapper">
        <div class="seperator gradient">
        </div>
    </section>

    <main>
        <section class="info-section">
            <!-- logo -->
            <div class="left-part">
                <img src="logo_img/logo_lft.png" alt="LFT">
                <p>Надоело играть в одиночку?<br>Или хочешь попробовать себя в киберспорте?</p>
                <div class="h-divider">
                    <div class="shadow"></div>
                    <div class="text"><span>LFT</span></div>
                </div>
                <p>Представляем cервис для поиска команды и рекрутинга игроков в популярных игровых дисциплинах!</p>
                <button class="glow-on-hover" type="button" onclick="window.location.href='auth/auth.php';">НАЧАТЬ</button>
            </div>

            <!-- carousel -->
            <div class="right-part">
                <div class="bg-line">
                    <img src="slider_img/wave.svg" alt="">
                    <img src="slider_img/wave.svg" alt="">
                </div>

                <div class="main-grid d-flex">
                    <div class="box">
                        <div class="bg-img">
                            <img src="slider_img/apex.jpg" alt="">
                        </div>
                    </div>
                    <div class="box">
                        <div class="bg-img">
                            <img src="slider_img/cs.jpg" alt="">
                        </div>
                    </div>
                    <div class="box">
                        <div class="bg-img">
                            <img src="slider_img/dota.jpg" alt="">
                        </div>
                    </div>
                    <div class="box">
                        <div class="bg-img">
                            <img src="slider_img/over.jpg" alt="">
                        </div>
                    </div>
                    <div class="box">
                        <div class="bg-img">
                            <img src="slider_img/pubg.jpeg" alt="">
                        </div>
                    </div>
                    <div class="box">
                        <div class="bg-img">
                            <img src="slider_img/rl.jpg" alt="">
                        </div>
                    </div>
                    <div class="box">
                        <div class="bg-img">
                            <img src="slider_img/valorant.jpg" alt="">
                        </div>
                    </div>
                    <div class="box">
                        <div class="bg-img">
                            <img src="slider_img/fort.jpeg" alt="">
                        </div>
                    </div>
                </div>

                <div class="bg-circle-h-line">
                    <img src="slider_img/circle-ring.svg" alt="">
                    <img src="slider_img/circle-ring.svg" alt="">
                    <img src="slider_img/circle-ring.svg" alt="">
                </div>
                <div class="bg-dash-circle">
                    <img src="slider_img/dash-circle.svg" alt="">
                </div>
            </div>
        </section>
    </main>

    <!-- js -->
    <script src="js/bubbles.js"></script>
</body>

</html>