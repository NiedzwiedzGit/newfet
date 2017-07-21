<?php
          session_start();//запускаем сессии
          include ("bd.php");//подключаемся к базе
if (!empty($_SESSION['login']) and !empty($_SESSION['password']) or !empty($_SESSION['login']) and  !empty($_SESSION['link']))
            {
            //если    существует логин и пароль в сессиях, то проверяем, действительны ли они
            $login = $_SESSION['login'];
            $password = $_SESSION['password'];
            if($_SESSION['snreg']==false){
              $result2= mysqli_query($db,"SELECT id FROM users_sn WHERE login='$_SESSION[login]'");
              $myrow2= mysqli_fetch_array($result2);
            }else{
            $result2 = mysqli_query($db,"SELECT id FROM users WHERE login='$login' AND password='$password'");
            $myrow2 = mysqli_fetch_array($result2);
                 }
            if (empty($myrow2['id']))
               {
               //данные    пользователя неверны.
                //exit("Вход на эту страницу разрешен    только зарегистрированным пользователям!");
                  exit    ( header('Location: http://localhost/IS_webpage2/newfet/errorMessage.php?errorNum=1'));  //як приклад як то можна органзувати

               }
            }
            else {
            //Проверяем,    зарегистрирован ли вошедший
          //  exit("Вход на эту    страницу разрешен только зарегистрированным пользователям!");
            exit    ( header('Location: http://localhost/IS_webpage2/newfet/errorMessage.php?errorNum=1'));  //як приклад як то можна органзувати
        }
            $id2 = $_SESSION['id']; //получаем идентификатор своей страницы

if (isset($_GET['id'])) { $id= $_GET['id'];}//получаем через GET запрос идентификатор сообщения, которое нужно удалить
$result = mysqli_query($db,"SELECT recipient    FROM messages WHERE id='$id'");
            $myrow =    mysqli_fetch_array($result); //нужно уточнить,    кому сообщение отправлено
            //ведь    через GET запрос пользователь может ввести любой идентификатор и как    следствие удалить сообщения, которые отправляли не ему.
if ($login ==    $myrow['recipient']) {//если сообщение    отправляли данному пользователю, то разрешаем его удалить
$result = mysqli_query ($db,"DELETE FROM    messages WHERE id = '$id' LIMIT 1");//удаляем сообщение
            if ($result == 'true') {//если удалено - перенаправляем на страничку    пользователя
            echo "<html><head><meta    http-equiv='Refresh' content='5;    URL=page.php?id=".$id2."'></head><body>Ваше сообщение удалено! Вы    будете перемещены через 5 сек. Если не хотите ждать, то <a    href='page.php?id=".$id2."'>нажмите    сюда.</a></body></html>";
            }
            else {//если    не удалено, то перенаправляем, но выдаем сообщение о неудаче
            echo "<html><head><meta    http-equiv='Refresh' content='5;    URL=page.php?id=".$id2."'></head><body>Ошибка! Ваше сообщение не    удалено. Вы будете перемещены через 5 сек. Если не хотите ждать, то <a    href='page.php?id=".$id2."'>нажмите    сюда.</a></body></html>"; }
}
            else {//exit("Вы пытаетесь    удалить сообщение, отправленное не вам!");
                exit    ( header('Location: http://localhost/IS_webpage2/newfet/errorMessage.php?errorNum=10'));  //як приклад як то можна органзувати
            } //если    сообщение отправлено не этому пользователю. Значит, он попытался удалить его,    введя в адресной строке какой-то другой идентификатор
            ?>
