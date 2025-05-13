<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lft";

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>
