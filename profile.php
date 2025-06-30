<?php
session_start();

// Проверяем, аутентифицирован ли пользователь
if (!isset($_SESSION['login'])) {
    // Если пользователь не аутентифицирован, перенаправляем на страницу входа
    header('Location: login.php');
    exit();
}

// Получаем логин пользователя из сессии
$userLogin = $_SESSION['login'];

// Получаем информацию о пользователе из базы данных 

require_once './functions/db_connect.php'; // Подключаемся к базе данных

$sql = "SELECT * FROM user WHERE login = :login";
$stmt = $pdo->prepare($sql);
$stmt->execute([':login' => $userLogin]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Проверяем, удалось ли получить информацию о пользователе
if (!$user) {
    echo "Ошибка: Пользователь не найден";
    exit();
}

// Получаем данные пользователя
$userId = $user['id'];
$userEmail = $user['email'];
$userPhone = $user['phone'];


?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        .profile-info {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Профиль пользователя: <?= htmlspecialchars($userLogin) ?></h1>
        <div class="profile-info">
            <p><strong>Имя пользователя:</strong> <?= htmlspecialchars($userLogin) ?></p>
            <p><strong>Адрес электронной почты:</strong> <?= htmlspecialchars($userEmail) ?></p>
            <p><strong>Номер телефона:</strong> <?= htmlspecialchars($userPhone) ?></p>
        </div>
    </div>
</body>

</html>
