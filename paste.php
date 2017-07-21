<?php

          //  $userEmail =strtolower($myrow['email']);//"shkliarskiyigor@gmail.com";
 //strtolower($myrow['email']);
            $newEnterEmeil=strtolower($userInfo['email']);
             $_SESSION['str']=$userEmail;// по тесстах ці два рідка можна буде удалити так як вони були для перевірки
             $_SESSION['str2']=$newEnterEmeil;//по тесстах ці два рідка можна буде удалити так як вони були для перевірки

             $result = mysqli_query($db,"SELECT * FROM users  WHERE email='$newEnterEmeil'"); //извлекаем из базы все данные о пользователе с    введенным логином и паролем\
              //мы    дописали «AND activation='1'», то есть пользователь будет искаться только среди активированных.    Желательно добавить это условие к другим подобным проверкам данных    пользователя
              $myrow= mysqli_fetch_array($result);
if (empty($myrow['id']))
{
     $result = mysqli_query($db,"SELECT * FROM users_sn WHERE login='$userInfo[name]'"); //извлекаем из базы все данные о пользователе с    введенным логином и паролем\
     $myrow= mysqli_fetch_array($result);
/*  if (empty($myrow['id']))
        {
           echo "ну і шо далі";
        }else{
               $_SESSION['login']=$userInfo['name'];
               $_SESSION['beginOfGid']=$beginOfGid;
               $_SESSION['link']=$userInfo['link'];
               //$_SESSION['id']=$userInfo['id'];
              // echo $_SESSION['login'];
          }*/
          //echo generate_password(8);

           function generate_password($number)
           {
             $arr = array('a','b','c','d','e','f',
                          'g','h','i','j','k','l',
                          'm','n','o','p','r','s',
                          't','u','v','x','y','z',
                          'A','B','C','D','E','F',
                          'G','H','I','J','K','L',
                          'M','N','O','P','R','S',
                          'T','U','V','X','Y','Z',
                          '1','2','3','4','5','6',
                          '7','8','9','0','.',',',
                          '(',')','[',']','!','?',
                          '&','^','%','@','*','$',
                          '<','>','/','|','+','-',
                        '{','}','`','~');
             // Генерируем пароль
             $pass = "";
             for($i = 0; $i < $number; $i++)
             {
               // Вычисляем случайный индекс массива
               $index = rand(0, count($arr) - 1);
               $pass .= $arr[$index];
             }
             return $pass;
           }
      $passNonMd5=(generate_password(8));
     $startPass = md5($passNonMd5);
     copy($_SESSION['avatar'],"avatars/".$userInfo['name'].".jpg");  // !!!робоча функція яка зберігає зображення
     $avatarDir="avatars/".$userInfo['name'].".jpg";
     $result3 = mysqli_query ($db,"INSERT INTO users (login,password,avatar,email,date) VALUES('$userInfo[name]','$startPass','$avatarDir','$userInfo[email]',NOW())");

     if ($result3=='TRUE')
     {

     $result4 = mysqli_query ($db,"SELECT id FROM users WHERE login='$login'");//извлекаем идентификатор пользователя. Благодаря ему у нас и будет уникальный код активации, ведь двух одинаковых идентификаторов быть не может.
     $myrow4 = mysqli_fetch_array($result4);

     $_SESSION['loginToActivate']=$userInfo['name'];  //змінна яка приймає чистий логін з пробілом з бази даних шоб можна було активувати логін
     $_SESSION['loginWithSN']='true';  //змінна яка передає значення "правда" для того щоб допустити реєстрацію логіна в рпзі реєстрації черех соціальну мережу

     $login=$userInfo['name'];
     $loginStr = trim(str_replace(" ","",$login));
//$login = trim($login);

     $activation = md5($myrow4['id']).md5($loginStr);//код активации аккаунта. Зашифруем через функцию md5 идентификатор и логин. Такое сочетание пользователь вряд ли сможет подобрать вручную через адресную строку.
    //$activation = $myrow4['id'].$login;
     $subject = "Подтверждение регистрации";//тема сообщения
     $message = "Здравствуйте! Спасибо за регистрацию на isproduct.com\n
     --------------------------------------------------------------------------
     Ваш логин: ".$login."\n
     Ваш пароль: ".$passNonMd5."
     --------------------------------------------------------------------------\n
     Пароль можна змінити на вашій особистій сторінці.
     Тепер, щоб зайти на свою сторінку, вам потрібно лише
     повторно натиснути на ту іконку соціальної мережі за допомогою якої ви зареєеструвались або ввести свій пароль і логін.\n
     Перейдите по ссылке, чтобы активировать ваш аккаунт:\n
     http://http://localhost/newfet/activation.php?login=".$loginStr."&code=".$activation."\n
     С уважением,\n
     Администрация isproduct.com";//содержание сообщение
     $headers =  'MIME-Version: 1.0' . "\r\n";
     $headers .= 'From: Your name <info@address.com>' . "\r\n";
     $headers .= 'Content-type:text/plane; Charset=windows-1251\r\n' . "\r\n";
     mail($email, $subject, $message, $headers);//отправляем сообщение

     echo "Вам на E-mail выслано письмо с cсылкой, для подтверждения регистрации. Внимание! Ссылка действительна 1 час. <a href='index.php'>Главная страница</a>"; //говорим о отправленном письме пользователю
     }

}
else{

/*  $_SESSION['login']=$userInfo['name'];
$_SESSION['link']=$userInfo['link'];
//$_SESSION['id']=$userInfo['id'];*/

  $_SESSION['password']=$myrow['password'];
  $_SESSION['login']=$myrow['login'];
  $_SESSION['id']=$myrow['id'];
}
 ?>
