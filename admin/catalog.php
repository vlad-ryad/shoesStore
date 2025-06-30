<?php session_start(); ?>
<?php require_once '../functions/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование страницы "Каталог"</title>
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

		h1,
		h2 {
			text-align: center;
		}

		form {
			margin-bottom: 20px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 6px;
		}

		label {
			font-weight: bold;
		}

		input[type="text"],
		input[type="file"] {
			width: 100%;
			padding: 8px;
			margin-top: 6px;
			margin-bottom: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		img {
			display: block;
			margin: 0 auto;
			max-width: 300px;
			height: auto;
		}
	</style>
</head>

<body>
	<div class="container">
		<div style="text-align:center">
			<h1>Редактирование страницы "Каталог"</h1>

			<?php if (!empty($_SESSION['login'])) : ?>

				<?php echo "Привет, " . $_SESSION['login']; ?>
				<br>
				<a href="/functions/logout.php">Выйти</a>
				<br>

				<?php
				$sql = $pdo->prepare("SELECT * FROM goods");
				$sql->execute();
				while ($res = $sql->fetch(PDO::FETCH_OBJ)) : ?>
					<div id="edit_forms">
						<!-- Форма для редактирования имени товара -->
						<form action="/admin/catalog/catalog_update.php" method="post">
							<input type="hidden" name="id" value="<?php echo $res->id; ?>">
							<label for="name">Имя товара:</label>
							<input type="text" name="name" value="<?php echo $res->name; ?>">
							<input type="submit" name="save_name" value="Сохранить имя">
						</form>

						<!-- Форма для редактирования описания товара -->
						<form action="/admin/catalog/catalog_update.php" method="post">
							<input type="hidden" name="id" value="<?php echo $res->id; ?>">
							<label for="about">Описание товара:</label>
							<input type="text" name="about" value="<?php echo $res->about; ?>">
							<input type="submit" name="save_about" value="Сохранить описание">
						</form>

						<!-- Форма для редактирования старой цены товара -->
						<form action="/admin/catalog/catalog_update.php" method="post">
							<input type="hidden" name="id" value="<?php echo $res->id; ?>">
							<label for="old_price">Старая цена товара:</label>
							<input type="text" name="old_price" value="<?php echo $res->old_price; ?>">
							<input type="submit" name="save_old_price" value="Сохранить старую цену">
						</form>

						<!-- Форма для редактирования цены товара -->
						<form action="/admin/catalog/catalog_update.php" method="post">
							<input type="hidden" name="id" value="<?php echo $res->id; ?>">
							<label for="price">Цена товара:</label>
							<input type="text" name="price" value="<?php echo $res->price; ?>">
							<input type="submit" name="save_price" value="Сохранить цену">
						</form>

						<!-- Форма для редактирования признака хита товара -->
						<form action="/admin/catalog/catalog_update.php" method="post">
							<input type="hidden" name="id" value="<?php echo $res->id; ?>">
							<label for="hit">Хит товара (Указать):</label>
							<input type="text" name="hit" value="<?php echo $res->hit; ?>">
							<input type="submit" name="save_hit" value="Сохранить признак 'хит'">
						</form>

						<!-- Форма для редактирования признака новинки товара -->
						<form action="/admin/catalog/catalog_update.php" method="post">
							<input type="hidden" name="id" value="<?php echo $res->id; ?>">
							<label for="new">Новинка товара (Указать):</label>
							<input type="text" name="new" value="<?php echo $res->new; ?>">
							<input type="submit" name="save_new" value="Сохранить признак 'новинка'">
						</form>

						<!-- Форма для редактирования изображения товара -->
						<form action="/admin/catalog/catalog_update.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $res->id; ?>">
							<label for="product_id">ID товара:</label>
							<input type="text" id="product_id" name="product_id" value="<?php echo $res->id; ?>" readonly>
							<br><br>

							<label for="new_image">Выберите новое изображение:</label>
							<input type="file" id="new_image" name="new_image" accept="image/png, image/jpeg" required>
							<br><br>

							<input type="submit" value="Изменить изображение">
							<br>
							<img src="/admin/img/<?php echo $res->image; ?>" width="300">
							<br><br>
						</form>

					<?php endwhile ?>

				<?php else :
				echo '<h2>Доступ запрещен</h2>';
				echo '<a href = "/">На главную</a>';
				?>
				<?php endif ?>
					</div>
		</div>
	</div>
</body>

</html>