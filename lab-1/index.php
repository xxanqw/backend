<?php
echo "<pre>Полину в мріях в купель океану,
Відчую <b>шовковистість</b> глибини,
Чарівні мушлі з дна собі дістану,
    Щоб <b><i>взимку</i></b>
        <u>тішили</u>
            мене
                вони…</pre><br><br>";

$uah = 1500;
$usd_rate = 40.1;
$usd = $uah / $usd_rate;
echo $uah . " грн. можна обміняти на " . round($usd, 2) . " долар<br><br>";


$month = 5;
if ($month == 12 || ($month >= 1 && $month <= 2)) {
    echo "Зима<br><br>";
} elseif ($month >= 3 && $month <= 5) {
    echo "Весна<br><br>";
} elseif ($month >= 6 && $month <= 8) {
    echo "Літо<br><br>";
} else {
    echo "Осінь<br><br>";
}

$char = 'a';
switch ($char) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
    case 'y':
        echo "Голосна буква<br><br>";
        break;
    default:
        echo "Приголосна буква<br><br>";
}

$number = mt_rand(100, 999);
echo "Випадкове тризначне число: " . $number . "<br>";

$sum = 0;
$temp = $number;
while ($temp > 0) {
    $sum += $temp % 10;
    $temp = floor($temp / 10);
}
echo "Сума цифр: " . $sum . "<br>";

$reversed = strrev((string)$number);
echo "Число в зворотному порядку: " . $reversed . "<br>";

$digits = str_split((string)$number);
sort($digits);
$max_number = implode("", array_reverse($digits));
echo "Найбільше можливе число: " . $max_number . "<br><br>";

function createColorTable($rows, $cols) {
    echo "<table>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            echo "<td style='background-color: $color; width: 20px; height: 20px;'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

createColorTable(5, 5);

function createRandomSquares($count) {
    echo "<div style='background-color: black; width: 800px; height: 600px; position: relative;'>";
    for ($i = 0; $i < $count; $i++) {
        $size = mt_rand(10, 100);
        $x = mt_rand(0, 800 - $size);
        $y = mt_rand(0, 600 - $size);
        echo "<div style='background-color: red; width: {$size}px; height: {$size}px; position: absolute; left: {$x}px; top: {$y}px;'></div>";
    }
    echo "</div>";
}

createRandomSquares(10);
?>
