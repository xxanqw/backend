<?php
require 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM notes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Замітка успішно видалена";
} else {
  echo "Помилка: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>