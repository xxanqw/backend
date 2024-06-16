<?php
session_start();

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === 'Admin' && $password === 'password') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $login;
    } else {
        $_SESSION['logged_in'] = false;
        unset($_SESSION['username']);
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Робота з session</title>
</head>
<body>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
        <h1>Добрий день, <?php echo $_SESSION['username']; ?>!</h1>
        <a href="?logout=true">Вийти</a>
    <?php else: ?>
        <h1>Форма авторизації</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="login">Логін:</label>
            <input type="text" id="login" name="login" required><br>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" name="submit" value="Увійти">
        </form>
        <?php if (isset($_SESSION['logged_in']) && !$_SESSION['logged_in']): ?>
            <p>Невірний логін або пароль.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>