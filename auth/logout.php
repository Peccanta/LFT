<?php
// Стартуем сессию
session_start();

// Удаляем все переменные сессии
session_unset();

// Уничтожаем сессию
session_destroy();

// Перенаправляем на страницу авторизации
header('Location: ../auth/auth.php');
exit();
?>
