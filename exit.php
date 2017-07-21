<?php
          session_start();
          if    (empty($_SESSION['login']) or empty($_SESSION['password']))
          {

            if(!empty($_SESSION['login'])){
              unset($_SESSION['login']);
              unset($_SESSION['snreg']);
              unset($_SESSION['link']);
                exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
            }
          //если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение    об ошибке, останавливаем скрипт
        //  exit ("Доступ на эту    страницу разрешен только зарегистрированным пользователям. Если вы    зарегистрированы, то войдите на сайт под своим логином и паролем<br><a href='index.php'>Главная    страница</a>");
          exit    (   header('Location: http://localhost/IS_webpage2/newfet/errorMessage.php?errorNum=11'));  //як приклад як то можна органзувати

          }
            $_SESSION['loginWithSN']='false'; 
            unset($_SESSION['password']);
            unset($_SESSION['login']);
            unset($_SESSION['name']);
            unset($_SESSION['snreg']);
            unset($_SESSION['id']);
            unset($_SESSION['link']);//    уничтожаем переменные в сессиях
			setcookie("auto", "",    time()+9999999);//очищаем автоматический вход
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
            // отправляем пользователя на главную страницу.
            ?>
