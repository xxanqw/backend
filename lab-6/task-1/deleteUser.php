<?php
// Підключіться до бази даних
$db = new PDO('mysql:host=localhost;dbname=lab6', 'root', 'root');

// Отримайте ID користувача з POST-запиту
$id = $_POST['id'];

// Видаліть користувача з бази даних
$stmt = $db->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(['success' => 'Користувач успішно видалений']);
?>
