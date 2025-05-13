<?php
session_start();
require '../db/db.php'; 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);

    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errors[] = 'Некорректный формат почты!';
    // }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user && filter_var($email, FILTER_VALIDATE_EMAIL)  && ($password != '' && $email != '')) {
        $errors[] = 'Почта не найдена!';
    } elseif ((!password_verify($password, $user['password']) && filter_var($email, FILTER_VALIDATE_EMAIL)) && ($password != '' && $email != '')) {
        $errors[] = 'Неверный пароль!';
    } elseif ($password === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = '';
    }

    if (empty($errors)) {
        $_SESSION['login'] = $user['login'];
        $_SESSION['email'] = $user['email'];
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'messages' => $errors]);
    }
}
?>
