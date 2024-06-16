<?php
$db = new PDO('mysql:host=localhost;dbname=lab6', 'root', 'root');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$stmt = $db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
$stmt->execute([$name, $email, $id]);

echo json_encode(['success' => 'Дані користувача успішно оновлені']);
?>
