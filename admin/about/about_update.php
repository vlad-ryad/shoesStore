<?php
$user = "root";
$password = "";
$host = "localhost";
$name_db = "shoesStore";
$db_connect = 'mysql:host=' . $host . '; dbname=' . $name_db . '; charset=utf8';
$pdo = new PDO($db_connect, $user, $password);

if ($db_connect == false) {
	echo "Соединение не удалось";
}
session_start();

if (isset($_POST["save"])) {

	$list = ['.php', '.zip', '.js', '.html'];
	foreach ($list as $item) {
		if (preg_match("/$item$/", $_FILES['images']['name'])) exit("Расширение файла не подходит");
	}
	$type = getimagesize($_FILES['images']['tmp_name']);
	if ($type && ($type['mime'] != 'image/png' || $type['mime'] != 'image/jpg ' || $type['mime'] != 'image/jpeg ')) {
		if ($_FILES['images']['size'] < 1024 * 1000) {
			$upload = '../img/' . $_FILES['images']['name'];

			if (move_uploaded_file($_FILES['images']['tmp_name'], $upload)) echo "Файл загружен";
			else echo "Ошибка при загрузке файла";
		} else exit("Размер файла превышен");
	} else exit("Тип файла не подходит");
}

?>

<?php

$title = $_POST["title"];
$description = $_POST["description"];

$sql = "UPDATE about SET title=:title,description=:description,image=:image";
$quary = $pdo->prepare($sql);
$quary->execute(["title" => $title, "description" => $description, "image" => $_FILES['images']['name']]);
echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/about.php">';
?>