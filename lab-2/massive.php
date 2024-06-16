<?php
function printRepeatedElements($arr) {
    $counts = array_count_values($arr);
    $repeated = array_filter($counts, function($count) {
        return $count > 1;
    });
    if (empty($repeated)) {
        echo "У масиві немає повторюваних елементів.";
    } else {
        echo "Повторювані елементи: ";
        foreach ($repeated as $element => $count) {
            echo "$element (повторюється $count разів), ";
        }
    }
}

$myArray = [1, 2, 3, 4, 2, 5, 6, 4, 7, 2];
echo "Масив: " . implode(", ", $myArray) . "<br>";
printRepeatedElements($myArray);
echo "<br><br>";

function generateName($syllables) {
    $name = '';
    $length = mt_rand(2, 4);
    for ($i = 0; $i < $length; $i++) {
        $name .= $syllables[mt_rand(0, count($syllables) - 1)];
    }
    return ucfirst($name);
}

$syllables = ['ми', 'му', 'ря', 'ка', 'ша', 'пу', 'хо', 'му', 'сі', 'кі'];
echo "Згенероване ім'я: " . generateName($syllables) . "<br><br>";

function createArray() {
    $length = mt_rand(3, 7);
    $arr = [];
    for ($i = 0; $i < $length; $i++) {
        $arr[] = mt_rand(10, 20);
    }
    return $arr;
}

function mergeAndSortArrays($arr1, $arr2) {
    $merged = array_merge($arr1, $arr2);
    $merged = array_unique($merged);
    sort($merged);
    return $merged;
}

$array1 = createArray();
$array2 = createArray();
echo "Масив 1: " . implode(", ", $array1) . "<br>";
echo "Масив 2: " . implode(", ", $array2) . "<br>";
$mergedArray = mergeAndSortArrays($array1, $array2);
echo "Об'єднаний та відсортований масив: " . implode(", ", $mergedArray) . "<br><br>";

$users = [
    'John' => 25,
    'Jane' => 32,
    'Bob' => 19,
    'Alice' => 28,
    'Charlie' => 35
];

function sortUsers($users, $sortBy) {
    if ($sortBy === 'age') {
        asort($users);
    } else {
        ksort($users);
    }
    return $users;
}

echo "Початковий масив користувачів:<br>";
foreach ($users as $name => $age) {
    echo "$name: $age<br>";
}

$sortedByAge = sortUsers($users, 'age');
echo "<br>Масив, відсортований за віком:<br>";
foreach ($sortedByAge as $name => $age) {
    echo "$name: $age<br>";
}

$sortedByName = sortUsers($users, 'name');
echo "<br>Масив, відсортований за іменами:<br>";
foreach ($sortedByName as $name => $age) {
    echo "$name: $age<br>";
}
?>