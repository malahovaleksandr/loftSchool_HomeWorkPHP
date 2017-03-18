<?php
session_start();
include_once 'config.php';


//unset($_SESSION);
// кэшируем авроль
$pre='loft_';
$pass=sha1($pre.$_POST['password']);
$incomeLogin=trim(htmlspecialchars($_POST['login']));
$authID=sha1($incomeLogin);
$dbh = new PDO($dsn, $user, $password,$opt);

$count = $dbh->prepare("SELECT * FROM users WHERE login = :login");
$count->bindParam(':login', $incomeLogin);
$count->execute();
$sameLogin = $count->fetchAll();


if(!count($sameLogin)==0){
    $_SESSION['err']='такой логин уже есть';
    header("Location: ./dz3.php");
//    exit();
} else {
    $dbh = new PDO($dsn, $user, $password,$opt);
    $stmt = $dbh->prepare("INSERT INTO users (login, password, authID) VALUES (:login, :password, :authID)");
    $stmt->bindParam(':login', $incomeLogin,PDO::PARAM_STR);
    $stmt->bindParam(':password', $pass,PDO::PARAM_STR);
    $stmt->bindParam(':authID', $authID);
    $stmt->execute();

    $_SESSION['auth']="autorization";
    setcookie("id", $authID);
    
    header("Location: ./cabinet.php");
//    exit();
}



