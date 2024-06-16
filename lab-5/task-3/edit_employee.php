<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    if (!empty($id) && !empty($name) && !empty($position) && !empty($salary)) {
        $sql = 'UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $position, $salary, $id]);
    }
}

$id = $_GET['id'];
$sql = 'SELECT * FROM employees WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$employee = $stmt->fetch();

echo '<form method="post" action="edit_employee.php">
    ID: <input type="text" name="id" value="'.$employee['id'].'" readonly><br>
    Ім\'я: <input type="text" name="name" value="'.$employee['name'].'" required><br>
    Посада: <input type="text" name="position" value="'.$employee['position'].'" required><br>
    Зарплата: <input type="number" step="0.01" name="salary" value="'.$employee['salary'].'" required><br>
    <input type="submit" value="Зберегти зміни">
</form>';
?>
