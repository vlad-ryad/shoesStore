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

$address = $_POST["address"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$mode = $_POST["mode"];

$row = "UPDATE contact SET address=:address, phone=:phone, email=:email, mode=:mode";
$quary = $pdo->prepare($row);
$quary->execute(["address" => $address, "phone" => $phone, "email" => $email, "mode" => $mode]);
echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/contact.php">';
