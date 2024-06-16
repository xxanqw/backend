<?php
$servername = "localhost";
$username = "homeuser";
$password = "password";
$dbname = "lab5";
$charset = "utf8mb4";

$dsn = "mysql:user=$username;host=$servername;dbname=$dbname;password=$password;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>