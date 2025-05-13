<?php
require_once '../db/db.php';
session_start();

header('Content-Type: application/json'); // Отправляем JSON

if (!isset($_SESSION['login'])) {
    echo json_encode(['status' => 'error', 'message' => 'Необходимо авторизоваться!']);
    exit();
}

$senderLogin = $_SESSION['login'];
$recipientLogin = $_POST['recipient'] ?? '';
$message = $_POST['message'] ?? '';
$idGame = $_POST['id_game'] ?? 0;

if (empty($recipientLogin) || empty($message) || $idGame == 0) {
    echo json_encode(['status' => 'error', 'message' => 'Заполните все поля!']);
    exit();
}

// Получаем id отправителя и получателя
$querySender = $conn->prepare("SELECT id_user FROM users WHERE login = ?");
$querySender->bind_param("s", $senderLogin);
$querySender->execute();
$resultSender = $querySender->get_result();
$senderData = $resultSender->fetch_assoc();
$idSender = $senderData['id_user'] ?? 0;

$queryRecipient = $conn->prepare("SELECT id_user FROM users WHERE login = ?");
$queryRecipient->bind_param("s", $recipientLogin);
$queryRecipient->execute();
$resultRecipient = $queryRecipient->get_result();
$recipientData = $resultRecipient->fetch_assoc();
$idRecipient = $recipientData['id_user'] ?? 0;

if ($idSender == 0 || $idRecipient == 0) {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка при получении данных пользователей!']);
    exit();
}

// Записываем сообщение в базу
$queryInsert = $conn->prepare("INSERT INTO responds (id_sender, id_recipient, id_game, message) VALUES (?, ?, ?, ?)");
$queryInsert->bind_param("iiis", $idSender, $idRecipient, $idGame, $message);

if ($queryInsert->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Сообщение успешно отправлено!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка при отправке сообщения!']);
}

$conn->close();
?>
