<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lab5";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Помилка підключення: " . $connection->connect_error);
}
?>
