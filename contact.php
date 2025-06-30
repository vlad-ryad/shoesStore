<?php require_once './functions/db_connect.php'; ?>
<?php
$sql = $pdo->prepare("SELECT * FROM contact");
$sql->execute();
$res = $sql->fetch(PDO::FETCH_ASSOC);

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
	<title>ShoesStore :: Контакты</title>
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
			<section class="contact" id="contact">
				<div class="container-fluid" text-align="center">
					<div class="row py-3">
						<div class="col-12">
							<h2 class="section-title">
								<span>Контакты</span>
							</h2>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-6 mt-lg-5 contact-text">
								<a href="#"><i class="fa-solid fa-location-dot"></i></a>
								<p>Адрес: <?php echo $res["address"] ?></p>
								<p>Телефон: <?php echo $res["phone"] ?></p>
								<p>Email:<a href="mailto:shoes_Prestige@mail.ru" target="_blank"><?php echo $res["email"] ?></a>
								</p>
								<p><?php echo $res["mode"] ?></p>
							</div>
							<div class="col-lg-6">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2380.0976771151995!2d83.73154587705103!3d53.37730177240653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x42dda49884a53f0b%3A0x5679fc2ae61594a5!2zODAg0JPQstCw0YDQtNC10LnRgdC60L7QuSDQlNC40LLQuNC30LjQuCwgNTUsINCR0LDRgNC90LDRg9C7LCDQkNC70YLQsNC50YHQutC40Lkg0LrRgNCw0LksIDY1NjAxMA!5e0!3m2!1sru!2sru!4v1710697120473!5m2!1sru!2sru" width="100%" height="450" style="display: block; border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="action-form">
				<div class="container-fluid mb-3">
					<div class="row mb-5">
						<div class="col-12">
							<h2 class="section-title">
								<span>Обратная связь</span>
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="offset-lg-3 offset-md-3 col-lg-6 col-md-6 ">
							<form class="my-form needs-validation" novalidate>
								<div class="mb-3">
									<label for="name" class="form-label required"> Ваше Имя</label>
									<input name="name" type="text" class="form-control" id="name" placeholder="Имя" required>
									<div class="invalid-feedback">
										Требуется ввести поле: Имя
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
									<div class="form-send text-right " value="Send">
										<button type="submit" class=" btn btn-success btn-action">Отправить</button>
									</div>
									<div class="status"></div>
								</div>
							</form>
							<div class="mess"></div>
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
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Подключаем библиотеку jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Подключаем плагин inputmask -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>