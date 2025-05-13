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
  <link rel="stylesheet" href="../css/images.css">
  <link rel="stylesheet" href="../css/games.css">
  <title>LFT | DOTA 2</title>
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
  <div class="content">
    <div class="container">
      <div class="buttons">
        <div class="animated-border-quote">
          <blockquote>
            <p>ИГРОКИ</p>
          </blockquote>
        </div>
        <button class="glow-on-hover" type="button" onclick="showInfo('player_list')">СПИСОК</button>
        <button class="glow-on-hover" type="button" onclick="showInfo('player_new')">СОЗДАТЬ</button>
      </div>

      <div class="image-dota2"></div> <!-- МЕНЯТЬ В ЗАВИСИМОСТИ ОТ ИГРЫ -->

      <div class="buttons">
        <div class="animated-border-quote">
          <blockquote>
            <p>КОМАНДЫ</p>
          </blockquote>
        </div>
        <button class="glow-on-hover" type="button" onclick="showInfo('team_list')">СПИСОК</button>
        <button class="glow-on-hover" type="button" onclick="showInfo('team_new')">СОЗДАТЬ</button>
      </div>
    </div>
  </div>

  <!-- area's -->
  <!-- player_list -->
  <div id="player_list" class="area">
    <div class="area_name">СПИСОК ИГРОКОВ</div>
    <div class="center-image">
      <div class="second_img-dota2"></div> <!-- МЕНЯТЬ В ЗАВИСИМОСТИ ОТ ИГРЫ -->
    </div>

    <div class="wrapper">
      <!-- generating cards -->
      <div id="players-container"></div>

    </div>
  </div>

  <!-- player_new -->
  <div id="player_new" class="area">
    <div class="area_name">СОЗДАНИЕ ЗАЯВКИ НА ПОИСК КОМАНДЫ</div>
    <div class="center-image">
      <div class="second_img-dota2"></div> <!-- МЕНЯТЬ В ЗАВИСИМОСТИ ОТ ИГРЫ -->
    </div>
    <div class="wrapper">
      <form method="POST" action="../forms/handle_forms.php">
        <input type="hidden" name="form_type" value="players">
        <input type="hidden" name="id_game" id="id_game" value="5"> <!-- МЕНЯТЬ ИГРУ В ЗАВИСИМОСТИ ОТ СТРАНИЦЫ -->
        <div class="group">
          <input class="input_info" type="text" name="player_name" required="required" /><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Имя</label>
        </div>
        <div class="group">
          <input class="input_info" type="number" name="age" required="required" min="1" /><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Возраст</label>
        </div>
        <div class="group">
          <input class="input_info" type="text" name="nickname" required="required" /><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Никнейм в игре</label>
        </div>
        <div class="group">
          <input class="input_info" type="text" name="rank" required="required" /><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Ранг</label>
        </div>
        <div class="group">
          <textarea class="input_info_big" type="textarea" rows="5" name="description" required="required"></textarea><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Подробности</label>
        </div>
        <div class="btn-box">
          <div class="container-form-btn">
            <div class="wrap-form-btn">
              <div class="form-bgbtn"></div>
              <button class="form-btn" type="submit"">
                <b>ОТПРАВИТЬ</b>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- team_list -->
  <div id="team_list" class="area">
    <div class="area_name">СПИСОК КОМАНД</div>
        <div class="center-image">
            <div class="second_img-dota2"></div> <!-- МЕНЯТЬ В ЗАВИСИМОСТИ ОТ ИГРЫ -->
        </div>
        <div class="wrapper">
      <!-- generating cards -->
      <div id="teams-container"></div>

    </div>
  </div>

  <!-- team_new -->
  <div id="team_new" class="area">
    <div class="area_name">СОЗДАНИЕ ЗАЯВКИ НА ПОИСК ИГРОКОВ</div>
    <div class="center-image">
      <div class="second_img-dota2"></div> <!-- МЕНЯТЬ В ЗАВИСИМОСТИ ОТ ИГРЫ -->
    </div>
    <div class="wrapper">
      <form method="POST" action="../forms/handle_forms.php">
        <input type="hidden" name="form_type" value="teams">
        <input type="hidden" name="id_game" id="id_game" value="5"> <!-- МЕНЯТЬ ИГРУ В ЗАВИСИМОСТИ ОТ СТРАНИЦЫ -->
        <div class="group">
          <input class="input_info" type="text" name="team_name" required="required" /><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Название команды</label>
        </div>
        <div class="group">
          <input class="input_info" type="number" name="number_of_players" required="required" min="1" /><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Игроков в команде</label>
        </div>
        <div class="group">
          <input class="input_info" type="text" name="min_rank" required="required" /><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Необходимый ранг</label>
        </div>
        <div class="group">
          <input class="input_info" type="number" name="min_age" required="required" min="1" /><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Минимальный возраст</label>
        </div>
        <div class="group">
          <textarea class="input_info_big" type="textarea" rows="5" name="description" required="required"></textarea><span class="highlight"></span><span class="bar"></span>
          <label class="input_info_label">Описание</label>
        </div>
          <div class="btn-box">
            <div class="container-form-btn">
              <div class="wrap-form-btn">
                <div class="form-bgbtn"></div>
                  <button class="form-btn" type="submit">
                    <b>ОТПРАВИТЬ</b>
                  </button>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>

  <!-- Модальное окно -->
  <div id="modal" class="modal" style="display: none;">
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
  <script src="../js/forms.js"></script>
  <script src="../js/bubbles.js"></script>
</body>

</html>