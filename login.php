<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ShoesStore :: Логин</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="shortcut icon" href="assets/img/shoes-ico.ico" type="image/x-icon" />
	<!-- header-top-account*
	<frameset cols="50%, 50%">
		<frame src="index.html">
			<frame src="catalog.html">
				
	</frameset>
	-->
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
								<li><span>Войти</span></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>

			<div class="container-fluid mb-3">
				<div class="row">
					<div class="col-12">
						<div class="page-register bg-white p-3">
							<h1 class="section-title"><span>Вход</span></h1>

							<div class="row">
								<div class="col-md-6 offset-md-3">
									<form action="admin\admin.php" method="post" class="needs-validation" novalidate>

										<div class="mb-3">
											<label for="name" class="form-label required">Введите логин</label>
											<input type="name" class="form-control" id="name" name="login" placeholder="Логин" required>
											<div class="invalid-feedback">
												Требуется ввести поле: Логин
											</div>
										</div>

										<div class="mb-3">
											<label for="password" class="form-label required">Введите Пароль</label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required>
											<div class="invalid-feedback">
												Требуется ввести поле: Пароль
											</div>
										</div>

										<div class="mb-3">
											<button type="submit" class="btn btn-success btn-action">Войти</button>
										</div>
									</form>
								</div>
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