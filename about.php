<?php require_once './functions/db_connect.php'; ?>
<?php

// Проверяем, аутентифицирован ли пользователь
if (isset($_SESSION['login'])) {
	$userLogin = $_SESSION['login']; // Получаем логин пользователя из сессии
}
$sql = $pdo->prepare("SELECT * FROM contact");
$sql->execute();
$res = $sql->fetch(PDO::FETCH_ASSOC);
?>

<?php
$row = $pdo->prepare("SELECT * FROM about");
$row->execute();
$about = $row->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ShoesStore :: О нас</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="shortcut icon" href="assets/img/shoes-ico.ico" type="image/x-icon" />
</head>

<body>

	<div class="wrapper">
		<?php require "public/header.php" ?>
		<main class="main">
			<section class="about-us" id="about">
				<div class="container-fluid">
					<div class="row py-3">
						<div class="col-12">
							<h2 class="section-title">
								<span><?php echo $about["title"] ?></span>
							</h2>
						</div>
					</div>
					<div class="row gy-3">
						<div class=" col-md-6 col-lg-6  offset-md-3">
							<div class="image-about">
								<img src="admin\img\<?php echo $about["image"] ?>" width="100%" alt="Обувь">
							</div>
						</div>
					</div>
					<div class="row py-3">
						<div class=" col-md-6 col-lg-6 about-text offset-md-3">
							<p><?php echo $about["description"] ?>
							</p>
							<p>Адрес: <?php echo $res["address"] ?></p>
							<p>Телефон: <?php echo $res["phone"] ?></p>
							<p>Часы работы: <?php echo $res["mode"] ?></p>
							<p>Email: <?php echo $res["email"] ?></p>

						</div>
					</div>
				</div>
			</section>

		</main>

		<?php require "public/footer.php" ?>
	</div>
	<div class="buttonUp">
		<i class="fa-solid fa-chevron-up"></i>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>