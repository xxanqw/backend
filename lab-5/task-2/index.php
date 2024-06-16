<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8','homeuser','password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT * FROM tov";
$result = $pdo->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Cost</th><th>Quantity</th><th>Date</th></tr>";
while($row = $result->fetch()) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['cost']."</td>";
    echo "<td>".$row['amount']."</td>";
    echo "<td>".$row['date']."</td>";
    echo "</tr>";
}
echo "</table>";

echo '<form method="post" action="insert.php">
    <input type="submit" value="Додати запис">
</form>';

echo '<form method="post" action="delete.php">
    № запису, що видаляється: <input type="text" name="id_to_delete" required><br>
    <input type="submit" value="Вилучити запис">
</form>';
?>
