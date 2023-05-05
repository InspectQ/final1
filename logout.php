<?php
session_start();
unset($_SESSION['currentUser']['authorized']);
header('location: http://finalprojekt1/index.php'); // переходим на главную страницу