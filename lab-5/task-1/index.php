<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "Вітаємо, " . $_SESSION['username'] . "!";
    echo '
    <form method="post" action="update.php">
        Новий логін: <input type="text" name="new_username"><br>
        Новий пароль: <input type="password" name="new_password"><br>
        <input type="submit" value="Змінити дані">
    </form>
    <a href="logout.php">Вийти</a>
    <a href="delete.php">Видалити профіль</a>
    ';
} else {
    echo '
    <form method="post" action="login.php">
        Логін: <input type="text" name="username" required><br>
        Пароль: <input type="password" name="password" required><br>
        <input type="submit" value="Вхід">
    </form>
    <a href="register.php">Реєстрація</a>
    ';
}
?>
