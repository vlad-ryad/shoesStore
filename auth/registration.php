<?php
require_once '../functions/db_connect.php';
session_start();

$login = $_POST['login'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Проверяем, что все поля заполнены
if (empty($login) || empty($email) || empty($phone) || empty($password)) {
    echo "Заполните все поля";
    exit(); // Прерываем выполнение скрипта
}

// Проверка уникальности логина
$sqlCheckLogin = "SELECT COUNT(*) FROM user WHERE login = :login";
$stmtCheckLogin = $pdo->prepare($sqlCheckLogin);
$stmtCheckLogin->execute([':login' => $login]);
if ($stmtCheckLogin->fetchColumn() > 0) {
    echo "Логин уже используется, выберите другой";
    exit();
}

// Проверка уникальности электронной почты
$sqlCheckEmail = "SELECT COUNT(*) FROM user WHERE email = :email";
$stmtCheckEmail = $pdo->prepare($sqlCheckEmail);
$stmtCheckEmail->execute([':email' => $email]);
if ($stmtCheckEmail->fetchColumn() > 0) {
    echo "Этот адрес электронной почты уже зарегистрирован";
    exit();
}

// Проверка корректности электронной почты
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Некорректный формат электронной почты";
    exit();
}


// Хэшируем пароль с помощью MD5
$hashedPassword = md5($password);

// Подготавливаем SQL-запрос с использованием подготовленного выражения
$sql = "INSERT INTO user (login, email, phone, password) VALUES (:login, :email, :phone, :password)";
$stmt = $pdo->prepare($sql);

// Выполняем запрос, передавая значения через массив параметров
$result = $stmt->execute([
    ':login' => $login,
    ':email' => $email,
    ':phone' => $phone,
    ':password' => $hashedPassword
]);

// Проверяем результат выполнения запроса
if ($result) {
    echo "Успешная регистрация";
} else {
    echo "Ошибка регистрации";
    echo "Ошибка: " . $stmt->errorInfo()[2];
}

// Перенаправляем пользователя после выполнения операции
header('Location: /login.php');
exit();
