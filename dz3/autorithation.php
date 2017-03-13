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

unset($_SESSION);
$pre='loft_';
$pass=crypt($pre.$_POST['password']);
// кэшируем авроль
$dbh = new PDO($dsn, $user, $password,$opt);

$count = $dbh->prepare("SELECT * FROM users WHERE login = :login and password= :pass");
$count->bindParam(':login', $_POST['login']);
$count->bindParam(':pass', $pass);
$count->execute();
$sameLogin = $count->fetchAll();


if(!count($sameLogin)==0){
    $_SESSION['auth']="autorization";
    header("Location: ./cabinet.php");
//    exit();
} else {
    $_SESSION['err']='ввели не правильно логин или пароль';
    header("Location: ./dz3.php");
//    exit();
}



