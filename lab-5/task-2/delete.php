<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_to_delete = $_POST['id_to_delete'];

    if (!empty($id_to_delete)) {
        $sql =  'DELETE FROM `tov` WHERE `id` = '.$id_to_delete;
        $affected_rows = $pdo->exec($sql);
        echo "Запис видалено";
    }
}

echo '<form method="post" action="">
    № запису, що віддаляється: <input type="text" name="id_to_delete" required><br>
    <input type="submit" value="Вилучити запис">
</form>';
?>
