<?php
session_start();
include_once 'config.php';


unset($_SESSION);
$pre='loft_';
$pass=sha1($pre.$_POST['password2']);

// кэшируем авроль
$dbh = new PDO($dsn, $user, $password,$opt);

$count = $dbh->prepare("SELECT * FROM users WHERE login = :login and password= :pass");
$count->bindParam(':login', $_POST['login2'],PDO::PARAM_STR);
$count->bindParam(':pass', $pass);
$count->execute();
$sameLogin = $count->fetchAll();

//
//echo 'пароль '.$_POST['password2'].'<br>';
//echo 'пароль '.$pass.'<br>';
//echo 'логин '.$_POST['login2'].'<br>';
//echo 'совпадения '.count($sameLogin);

if(!count($sameLogin)==0){
    $_SESSION['auth']="autorization";

    header("Location: ./cabinet.php");
//    exit();
} else {
    $_SESSION['err']='ввели не правильно логин или пароль';

    header("Location: ./dz3.php");
//    exit();
}



