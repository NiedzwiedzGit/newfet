<!DOCTYPE html>
<?php
include ("bd.php");// файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь
include("chekReg.php");
include("usersHeder.php");
?>
            <html>
            <head>
               <title><?php echo $myrow['login'];?></title>
               <link href="css/style.css" type="text/css" rel="stylesheet"/>
            </head>
          <body id="My_page">

<?php
$hi=Dict::_('H_hi1');
$your_avatar=Dict::_('H12');
$format_massege=Dict::_('H_up1');
$change_avatar=Dict::_('H_up2');
$change=Dict::_('H_up3');
$your_login=Dict::_('H_up4');
$change_login=Dict::_('H_up5');
$change_password=Dict::_('H_up6');
$private_messages=Dict::_('H_up7');
$author=Dict::_('H_up8');
$message=Dict::_('H_up9');
$delete=Dict::_('H_up10');
?>
<div id="My_page_main">
<?php
        //выше вывели меню
if ($myrow['login'] == $login) { //змінна $myrow і $login береться з файлу testreg.php aбо Facebook
                                  //якшо реєстрація йде через соц мережу то змінна логін присвоюється і файлі chekReg.php

            //Если    страничка принадлежит вошедшему, то предлагаем изменить данные и выводим    личные сообщения

print <<<HERE
<div class="hi_my_page">
<p>$hi, $_SESSION[login]</p>
</div>
<br>
<div id="My_page_column1">
   <div id="My_page_avatar">
      <form action='update_user.php'    method='post' enctype='multipart/form-data'>
          <p>$your_avatar:</p><br>
            <img alt='аватар' src='$avatar' style="width:250px;"><br>
HERE;
//якшо не через соціальну мереду то показуєм всі можливі зміни які йдуть через бузу даних
if($_SESSION['snreg']==true){//змінна _SESSION['snreg'] береться з файлу chekReg.php
print <<<HERE
          <p>$format_massege</p><br>
			<div  id="menu" >
			 <ul id="menu_ul">
			  <li  class="current"><a href="#"><p>$change_avatar</p></a>
			    <ul>
                  <li><input type="FILE"    name="fupload"></li>
                  <li><input type='submit' name='submit' value='$change'></li>
			    </ul>
			  </li>
			 </ul>
			</div>
            </form>
	</div><br>
	 <div id="user_login_pasword">
         <form action='update_user.php'    method='post'>
          <p>$your_login</p><br>
          <p class="imp">$myrow[login]</p><br>
          <p>$change_login:</p><br>
            <input name='login' type='text'>
            <input type='submit' name='submit' value='$change'>
            </form>
            <br>
           <form action='update_user.php'    method='post'>
            <p>$change_password:</p><br>
            <input name='password' type='password'>
            <input type='submit' name='submit' value='$change'>
            </form>
            <br>
      </div>
</div>
HERE;
}

print <<<HERE
      <div id="My_page_message">
<h2><p>$private_messages:<p></h2><br>
HERE;
$tmp = mysqli_query($db,"SELECT * FROM  messages WHERE recipient='$login' ORDER BY id DESC");
$messages = mysqli_fetch_array($tmp);//извлекаем сообщения    пользователя, сортируем по идентификатору в обратном порядке, т.е. самые    новые сообщения будут вверху
if (!empty($messages['id'])) {
            do //выводим    все сообщения в цикле
              {
            $author = $messages['author'];
            $result4 = mysqli_query($db,"SELECT avatar,id FROM users WHERE login='$author'"); //извлекаем аватар автора
            $myrow4 = mysqli_fetch_array($result4);
if (!empty($myrow4['avatar']))    {//если такового нет, то выводим стандартный (может этого пользователя уже давно удалили)
            $avatar = $myrow4['avatar'];
            }
            else {$avatar ="avatars/noavtats.jpg";}
     printf("
                 <div id='massegeUser'>

                    <div id='messageImg'><a href='page.php?id=%s'><img alt='аватар'    src='%s'></a></div>

                 <ul id='messageUl'>
                 <li><p>$author:</p>    <a href='page.php?id=%s'>%s</a></li><br>
                  <li>Дата:    %s</li><br>
                                 <li><p>$message:</p></li><br>

                          <li>%s</li><br>
                             <li><a href='drop_post.php?id=%s'><p>$delete</p></a></li>


                   </ul>
                 </div>
				 <br>
                 ",$myrow4['id'],$avatar,$myrow4['id'],$author,$messages['date'],$messages['text'],$messages['id']);
              //выводим само сообщение
              }
                 while($messages = mysqli_fetch_array($tmp));
                    }

            }
else
            {
            //если    страничка чужая, то выводим только некторые данные и форму для отправки    личных сообщений
print <<<HERE
            <img alt='аватар' src='$avatar'><br>
            <form action='post.php' method='post'>
            <br>
            <h2><p>Отправить Ваше сообщение:</p></h2>
            <textarea cols='43' rows='4'    name='text'></textarea><br>
            <input type='hidden' name='recipient'    value='$myrow[login]'>
            <input type='hidden' name='id'    value='$myrow[id]'>
            <input type='submit' name='submit' value='Отправить'>

            </form>

HERE;

            }
            /*<table id='massegeUser'>
            <tr>

            <td><a href='page.php?id=%s'><img alt='аватар'    src='%s'></a></td>

            <td id='messageTd'><p>$author:</p>    <a href='page.php?id=%s'>%s</a><br>
             Дата:    %s<br>
                            <p>$message:</p><br>

                        %s<br>
                        <a href='drop_post.php?id=%s'><p>$delete</p></a>


            </td>
            </tr>
            </table>*/
?>
   </div>
   <div id="radio">
    Radio <div id="RP_v4_radio" align="center" class="RPv4-well RPv4-well-small"><div class="RPv4-radioplayer-wrapper"><div id="RP_v4_radioplayer"></div></div><div class="RPv4-btn-group" align="left"><a class="RPv4-btn RPv4-dropdown-toggle" data-toggle="dropdown" href="http://radiopotok.ru/">Онлайн радио<span class="RPv4-caret"></span></a><ul class="RPv4-dropdown-menu"></ul></div></div>
   <script>!window.jQuery && document.write(unescape('%3Cscript src="//yandex.st/jquery/1.8.2/jquery.min.js"%3E%3C/script%3E'))</script>
   <script>!window.swfobject && document.write(unescape('%3Cscript src="//yandex.st/swfobject/2.2/swfobject.min.js"%3E%3C/script%3E'))</script>
   <script type="text/javascript">var RP_bs = false; /* На сайте используется Bootstrap? */ var RP_v4_theme = 'light'; // Светлая тема -> 'light'; Темная тема -> 'dark'</script>
   <script type="text/javascript" src="//radiopotok.ru/f/script4/fae0b27c451c728867a567e8c1bb4e53.js" charset="UTF-8"></script>

 </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r58/three.min.js'></script>

  <!--  <script src="js/star_beckground.js"></script>-->

            </body>
            </html>
