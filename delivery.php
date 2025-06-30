<?php require_once './functions/db_connect.php'; ?>
<?php

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
	<title>ShoesStore :: Оплата и Доставка</title>
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

			<section class="delivery" id="delivery">
				<div class="container-fluid">
					<div class="row py-3">
						<div class="col-12">
							<h2 class="section-title">
								<span>Оплата и Доставка</span>
							</h2>
						</div>
					</div>
					<div class="row py-3">
						<div class=" col-md-6 col-lg-6 delivery-text offset-md-3">
							<p>Наша компания сотрудничает с оптовыми покупателями из Москвы и регионов России.
								«ОБУВЬПРЕСТИЖ» всегда находит оптимальные решения для каждого клиента.</p>
							<p>Для того чтобы оформить заказ, нужно переместить его в «Корзину». После подтверждения для
								вас становится доступным меню, в котором вы можете выбрать определенный вид доставки.
								Оплата производится безналичным способом: вам необходимо перечислить денежные средства
								на расчетный счет ООО «ОБУВЬПРЕСТИЖ». После того, как денежные средства поступят к нам,
								мы
								формируем заказ и отправляем его.</p>

						</div>
					</div>
					<div class="row py-3">
						<div class=" offset-lg-3 col-lg-9 offset-md-3 col-md-9 ">
							<h3 class="delivery-title">
								<span>Доставка только по барнаулу</span>
							</h3>
						</div>
					</div>
					<div class="row">
						<div class="offset-lg-3 col-lg-3 mt-lg-2 offset-md-3 col-md-3">
							<h5>Курьером</h5>
							<p class="product-price">350₽</p>
							<p>Стоимость доставки 350 руб. (В пределах города)</p>
							<p>Стоимость доставки 450 руб. (за городом 30 км.)</p>
							<p>Срок доставки 1-3 дня</p>
							<p>Время и день доставки согласовывается с оператором</p>
							<p>Оплата наличными или по карте</p>
							<p>Максимальное количество пар для заказа: 4 пары</p>
							<p>Примерка, Частичный выкуп</p>
						</div>
						<div class="col-lg-6 mt-lg-2  col-md-6">
							<h5>Самовывоз</h5>
							<p class="product-price">Бесплатно</p>
							<p>Срок 1-3 рабочих дня. По графику работы магазина</p>
							<p>Оплата наличными или по карте</p>
							<p>Максимальное количество пар для заказа: 4 пары</p>
							<p>Примерка, Частичный выкуп</p>
						</div>
						<div class="offset-lg-3 offset-md-3 col-lg-9 mb-3 col-md-9  delivery-info ">

							<ul class="delivery-info-links">
								<li><i class="fa-solid fa-comments">
										<a href="tel:+79530351956">заказать обратный звонок</a></i></li>
								<li><i class="fa-solid fa-phone">
										<a href="tel:+79530351956">позвонить по телефону
											+7-953-035-1956</a></i></li>
								<li><i class="fa-solid fa-message">
										<a href="#modal_form" data-bs-toggle="modal">заполнить форму обратной связи
											на сайте</a></i></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
		</main>
		<!--Модальное окно --->
		<div class="modal fade needs-validation" id="modal_form" tabindex="-1" aria-labelledby="modal_formLabel" aria-hidden="true" novalidate>
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="modal_formLabel">Оставьте заявку</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
					</div>
					<div class="modal-body">
						<form action="functions/sender.php" method="POST" class="needs-validation" novalidate>
							<div class="mb-3">
								<label for="name" class="form-label required">Введите Логин</label>
								<input type="text" class="form-control" id="name" name="login" placeholder="Имя" required>
								<div class="invalid-feedback">
									Требуется ввести Логин
								</div>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label required">Введите Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
								<div class="invalid-feedback">
									Пожалуйста, введите корректный Email
								</div>
							</div>
							<div class="mb-3">
								<label for="phone" class="form-label required">Введите Телефон</label>
								<input type="tel" class="form-control phone" id="phone" name="phone" placeholder="+7 (___) ___-__-__" pattern="^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$" required>
								<div class="invalid-feedback">
									Пожалуйста, введите номер телефона в формате +7 (XXX) XXX-XX-XX
								</div>
							</div>
							<div class="mb-3 ">
								<textarea class="mb-3 form-control" name="text" id="contact-message" placeholder="Введите сообщение" rows="6" data-rule="required" data-msg="Please write something for us" required></textarea>
								<div class="invalid-feedback">
									Требуется ввести поле: Сообщение
								</div>
								<div class="modal-footer">
									<div class="form-send text-right " value="Send">
										<button type="submit" class=" btn btn-success btn-action">Отправить</button>
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
									</div>
								</div>
								<div class="status"></div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>

		<?php require "public/footer.php" ?>
	</div>
	<div class="buttonUp">
		<i class="fa-solid fa-chevron-up"></i>
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