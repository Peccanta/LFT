<?php
require_once '../db/db.php';

$type = $_GET['type'] ?? '';
$lastId = $_GET['lastId'] ?? 0; 
$idGame = $_GET['id_game'] ?? 0; // Получаем id_game из запроса

if (!is_numeric($idGame) || $idGame <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Некорректный id_game']);
    exit();
}

if ($type === 'players') {
    $query = "SELECT players.*, users.login 
              FROM players 
              JOIN users ON players.id_user = users.id_user 
              WHERE players.id_player > $lastId AND players.id_game = $idGame
              ORDER BY players.id_player ASC";
} elseif ($type === 'teams') {
    $query = "SELECT teams.*, users.login 
              FROM teams 
              JOIN users ON teams.id_user = users.id_user 
              WHERE teams.id_team > $lastId AND teams.id_game = $idGame
              ORDER BY teams.id_team ASC";
} else {
    echo json_encode(['status' => 'error', 'message' => 'Неверный параметр type']);
    exit();
}

$result = $conn->query($query);
$cards = [];
$newLastId = $lastId;

while ($row = $result->fetch_assoc()) {
    $cards[] = $row;
    if ($row['id_player'] > $newLastId || $row['id_team'] > $newLastId) {
        $newLastId = max($row['id_player'] ?? 0, $row['id_team'] ?? 0);
    }
}

echo json_encode(['status' => 'success', 'data' => $cards, 'lastId' => $newLastId]);
$conn->close();
?>
