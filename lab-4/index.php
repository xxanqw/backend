<?php
require_once 'autoload.php';

$userModel = new Models\UserModel();
echo $userModel->getMessage() . "<br>"; 

$userController = new Controllers\UserController();
echo $userController->getMessage() . "<br>"; 

$userView = new Views\UserView();
echo $userView->getMessage() . "<br><br>"; 

// Перевірка роботи класів
echo "<b>Студент</b><br>";
$student = new Student();
$student->setAge(18);
$student->setHeight(170);
$student->setWeight(80);
$student->setCourse(1);
$student->setUniversity('Державний університет "Житомирська Політехніка"');
$student->nextCourse();
echo "Вік: " . $student->getAge() . "<br>";
echo "Зріст: " . $student->getHeight() . "<br>";
echo "Вага: " . $student->getWeight() . "<br>";
echo "Курс: " . $student->getCourse() . "<br>";
echo "Університет: " . $student->getUniversity() . "<br>";
echo $student->cleanRoom() . "<br>";
echo $student->cleanKitchen() . "<br>";
echo $student->birthOfChild() . "<br>";
echo "<br>";

echo "<b>Програміст</b><br>";
$programmer = new Programmer();
$programmer->setAge(18);
$programmer->setHeight(170);
$programmer->setWeight(80);
$programmer->setExperience(1);
$programmer->setLanguages('PHP, Java');
echo "Вік: " . $programmer->getAge() . "<br>";
echo "Зріст: " . $programmer->getHeight() . "<br>";
echo "Вага: " . $programmer->getWeight() . "<br>";
echo "Досвід: " . $programmer->getExperience() . " рік<br>";
echo "Мови програмування:" . $programmer->getLanguages() . "<br>";
echo $programmer->cleanRoom() . "<br>";
echo $programmer->cleanKitchen() . "<br>";
echo $programmer->birthOfChild() . "<br>";
echo "<br>";

$circle1 = new Circle(5, 5, 10);
echo $circle1 . "<br>";
$circle2 = new Circle(10, 10, 5);
echo $circle2 . "<br>";
echo ($circle1->intersects($circle2) ? 'Кола перетинаються' : 'Кола не перетинаються') . "<br><br>";

FileHandler::write('test1.txt', 'PHP!');
echo FileHandler::read('test1.txt') . "<br>";
FileHandler::clear('test2.txt');
FileHandler::write('test2.txt', 'Hello, World!');
echo FileHandler::read('test2.txt') . "<br>";
echo FileHandler::read('test3.txt') . "<br>";
