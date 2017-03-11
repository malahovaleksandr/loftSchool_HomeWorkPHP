<?php
session_start();

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
//
unset($_SESSION);
//echo '<pre> очистка';
//print_r($_SESSION);
//echo '<br> конец чистка<br>';
// кэшируем авроль
$pre='loft_';
$pass=md5($pre.$_POST['password']);

$dbh = new PDO($dsn, $user, $password,$opt);

$count = $dbh->prepare("SELECT * FROM users WHERE login = :login");
$count->bindParam(':login', $_POST['login']);
$count->execute();
$sameLogin = $count->fetchAll();
//echo 'кол-во '.count($sameLogin).'<br>';

if(!count($sameLogin)==0){
    $_SESSION['err']='такой логин уже есть';
    //print_r($_SESSION);
    header("Location: ./dz3.php");
//    exit();
} else {
    $dbh = new PDO($dsn, $user, $password,$opt);
    $stmt = $dbh->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
    $stmt->bindParam(':login', $_POST['login']);
    $stmt->bindParam(':password', $pass);
    $stmt->execute();

    $_SESSION['auth']="autorization";
    header("Location: ./cabinet.php");
//    exit();
}



