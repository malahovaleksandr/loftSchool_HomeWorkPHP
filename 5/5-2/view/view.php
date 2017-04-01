<?php
class view
{
   public function viewContent()
   {
       echo '<!DOCTYPE HTML>
        <html lang="ru">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                
                
            </head>
            <body>
                <form action="../controller/controller.php" method="POST" ><p>
         <b>заполните форму регистрации!</b><br>
          </p>
         <p>'.$_SESSION['err'].'</p>
          <input type="text" name="login" placeholder="Логин" ><Br>
          <input type="password" name="password" placeholder="Пароль"><Br>
          
          <input type="submit" name="отправить">
         </form><br><br>
         
         <form action="../controller/controller.php" method="POST" ><p>
         <b>авторизация</b><br>
          </p>
         <p>'.$_SESSION['err'].'</p>
          <input type="text" name="login2" placeholder="Логин" ><Br>
          <input type="password" name="password2" placeholder="Пароль"><Br>
          
          <input type="submit" name="отправить">
            </body>
        </html>';
   }
}
