<?php
session_start();


if(!$_SESSION['auth']=="autorization"){
    header('Location: http://lftest/dz3/dz3.php');
    exit;
} else{
    echo '<form action="loadDataImage.php" method="POST" enctype="multipart/form-data" >
  <p>
    <b>зарегестрировались</b><br>
    <b>куки '.$_COOKIE['id'].'</b><br>
  </p>
  <input type="text" name="name" placeholder="Имя" ><Br>
  <input type="number" name="age" placeholder="возраст"><Br>
  <textarea name="description" placeholder="описание"> </textarea><Br>
  <input type="file" name="image" placeholder="картинка"><Br>
  <input type="submit" name="отправить">
 </form>';
}


