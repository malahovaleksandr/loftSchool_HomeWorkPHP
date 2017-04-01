<?php

include_once 'config.php';

$try = new BD;
$try->tryBD();
$try->pdo();

 class model
 {
    private $pre='loft_';
     
     public function validPass($pass)
     {
         return $password=sha1($this->pre.$pass);
     }

     public function validLogin($login)
     {
         return $incameLog=addslashes(htmlspecialchars(trim($login)));//убираем пробелы по бокам, экранируем  html тэги и спец символы 
     }
     
     public function authorization($pdo)
     {
         $count = $pdo->prepare("SELECT * FROM users WHERE login = :login and password= :pass");
         $count->bindParam(':login', $incameLog,PDO::PARAM_STR);
         $count->bindParam(':pass', $pass);
         $count->execute();
         $sameLogin = $count->fetchAll();

     if(!count($sameLogin)==0){
             $_SESSION['auth']="autorization";
             header("Location: ./cabinet.php");

         } else {
             $_SESSION['err']='ввели не правильно логин или пароль';
             header("Location: ./index.php");

         }

     }
 }