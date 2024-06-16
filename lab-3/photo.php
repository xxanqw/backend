<?php
if (isset($_POST['submit'])) {
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }

    $files = $_FILES['files'];
    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $file_name = $files['name'][$key];
        $file_tmp = $files['tmp_name'][$key];
        move_uploaded_file($file_tmp, $upload_dir . $file_name);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Передача файлів через форми</title>
</head>
<body>
    <h1>Завантаження зображень</h1>
    <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="file" name="files[]" multiple>
        <input type="submit" name="submit" value="Завантажити">
    </form>
</body>
</html>
