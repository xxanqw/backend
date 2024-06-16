<?php
require 'db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];

$sql = "UPDATE notes SET title='$title', text='$text' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Замітка успішно оновлена";
} else {
  echo "Помилка: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>