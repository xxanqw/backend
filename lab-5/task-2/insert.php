<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $cost = $_POST['cost'];
    $date = $_POST['date'];

    if (!empty($name) && !empty($amount) && !empty($cost) && !empty($date)) {
        $sql =  'INSERT INTO `tov` (`name`, `amount`, `cost`, `date`) VALUES ("'.$name.'","'.$amount.'","'.$cost.'","'.$date.'")';
        $affected_rows = $pdo->exec($sql);
        echo "<p>Додано успішно</p>";
    }
}

echo '<form method="post" action="">
    Назва: <input type="text" name="name" required><br>
    Кількість: <input type="number" name="amount" required><br>
    Ціна: <input type="number" name="cost" required><br>
    Дата: <input type="date" name="date" required><br>
    <input type="submit" value="Додати запис">
</form>';
?>
