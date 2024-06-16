<?php
    if (isset($_POST['calculate'])) {
        $x = $_POST['x'];
        $y = $_POST['y'];

        echo "<h2>Результати обчислень:</h2>";
        echo "<p>sin($x) = " . my_sin($x) . "</p>";
        echo "<p>cos($x) = " . my_cos($x) . "</p>";
        echo "<p>tan($x) = " . my_tan($x) . "</p>";
        echo "<p>tg($x) = " . my_tg($x) . "</p>";
        echo "<p>$x^$y = " . xy($x, $y) . "</p>";
        echo "<p>$x! = " . factorial($x) . "</p>";
    }

    function my_sin($x) {
        return sin($x);
    }

    function my_cos($x) {
        return cos($x);
    }

    function my_tan($x) {
        return tan($x);
    }

    function my_tg($x) {
        return tan($x);
    }

    function xy($x, $y) {
        return pow($x, $y);
    }

    function factorial($n) {
        if ($n <= 1) {
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }
    ?>