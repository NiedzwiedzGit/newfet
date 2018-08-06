<?php
          //    вся процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
 include ("bd.php");// файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь
 if(!empty($_SESSION['login']) and !empty($_SESSION['link'])){
   $login = $_SESSION['login'];

   $result2 = mysqli_query($db,"SELECT * FROM users_sn WHERE login='$login'");
   $myrow2 = mysqli_fetch_array($result2);
   if (empty($myrow2['id_sn']))
      {
      //если данные    пользователя не верны
       //exit("Вход на эту страницу разрешен  только зарегистрированным пользователям!!!");
         exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=1'));
      }
   }
 else if (!empty($_SESSION['login']) and !empty($_SESSION['password']))
            {
            //если    существует логин и пароль в сессиях, то проверяем, действительны ли они
//echo "aaaaaaaaaaaaaaaa";
            $login = $_SESSION['login'];
            $password = $_SESSION['password'];
            $result2 = mysqli_query($db,"SELECT id FROM users WHERE login='$login' AND password='$password'");
            $myrow2 = mysqli_fetch_array($result2);

            $result3 = mysqli_query($db,"SELECT id_sn FROM users_sn WHERE login='$login'");
            $myrow3 = mysqli_fetch_array($result3);
            if (empty($myrow2['id']))
               {
               //если данные    пользователя не верны
                //exit("Вход на эту страницу разрешен    только зарегистрированным пользователям!");
                  exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=1'));

               }
            }
            else {
            //Проверяем,    зарегистрирован ли вошедший
          //  exit("Вход на эту    страницу разрешен только зарегистрированным пользователям!");
            exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=1'));

          }
include("usersHeder.php");
            ?>
            <html>
            <head>
            <title><?=Dict::_('H_title1')?></title>
            <link href="css/userList.css" type="text/css" rel="stylesheet"/>
            </head>
            <body>
 <?php
            //выводим    меню


      /*      print <<<HERE
            |<a    href='page.php?id=$_SESSION[id]'>Моя страница</a>|<a    href='index.php'>Главная страница</a>|<a    href='all_users.php'>Список пользователей</a>|<a    href='exit.php'>Выход</a><br><br>
HERE;*/
$userList=Dict::_('H_userList1');

 print <<<HERE
 <h2 id="topH2">$userList</h2>
HERE;
 $result = mysqli_query($db,"SELECT login,id,avatar FROM users ORDER BY login"); //вибираєм логін і ідентифікатор користувачів
            $myrow = mysqli_fetch_array($result);
          /*  $result1 = mysqli_query($db,"SELECT LOWER(login),id FROM users_sn ORDER BY login"); //извлекаем логин и идентификатор пользователей
                       $myrow1 = mysqli_fetch_array($result);*/

                      //знайти функцію яка буде переводити в нижній регіст */
                      /*$str = strtolower($myrow['login']);
                      echo  $str;*/

            do
            {

            //виводим їх в циклі
            printf("<div class='list'>
                          <a href='page.php?id=%s'><img src='%s' style='width:70px;' alt='альтернативный текст'/></a><br>
                          <a class='userName' href='page.php?id=%s'>%s</a><br>
                   </div>",$myrow['id'],$myrow['avatar'],$myrow['id'],$myrow['login']);
          //  echo '<img srs="'.$myrow[avatar].'"/>';
            }
            while($myrow = mysqli_fetch_array($result));
 ?>
            </body>
            </html>
