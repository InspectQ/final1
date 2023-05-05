<?php
session_start();

// функция getUsersList() возвращает массив всех пользователей и хэшей их паролей;
function getUserList() {
	include 'user-info.php';
	foreach ($persons as $key => &$value) {
		$value['password'] = sha1($value['password']);
	}
	if (isset($_SESSION['newUser'])) {
		$persons[] = $_SESSION['newUser'];
	}
	return $persons;
}

// функция existsUser($login) проверяет, существует ли пользователь с указанным логином;
function existUser($login) {
	$persons = getUserList();
	foreach ($persons as $value) {
		if ($value['login'] === $login) {
			return true;
		}
	}
	return false;
}

// функция checkPassword($login, $password) пусть возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false;
function	checkPassword($login, $password) {
	$persons = getUserList();
	if (isset($_POST['login'], $_POST['password']) && existUser($login)) {
		foreach ($persons as $key => $value) {
			if ($value['login'] === $login && $value['password'] === sha1($password)) {
				$_SESSION['currentUser'] = [
					'authorized' => true,
					'login' => $login,
					'password' => sha1($password),
					'authTime' => date('d-m-Y H:i:s', time()),
				];
				return true;
			}
		}
	}
	return false;
}

function showRemainingTime() {
}


// функция getCurrentUser() которая возвращает либо имя вошедшего на сайт пользователя, либо null.
function getCurrentUser() {
	$persons = getUserList();
	if (isset($_SESSION['currentUser']['authorized'])) {
		foreach ($persons as $key => $value) { // перебираем массив
			// получаем новый отфильтрованный массив
			$filteredArray = array_filter($persons, function ($value) {
				return $value['login'] === $_SESSION['currentUser']['login'];
			});
		}
		$needlyIndex = key($filteredArray);
		return $filteredArray[$needlyIndex]['name'];
	}
}

// перенаправляет на определенную страницу на странице авторизации
function followTheLink() {
	if (isset($_SESSION['currentUser']['authorized'])) {
		header('location: /');
	} else {
		header('location: http://finalprojekt1/login.php');
	}
}

// проверяет наличие цифр в строке
function checkForNumber($str) {
	for ($i = 0; $i < strlen($str);) {
		if (is_numeric($str[$i++])) {
			return true;
		}
	}
	return false;
}

// регистрация
function checkNewUser($name, $login, $pass) {
	// если заполнены поля регистрации
	if (isset($name, $login, $pass)) {
		// получаем значение из полей формы в переменную, преобразовываем их
		$newUserName = trim(mb_convert_case($name, MB_CASE_TITLE_SIMPLE));
		$newUserLogin = trim($login);
		$newUserPass = trim($pass);
		// === создаем 4 условия === (1-3 если переменная не пуста и длина строки больше указанных значений)
		// (4-ое условие проверяет, наличие в массиве пользователей с указанным логином)
		$checkName = isset($newUserName) && mb_strlen($newUserName) >= 2 && !checkForNumber($newUserName);
		$checkLogin = isset($newUserLogin) && mb_strlen($newUserLogin) >= 2;
		$checkPass = isset($newUserPass) && mb_strlen($newUserPass) > 7;
		$checkExistence = existUser($newUserLogin);
		// если выполнены все эти условия, добавляем данные пользователя в массив
		if ($checkName && $checkLogin && $checkPass && !$checkExistence) {
			$_SESSION['registrationCompleted'] = ['status' => true];
			$_SESSION['newUser'] = [
				'name' => $newUserName,
				'login' => $newUserLogin,
				'password' => sha1($newUserPass),
			];
			return true;
		}
	} else {
		return false;
	}
}

// персональная скидка
// создаем несколько переменных для удобства
$authorized = $_SESSION['currentUser']['authorized'] ?? null;
$currentUserLogin = $_SESSION['currentUser']['login'] ?? null;
$currentUserAuthDate = $_SESSION['currentUser']['authTime'] ?? null;
// результат работы функции индивидуальная акция
$time = showDiscountTimeLeft();
// условие: если оставшееся время больше 0 - true, иначе - ложь
if ($authorized) {
	$timeShowCondition = (strtotime($time) > 0) ? true : false;
}

// получить оставшееся время действия скидки для 
function showDiscountTimeLeft() {
	global $authorized, $currentUserLogin, $currentUserAuthDate;
	if ($authorized) {
		// если ещё не установлено значение (чтобы не перезаписывалось время авторизации после очередного входа конкретным пользователем)
		if (!isset($_SESSION["{$currentUserLogin}info"])) {
			$_SESSION["{$currentUserLogin}info"] = ['authDate' => $currentUserAuthDate];
		}
		// дата первого посещения в формате дд-мм-гггг 24часа : минуты : секунды
		$firstVisit = $_SESSION["{$currentUserLogin}info"]['authDate'] ?? null;
		// оставшееся время = (время первого визита + 24 часа - текущее время) все значения в секундах
		$timeLeft = strtotime($firstVisit) + 60 * 60 * 24 - time();
		// получаем количество оставшихся часов
		$timeLeftHours = floor((int)$timeLeft / 60 / 60);
		// получаем только оставшиеся часы и секунды
		$minutesAndSecondsLeft = date('i:s', $timeLeft);
		// формируем строку (оставшиеся часы + оставшиеся минуты и секунды)
		$discountActionTime = "$timeLeftHours:{$minutesAndSecondsLeft}";
		return $discountActionTime;
	}
}

function getDaysBirthDayRemaining() {
	global $authorized, $currentUserLogin;
	if ($authorized && isset($_POST['birthday'])) {
		$_SESSION["{$currentUserLogin}BirthdayInfo"] = [
			'birthday' => $_POST['birthday'],
			'getBirthDate' => true,
		];
	}
	if (isset($_SESSION["{$currentUserLogin}BirthdayInfo"])) {
		$currentUserBirthDate = $_SESSION["{$currentUserLogin}BirthdayInfo"]['birthday'] ?? null;
		$birthday = strtotime($currentUserBirthDate); // день рождения в секундах
		if ($birthday > time()) {
			unset($_SESSION["{$currentUserLogin}BirthdayInfo"]['birthday']);
			unset($_SESSION["{$currentUserLogin}BirthdayInfo"]['getBirthDate']);
		}
		$birthdayMonth = (int)date('n', $birthday); // номер месяца рождения
		$dateNow = time(); // время в секундах сейчас
		$mounthNow = (int)date('n', $dateNow); // номер месяца текущий
		$diff = ($dateNow - $birthday); // разниц в секундах между др и сейчас
		$years = ($dateNow - $birthday) / (86400 * (365 + 0.25)); // получаем возраст (целое число)
		$diffinSeconds = $diff - (floor($years) * 86400 * (365 + 0.25)); // вычитаем возраст окр. до целого числа
		$diffDaуs = round($diffinSeconds / 86400); // разница в днях
		// если номер месяца дня рождения больше или равен номеру месяца текущего
		$daysLeft = ($birthdayMonth >= $mounthNow) ? 365 - $diffDaуs : $diffDaуs;
		return round($daysLeft);
	}
}

$daysLeft = getDaysBirthDayRemaining();
$dayLeftString = (string)(getDaysBirthDayRemaining());
$daysLeftLastIndex = strlen($dayLeftString) - 1;
if (($dayLeftString == '11') || ($dayLeftString == '12') || ($dayLeftString == '13') || ($dayLeftString == '14')) {
	$message = 'дней';
} elseif ((int)$dayLeftString % 10 == 0) {
	$message = 'дней';
} elseif (str_contains($dayLeftString[$daysLeftLastIndex], '1')) {
	$message = 'день';
} elseif (
	str_contains($dayLeftString[$daysLeftLastIndex], '2') ||
	str_contains($dayLeftString[$daysLeftLastIndex], '3') ||
	str_contains($dayLeftString[$daysLeftLastIndex], '4')
) {
	$message = 'дня';
} else {
	$message = 'дней';
}

$getBirthDate = $_SESSION["{$currentUserLogin}BirthdayInfo"]['getBirthDate'] ?? null;