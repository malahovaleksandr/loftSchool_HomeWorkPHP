<?php
session_start();


if(!$_SESSION['auth']=="autorization"){
    header('Location: http://loftshcooldz/dz3/dz3.php');
    exit;
} else{
    echo '<form action="cabinet.php" method="POST" >
  <p>
    <b>зарегестрировались</b><br>
  </p>
  <input type="text" name="login" placeholder="Логин" ><Br>
  <input type="password" name="password" placeholder="Пароль"><Br>
  <input type="submit" name="отправить">
 </form>';
}


