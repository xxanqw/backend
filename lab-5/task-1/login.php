<?php
session_start();
include 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $username;
    header('Location: index.php');
} else {
    echo "Неправильний логін або пароль";
}
?>
