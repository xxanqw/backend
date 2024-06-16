<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $photo = $_FILES['photo'];

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['age'] = $age;

    if ($photo['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $photo['tmp_name'];
        $file_name = $photo['name'];
        $upload_dir = 'uploads/';
        move_uploaded_file($tmp_name, $upload_dir . $file_name);
        echo "<p>Фотографія успішно завантажена: <img src='$upload_dir$file_name' alt='Фотографія' height='64px'></p>";
    } else {
        echo "<p>Помилка завантаження фотографії.</p>";
    }

    echo "<p>Ім'я: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Вік: $age</p>";
}
?>