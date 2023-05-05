<?php

session_start();
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Добро пожаловать в SPA салон в г. Геленджик. YourluX Spa-салон красоты, расслабляющего массажа и SPA-процедур! В нашем SPA салоне  множество процедур, доступные цены, персональные скидки.">
	<title>SPA-салон "YourluX"</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:ital,wght@0,300;0,400;0,500;1,400&family=Rufina:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<div class="wrapper">

		<header class="header">
			<div class="header-logo">
				<a href="./index.php" title="Обновить">
					<div class="header-logo__image">
						<img src="./img/logo-icon.png" alt="logo">
					</div>
				</a>
				<h1 class="header-logo__title title_logo">YourluX</h1>
			</div>
			<nav class="header-navigation">
				<ul class="header-links">
					<li class="header-links__link">
						<a href="#start">На главную</a>
					</li>
					<li class="header-links__link">
						<a href="#our-services">Услуги</a>
					</li>
					<li class="header-links__link">
						<a href="#our-stocks">Акции</a>
					</li>
					<li class="header-links__link">
						<a href="#photo-gallery">Галерея</a>
					</li>
					<li class="header-links__link">
						<a href="#contacts">Контакты</a>
					</li>
				</ul>
			</nav>
			<div class="header__user-info">
				<?php if ($authorized) { ?>
					<p>Здравствуйте, <span>
							<?= getCurrentUser(); ?>
						</span>!</p>
					<p><a href="./lk.php" title="Личный кабинет">Личный кабинет</a> |
						<a href="./logout.php" title="Выйти">Выйти</a>
					</p>
				<?php } else { ?>
					<p><a href="./login.php" title="Войти в личный кабинет">Войти</a>
						| <a href="./registration.php" title="Регистрация нового пользователя"> Регистрация </a>
					</p>
				<?php } ?>
			</div>
		</header>

		<main class="page-content">
			<article class="start-page" id="start">
				<div class="first-section-container">
					<section class="first-section">
						<h2 class="first-section__subtitle">spa & beauty center</h2>
						<h3 class="first-section__title title">Красота и успех начинаются здесь</h3>
						<div class="first-section__text-block">
							<p>Spa-процедуры устойчиво ассоциируется с современными элитными услугами в области красоты и
								здоровья.
							</p>
						</div>
						<a class="first-section__btn btn_alt" href="#our-services">Узнать больше</a>
					</section>
				</div>
				<section class="second-section">
					<div class="second-section__image">
						<img src="./img/logo-icon.png" alt="logo">
					</div>
					<h3 class="second-section__subtitle">О нашем SPA-салоне</h3>
					<h2 class="second-section__title subtitle">Приходите, и вы будете вдохновлены!</h2>
					<div class="second-section__text-block">
						<p>Spa-салон "YourluX" приглашает Вас окунуться в мир удовольствий и провести время с пользой для тела и
							души. Специально для Вас мы приготовили огромное количество оздоравливающих и расслабляющих процедур
						</p>
					</div>
					<a class="second-section__btn btn" href="#video-gallery">Подробнее</a>
				</section>
			</article>
			<article class="content">
				<section class="services" id="our-services">
					<h2 class="services__title subtitle">Наши услуги</h2>
					<h3 class="services__subtitle">Так в чем же заключается благотворное влияние Spa-процедур?</h3>
					<ul class="services-list">
						<li class="services-list__item">Омоложение кожи лица и тела</li>
						<li class="services-list__item">Укрепление волос</li>
						<li class="services-list__item">Улучшение кровообращения, лимфодренаж</li>
						<li class="services-list__item">Нормализация артериального давления</li>
						<li class="services-list__item">Уменьшение растяжек и целлюлита</li>
						<li class="services-list__item">Выведение токсинов</li>
						<li class="services-list__item">Укрепление иммунитета</li>
						<li class="services-list__item">Снятие стресса и хронической усталости</li>
					</ul>
					<h3 class="services__subtitle">Польза Spa-процедур очевидна. Осталось лишь выбрать те, которые необходимы
						именно Вам.</h3>
					<div class="services-cards">
						<div class="services-card">
							<div class="services-card__image">
								<img src="./img/massage.webp" alt="image">
							</div>
							<div class="services-card-body">
								<h3 class="services-card__title">Массажи</h3>
								<div class="services-card__text-block">
									<p><span>Массаж</span>— это комплексное воздействие на ткани и мышцы тела</p>
									<p>Мы можем предложить Вам классический, баночный, антицеллюлитный, точечный, медовый, водный массаж</p>
								</div>
								<a class="services-card__btn btn" href="#contacts">Записаться</a>
							</div>
						</div>
						<div class="services-card">
							<div class="services-card__image">
								<img src="./img/mask.webp" alt="image">
							</div>
							<div class="services-card-body">
								<h3 class="services-card__title">Пилинги и маски</h3>
								<div class="services-card__text-block">
									<p><span>Маска-пилинг</span> — отличный выбор для сухой, чувствительной кожи
									</p>
								</div>
								<a class="services-card__btn btn" href="#contacts">Записаться</a>
							</div>
						</div>
						<div class="services-card">
							<div class="services-card__image">
								<img src="./img/obertyvanie.webp" alt="image">
							</div>
							<div class="services-card-body">
								<h3 class="services-card__title">Обертывания</h3>
								<div class="services-card__text-block">
									<p><span>Обертывание</span> – это способ воздействия на кожу и организм (через кожу), с
										помощью биологически активных веществ</p>
								</div>
								<a class="services-card__btn btn" href="#contacts">Записаться</a>
							</div>
						</div>
						<div class="services-card">
							<div class="services-card__image">
								<img src="./img/vanna.webp" alt="image">
							</div>
							<div class="services-card-body">
								<h3 class="services-card__title">Ванны + джакузи</h3>
								<div class="services-card__text-block">
									<p><span>Принятие ванны</span> положительно влияет на общее самочувствие, способствует
										расслаблению, помогает снять спазмы, уменьшить болевой синдром при некоторых заболеваниях
									</p>
									<p>Ароматические, минеральные, жемчужные, йодобромные, вихревые с водой разной температуры
									</p>
								</div>
								<a class="services-card__btn btn" href="#contacts">Записаться</a>
							</div>
						</div>
						<div class="services-card">
							<div class="services-card__image">
								<img src="./img/talassoterapia.webp" alt="image">
							</div>
							<div class="services-card-body">
								<h3 class="services-card__title">Талассотерапия</h3>
								<div class="services-card__text-block">
									<p><span>Талассопроцедуры</span> – это особый раздел альтернативной медицины, подразумевающий
										воздействие морского климата, купаний, солнечных ванн, а также грязи, водорослей и прочих
										даров моря на организм человека
									</p>
								</div>
								<a class="services-card__btn btn" href="#contacts">Записаться</a>
							</div>
						</div>
						<div class="services-card">
							<div class="services-card__image">
								<img src="./img/sauna.webp" alt="image">
							</div>
							<div class="services-card-body">
								<h3 class="services-card__title">Сауна и восточный хаммам</h3>
								<div class="services-card__text-block">
									<p><span>Посещение сауны</span> может быть не только приятным, но и полезным для здоровья.
										Снижается риск развития сердечно-сосудистых и нейродегенеративных заболеваний
									</p>
								</div>
								<a class="services-card__btn btn" href="#contacts">Записаться</a>
							</div>
						</div>
					</div>
				</section>
				<section class="stocks" id="our-stocks">
					<h2 class="stocks__title subtitle">Акции</h2>
					<div class="stocks__text-block">
						<p>В нашем салоне постоянно проходят различные акции, а также действуют приятные скидки для постоянных
							клиентов.
						</p>
						<?php // если еще не авторизован 
						if (!$authorized) { ?>
							<p>Войдите под своей учетной записью, чтобы получить больше скидок!</p>
							<a class="btn" href="./login.php">Войти</a>
						<?php } ?>
					</div>
					<?php if ($authorized) { ?>
						<section class="auth-user-content">
							<h3 class="auth-user-content__subtitle subtitle_small">
								<span><?= getCurrentUser() ?></span>, успейте воспользоваться нашим горячим преложением!
							</h3>
							<ul class="stocks-list">
								<li class="stocks-list__item stocks-list__item_box">Получите скидку <span>10%</span> на все услуги!
								</li>
								<li class="stocks-list__item stocks-list__item_cup">Назовите нашим операторам прокомокод "Relax-Top"
								</li>
								<li class="stocks-list__item stocks-list__item_sign">Внимание! Действие промокода ограничено!
								</li>
								<li class="stocks-list__item stocks-list__item_watch">Действие промокода истекает через:</li>
								<?php if ($timeShowCondition && $authorized) { ?>
									<p class="stocks-list__item_timer"><?= $time; ?> </p>
								<?php	} else { ?>
									<li class="error"><span>К сожалению время истекло :(</span></з>
									<?php }
									?>
							</ul>
						</section>

						<section class="auth-user-content">
							<h2 class="auth-user-content__subtitle subtitle_small"><span><?= getCurrentUser() ?></span>, получите персональную скидку <span>5%</span> в день рождения!
							</h2>
							<?php if (!$getBirthDate) { ?>
								<form class="birthday-form" action="index.php" method="post">
									<fieldset class="birthday-form__border">
										<legend class="birthday-form__title">Получить дополнительную скидку</legend>
										<label for="birthday">Укажите дату вашего рождения</label>
										<input type="date" name="birthday" id="birthday">
										<div class="birthday-form-btn-container">
											<button class="birthday-form__btn btn" type="submit">Отправить</button>
											<button class="birthday-form__btn btn" type="reset">Сброс</button>
										</div>
									</fieldset>
								</form>
							<?php } else { ?>
								<h2 class="auth-user-content__subtitle subtitle_small">
									<?php if ($daysLeft == 365 || $daysLeft == 0) { ?>
										<span><?= getCurrentUser() ?></span>, поздравляем Вас с днём рождения! Дарим скидку 5%!
									<?php } else { ?>
										<span><?= getCurrentUser() ?></span>, до Вашего дня рождения:
										<span> <?= "{$dayLeftString} {$message}" ?> </span>
								</h2>
					<?php	}
								}
							}  ?>
						</section>


				</section>
			</article>
			<article class="media">
				<section class="gallery" id="photo-gallery">
					<h3 class="gallery__title subtitle">Фотогалерея</h3>
					<div class="gallery-content">
						<div class="gallery__photo gallery__photo_big">
							<img src="./img/1.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/2.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/8.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/9.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/4.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/7.webp" alt="photo">
						</div>
						<div class="gallery__photo gallery__photo_big">
							<img src="./img/3.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/10.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/11.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/5.webp" alt="photo">
						</div>
						<div class="gallery__photo">
							<img src="./img/6.webp" alt="photo">
						</div>
				</section>
			</article>
		</main>

		<footer class="footer" id="contacts">
			<div class="footer-logo">
				<div class="footer-logo__image">
					<img src="./img/logo-icon.png" alt="logo">
				</div>
				<h2 class="footer-logo__title title_logo">YourluX</h2>
			</div>
			<nav class="footer-navigation">
				<ul class="footer-links">
					<li class="footer-links__link">
						<a href="#start">На главную</a>
					</li>
					<li class="footer-links__link">
						<a href="#our-services">Услуги</a>
					</li>
					<li class="footer-links__link">
						<a href="#our-stocks">Акции</a>
					</li>
					<li class="footer-links__link">
						<a href="#photo-gallery">Галерея</a>
					</li>
					<li class="footer-links__link">
						<a href="#contacts">Контакты</a>
					</li>
				</ul>
			</nav>
			<div class="footer-contacts">
				<nav class="social-networks">
					<ul class="social-networks__list">
						<li class="social-network__item">
							<a class="social-network__link" href="#">
								<img src="./img/whatsapp-icon.png" alt="logo">
							</a>
						</li>
                        <li class="social-network__item">
							<a class="social-network__link" href="#">
								<img src="./img/vk-icon.png" alt="logo">
							</a>
						</li>
						<li class="social-network__item">
							<a class="social-network__link" href="#">
								<img src="./img/telegram-icon.png" alt="logo">
							</a>
						</li>
					</ul>
				</nav>
				<div class="contacts">
					<p>Телефон для предварительной записи: <span><a href="tel:+79000000000">+78000000000</a></span></p>
					<p>
					<address>Ждем Вас по адресу: <span>г. Геленджик, ул.Победа д.2</span></address>
					</p>
					<p>Электропочта: <span><a href="mailto:sochi-chernye-nochi@mail.ru">gelek-spa-relax@gmail.com</a></span></p>
				</div>
			</div>
			<div class="footer-text-block">
				<p>© <span>SPA-салон "YourluX"</span></p>
                <p>2023</p>
			</div>
		</footer>

	</div> <!--wrapper-->
	<script src="./js/script.js"></script>
</body>

</html>