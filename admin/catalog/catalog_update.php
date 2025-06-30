<?php
$user = "root";
$password = "";
$host = "localhost";
$name_db = "shoesStore";
$db_connect = 'mysql:host='.$host.'; dbname=' .$name_db.'; charset=utf8';
$pdo=new PDO($db_connect, $user, $password);

if ($db_connect == false)
{
    echo "Соединение не удалось";
}
session_start();

if (isset($_POST["save_name"])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "UPDATE goods SET name = :name WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id, 'name' => $name]);

    header("Location: /admin/catalog.php");
    exit();
}

if (isset($_POST["save_about"])) {
    $id = $_POST['id'];
    $about = $_POST['about'];

    $sql = "UPDATE goods SET about = :about WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id, 'about' => $about]);

    header("Location: /admin/catalog.php");
    exit();
}

if (isset($_POST["save_old_price"])) {
    $id = $_POST['id'];
    $old_price = $_POST['old_price'];

    $sql = "UPDATE goods SET old_price = :old_price WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id, 'old_price' => $old_price]);

    header("Location: /admin/catalog.php");
    exit();
}

if (isset($_POST["save_price"])) {
    $id = $_POST['id'];
    $price = $_POST['price'];

    $sql = "UPDATE goods SET price = :price WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id, 'price' => $price]);

    header("Location: /admin/catalog.php");
    exit();
}

if (isset($_POST["save_hit"])) {
    $id = $_POST['id'];
    $hit = $_POST['hit'];

    $sql = "UPDATE goods SET hit = :hit WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id, 'hit' => $hit]);

    header("Location: /admin/catalog.php");
    exit();
}

if (isset($_POST["save_new"])) {
    $id = $_POST['id'];
    $new = $_POST['new'];

    $sql = "UPDATE goods SET new = :new WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id, 'new' => $new]);

    header("Location: /admin/catalog.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];

    // Получаем информацию о загружаемом файле
    $new_image = $_FILES['new_image'];

    // Проверяем, был ли выбран файл изображения для загрузки
    if ($new_image['error'] === UPLOAD_ERR_OK) {
        // Путь к директории для сохранения изображений
        $upload_dir = '../img/';

        // Получаем оригинальное имя файла
        $original_filename = basename($new_image['name']);

        // Путь для сохранения файла с оригинальным именем
        $upload_path = $upload_dir . $original_filename;

        // Перемещаем загруженный файл в нужную директорию
        if (move_uploaded_file($new_image['tmp_name'], $upload_path)) {
            // Обновляем путь к изображению в базе данных
            $sql_update = "UPDATE goods SET image = :image WHERE id = :id";
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->execute(['image' => $original_filename, 'id' => $product_id]);

            echo "Изображение успешно обновлено";
        } else {
            die("Ошибка при загрузке файла");
        }
    } else {
        die("Ошибка при загрузке файла");
    }
} else {
    die("Доступ запрещен");
}
echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/catalog.php">';

?>