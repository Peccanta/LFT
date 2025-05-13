<?php
session_start();
require '../db/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);

    if (!preg_match("/^[a-zA-Z0-9]{5,}$/", $login) && $login != '') {
        $errors[] = 'Логин должен содержать только латинские буквы и/или цифры, минимум 5 символов!';
    } elseif ($login === '') {
        $errors[] = '';
    } elseif (!preg_match("/^[a-zA-Z0-9]{6,}$/", $password)  && $password != '') {
        $errors[] = 'Пароль должен содержать только латинские буквы и/или цифры, минимум 6 символов!';
    } elseif ($password === '') {
        $errors[] = '';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = '';
    }

    

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0 && empty($errors)) {
        $errors[] = 'Почта уже зарегистрирована!';
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (login, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $login, $email, $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['login'] = $login;
            $_SESSION['email'] = $email;
            echo json_encode(['status' => 'success']);
        } else {
            $errors[] = 'Ошибка регистрации!';
        }
    }

    if (!empty($errors)) {
        echo json_encode(['status' => 'error', 'messages' => $errors]);
    }
}
?>
