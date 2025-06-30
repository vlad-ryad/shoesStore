<?php
session_start();

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
	<title>ShoesStore :: Корзина</title>
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
			<!-- Хлебные крошки -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<nav class="breadcrumbs">
							<ul>
								<li><a href="index.php">Главная</a></li>
								<li><span>Корзина</span></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 mb-3">
						<div class="page-cart bg-white p-3">
							<h1 class="section-title"><span>Корзина</span></h1>
						</div>
					</div>
					<div class="col-lg-8 mb-3">
						<div class="cart-content p-3 h-100 bg-white">

							<div class="table-responsive">
								<table class="table align-middle table-hover">
									<thead class="table-dark">
										<tr>
											<th>Фото</th>
											<th>Название</th>
											<th>Цена</th>
											<th>Кол-во</th>
											<th><i class="fa-regular fa-trash-can"></i></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="product-img-td">
												<a href="catalog.php#shoes-products">
													<img src="assets/img/shoes_products/shoes_picture-1.jpg" alt="Товар 1">
												</a>
											</td>
											<td>
												<a href="catalog.php#shoes-products" class="cart-content-title">
													Ботинки мужские Rieker
												</a>
											</td>
											<td>7000₽</td>
											<td>
												<input type="number" value="1" class="form-control cart-qty">
											</td>
											<td>
												<button class="btn btn-danger">
													<i class="fa-regular fa-circle-xmark"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td class="product-img-td">
												<a href="catalog.php#shoes-products">
													<img src="assets/img/shoes_products/shoes_picture-2.jpg" alt="Товар 2">
												</a>
											</td>
											<td><a href="catalog.php#shoes-products" class="cart-content-title">Тимберленды мужские
													quattrocomforto</a></td>
											<td>10000₽</td>
											<td>
												<input type="number" value="1" class="form-control cart-qty">
											</td>
											<td>
												<button class="btn btn-danger">
													<i class="fa-regular fa-circle-xmark"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td class="product-img-td">
												<a href="catalog.php#shoes-products">
													<img src="assets/img/shoes_products/shoes_picture-8.jpg" alt="Товар 8">
												</a>
											</td>
											<td><a href="catalog.php#shoes-products" class="cart-content-title">Мужские
													кроссовки New Balance
													725</a></td>
											<td>18499₽</td>
											<td>
												<input type="number" value="1" class="form-control cart-qty">
											</td>
											<td>
												<button class="btn btn-danger">
													<i class="fa-regular fa-circle-xmark"></i>
												</button>
											</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="5" class="text-end">
												<button class="btn btn-success btn-action">Обновить корзину</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>

					<div class="col-lg-4 mb-3">

						<div class="cart-summary p-3 sidebar">
							<h5 class="section-title"><span>Сводка корзины</span></h5>

							<div class="d-flex justify-content-between my-3">
								<h6>Стоимость</h6>
								<h6>35499₽</h6>
							</div>



							<div class="d-flex justify-content-between my-3 border-bottom">
								<h6>Доставка</h6>
								<h6>350₽</h6>
							</div>



							<div class="d-flex justify-content-between my-3">
								<h3>Итого</h3>
								<h3>35849₽</h3>
							</div>

							<div class="d-grid">
								<a href="#" class="btn btn-success btn-action">Проверить</a>
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