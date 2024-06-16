<?php
include 'db_connection.php';

$sql = 'SELECT AVG(salary) as average_salary FROM employees';
$stmt = $pdo->query($sql);
$average_salary = $stmt->fetch();

echo 'Середня зарплата: ' . $average_salary['average_salary'] . '<br>';

$sql = 'SELECT position, COUNT(*) as count FROM employees GROUP BY position';
$stmt = $pdo->query($sql);
$positions = $stmt->fetchAll();

foreach ($positions as $position) {
    echo $position['position'] . ': ' . $position['count'] . '<br>';
}
?>
