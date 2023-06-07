<?php

error_reporting(0);

$URL = trim($_SERVER['REQUEST_URI'], '/'); // Получаем запрашиваемый адрес
if(!$URL) $URL = 'index'; // Это строка пустая, то присваиваем "index"

session_start();

$path = "views/$URL.php"; // Строим путь до файла страницы

//Проверяем доступность файла и подгружаем страницу
if($URL == 'auth') require_once 'ajax/auth.php';
else if($URL == 'trips') require_once 'ajax/trips.php';
else if(file_exists($path)) require_once $path;
else exit('Страница не найдена');

?>