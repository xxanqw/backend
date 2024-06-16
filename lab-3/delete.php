<?php
if (isset($_POST['delete'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($password === 'password') {
        $dir = $login;
        if (is_dir($dir)) {
            removeDirectory($dir);
            echo "Папка $dir була успішно видалена.";
        } else {
            echo "Папка з таким ім'ям не існує.";
        }
    } else {
        echo "Невірний пароль.";
    }
}

function removeDirectory($dir) {
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        is_dir($path) ? removeDirectory($path) : unlink($path);
    }
    return rmdir($dir);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Видалення папки</title>
</head>
<body>
    <h1>Видалення папки</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" name="delete" value="Видалити папку">
    </form>
</body>
</html>
