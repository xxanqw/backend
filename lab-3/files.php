<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $file = 'comments.txt';
    $data = "$name|$comment\n";
    file_put_contents($file, $data, FILE_APPEND);
}

$comments = file('comments.txt', FILE_IGNORE_NEW_LINES);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Робота з файлами</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Форма для коментарів</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Ім'я:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="comment">Коментар:</label>
        <textarea id="comment" name="comment" required></textarea><br>

        <input type="submit" name="submit" value="Відправити">
    </form>

    <h2>Коментарі</h2>
    <table>
        <tr>
            <th>Ім'я</th>
            <th>Коментар</th>
        </tr>
        <?php foreach ($comments as $comment): ?>
            <?php $parts = explode('|', $comment); ?>
            <tr>
                <td><?php echo $parts[0]; ?></td>
                <td><?php echo $parts[1]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php
    $file1 = 'file1.txt';
    $file2 = 'file2.txt';

    $words1 = file($file1, FILE_IGNORE_NEW_LINES);
    $words2 = file($file2, FILE_IGNORE_NEW_LINES);

    $file_only_in_1 = 'file_only_in_1.txt';
    $file_common = 'file_common.txt';
    $file_repeated = 'file_repeated.txt';

    $words_only_in_1 = array_diff($words1, $words2);
    $words_common = array_intersect($words1, $words2);
    $words_repeated = array_merge(array_filter(array_count_values($words1), function($count) {
        return $count > 2;
    }), array_filter(array_count_values($words2), function($count) {
        return $count > 2;
    }));

    file_put_contents($file_only_in_1, implode("\n", $words_only_in_1));
    file_put_contents($file_common, implode("\n", $words_common));
    file_put_contents($file_repeated, implode("\n", $words_repeated));

    if (isset($_POST['delete_file'])) {
        $file_to_delete = $_POST['file_to_delete'];
        if (in_array($file_to_delete, [$file_only_in_1, $file_common, $file_repeated])) {
            unlink($file_to_delete);
            echo "Файл $file_to_delete був видалений.";
        } else {
            echo "Невірне ім'я файлу.";
        }
    }
    ?>

    <h2>Видалення файлу</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="file_to_delete">Введіть ім'я файлу для видалення:</label>
        <input type="text" id="file_to_delete" name="file_to_delete" required>
        <input type="submit" name="delete_file" value="Видалити">
    </form>

    <?php
    $file_to_sort = 'file_to_sort.txt';
    $words_to_sort = file($file_to_sort, FILE_IGNORE_NEW_LINES);
    sort($words_to_sort);
    file_put_contents($file_to_sort, implode("\n", $words_to_sort));
    ?>
</body>
</html>
