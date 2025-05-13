<?php
require_once '../db/db.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'Необходимо авторизоваться!']);
    exit();
}

$senderEmail = $_SESSION['email'];
$recipientLogin = trim($_POST['recipient'] ?? '');
$message = trim($_POST['message'] ?? '');
$idGame = trim($_POST['id_game'] ?? '');

if (empty($recipientLogin) || empty($message) || empty($idGame)) {
    echo json_encode(['status' => 'error', 'message' => 'Заполните все поля!']);
    exit();
}

// Получаем ID отправителя
$querySender = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
$querySender->bind_param("s", $senderEmail);
$querySender->execute();
$resultSender = $querySender->get_result();
$senderData = $resultSender->fetch_assoc();
$idSender = $senderData['id_user'] ?? 0;
$querySender->close();

// Получаем ID получателя
$queryRecipient = $conn->prepare("SELECT id_user FROM users WHERE login = ?");
$queryRecipient->bind_param("s", $recipientLogin);
$queryRecipient->execute();
$resultRecipient = $queryRecipient->get_result();
$recipientData = $resultRecipient->fetch_assoc();
$idRecipient = $recipientData['id_user'] ?? 0;
$queryRecipient->close();

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
    echo json_encode(['status' => 'error', 'message' => 'Ошибка при отправке сообщения!', 'sql_error' => $queryInsert->error]);
}


$queryInsert->close();
$conn->close();
?>
