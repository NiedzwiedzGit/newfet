<?php
          session_start(); //запускаем сессию. Обязательно в начале страницы
          include ("bd.php"); // соединяемся с базой, укажите свой путь, если у вас    уже есть соединение
          if (!empty($_SESSION['login']) and !empty($_SESSION['password']) or !empty($_SESSION['login']) and  !empty($_SESSION['link']))
                      {
                      //если    существует логин и пароль в сессиях, то проверяем, действительны ли они
                      $login = $_SESSION['login'];
                      if($_SESSION['snreg']==false){
                        $result2= mysqli_query($db,"SELECT id FROM users_sn WHERE login='$_SESSION[login]'");
                        $myrow2= mysqli_fetch_array($result2);
                      }else{
                      $password = $_SESSION['password'];
                      $result2 = mysqli_query($db,"SELECT id FROM users WHERE login='$login' AND password='$password'");
                      $myrow2 = mysqli_fetch_array($result2);
                           }
            if (empty($myrow2['id']))

               {
               //если логин    или пароль не действителен
              //  exit("Вход на эту страницу разрешен    только зарегистрированным пользователям!");
                  exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=1'));
               }
            }
            else {

            //Проверяем,    зарегистрирован ли вошедший
          //  exit("Вход на эту    страницу разрешен только зарегистрированным пользователям!");
          exit    (   header('Location: http://localhost/newfet/errorMessage.php?errorNum=1')); }
if (isset($_POST['id'])) { $id=$_POST['id'];}//получаем идентификатор страницы    получателя
            if (isset($_POST['text'])) { $text = $_POST['text'];}//получаем текст сообщения
            if (isset($_POST['recipient'])) {$recipient = $_POST['recipient'];}//логин получателя
            $author = $_SESSION['login'];//логин автора
            $date = date("Y-m-d");//дата добавления
if (empty($author) or empty($text) or    empty($recipient) or empty($date)) {//есть ли все необходимые    данные? Если нет, то останавливаем
            //exit ("Вы ввели не всю    информацию, вернитесь назад и заполните все поля");
            exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=3'));}
$text = stripslashes($text);//удаляем обратные слеши
            $text =    htmlspecialchars($text);//преобразование    спецсимволов в их HTML эквиваленты

            $result2 = mysqli_query($db,"INSERT INTO    messages (author, recipient, date, text) VALUES ('$author','$recipient','$date','$text')");//заносим в базу сообщение
echo "<html><head><meta    http-equiv='Refresh' content='5;    URL=page.php?id=".$id."'></head><body>Ваше сообщение передано! Вы    будете перемещены через 5 сек. Если не хотите ждать, то <a    href='page.php?id=".$id."'>нажмите    сюда.</a></body></html>";//перенаправляем    пользователя
            ?>
