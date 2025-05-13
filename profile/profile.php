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
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>LFT | Профиль</title>
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
      <button class="learn-more" onclick="window.location.href='../auth/logout.php';">
        <span class="circle" aria-hidden="true">
          <span class="icon arrow"></span>
        </span>
        <span class="button-text">&nbsp;ВЫХОД</span>
      </button>
    </div>
  </div>
  <!-- center -->
  <div class="relative_for_z_index">
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
  <div class="nav_margin_bottom_fixed"></div>

    <!-- content -->
  <div class="main_info">
    <div class="animated-border-quote">
      <blockquote>
        <p><?php echo $_SESSION['login']; ?></p>
      </blockquote>
    </div>
  </div>
  <div class="center-button">
    <button class="glow-on-hover" type="button">ВХОДЯЩИЕ СООБЩЕНИЯ</button>
  </div>


  <!-- area's -->
  <!-- playerANDteam_list -->
  <div class="area" id="playerANDteam_list">
    <div class="wrapper">
    <div class="area_name">ОТПРАВЛЕННЫЕ ЗАЯВКИ</div>
    
      <!-- generating cards -->
      <div id="players_container"></div>
      <div id="teams_container"></div>

    </div>
  </div>

  <!-- MESSAGE'S -->
  <div class="area" id="messages">
    <div class="wrapper">
    <div class="area_name">ВХОДЯЩИЕ СООБЩЕНИЯ</div>
    
      <!-- generating cards -->
      <div id="messages_container"></div>
      

    </div>
  </div>

  <!-- Подтверждение удаления -->
  <div id="delete_confirm" class="modal">
    <div class="modal-content">
        <h3>Хочешь удалить?</h3>
        <button id="yes">ДА</button>
        <button id="no">НЕТ</button>
    </div>
</div>


    <!-- Модальное окно -->
    <div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Написать сообщение</h2>
        <div class="recipient-info"></div>
        <div class="modal-messages"></div> <!-- Блок для сообщений -->
        <textarea id="message-text" placeholder="Введи сообщение..."></textarea>
        <button id="send-message">ОТПРАВИТЬ</button>
    </div>
</div>

  <!-- js -->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="../js/bubbles.js"></script>
  <script src="../js/toggle_messages_requests.js"></script>
  <script src="../js/profile.js"></script>

</body>

</html>