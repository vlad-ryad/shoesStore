<?php session_start() ; ?>
<?php require_once '../functions/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование страницы "О нас"</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center; /* Центрируем текст на странице */
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
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="file"] {
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

        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }
		.welcome {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .error-message {
            color: red;
            margin-top: 10px;
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
<h1>Редактирование страницы "О нас"</h1>

<?php if (!empty($_SESSION['login']))  :?>

	<p class="welcome">Привет, <?= htmlspecialchars($_SESSION['login']) ?></p>
    <a href="/functions/logout.php"class="logout-link">Выйти</a>

<?php 
	$sql=$pdo->prepare("SELECT * FROM about");
	$sql->execute();
	$res=$sql->fetch(PDO::FETCH_OBJ);
?>
	<form action="/admin/about/about_update.php" method="post" enctype="multipart/form-data">
		<input type="text" name="title" value="<?php echo $res -> title ?>" >
		<input type="text" name="description" value="<?php echo $res -> description ?>">
		<p>
		<input type="file" name="images">
		</p>
		<input type="submit" name="save" value="Сохранить">
	</form>
	<br>
	<img src="\admin\img\<?php echo $res -> image ?>" width="800">


<?php else:
	echo '<h2>Доступ запрещен</h2>';
	echo '<a href = "/">На главную</a>';
	?>
<?php endif ?>
</div>
</div>
</body>
</html>


