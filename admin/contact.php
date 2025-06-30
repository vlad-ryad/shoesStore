<?php session_start(); ?>
<?php require_once '../functions/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование страницы "Контакты"</title>
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

        form {
            text-align: center;
        }

        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 50%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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

        .logout-link {
            text-decoration: none;
            color: #4CAF50;
            margin-top: 10px;
            margin-bottom: 10px;
            display: inline-block;
            border: 1px solid #4CAF50;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .logout-link:hover {
            background-color: #45a049;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="text-align:center">
            <h1>Редактирование контактной информации</h1>

            <?php if (!empty($_SESSION['login'])) : ?>

                <p class="welcome">Привет, <?= htmlspecialchars($_SESSION['login']) ?></p>
                <a href="" class="logout-link">Выйти</a>
                <br>


                <?php
                $sql = $pdo->prepare("SELECT * FROM contact");
                $sql->execute();
                $res = $sql->fetch(PDO::FETCH_OBJ);
                ?>
                <form action="/admin/contacts/contacts_update.php" method="post">
                    <input type="text" id="address" name="address" value="<?php echo $res->address ?>">
                    <input type="text" id="phone" name="phone" value="<?php echo $res->phone ?>">
                    <input type="text" id="email" name="email" value="<?php echo $res->email ?>">
                    <input type="text" id="mode" name="mode" value="<?php echo $res->mode ?>">
                    <input id="contact-btn" type="submit" value="Сохранить">
                    <p class="success-message" style="display:none; color:green;">Запись успешно отредактирована</p>
                </form>


            <?php else :
                echo '<h2>Доступ запрещен</h2>';
                echo '<a href = "/">На главную</a>';
            ?>
            <?php endif ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contact-btn').click(function(e) {
                e.preventDefault(); // Предотвращаем стандартное поведение отправки формы

                var address = $('#address').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var mode = $('#mode').val();

                $.ajax({
                    url: '/admin/contacts/contacts_update.php',
                    method: 'POST',
                    data: {
                        'address': address,
                        'phone': phone,
                        'email': email,
                        'mode': mode
                    },
                    dataType: 'html',
                    success: function(data) {
                        $('.success-message').fadeIn().delay(3000).fadeOut(); // Показываем сообщение об успешном редактировании на 3 секунды
                        console.log('Данные успешно обновлены');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Логируем любые ошибки в консоль для отладки
                    }
                });
            });
        });
    </script>
</body>

</html>