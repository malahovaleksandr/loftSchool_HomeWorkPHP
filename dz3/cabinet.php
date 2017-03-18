<?php
session_start();


if(!$_SESSION['auth']=="autorization"){
    header("Location: ./dz3.php");
    exit;
} else{
    echo '<form action="loadDataImage.php" method="POST" enctype="multipart/form-data" >
  <p>
    <b>зарегестрировались</b><br>
   
  </p>
  <input type="text" name="name" placeholder="Имя" ><Br>
  <input type="number" name="age" placeholder="возраст"><Br>
  <textarea name="description" placeholder="описание"> </textarea><Br>
  '.$_SESSION['notFile'].'
  <input type="file" name="image" placeholder="картинка"><Br>
  <input type="submit" name="отправить">
 </form><br>
 <a href="./gallery.php">посмотреть все фотографии</a>
 ';
    
    
}


