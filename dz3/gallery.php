<?php
session_start();
include_once 'config.php';

if(!$_SESSION['auth']=="autorization"){
    header('Location: http://lftest/dz3/dz3.php');
    exit;
} else{

    $dbh = new PDO($dsn, $user, $password,$opt);

    $count = $dbh->query("SELECT id,photo FROM dataUsers ");

    $sameLogin = $count->fetchAll(PDO::FETCH_ASSOC);
    //print_r($sameLogin);
    $r=1;
    foreach($sameLogin as $value=>$key){

        echo "
        <form method='post' action=\"deleteImage.php\">
        Фото №".$r." <img src=".$key['photo']." width='200px' height='auto'>
        <input type='hidden' name=id value=".$key['id'].">
        <button type=submit value=".$key['id'].">удалить</button> 
        </form>
        <br>";
        ++$r;
    }

}