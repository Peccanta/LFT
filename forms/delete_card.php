<?php
session_start();
require '../db/db.php';

if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'Вы не авторизованы.']);
    exit;
}

if (!isset($_POST['id']) || !isset($_POST['type']) || !isset($_POST['field'])) {
    echo json_encode(['status' => 'error', 'message' => 'Не переданы данные.']);
    exit;
}

$id = intval($_POST['id']);
$type = $_POST['type'];
$field = $_POST['field'];

$allowedTables = ["players", "teams", "responds"];
$allowedFields = ["id_player", "id_team", "id_respond"];

if (!in_array($type, $allowedTables) || !in_array($field, $allowedFields)) {
    echo json_encode(['status' => 'error', 'message' => 'Неверные параметры.']);
    exit;
}

// Удаляем запись
$stmt = $conn->prepare("DELETE FROM $type WHERE $field = ?");
$stmt->bind_param("i", $id);
$success = $stmt->execute();
$stmt->close();

if ($success) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка удаления.']);
}
?>
