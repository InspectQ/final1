<?php

session_start();
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./img/spa.ico" type="image/x-icon">
	<title>Вход</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<article class="authorization-page">
		<section class="authorization">
			<div class="return-start-page__image">
				<a href="./index.php" title="На главную"><img src="./img/logo-icon.png" alt="logo"></a>
			</div>

			<?php if (!isset($_POST['login'], $_POST['password'])) { ?>
				<h2 class="authorization__title">Пожалуйста, авторизуйтесь ...</h2>
			<?php } ?>

			<?php if (isset($_POST['login'], $_POST['password'])) {
				if (checkPassword($_POST['login'], $_POST['password'])) {
					followTheLink();
				} else {
			?>
					<h2 class="error">Проверьте логин и пароль!</h2>
			<?php }
			} ?>

			<form class="authorization__form form" action="login.php" method="post">
				<fieldset class="form__border">
					<legend class="form__title">Войти в личный кабинет</legend>
					<div class="form-row">
						<label class="form__field-name" for="login">Логин</label>
						<input class="form__field" type="text" id="login" name="login" required placeholder="Укажите ваш логин">
					</div>
					<div class="form-row">
						<label class="form__field-name" for="pass">Пароль</label>
						<input class="form__field" type="password" id="pass" name="password" required placeholder="Введите пароль">
					</div>
					<div class="form-button-container">
						<button class="form__button" type="submit">Выполнить</button>
						<button class="form__button btn_alt" type="reset">Сброс</button>
					</div>
					<p class="form__field-name">Нет аккаунта?</p>
					<a class="form__button btn_big" href="./registration.php">Зарегистрируйтесь</a>
				</fieldset>
			</form>

		</section>
	</article>
</body>

</html>