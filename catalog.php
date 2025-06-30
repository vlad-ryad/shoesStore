<?php require_once './functions/db_connect.php'; ?>
<?php
$sql = $pdo->prepare("SELECT * FROM goods");
$sql->execute();
$goods = $sql->fetchAll(PDO::FETCH_ASSOC);

// Проверяем, аутентифицирован ли пользователь
if (isset($_SESSION['login'])) {
	$userLogin = $_SESSION['login']; // Получаем логин пользователя из сессии
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ShoesStore :: Каталог</title>
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

			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<nav class="breadcrumbs">
							<ul>
								<li><a href="index.php">Главная</a></li>
								<li><a href="#">Магазин</a></li>
								<li><span>Обувь</span></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="sidebar">

							<button class="btn btn-success w-100 text-start collapse-filters-btn mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
								<i class="fa-solid fa-filter"></i>Фильтры
							</button>
							<div class="collapse collapse-filters" id="collapseFilters">
								<!-- Фильтр цвета -->
								<div class="filter-block">
									<h5 class="section-title"><span>Цвет</span></h5>
									<form action="">
										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="black" class="form-check-input" type="checkbox" name="" value="">
												<label for="black" class="form-check-label">Черный</label>
											</div>
											<span class="badge border rounded-0">100</span>
										</div>


										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="white" class="form-check-input" type="checkbox" name="" value="">
												<label for="white" class="form-check-label">Белый</label>
											</div>
											<span class="badge border rounded-0">86</span>
										</div>

										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="red" class="form-check-input" type="checkbox" name="" value="">
												<label for="red" class="form-check-label">Красный</label>
											</div>
											<span class="badge border rounded-0">54</span>
										</div>

										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="blue" class="form-check-input" type="checkbox" name="" value="">
												<label for="blue" class="form-check-label">Синий</label>
											</div>
											<span class="badge border rounded-0">110</span>
										</div>
									</form>
								</div>
								<!-- Фильтр размера -->
								<div class="filter-block">
									<h5 class="section-title"><span>Размер</span></h5>
									<form action="">
										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="size-36-37" class="form-check-input" type="checkbox" name="" value="">
												<label for="size-36-37" class="form-check-label">36-37</label>
											</div>
											<span class="badge border rounded-0">100</span>
										</div>


										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="size-38-39" class="form-check-input" type="checkbox" name="" value="">
												<label for="size-38-39" class="form-check-label">38-39</label>
											</div>
											<span class="badge border rounded-0">82</span>
										</div>

										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="size-40" class="form-check-input" type="checkbox" name="" value="">
												<label for="size-40" class="form-check-label">40</label>
											</div>
											<span class="badge border rounded-0">54</span>
										</div>

										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="size-41-42" class="form-check-input" type="checkbox" name="" value="">
												<label for="size-41-42" class="form-check-label">41-42</label>
											</div>
											<span class="badge border rounded-0">110</span>
										</div>

										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="size-43-44" class="form-check-input" type="checkbox" name="" value="">
												<label for="size-43-44" class="form-check-label">43-44</label>
											</div>
											<span class="badge border rounded-0">110</span>
										</div>

										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="size-45-46" class="form-check-input" type="checkbox" name="" value="">
												<label for="size-45-46" class="form-check-label">45-46</label>
											</div>
											<span class="badge border rounded-0">110</span>
										</div>
									</form>
								</div>
								<!-- Фильтр Типа  -->
								<div class="filter-block">
									<h5 class="section-title"><span>Тип</span></h5>
									<form action="">
										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="man" class="form-check-input" type="checkbox" name="" value="">
												<label for="man" class="form-check-label">Мужская</label>
											</div>
											<span class="badge border rounded-0">100</span>
										</div>

										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="girl" class="form-check-input" type="checkbox" name="" value="">
												<label for="girl" class="form-check-label">Женская</label>
											</div>
											<span class="badge border rounded-0">86</span>
										</div>

										<div class="form-check d-flex justify-content-between">
											<div class="">
												<input id="baby" class="form-check-input" type="checkbox" name="" value="">
												<label for="baby" class="form-check-label">Детская</label>
											</div>
											<span class="badge border rounded-0">54</span>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>

					<div class="col-lg-9 col-md-8">
						<div class="row mb-3">
							<div class="col-12">
								<h1 class="section-title h4"><span>Обувь</span></h1>
							</div>
							<div class="col-12 col-sm-12">
								<div class="thumb-wrap">
									<iframe width="560" height="315" src="https://www.youtube.com/embed/nMdBtOdzXhQ" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>
							<div class="col-12 col-sm-12 catalog-text">
								<p>Мы предлагаем качественную, стильную и красивую обувь для женщин и мужчин: зимнюю и
									летнюю, демисезонную и домашнюю, а так же необычайно красивые аксессуары. Большой
									модельный ряд позволяет подобрать обувь любым, даже самым взыскательным клиентам.
								<h5><span style="color: black;">Оформление заказа</span></h5>
								Чтобы купить товар, добавляйте его в «Корзину» или заказывайте обратный звонок.
								Менеджеры перезвонят в ближайшее время и оформят заявку. Если возникли вопросы,
								консультанты помогут сориентировать вас.
								</p>
							</div>

						</div>
						<hr>
						<!-- Сортировка -->
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group mb-3">
									<span class="input-group-text">Сортировать по:</span>
									<select class="form-select" aria-label="Sort by:" id="sortSelect">
										<option selected>По умолчанию</option>
										<option value="1">По имени от (a-я)</option>
										<option value="2">По имени от (я-a)</option>
										<option value="3">По цене (от высокой к низкой)</option>
										<option value="4">По цене (от низкой к высокой)</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group mb-3">
									<span class="input-group-text">Показывать:</span>
									<select class="form-select" aria-label="Show:">
										<option selected>9</option>
										<option value="15">12</option>
										<option value="30">15</option>
										<option value="45">18</option>
									</select>
								</div>
							</div>
						</div>

						<!-- Наши Товары  -->
						<div class="row" id="shoes-products">
							<?php foreach ($goods as $data) : ?>
								<div class="col-lg-4 col-md-4 col-sm-6 mb-3">
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
						<!-- Page навигация  -->
						<div class="row">
							<div class="col-12">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">Предыдущая</a></li>
										<li class="page-item active"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">Следующая</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
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