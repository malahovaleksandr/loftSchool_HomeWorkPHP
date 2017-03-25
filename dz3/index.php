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
 </form><br><br>
 
 <form action="autorithation.php" method="POST" ><p>
 <b>авторизация</b><br>
  </p>
 <p>'.$err.'</p>
  <input type="text" name="login2" placeholder="Логин" ><Br>
  <input type="password" name="password2" placeholder="Пароль"><Br>
  
  <input type="submit" name="отправить">
 ';
    
}
formInput($error);

