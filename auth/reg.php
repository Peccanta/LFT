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
    <link rel="stylesheet" type="text/css" href="../css/auth.css">
	<link rel="stylesheet" type="text/css" href="../css/auth_util.css">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
	
    <title>LFT | Регистрация</title>

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

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="register.php" method="post">
					
					<span class="login100-form-title p-b-48">
                    <img src="../logo_img/logo_lft.png" alt="LFT">
					</span>

                    <span class="login100-form-title p-b-30">
						<b>Регистрация</b>
					</span>
                    
					<div class="wrap-input100 validate-input" data-validate = "Введите логин!">
						<input class="input100" type="text" name="login">
						<span class="focus-input100" data-placeholder="Логин"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Формат: example@mail.ru">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Почта"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Введите пароль!">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Пароль"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								<b>Зарегистрироваться</b>
							</button>
						</div>
					</div>

					<div class="text-center">
						<span class="errors p-t-12"></span>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Уже есть аккаунт?
						</span>

						<a class="txt2" href="auth.php">
							Войти
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

    <!-- js -->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../vendor/animsition/js/animsition.min.js"></script>
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/select2/select2.min.js"></script>
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../vendor/countdowntime/countdowntime.js"></script>
    <script src="../js/bubbles.js"></script>
	<script src="../js/auth.js"></script>
</body>

</html>