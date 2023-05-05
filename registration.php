<?php
session_start();
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./img/spa.ico" type="image/x-icon">
	<title>Регистрация</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<article class="registration-page">
		<h2 class="registration__title subtitle_small">Зарегистрируйтесь сейчас!</h2>
		<section class="services">
			<h3 class="registration__title authorization__title">Начните пользоваться преимуществами!</h3>
			<ul class="services-list">
				<li class="services-list__item">Персональная скидка в день рождения</li>
				<li class="services-list__item">Воспользуйтесь нашим "горячим" предложением</li>
				<li class="services-list__item">Будьте всегда в курсе наших обновлений и предложений</li>
				<li class="services-list__item">У нас регулярно появляются новые скидки и акции</li>
			</ul>
		</section>
		<div class="return-start-page__image">
			<a href="./index.php" title="На главную"><img src="./img/logo-icon.png" alt="logo"></a>
		</div>
		<section class="registration-form">

			<?php
			if (isset($_POST['new_user_name'], $_POST['new_user_login'], $_POST['new_user_pass'])) { ?>
				<?php
				if (checkNewUser($_POST['new_user_name'], $_POST['new_user_login'], $_POST['new_user_pass'])) {
					header('location: login.php');
				} else {
					if (existUser($_POST['new_user_login'])) { ?>
						<h2 class="error">Пользователь с таким логином уже есть!</h2>
					<?php } else { ?>
						<h2 class="error">Ошибка ввода ...</h2>
				<?php }
				}
			} else { ?>
				<h3 class="registration-form__title authorization__title">Регистрация нового пользователя:</h3>
			<?php } ?>
			<form class="registration-form__form form" action="registration.php" method="post">
				<fieldset class="form__border">
					<legend class="form__title">Регистрация</legend>
					<div class="form-row">
						<label class="form__field-name" for="new_user_name">Имя</label>
						<input class="form__field" type="text" id="new_user_name" name="new_user_name" required placeholder="Мин. 2 символа, не должно содержать цифры">
					</div>
					<div class="form-row">
						<label class="form__field-name" for="new_user_login">Логин</label>
						<input class="form__field" type="text" id="new_user_login" name="new_user_login" required placeholder="Мин. 2 символа">
					</div>
					<div class="form-row">
						<label class="form__field-name" for="new_user_pass">Пароль</label>
						<input class="form__field" type="password" id="new_user_pass" name="new_user_pass" required placeholder="Мин. 8 символов">
					</div>
					<div class="form-button-container">
						<button class="form__button" type="submit">Выполнить</button>
						<button class="form__button btn_alt" type="reset">Сброс</button>
					</div>
					<p class="form__field-name">Есть аккаунт?</p>
					<a class="form__button btn_big" href="./login.php">Авторизуйтесь</a>
				</fieldset>
			</form>
		</section>
	</article>
</body>

</html>