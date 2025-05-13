<?php
// Стартуем сессию
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['login']) || !isset($_SESSION['email'])) {
  header('Location: ../auth/auth.php');
  exit();
}
?>

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
  <link rel="icon" type="image/png" href="../favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="../favicon/favicon.svg" />
  <link rel="shortcut icon" href="../favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png" />
  <link rel="manifest" href="../favicon/site.webmanifest" />
  <!-- css -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
  <link rel="stylesheet" href="../css/main.css">
  <title>LFT | Главная</title>
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
  <!-- header (navpanel) -->
  <!-- left -->
  <div class="header__logo">
    <a href="../main/main.php"><img src="../logo_img/logo_lft.png" alt=""><span>LOOKING<br>FOR<br>TEAM</span></a>
  </div>
  <!-- right -->
  <div class="header__profile">
    <div id="profile">
      <button class="learn-more" onclick="window.location.href='../profile/profile.php';">
        <span class="circle" aria-hidden="true">
          <span class="icon arrow"></span>
        </span>
        <span class="button-text"><?php echo $_SESSION['login']; ?></span>
      </button>
    </div>
  </div>
  <!-- center -->
  <div class="header">
    <nav class="navbar">
      <ul class="navbar__menu">
        <li class="navbar__item">
          <a href="../games/valorant.php" class="navbar__link"><img src="../navbar_img/icons8-valorant-500.png" alt=""><span>VALORANT</span></a>
        </li>
        <li class="navbar__item">
          <a href="../games/rocket_league.php" class="navbar__link"><img src="../navbar_img/icons8-rocket-league-500.png" alt=""><span>ROCKET&nbsp;LEAGUE</span></a>
        </li>
        <li class="navbar__item">
          <a href="../games/cs_2.php" class="navbar__link"><img src="../navbar_img/icons8-counter-strike-500.png" alt=""><span>CS&nbsp;2</span></a>
        </li>
        <li class="navbar__item">
          <a href="../games/apex_legends.php" class="navbar__link"><img src="../navbar_img/icons8-apex-512.png" alt="" id="apex_img"><span>APEX&nbsp;LEGENDS</span></a>
        </li>
        <li class="navbar__item">
          <a href="../games/dota_2.php" class="navbar__link"><img src="../navbar_img/icons8-dota-500.png" alt=""><span>DOTA&nbsp;2</span></a>
        </li>
        <li class="navbar__item">
          <a href="../games/pubg.php" class="navbar__link"><img src="../navbar_img/icons8-pubg-96.png" alt="" id="pubg_img"><span>PUBG</span></a>
        </li>
        <li class="navbar__item">
          <a href="../games/fortnite.php" class="navbar__link"><img src="../navbar_img/icons8-fortnite-500.png" alt=""><span>FORTNITE</span></a>
        </li>
        <li class="navbar__item">
          <a href="../games/overwatch_2.php" class="navbar__link"><img src="../navbar_img/icons8-overwatch-480.png" alt=""><span>OVERWATCH&nbsp;2</span></a>
        </li>
      </ul>
    </nav>
  </div>
  <!-- middle_nav -->
  <div class="middle_nav">
    <div class="nav">
      <input type="checkbox">
      <span></span>
      <span></span>
      <div class="menu">
        <li><a href="../games/valorant.php">VALORANT</a></li>
        <li><a href="../games/rocket_league.php">ROCKET LEAGUE</a></li>
        <li><a href="../games/cs_2.php">CS&nbsp;2</a></li>
        <li><a href="../games/apex_legends.php">APEX LEGENDS</a></li>
        <li><a href="../games/dota_2.php">DOTA&nbsp;2</a></li>
        <li><a href="../games/pubg.php">PUBG</a></li>
        <li><a href="../games/fortnite.php">FORTNITE</a></li>
        <li><a href="../games/overwatch_2.php">OVERWATCH&nbsp;2</a></li>
      </div>
    </div>
  </div>
  <!-- hamburger-menu -->
  <div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>
    <ul class="menu__box">
      <li><a class="menu__item" href="../profile/profile.php"><img src="../navbar_img/icons8-male-user-100.png" alt=""><?php echo $_SESSION['login']; ?></a></li>
      <b class="hr_nav"></b>
      <li><a class="menu__item" href="../games/valorant.php"><img src="../navbar_img/icons8-valorant-500.png" alt="">VALORANT</a></li>
      <li><a class="menu__item" href="../games/rocket_league.php"><img src="../navbar_img/icons8-rocket-league-500.png" alt="">ROCKET LEAGUE</a></li>
      <li><a class="menu__item" href="../games/cs_2.php"><img src="../navbar_img/icons8-counter-strike-500.png" alt="">CS 2</a></li>
      <li><a class="menu__item" href="../games/apex_legends.php"><img src="../navbar_img/icons8-apex-512.png" alt="" id="mini_apex_img">APEX LEGENDS</a></li>
      <li><a class="menu__item" href="../games/dota_2.php"><img src="../navbar_img/icons8-dota-500.png" alt="">DOTA 2</a></li>
      <li><a class="menu__item" href="../games/pubg.php"><img src="../navbar_img/icons8-pubg-96.png" alt="" id="mini_pubg_img">PUBG</a></li>
      <li><a class="menu__item" href="../games/fortnite.php"><img src="../navbar_img/icons8-fortnite-500.png" alt="">FORTNITE</a></li>
      <li><a class="menu__item" href="../games/overwatch_2.php"><img src="../navbar_img/icons8-overwatch-480.png" alt="">OVERWATCH 2</a></li>
      <b class="hr_nav"></b>
      <li><a class="menu__item" href="../auth/logout.php"><img src="../navbar_img/icons8-logout-rounded-100.png" alt="">Выход</a></li>
    </ul>
  </div>
  <!-- nav margin bottom -->
  <div class="nav_margin_bottom"></div>

  <!-- main info -->
  <div class="main_info">
    <div class="animated-border-quote">
      <blockquote>
        <p>ВЫБЕРИ ИГРОВУЮ ДИСЦИПЛИНУ</p>
      </blockquote>
    </div>
    <div class="text_area">
      <p id="info_text">Чтобы начать поиск игроков или команды,<br> необходимо выбрать, в какой игре ты планируешь искать</p>
    </div>
  </div>

  <!-- slider -->
  <main>
    <div class="swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide swiper-slide--one">
          <div>
            <h2>VALORANT</h2>
            <p>
              Тактический шутер от первого лица с уникальными агентами, использующими специальные способности. Команды сражаются в режимах установки и обезвреживания бомбы.
            </p>
            <button class="glow-on-hover" type="button" onclick="window.location.href='../games/valorant.php';">ПЕРЕЙТИ</button>
          </div>
        </div>

        <div class="swiper-slide swiper-slide--two">
          <div>
            <h2>ROCKET LEAGUE</h2>
            <p>
              Аркадная игра, совмещающая футбол и управление гоночными болидами. Игроки забивают мячи в ворота, используя акробатические трюки.
            </p>
            <button class="glow-on-hover" type="button" onclick="window.location.href='../games/rocket_league.php';">ПЕРЕЙТИ</button>
          </div>
        </div>

        <div class="swiper-slide swiper-slide--three">
          <div>
            <h2>CS 2</h2>
            <p>
              Обновлённая версия классического командного шутера с улучшенной графикой и механикой. Основная цель — установка или обезвреживание бомбы.
            </p>
            <button class="glow-on-hover" type="button" onclick="window.location.href='../games/cs_2.php';">ПЕРЕЙТИ</button>
          </div>
        </div>

        <div class="swiper-slide swiper-slide--four">
          <div>
            <h2>APEX LEGENDS</h2>
            <p>
              Королевская битва с динамичным геймплеем и героями с уникальными способностями. Команды из трёх игроков сражаются за выживание.
            </p>
            <button class="glow-on-hover" type="button" onclick="window.location.href='../games/apex_legends.php';">ПЕРЕЙТИ</button>
          </div>
        </div>

        <div class="swiper-slide swiper-slide--five">
          <div>
            <h2>DOTA 2</h2>
            <p>
              Стратегическая MOBA-игра, где две команды по пять героев сражаются за уничтожение вражеской базы. Огромный выбор персонажей с разными ролями.
            </p>
            <button class="glow-on-hover" type="button" onclick="window.location.href='../games/dota_2.php';">ПЕРЕЙТИ</button>
          </div>
        </div>

        <div class="swiper-slide swiper-slide--six">
          <div>
            <h2>PUBG</h2>
            <p>
              Королевская битва с реалистичной стрельбой и тактическим геймплеем. Игроки сражаются до последнего выжившего на большом острове.
            </p>
            <button class="glow-on-hover" type="button" onclick="window.location.href='../games/pubg.php';">ПЕРЕЙТИ</button>
          </div>
        </div>

        <div class="swiper-slide swiper-slide--seven">
          <div>
            <h2>FORTNITE</h2>
            <p>
              Королевская битва с элементами строительства и ярким мультяшным стилем. Игроки строят укрытия и сражаются за выживание.
            </p>
            <button class="glow-on-hover" type="button" onclick="window.location.href='../games/fortnite.php';">ПЕРЕЙТИ</button>
          </div>
        </div>

        <div class="swiper-slide swiper-slide--eight">
          <div>
            <h2>OVERWATCH 2</h2>
            <p>
              Командный шутер с героями, обладающими уникальными способностями. Тактические сражения на картах с разными режимами.
            </p>
            <button class="glow-on-hover" type="button" onclick="window.location.href='../games/overwatch_2.php';">ПЕРЕЙТИ</button>
          </div>
        </div>
      </div>

      <!-- Under Rounds (Pagination) -->
      <div class="swiper-pagination"></div>
    </div>
  </main>

  <!-- js -->
  <script src="../js/bubbles.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
  <script src="../js/slider.js"></script>
</body>

</html>