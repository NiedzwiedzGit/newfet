<?php
if    (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);}    } //заносим введенный пользователем логин в переменную $login, если он пустой,    то уничтожаем переменную
if    (isset($_POST['enteredEmail'])) { $enteredEmail = $_POST['enteredEmail']; if ($enteredEmail == '') {    unset($enteredEmail);} } //заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
if    (isset($_POST['message'])) { $message = $_POST['message']; if ($message == '') { exit("tyt");   unset($message);} } //заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
//echo $message;

$email="z.igor.2rpz10@i.ua";
include ("bd.php");// файл    bd.php должен быть в той же папке, что и все остальные, если это не так, то    просто измените путь

$result    = mysqli_query($db,"SELECT id,email FROM users WHERE email='$email' AND activation='1'");//такой ли у пользователя е-мейл
$myrow    = mysqli_fetch_array($result);

if (empty($myrow['id']) ){
  exit    ( header('Location: http://localhost/IS_webpage2/newfet/errorMessage.php?errorNum=19'));  //як приклад як то можна органзувати
}
else{
  $subject = "Contact message from $name";//тема сообщения
  $headers =  'MIME-Version: 1.0' . "\r\n";
  $headers .= 'From: Your name <info@address.com>' . "\r\n";
  $headers .= 'Content-type:text/plane; Charset=windows-1251\r\n' . "\r\n";

  mail($email, $subject, $message, $headers);//отправляем сообщение
  exit    ( header('Location: http://localhost/IS_webpage2/newfet/index.php'));  //як приклад як то можна органзувати
}
  ?>
