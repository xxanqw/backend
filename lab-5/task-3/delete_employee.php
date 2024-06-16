<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    if (!empty($id)) {
        $sql = 'DELETE FROM employees WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}

header('Location: index.php');
?>
