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

//------------------------------------load image-------------------------------------------------------
if(empty($_FILES['input_add_photo'])){
    exit('нет файла');
}
$file=$_FILES['input_add_photo'];
if(
    $file['type'] != 'image/gif' and
    $file['type'] != 'image/jpeg' and //проверяем какой формат загружаем
    $file['type'] != 'image/png'
){
    exit('не тот формат');
}


$imageinfo=getimagesize($file['tmp_name']);//[tmp_name] берем из $_FILES['photo'] это пареметр показывает временый адресс зпгружаемого файла

if($imageinfo['mime'] != 'image/gif' and //убеждаемся что тип файла подходит для фото
    $imageinfo['mime'] != 'image/jpg' and
    $imageinfo['mime'] != 'image/jpeg' and
    $imageinfo['mime'] != 'image/png'
){
    exit('не тот формат,не обманешь');

}
if($file['size'] == 0 or $file['size']> 1000000000){//проверяем размер загружаемого файла
    exit('большой размер файла');

}
$newDir='../image/loadPhoto';
if(!file_exists($newDir))//проверяем существует ли папка для сохранения файлов. file_exists это функция проверяет существует или нет
    mkdir($newDir,777);// если нет такой то создаем папку .в () первое значение где создаем, второе это права на папку
print_r($_SERVER['DOCUMENT_ROOT']);
$type=strtolower(strrchr($file['name'], '.'));//strtolower переводит все буквы в маленькие(без заглавных) вдруг будет JPG
// strrchr показывает текст который идет после символа указанного в () вторым значением ,у нас это точка '.'
$filename = uniqid('image_');// генерируем уникальное имя для файла,в скобках префикс  нового имени
$saveDir='/image/loadPhoto';//в какую папку сохранять
$file_dist=$_SERVER['DOCUMENT_ROOT'].$saveDir.'/'.$filename.$type;//это прописываем адрес и имя нового файла кудп будем сохранять

if(!move_uploaded_file($file['tmp_name'],$file_dist))//move_uploaded_file это функция перемещения загр файла, в скобках первое хначение это где временное хранение файла
    // второе это куда его сохранить
    exit('ошибка сохранения');
// echo '<br>все хорошо';
//-----------------------------



$incomeLogin=trim(htmlspecialchars($_POST['name']));
$incomeAge=(int)trim(htmlspecialchars($_POST['age']));
$incomeDesc=trim(htmlspecialchars($_POST['description']));


    $dbh = new PDO($dsn, $user, $password,$opt);
    $stmt = $dbh->prepare("INSERT INTO dataUsers (age, nameUser, description,photo) VALUES (:age, :nameUser, :description, :photo)");
    $stmt->bindParam(':age', $incomeLogin);
    $stmt->bindParam(':nameUser', $incomeAge);
    $stmt->bindParam(':description', $authID);
    $stmt->bindParam(':photo', $incomeDesc);

    $stmt->execute();


    header("Location: ./cabinet.php");
