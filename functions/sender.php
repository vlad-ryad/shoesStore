<?php
$to = "vlad_virys09@mail.ru";
$subject = "Заявка c сайта ОБУВЬПРЕСТИЖ <vlad_virys09@mail.ru>\n\r ";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$text = $_POST['text'];
$page = 'Страница КОНТАКТЫ';


$date = date("d.m.Y");
$time = date("h:i");
$from = $email;
?>

<?php
$message = '
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Информация</title>
</head>
<body>
    <center>
        <table border="1" cellpadding="6" cellspacing="0" width="90%" style="border-collapse: collapse;" border-color="#DBDBDB">
            <tr>
                <td colspan="2" align="center" bgcolor="#E4E4E4"><b>Информация</b></td>
            </tr>
            <tr>
                <td><b>Откуда</b></td>
                <td>' . $page . '</td>
            </tr>
            <tr>
                <td><b>Имя</b></td>
                <td>' . $name . '</td>
            </tr>
            <tr>
                <td><b>Адресат</b></td>
                <td><a href="mailto:' . $email . '">' . $email . '</a></td>
            </tr>
            <tr>
                <td><b>Телефон</b></td>
                <td>' . $phone . '</td>
            </tr>
            <tr>
                <td><b>Текст</b></td>
                <td>' . $text . '</td>
            </tr>
        </table>
    </center>
</body>
</html>';

$headers  = "Content-type: text/html; charset=utf-8\r\n";
$result = mail($to, $subject, $message, "From: $from", $headers);
?>
