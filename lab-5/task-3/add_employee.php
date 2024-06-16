<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    if (!empty($name) && !empty($position) && !empty($salary)) {
        $sql = 'INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $position, $salary]);
    }
}

header('Location: index.php');
?>
