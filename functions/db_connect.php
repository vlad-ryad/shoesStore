<?php
// Учетные данные для подключения к базе данных
$user = "root";
$password = "";
$host = "localhost";
$name_db = "shoesStore";
// Подключение к базе данных с использованием PDO
$db_connect = 'mysql:host=' . $host . '; dbname=' . $name_db . '; charset=utf8';
$pdo = new PDO($db_connect, $user, $password);

if ($db_connect == false) {
    echo "Соединение не удалось";
}
session_start();
