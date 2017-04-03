<?php
session_start();

include_once 'config.php';

//------------------------------------load image-------------------------------------------------------
if(empty($_FILES['image'])){
    $_SESSION['notFile']='нет файла';
    header("Location: ./cabinet.php");
    exit();
}
$file=$_FILES['image'];

if(
    $file['type'] != 'image/gif' and
    $file['type'] != 'image/jpeg' and //проверяем какой формат загружаем
    $file['type'] != 'image/png'
){
    $_SESSION['notFile']='не тот формат';
    header("Location: ./cabinet.php");
    exit();
}


$imageinfo=getimagesize($file['tmp_name']);//[tmp_name] берем из $_FILES['photo'] это пареметр показывает временый адресс зпгружаемого файла

if($imageinfo['mime'] != 'image/gif' and //убеждаемся что тип файла подходит для фото
    $imageinfo['mime'] != 'image/jpg' and
    $imageinfo['mime'] != 'image/jpeg' and
    $imageinfo['mime'] != 'image/png'
){
    $_SESSION['notFile']='не тот формат,не обманешь';
    header("Location: ./cabinet.php");
    exit();


}
if($file['size'] == 0 or $file['size']> 1000000000){//проверяем размер загружаемого файла
    $_SESSION['notFile']='большой размер файла';
    header("Location: ./cabinet.php");
    exit();
}
$newDir='/loadPhoto';
if(!file_exists($newDir))//проверяем существует ли папка для сохранения файлов. file_exists это функция проверяет существует или нет
    mkdir($newDir,777);// если нет такой то создаем папку .в () первое значение где создаем, второе это права на папку
//print_r($_SERVER['DOCUMENT_ROOT']);
$type=strtolower(strrchr($file['name'], '.'));//strtolower переводит все буквы в маленькие(без заглавных) вдруг будет JPG
// strrchr показывает текст который идет после символа указанного в () вторым значением ,у нас это точка '.'
$filename = uniqid('image_');// генерируем уникальное имя для файла,в скобках префикс  нового имени
$saveDir='/dz3/loadPhoto';//в какую папку сохранять
// // из за того что здесь жестко прописана ссылка , хотя корнем проекта является  dz3 не загружаются фото
$file_dist=$_SERVER['DOCUMENT_ROOT'].$saveDir.'/'.$filename.$type;//это прописываем адрес и имя нового файла кудп будем сохранять

if(!move_uploaded_file($file['tmp_name'],$file_dist)) {//move_uploaded_file это функция перемещения загр файла, в скобках первое хначение это где временное хранение файла
        $_SESSION['notFile']='не удалось сохранить файл';
    header("Location: ./cabinet.php");
    exit();
//-----------------------------
}

$incomeName=trim(htmlspecialchars($_POST['name']));
$incomeAge=(int)trim(htmlspecialchars($_POST['age']));
$incomeDesc=trim(htmlspecialchars($_POST['description']));
$incomeSrc=$saveDir.'/'.$filename.$type;

    // вынести инициализацию бд и создать обьект  PDO только один раз
    $dbh = new PDO($dsn, $user, $password,$opt);
    $stmt = $dbh->prepare("INSERT INTO dataUsers (age, nameUser, description,photo) VALUES (:age, :nameUser, :description, :photo)");
    $stmt->bindParam(':age', $incomeAge);
    $stmt->bindParam(':nameUser', $incomeName);
    $stmt->bindParam(':description', $incomeDesc);
    $stmt->bindParam(':photo', $incomeSrc);

    $stmt->execute();


    header("Location: ./cabinet.php");
