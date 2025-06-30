<?php require_once './functions/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

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
	<header class="header">
		<div class="header-top py-1">
			<div class="container-fluid">
				<div class="row">
					<div class="col-8 col-sm-4">
						<div class="header-top-phone d-flex align-items-center h-100">
							<i class="fa-solid fa-mobile-screen"></i>
							<a href="tel:+79530351956" class="ms-2">+7-953-035-1956</a>
						</div>
					</div>
					<div class="col-sm-4 d-none d-sm-block">
						<ul class="social-icons d-flex justify-content-center">
							<li>
								<a href="#">
									<i class="fa-brands fa-vk"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-brands fa-tiktok"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-brands fa-instagram"></i>
								</a>
							</li>
						</ul>
					</div>

					<div class="col-4 col-sm-4">
						<div class="header-top-account d-flex justify-content-end">
							<?php if (isset($userLogin)) : ?>
								<!-- Если пользователь аутентифицирован -->
								<div class="btn-group me-2">
									<div class="dropdown">
										<button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
											<?= htmlspecialchars($userLogin) ?> <!-- Отображаем логин пользователя -->
										</button>
										<ul class="dropdown-menu">
											<li>
												<a class="dropdown-item" href="profile.php">Профиль</a>
											</li>
											<li>
												<a class="dropdown-item" href="functions/logout.php">Выйти</a>
											</li>
										</ul>
									</div>
								</div>
							<?php else : ?>
								<!-- Если пользователь не аутентифицирован -->
								<div class="btn-group me-2">
									<div class="dropdown">
										<button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
											Личный кабинет
										</button>
										<ul class="dropdown-menu">
											<li>
												<a class="dropdown-item" href="login.php">Войти</a>
											</li>
											<li>
												<a class="dropdown-item" href="register.php">Зарегистрироваться</a>
											</li>
										</ul>
									</div>
								</div>
							<?php endif; ?>

							<div class="btn-group" role="group" aria-label="Button group">
								<div class="dropdown">
									<button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										RU
									</button>
									<ul class="dropdown-menu">
										<li>
											<a class="dropdown-item" href="#" onclick="changeLanguage('en')">EN</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- header-top-account*-->
					</div>
				</div>
			</div>
		</div>
		<!-- header-top--->
		<div class="header-middle bg-white py-4">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-sm-6 ">
						<a href="index.php" class="header-logo h2">ОбувьПрестиж</a>
					</div>


					<div class="col-sm-6 mt-2 mt-md-0">
						<form id="searchForm">
							<div class="input-group">
								<input type="text" class="form-control" name="s" id="text-to-find" placeholder="Поиск" aria-label="Поиск" aria-describedby="button-search" />

								<button onclick="javascript: FindOnPage('text-to-find'); return false;" class="btn btn-outline-success" type="submit" id="button-search">
									<i class="fa-solid fa-magnifying-glass"></i>
								</button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- header-middle--->

		<!-- header-bottom--->
	</header>

	<div class="header-bottom sticky-top" id="header-nav">
		<nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="offcanvas offcanvas-start" id="offcanvasNavbar" tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Меню</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item  ">
								<a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" href="index.php">Главная</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>" href="about.php">О нас</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>" href="contact.php">Контакты</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'delivery.php') ? 'active' : ''; ?>" href="delivery.php">Оплата и Доставка</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'catalog.php') ? 'active' : ''; ?>" href="catalog.php">Каталог</a>
							</li>
						</ul>
					</div>
				</div>
				<div>
					<a href="#" class="btn p-1">
						<i class="fa-solid fa-heart"></i>
					</a>
					<button class="btn p-1" type="button">
						<a class="btn" href="cart.php" target="_blank"><i class="fa-solid fa-cart-shopping"></i></a>
					</button>
				</div>
			</div>
		</nav>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Подключаем библиотеку jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Подключаем плагин inputmask -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>