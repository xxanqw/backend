<?php
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($password === 'password') {
        $dir = $login;
        if (!is_dir($dir)) {
            mkdir($dir);
            mkdir($dir . '/video');
            mkdir($dir . '/music');
            mkdir($dir . '/photo');
            file_put_contents($dir . '/video/video.txt', 'Video file');
            file_put_contents($dir . '/music/music.txt', 'Music file');
            file_put_contents($dir . '/photo/photo.txt', 'Photo file');
        } else {
            echo "Папка з таким ім'ям вже існує.";
        }
    } else {
        echo "Невірний пароль.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Створення папки</title>
</head>
<body>
    <h1>Створення папки</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" name="submit" value="Створити папку">
    </form>
</body>
</html>
