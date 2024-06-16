<?php
include 'db_connection.php';

$sql = 'SELECT * FROM employees';
$stmt = $pdo->query($sql);
$employees = $stmt->fetchAll();

foreach ($employees as $employee) {
    echo $employee['name'] . ', ' . $employee['position'] . ', ' . $employee['salary'];
    echo ' <a href="edit_employee.php?id=' . $employee['id'] . '">Редагувати</a>';
    echo ' <form method="post" action="delete_employee.php" style="display: inline;">
        <input type="hidden" name="id" value="' . $employee['id'] . '">
        <input type="submit" value="Видалити">
    </form><br>';
}

echo '<form method="post" action="add_employee.php">
    Ім\'я: <input type="text" name="name" required><br>
    Посада: <input type="text" name="position" required><br>
    Зарплата: <input type="number" step="0.01" name="salary" required><br>
    <input type="submit" value="Додати працівника">
</form>';

include 'stats.php';
?>
