<?php
$db = new PDO('mysql:host=localhost;dbname=lab6', 'root', 'root');

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    echo json_encode(['success' => 'Ви успішно увійшли']);
} else {
    echo json_encode(['error' => 'Неправильна електронна адреса або пароль']);
}
?>
