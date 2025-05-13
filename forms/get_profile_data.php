<?php
session_start();
require '../db/db.php'; 

if (!isset($_SESSION['email'])) {
    echo json_encode(["error" => "Пользователь не авторизован."]);
    exit;
}

$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $id_user = $row['id_user'];
} else {
    echo json_encode(["error" => "Пользователь не найден."]);
    exit;
}
$stmt->close();

function getGameImage($id_game, $conn) {
    $stmt = $conn->prepare("SELECT game_img FROM games WHERE id_game = ?");
    $stmt->bind_param("i", $id_game);
    $stmt->execute();
    $result = $stmt->get_result();
    $game_img = ($row = $result->fetch_assoc()) ? $row['game_img'] : '../navbar_img/default.png';
    $stmt->close();
    return $game_img;
}

// Получение игроков
$players = [];
$stmt = $conn->prepare("SELECT * FROM players WHERE id_user = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $row['game_img'] = getGameImage($row['id_game'], $conn);
    $players[] = $row;
}
$stmt->close();

// Получение команд
$teams = [];
$stmt = $conn->prepare("SELECT * FROM teams WHERE id_user = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $row['game_img'] = getGameImage($row['id_game'], $conn);
    $teams[] = $row;
}
$stmt->close();

// Получение сообщений
$messages = [];
$stmt = $conn->prepare("
    SELECT r.*, u.login AS sender_login 
    FROM responds r 
    JOIN users u ON r.id_sender = u.id_user 
    WHERE r.id_recipient = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $row['game_img'] = getGameImage($row['id_game'], $conn);
    $messages[] = $row;
}
$stmt->close();

echo json_encode(["players" => $players, "teams" => $teams, "messages" => $messages], JSON_UNESCAPED_UNICODE);
?>
