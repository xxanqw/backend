<?php
session_start();
include 'db_connection.php';

$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];

if (!empty($new_username) && !empty($new_password)) {
    $query = "UPDATE users SET username = '$new_username', password = '$new_password' WHERE username = '" . $_SESSION['username'] . "'";
    mysqli_query($connection, $query);
    $_SESSION['username'] = $new_username;
}

header('Location: index.php');
?>
