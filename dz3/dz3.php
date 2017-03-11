<?php
session_start();
$error=$_SESSION['err'];

//форма регистрации
function formInput($err=''){
    echo '<form action="registration.php" method="POST" ><p>
 <b>заполните форму регистрации!</b><br>
  </p>
 <p>'.$err.'</p>
  <input type="text" name="login" placeholder="Логин" ><Br>
  <input type="password" name="password" placeholder="Пароль"><Br>
  
  <input type="submit" name="отправить">
 </form>';
}
formInput($error);

