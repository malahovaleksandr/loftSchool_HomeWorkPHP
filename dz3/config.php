<?php
$host='localhost';
$db='loftPHP';
$charset = 'utf8';
$dsn = 'mysql:host='.$host.';dbname='.$db.';charset='.$charset;
$user='root';
$password='';
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
// создаем подключение к БД
$pdo = new PDO($dsn, $user, $password,$opt);

try {
    $pdo = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();

}