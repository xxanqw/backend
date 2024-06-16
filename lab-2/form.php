<!DOCTYPE html>
<html>
<head>
    <title>Форма</title>
</head>
<body>
    <h2>Форма</h2>
    <form action="process_form.php" method="post" enctype="multipart/form-data">
        <label for="name">Ім'я:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"><br>

        <label for="age">Вік:</label>
        <input type="number" id="age" name="age" value="<?php echo isset($_SESSION['age']) ? $_SESSION['age'] : ''; ?>"><br>

        <label for="photo">Фотографія:</label>
        <input type="file" id="photo" name="photo"><br>

        <input type="submit" name="submit" value="Відправити">
    </form>

    <h2>Вибір мови</h2>
    <a href="form.php?lang=ukr"><img src="ukr.png" alt="Українська"></a>
    <a href="form.php?lang=eng"><img src="eng.png" alt="English"></a>

    <?php
    session_start();

    if (isset($_GET['lang'])) {
        $lang = $_GET['lang'];
        setcookie('lang', $lang, time() + (86400 * 180), '/');
    } else {
        $lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'ukr';
    }

    echo "Вибрана мова: " . ($lang === 'ukr' ? 'Українська' : 'English');
    ?>
</body>
</html>