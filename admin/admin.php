<?php require_once '../functions/db_connect.php'; ?>
<?php session_start(); ?>
<?php

$login = $_POST["login"];
$password = $_POST["password"];

// Проверяем, что логин и пароль не пустые
if (empty($login) || empty($password)) {
    echo "Введите логин и пароль";
    exit(); // Прерываем выполнение скрипта
}

// Подготавливаем SQL-запрос для получения пользователя по логину
$sql = "SELECT * FROM user WHERE login = :login";
$stmt = $pdo->prepare($sql);
$stmt->execute([':login' => $login]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Проверяем, найден ли пользователь с указанным логином
if ($user) {
    // Проверяем совпадение хэшированного пароля
    if (md5($password) === $user['password']) {
        // Вход выполнен успешно - сохраняем информацию о пользователе в сессии
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['login'] = $user['login'];

        // Перенаправляем на защищенную страницу или куда-либо еще
        header('Location:/admin.php');
        exit();
    } else {
        echo "Неправильный пароль";
        header('Location:/login.php');
    }
} else {
    echo "Пользователь с таким логином не найден";
}
?>

