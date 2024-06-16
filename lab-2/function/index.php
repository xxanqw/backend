<?php
    include 'func.php';
    ?>

    <h2>Форма для обчислень</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="x">Введіть значення x:</label>
        <input type="number" id="x" name="x" step="0.01" required><br>

        <label for="y">Введіть значення y:</label>
        <input type="number" id="y" name="y" step="0.01" required><br>

        <input type="submit" name="calculate" value="Обчислити">
    </form>