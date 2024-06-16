<?php
$db = new PDO('mysql:host=localhost;dbname=lab6', 'root', 'root');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['error' => 'Неправильна електронна адреса']);
    exit;
}
if (strlen($password) < 6) {
    echo json_encode(['error' => 'Пароль повинен містити принаймні 6 символів']);
    exit;
}
$stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);

echo json_encode(['success' => 'Користувач успішно зареєстрований']);
?>
