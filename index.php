<?php require_once './functions/db_connect.php'; ?>

<?php // Проверяем, аутентифицирован ли пользователь
if (isset($_SESSION['login'])) {
	$userLogin = $_SESSION['login']; // Получаем логин пользователя из сессии
}
?>

<?php session_start();
$sql = $pdo->prepare("SELECT * FROM goods");
$sql->execute();
$goods = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ShoesStore</title>
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
			<div id="carousel" class="carousel slide carousel-fade">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
					<button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
					<button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
				</div>
				<div class="carousel-inner ">
					<div class="carousel-item active">
						<img src="assets/img/slider/slide-1.jpg" class="d-block w-100" alt="Инфо 1">
						<div class="carousel-caption d-none d-md-block">
							<h2>Шагайте с уверенностью в каждой паре</h2>
							<p>Наша коллекция обуви предлагает вам не только стиль и комфорт, но и уверенность на каждом
								шагу. Выбирайте качество, выбирайте стиль, выбирайте нас.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="assets/img/slider/slide-2.jpg" class="d-block w-100" alt="Инфо 2">
						<div class="carousel-caption d-none d-md-block">
							<h2>Элегантность в деталях</h2>
							<p>Откройте для себя мир элегантности с нашими изысканными моделями обуви. Каждая деталь
								создана для подчеркивания вашего уникального стиля.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="assets/img/slider/slide-3.jpg" class="d-block w-100" alt="Инфо 3">
						<div class="carousel-caption d-none d-md-block">
							<h2>Стиль и функциональность</h2>
							<p>Наша обувь - это сочетание стиля и практичности. Почувствуйте комфорт и уверенность в
								каждой паре, которая дарит вам свободу движения и элегантность.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="assets/img/slider/slide-5.jpg" class="d-block w-100" alt="Инфо 5">
						<div class="carousel-caption d-none d-md-block">
							<h2>Обувь для всех времен года</h2>
							<p>Независимо от сезона, у нас есть идеальная пара обуви. От уютных зимних ботинок до легких
								летних сандалий - мы предлагаем обувь для вашего комфорта в любое время года</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="assets/img/slider/slide-4.jpg" class="d-block w-100" alt="Инфо 4">
						<div class="carousel-caption d-none d-md-block">
							<h2>Обувь для вашего образа жизни</h2>
							<p>Независимо от того, находитесь ли вы в движении или отдыхаете, у нас есть идеальная пара
								для вашего образа жизни. Поддерживайте свой стиль и комфорт в каждом шаге с нашими
								разнообразными моделями</p>
						</div>
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
			<section class="advantage">
				<div class="container-fluid">
					<div class="row mb-5">
						<div class="col-12">
							<h2 class="section-title">
								<span>Наши преимущества</span>
							</h2>
						</div>
					</div>

					<div class="row items gy-3">
						<div class="col-lg-3 col-sm-6">
							<div class="item">
								<p><i class="fa-regular fa-clock"></i></p>
								<span>Сокращенные интервалы</span>
								<p>Возможность сокращения интервала доставки вплоть до 15 мин</p>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="item">
								<p><i class="fas fa-cubes"></i></p>
								<span>Примерка при курьере</span>
								<p>Проверка и примерка при курьерской доставке и в пунктах выдачи</p>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="item">
								<p><i class="fa-solid fa-ranking-star"></i></p>
								<span>Гарантия качества</span>
								<p>Соответствуем требованиям и стандартам качества</p>
							</div>
						</div>

						<div class="col-lg-3 col-sm-6">
							<div class="item">
								<p><i class="fa-regular fa-credit-card"></i></p>
								<span>Различные варианты оплаты</span>
								<p>Оплата наличными, банковской картой или в рассрочку</p>
							</div>
						</div>
					</div>

				</div>
			</section>
			<section class="shoes-products " id="shoes">
				<div class="container-fluid">
					<div class="row mb-5">
						<div class="col-12">
							<h2 class="section-title">
								<span>Товары</span>
							</h2>
						</div>
					</div>

					<div class="row">
						<?php foreach ($goods as $data) : ?>
							<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
								<div class="product-card">
									<div class="product-card-offer">
										<div class="offer-hit"><?php echo $data["hit"] ?></div>
										<div class="offer-new"><?php echo $data["new"] ?></div>

									</div>
									<div class="product-img">
										<a href="#"><img src="assets/img/shoes_products/<?php echo $data["image"] ?>" alt="Товар 1"></a>
									</div>
									<div class="product-info">
										<h4>
											<a href="#"> <?php echo $data["name"] ?> </a>
										</h4>
										<p class="product-exposition"><?php echo $data["about"] ?>
										</p>
										<div class="product-bottom-info d-flex justify-content-between">
											<div class="product-price">
												<small><?php echo $data["old_price"] ?></small>
												<?php echo $data["price"] ?>
											</div>
											<div class="product-links">
												<a href="#" class="btn btn-outline-secondary add-cart"><i class="fas fa-shopping-cart"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</section>

			<section class="map" id="map">
				<div class="container-fluid">
					<div class="row mb-5">
						<div class="col-12">
							<h2 class="section-title">
								<span>Мы находимся</span>
							</h2>
						</div>
					</div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2380.0976771151995!2d83.73154587705103!3d53.37730177240653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x42dda49884a53f0b%3A0x5679fc2ae61594a5!2zODAg0JPQstCw0YDQtNC10LnRgdC60L7QuSDQlNC40LLQuNC30LjQuCwgNTUsINCR0LDRgNC90LDRg9C7LCDQkNC70YLQsNC50YHQutC40Lkg0LrRgNCw0LksIDY1NjAxMA!5e0!3m2!1sru!2sru!4v1710697120473!5m2!1sru!2sru" width="100%" height="450" style="display: block; border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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