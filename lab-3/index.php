<?php
if (isset($_GET['font_size'])) {
    $font_size = $_GET['font_size'];
    setcookie('font_size', $font_size, time() + (86400 * 30), '/');
} else {
    $font_size = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : 'medium';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Робота з cookie</title>
    <style>
        body {
            font-size: <?php echo ($font_size === 'small') ? '12px' : (($font_size === 'medium') ? '16px' : '20px'); ?>;
        }
    </style>
</head>
<body>
    <h1>Робота з cookie</h1>
    <p>Поточний розмір шрифту: <?php echo ucfirst($font_size); ?></p>
    <a href="?font_size=small">Маленький шрифт</a> |
    <a href="?font_size=medium">Середній шрифт</a> |
    <a href="?font_size=large">Великий шрифт</a>
</body>
</html>
