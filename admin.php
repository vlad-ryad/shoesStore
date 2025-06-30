<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ Панель</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .admin-panel {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .admin-panel a {
            display: inline-block;
            margin: 0 10px;
            padding: 8px 16px;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            transition: background-color 0.3s ease;
        }

        .admin-panel a:hover {
            background-color: #e9ecef;
        }

        /* Стили для формы входа */
        .login-form {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .welcome {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (!empty($_SESSION['login'])) : ?>
            <div class="admin-panel">

                <p class="welcome">Привет, <?= htmlspecialchars($_SESSION['login']) ?></p>

                <a href="functions/logout.php">Выйти</a>
                <br>
                <br>
                <a href="/index.php">Главная</a>
                <a href="/admin/about.php">О нас</a>
                <a href="/admin/contact.php">Контакты</a>
                <a href="/admin/catalog.php">Каталог</a>
            </div>
        <?php else : ?>
            <div class="login-form">
                <h2>Введите логин и пароль</h2>
                <form action="/functions/login.php" method="post">
                    <input type="text" name="login" placeholder="Логин" required>
                    <br>
                    <input type="password" name="password" placeholder="Пароль" required>
                    <br>
                    <input type="submit" value="Войти">
                </form>
                <?php if (isset($_GET['error']) && $_GET['error'] === 'login_failed') : ?>
                    <p class="error-message">Неверный логин или пароль. Попробуйте еще раз.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>