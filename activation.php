<?php
          include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто    измените путь
          $result4 =    mysqli_query ($db,"SELECT avatar FROM    users WHERE activation='0'    AND    UNIX_TIMESTAMP()    - UNIX_TIMESTAMP(date)    > 3600");//извлекаем аватарки тех пользователей, которые в    течении часа не активировали свой аккаунт. Следовательно их надо удалить из    базы, а так же и файлы их аватарок
 if    (mysqli_num_rows($result4) > 0) {
            $myrow4    = mysqli_fetch_array($result4);
            do
            {

            //удаляем    аватары в цикле, если они не стандартные
            if    ($myrow4['avatar'] == "avatars/noavtats.jpg") {$a = "Ничего не делать";}
            else    {
                     unlink ($myrow4['avatar']);//удаляем    файл
                     }
            }

            while($myrow4    = mysqli_fetch_array($result4));
            }
            mysqli_query ($db,"DELETE FROM users WHERE activation='0' AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 3600");//удаляєм користувача з бази
 if    (isset($_GET['code'])) {$code =$_GET['code']; } //код подтверждения
            else
            {   // exit("Вы    зашли на страницу без кода подтверждения!");
            exit    (   header('Location: http://localhost/newfet/errorMessage.php?errorNum=6'));
          }  //як приклад як то можна органзувати} //если не указали code,    то выдаем ошибку
 if (isset($_GET['login'])) {$login=$_GET['login'];} //логин,который    нужно активировать
            else
            {    //exit("Вы    зашли на страницу без логина!");
                exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=7'));  //як приклад як то можна органзувати //если не указали code,    то выдаем ошибку
            } //если не указали логин, то выдаем ошибку
 $result = mysqli_query($db,"SELECT    id    FROM    users WHERE login='$login'"); //извлекаем    идентификатор пользователя с данным логином
            $myrow    = mysqli_fetch_array($result);
 $activation    = md5($myrow['id']).md5($login);//создаем    такой же код подтверждения
 if ($activation == $code) {//сравниваем полученный из url и сгенерированный код
   if($_SESSION['loginWithSN']=='true'){ $login=$_SESSION['loginToActivate'];}
                     mysqli_query($db,"UPDATE users SET activation='1' WHERE login='$login'");//если равны, то активируем пользователя
                    /*  mysqli_query($db,"UPDATE users SET activation='1' WHERE login='test2'");*/
                  //   echo $login;
                     echo "Ваш електронний адрес підтверджений! Тепер ви можете зайти на сайт під своїм логіном! <a href='index.php'>Главная    страница</a>";
               //fа тут створити новий файл Confirm
                     }
            else {echo "Помилка! Ваш електронний адрес не підтверджений! <a    href='index.php'>Главная    страница</a><br>";//внести і це до файлу Error
              //echo $activation;
            //если    же полученный из url и    сгенерированный код не равны, то выдаем ошибку
            }
?>
