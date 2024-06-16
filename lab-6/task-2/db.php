<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lab6-2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Помилка з'єднання: " . $conn->connect_error);
}
?>