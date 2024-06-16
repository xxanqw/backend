<?php
session_start();
include 'db_connection.php';

$query = "DELETE FROM users WHERE username = '" . $_SESSION['username'] . "'";
mysqli_query($connection, $query);
session_destroy();
header('Location: index.php');
?>
