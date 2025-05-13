<?php
session_start();
require '../db/db.php'; 

$errors = [];
$successes = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user && filter_var($email, FILTER_VALIDATE_EMAIL)  && ($email != '')) {
        $errors[] = 'Почта не найдена!';
    } elseif ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = '';
    }

    if (empty($errors)) {
        // 
        // функционал для отправки сообщения на почту
        // 
        $successes[] = 'Письмо для восстановления было отправлено на указанную почту!';
        echo json_encode(['status' => 'success', 'messages' => $successes]);
    } else {
        echo json_encode(['status' => 'error', 'messages' => $errors]);
    }
}
?>
