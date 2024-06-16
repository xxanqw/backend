<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 0) {
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            mysqli_query($connection, $query);
            header('Location: index.php');
        } else {
            echo "Користувач з таким логіном вже існує";
        }
    }
}
?>

<form method="post" action="">
    Логін: <input type="text" name="username" required><br>
    Пароль: <input type="password" name="password" required><br>
    <input type="submit" value="Реєстрація">
</form>
