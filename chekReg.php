<?php
if (isset($_GET['id'])) {$id =$_GET['id'];} //id "хозяина" странички
else
{ //exit("Вы зашли на  страницу без параметра!");} //если не указали id, то выдаем ошибку
    exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=8'));  //як приклад як то можна органзувати
}
if (!preg_match("|^[\d]+$|", $id))    {
//exit("<p>Неверный    формат запроса! Проверьте URL</p>");//если id не число, то выдаем    ошибку
  exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=9'));  //як приклад як то можна органзувати

}
$impotr="no";
if (!empty($_SESSION['login']) and !empty($_SESSION['password']))  //якшо виконана класична реєстрація
{
//если    существует логин и пароль в сессиях, то проверяем, действительны ли они
$_SESSION['snreg']=true;//social networc registration
$login = $_SESSION['login'];
$password = $_SESSION['password'];

$result2 = mysqli_query($db,"SELECT id FROM users WHERE login='$login' AND password='$password'");
$myrow2 = mysqli_fetch_array($result2);

$result = mysqli_query($db,"SELECT * FROM    users WHERE id='$id'");
$myrow =    mysqli_fetch_array($result);//Извлекаем все данные    пользователя с данным id
  $avatar= $myrow['avatar'];
if (empty($myrow2['id']))

   {
   //Если не действительны (может мы удалили этого пользователя из базы за плохое поведение)
    //exit("Вход на эту страницу разрешен только зарегистрированным пользователям!");
      exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=1'));  //як приклад як то можна органзувати
   }
}
else if(!empty($_SESSION['login']) || !empty($_SESSION['link'])){  //якшо виконана реєстрація через соціальну мережу
  $_SESSION['snreg']=false;//social networc registration
  $login= $_SESSION['login'];
  $_SESSION['login']=$_SESSION['login'];
  $avatar=$_SESSION['avatar'];

   //if($impotr=="yes"){
  $result2= mysqli_query($db,"SELECT id FROM users_sn WHERE login='$_SESSION[login]'");
  $myrow2= mysqli_fetch_array($result2);

  $result = mysqli_query($db,"SELECT * FROM    users_sn WHERE id='$id'");
  $myrow = mysqli_fetch_array($result);//Извлекаем все данные    пользователя с данным id
// }
/* else if($impotr=="no"){
  // $_SESSION['password']=$myrow['password'];
  $_SESSION['snreg']=true;
   $result2 = mysqli_query($db,"SELECT id FROM users WHERE login='test3'");
   $myrow2 = mysqli_fetch_array($result2);

   $result = mysqli_query($db,"SELECT * FROM    users WHERE id='19'");
   $myrow =    mysqli_fetch_array($result);//Извлекаем все данные    пользователя с данным id
     $avatar= $myrow['avatar'];
     $_SESSION['login']=$myrow['login'];
       $_SESSION['id']=$myrow['id'];
   }*/
 }
else {
//Проверяем,    зарегистрирован ли вошедший
//exit("Вход на эту    страницу разрешен только зарегистрированным пользователям!!!!!");
  exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=1'));  //як приклад як то можна органзувати
}

$delUserChek = mysqli_query($db,"SELECT * FROM users WHERE id='$id'");
$myrowChek =  mysqli_fetch_array($delUserChek);//Извлекаем все данные    пользователя с данным id*/

//$login = $_SESSION['login'];

$delUserChekSn = mysqli_query($db,"SELECT * FROM users_sn WHERE login='$login'");
$myrowChekSn = mysqli_fetch_array($delUserChekSn);

if (empty($myrowChek['login']) && empty($myrowChekSn['login'])) {
//exit("Пользователя не существует! Возможно он был удален. Или же ви не зареестрировались");
  exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=2'));  //як приклад як то можна органзувати
} //если такого не существует

 ?>
