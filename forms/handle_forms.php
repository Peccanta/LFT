<?php
session_start();
require_once '../db/db.php';

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['login']) || !isset($_SESSION['email'])) {
    header('Location: ../auth/auth.php');
    exit();
  }

// Получаем id_user из email
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("Ошибка: пользователь не найден.");
}
$user = $result->fetch_assoc();
$id_user = $user['id_user'];
$stmt->close();

// Проверяем, какая форма отправлена
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['form_type'])) {
    if ($_POST['form_type'] === "players") {
        // Форма поиска команды
        $player_name = $_POST['player_name'];
        $age = $_POST['age'];
        $nickname = $_POST['nickname'];
        $rank = $_POST['rank'];
        $description = $_POST['description'];
        $id_game = $_POST['id_game'];

        $stmt = $conn->prepare("INSERT INTO players (id_user, id_game, player_name, age, nickname, `rank`, `description`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisisss", $id_user, $id_game, $player_name, $age, $nickname, $rank, $description);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Заявка успешно отправлена!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Ошибка при отправке заявки!"]);
        }
        $stmt->close();
    } elseif ($_POST['form_type'] === "teams") {
        // Форма поиска игроков
        $team_name = $_POST['team_name'];
        $number_of_players = $_POST['number_of_players'];
        $min_rank = $_POST['min_rank'];
        $min_age = $_POST['min_age'];
        $description = $_POST['description'];
        $id_game = $_POST['id_game'];

        $stmt = $conn->prepare("INSERT INTO teams (id_user, id_game, team_name, number_of_players, min_rank, min_age, `description`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisisis", $id_user, $id_game, $team_name, $number_of_players, $min_rank, $min_age, $description);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Заявка успешно отправлена!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Ошибка при отправке заявки!"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Ошибка: неизвестный тип формы!"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Ошибка: данные не были отправлены!"]);
}
$conn->close();
?>
