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

//unset($_SESSION);
// кэшируем авроль
$pre='loft_';
$pass=crypt($pre.$_POST['password']);
$incomeLogin=trim(htmlspecialchars($_POST['login']));
$authID=crypt($incomeLogin);
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



