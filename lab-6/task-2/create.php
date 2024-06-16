<?php
require 'db.php';

$title = $_POST['title'];
$text = $_POST['text'];

$sql = "INSERT INTO notes (title, text) VALUES ('$title', '$text')";

if ($conn->query($sql) === TRUE) {
  echo "Замітка успішно створена";
} else {
  echo "Помилка: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>