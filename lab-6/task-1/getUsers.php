<?php
$db = new PDO('mysql:host=localhost;dbname=lab6', 'root', 'root');

$stmt = $db->query("SELECT id, name, email FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
?>
