<!DOCTYPE html>
<html>
<head>
    <title>Робота з рядками</title>
</head>
<body>
    <h2>Заміна символів</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="text">Текст:</label>
        <input type="text" id="text" name="text" value="<?php echo isset($_POST['text']) ? $_POST['text'] : ''; ?>"><br>
        <label for="find">Знайти:</label>
        <input type="text" id="find" name="find" value="<?php echo isset($_POST['find']) ? $_POST['find'] : ''; ?>"><br>
        <label for="replace">Замінити:</label>
        <input type="text" id="replace" name="replace" value="<?php echo isset($_POST['replace']) ? $_POST['replace'] : ''; ?>"><br>
        <input type="submit" name="submit" value="Замінити">
    </form>
    <label for="result">Результат:</label>
    <input type="text" id="result" name="result" value="<?php echo isset($_POST['result']) ? $_POST['result'] : ''; ?>" readonly><br>

    <?php
    if (isset($_POST['submit'])) {
        $text = $_POST['text'];
        $find = $_POST['find'];
        $replace = $_POST['replace'];
        $result = str_replace($find, $replace, $text);
        echo "<script>document.getElementById('result').value = '$result';</script>";
    }
    ?>

    <h2>Сортування назв міст</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="cities">Введіть назви міст через пробіл:</label>
        <input type="text" id="cities" name="cities" value="<?php echo isset($_POST['cities']) ? $_POST['cities'] : ''; ?>"><br>
        <input type="submit" name="sort_cities" value="Сортувати">
    </form>
    <?php
    if (isset($_POST['sort_cities'])) {
        $cities = explode(' ', $_POST['cities']);
        sort($cities);
        $sorted_cities = implode(' ', $cities);
        echo "Відсортовані назви міст: $sorted_cities";
    }
    ?>

    <h2>Виділення імені файлу без розширення</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="file_path">Введіть шлях до файлу:</label>
        <input type="text" id="file_path" name="file_path" value="<?php echo isset($_POST['file_path']) ? $_POST['file_path'] : ''; ?>"><br>
        <input type="submit" name="extract_filename" value="Виділити ім'я файлу">
    </form>
    <?php
    if (isset($_POST['extract_filename'])) {
        $file_path = $_POST['file_path'];
        $filename = basename($file_path, '.txt');
        echo "Ім'я файлу без розширення: $filename";
    }
    ?>

    <h2>Визначення кількості днів між датами</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="date1">Введіть першу дату (День-Місяць-Рік):</label>
        <input type="text" id="date1" name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : ''; ?>"><br>
        <label for="date2">Введіть другу дату (День-Місяць-Рік):</label>
        <input type="text" id="date2" name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : ''; ?>"><br>
        <input type="submit" name="calculate_days" value="Обчислити кількість днів">
    </form>
    <?php
    if (isset($_POST['calculate_days'])) {
        $date1 = DateTime::createFromFormat('d-m-Y', $_POST['date1']);
        $date2 = DateTime::createFromFormat('d-m-Y', $_POST['date2']);
        $diff = $date1->diff($date2);
        $days = abs($diff->days);
        echo "Кількість днів між датами: $days";
    }
    ?>

    <h2>Генератор паролів</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="password_length">Введіть довжину пароля:</label>
        <input type="number" id="password_length" name="password_length" min="8" value="<?php echo isset($_POST['password_length']) ? $_POST['password_length'] : '8'; ?>"><br>
        <input type="submit" name="generate_password" value="Згенерувати пароль">
    </form>
    <?php
    if (isset($_POST['generate_password'])) {
        $length = $_POST['password_length'];
        $password = generatePassword($length);
        echo "Згенерований пароль: $password";
    }

    function generatePassword($length) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
    ?>

    <h2>Перевірка міцності пароля</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="password">Введіть пароль:</label>
        <input type="text" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"><br>
        <input type="submit" name="check_password" value="Перевірити пароль">
    </form>
    <?php
    if (isset($_POST['check_password'])) {
        $password = $_POST['password'];
        if (isPasswordStrong($password)) {
            echo "Пароль є міцним.";
        } else {
            echo "Пароль не є міцним. Він повинен містити принаймні одну велику літеру, одну малу літеру, одну цифру та один спеціальний символ, і його довжина має бути не менше 8 символів.";
        }
    }

    function isPasswordStrong($password) {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        return $uppercase && $lowercase && $number && $specialChars && strlen($password) >= 8;
    }
    ?>
</body>
</html>
