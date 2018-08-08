<!DOCTYPE html>
<?php
  include    ("bd.php");
           // вся    процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
          // session_start();
           $home=Dict::_('H8');
           $my_page=Dict::_('H9');
           $users=Dict::_('H10');
           $logout=Dict::_('H11');
           $lang=Dict::_('H7');
           $hi=Dict::_('H_hi1');
           $your_avatar=Dict::_('H12');
           $login=Dict::_('H6');
           $forgot_pasword=Dict::_('H_fml1');
           $remember_me=Dict::_('H_fml2');
           $need_to_register=Dict::_('H_fml3');
           $register=Dict::_('H_fml4');
           $logotype=Dict::_('H_fml5');
        /*   echo $_SESSION['str'];
           echo $_SESSION['str2'];
                echo $_SESSION['id'];*/
              //   generate_code();
          //  echo $login;
 if (isset($_COOKIE['auto']) and    isset($_COOKIE['login']) and isset($_COOKIE['password']))
            {//если есть    необходимые переменные
                     if ($_COOKIE['auto'] == 'yes') { // если    пользователь желает входить автоматически, то запускаем сессии
                                   $_SESSION['password']=strrev(md5($_COOKIE['password']))."b3p6f"; //в куках    пароль был не зашифрованный, а в сессиях обычно храним зашифрованный
                                $_SESSION['login']=$_COOKIE['login'];//сессия с логином
                                $_SESSION['id']=$_COOKIE['id'];//идентификатор    пользователя
                              }
                     }
if    (!empty($_SESSION['login']) and !empty($_SESSION['password']))
            {
            //если существует логин и пароль в сессиях, то проверяем их и    извлекаем аватар
            $login    = $_SESSION['login'];
            $password    = $_SESSION['password'];
            $result    = mysqli_query($db,"SELECT id,avatar FROM users WHERE login='$login' AND    password='$password'");
            $myrow    = mysqli_fetch_array($result);
            $avatar= $myrow['avatar'];
            //извлекаем нужные данные о пользователе
            }
            else if (!empty($_SESSION['login']))
                        {
                        //если существует логин и пароль в сессиях, то проверяем их и    извлекаем аватар
                        $login    = $_SESSION['login'];
                        $_SESSION['login']=$_SESSION['login'];
                        $avatar=$_SESSION['avatar'];
                        $result = mysqli_query($db,"SELECT id FROM users_sn WHERE login='$_SESSION[login]'");
                        $myrow    = mysqli_fetch_array($result);
                        //  $myrow['id']=$_SESSION['id'];
//echo $_SESSION['name'];
                        //извлекаем нужные данные о пользователе
                        }
          /*  else{
            $result    = mysqli_query($db,"SELECT id FROM users_sn");
            $myrow    = mysqli_fetch_array($result);}*/
            ?>
            <?PHP
/*mkdir($_POST["dir"]);
print("<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' http-equiv='refresh' content='1; URL=");
print($_POST["dir"]);
print("'>");
print("</head>");
print("<body>
</body>");
print("</html>");*/
?>
<html >
  <head>
    <meta charset="utf-8">
    <script>
    function showContent(link) {
        var cont = document.getElementById('wraperIndex');
        var loading = document.getElementById('loading');
        cont.innerHTML = loading.innerHTML;
        var http = createRequestObject();
        if( http )
        {
            http.open('get', link);
            http.onreadystatechange = function ()
            {
                if(http.readyState == 4)
                {
                    cont.innerHTML = http.responseText;
                }
            }
            http.send(null);
        }
        else
        {
            document.location = link;
        }
    }
    // создание ajax объекта
    function createRequestObject()
    {
        try { return new XMLHttpRequest() }
        catch(e)
        {
            try { return new ActiveXObject('Msxml2.XMLHTTP') }
            catch(e)
            {
                try { return new ActiveXObject('Microsoft.XMLHTTP') }
                catch(e) { return null; }
            }
        }
    }
</script>
    <title="Dict::_('H_up10')"></title>
    <meta charset="UTF-8" >

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/prefixfree.min.js"></script>
      <!--  <script src="js/loginWithPicture.js"></script>
        <script src="js/middle.js"></script>-->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script language="JavaScript" type="text/javascript" src="js/mobile_menu.js"></script>
      <script language="JavaScript" type="text/javascript" src="js/swimmingWindow.js"></script>
      <script language="JavaScript" type="text/javascript" src="js/ajaxTest.js"></script>


    <!--<    <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jsAjaxLoad.js"></script>-->
	    	<link href="css/style.css" type="text/css" rel="stylesheet"/>



<base href="http://localhost/newfet/">

  </head>

  <body>

    <div id="modal_form"><!-- Сaмo oкнo -->
      <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть -->
      <!-- Тут любoе сoдержимoе -->
      <form method='post' action='directorycreater.php'>
Имя папки:

<input type='text' name='dir'>
<br>
<?PHP
mysqli_query($db,"SET NAMES 'UTF8'");
$result = mysqli_query($db,"SELECT code,langName FROM languageslist WHERE connection='yes'");
while($row = mysqli_fetch_array($result))
{
  $langName=$row['langName'];
   $code=$row['code'];
      echo 'Имя папки '.$langName.':<br> <input type="text" name="'.$code.'"><br><br>';
      echo $code;
}
?>
<input type='submit' value='Создать папку'>
</form>
</div>


<div id="modal_form_language"><!-- Сaмo oкнo -->
  <span id="modal_close_language">X</span> <!-- Кнoпкa зaкрыть -->
  <!-- Тут любoе сoдержимoе -->

<div class="contentWraper">

 <form id="codeForm" method='post' action='addLangTable.php'>
       <br>
       <div id="contentLeng"></div>
       <input id="addLangButton" type='submit' value='Add language'>
</form>


          <form id="codeForm2" method='post' action='dataLoadTest.php' >
              <div class="styled-select slate">
        <select name="taskOption">
        <option  value="" hidden>Here is the first option2</option>
         <?PHP
            mysqli_query($db,"SET NAMES 'UTF8'");
          $result = mysqli_query($db,"SELECT code,langName FROM languageslist WHERE connection='no'");
            while($row = mysqli_fetch_array($result))
             {
            $langName=$row['langName'];
               $code=$row['code'];
        //  echo 'Имя папки '.$langName.':<br> <input type="text" name="'.$code.'"><br><br>';
          echo'<option id="langCodeFilter value="$code">'.$code.'</option>';
            }
            ?>
            <input id="addLangButton2"  type='submit' value='Filter'>
          </select>
          </div>
        </form>


   </div>
</div>
<div id="overlay"></div><!-- Пoдлoжкa -->
  <!--  <p>Какую страницу желаете открыть?</p><br><br>

   <form>
       <input onclick="showContent('pages/info.php?info=services')" type="button" value="Страница 1">
       <input onclick="showContent('pages/info.php?info=AboutUs')" type="button" value="Страница 2">
        <input onclick="showContent('portfolio.php?foto_folder=night_photo')" type="button" value="Страница 2">
   </form>

   <div id="contentBody">
   </div>

   <div id="loading" style="display: none">
   Идет загрузка...
   </div>-->
    <script>
          /* function btnClick() {
               $.getScript('js/jquery.lightbox-0.5.pack.js');   // вызываем скрипт
               alert('js/jquery.lightbox-0.5.pack.js');
           }*/
       </script>
     <div id="header">
       <nav>
         <input id="menu-toggle" type="checkbox" />
           <label class='menu-button-container' for="menu-toggle">
             <div class='menu-button'></div>
         </label>
        <div  id="menu" >
	         <ul id="menu_ul">

	        <li><a class="" href="index.php"><?=Dict::_('H1')?></a>
				    <ul>
              <li><form method='post' action='directorycreater.php'>
<input id="go" type='submit' value='Создать папку'>
</form></li>
					<li><a href="portfolio.php?foto_folder=night_photo" onclick="btnClick()"><?=Dict::_('H_fm1')?></a>

                   </li>
					<li><a href="portfolio.php?foto_folder=portraits"><?=Dict::_('H_fm2')?></a></li>

          <?PHP
          error_reporting( E_ERROR );
          folderMenu();
function folderMenu(){
$test= scandir('./gallery');
//print_r($test);
if (empty($test)){
$directory = '../gallery';
}else{
$directory = './gallery';
}
//$directory = 'gallery/'.$_GET['foto_folder'];
$file_parts=array();
$ext='';
$title='';
$i=0;
$dir_handle = opendir($directory);
while ($file = readdir($dir_handle)){
if($file=='.'||$file=='..') continue;
$file_parts = explode('.dat',$file);
$ext = strtolower(array_pop($file_parts));
$title = implode('.',$file_parts);
$title = htmlspecialchars($title);
$nomargin='';
  if(($i+1)%10==0) $nomargin='nomargin';
  echo '<li><a class="deleteBotton1" href="portfolio.php?foto_folder='.$file.'" title="'.$title.'">'.Dict::_("$file").'</a><a class="deleteBotton2" href="directorydelete.php?foto_folder='.$file.'" title="'.$title.'">X</a></li>';
  $i++;
}
  /*echo '	<li><a href="portfolio.php?foto_folder=art_work"><?=Dict::_("'.$file.'")?></a></li>';
  echo'"'.$file.'"';*/
}?>
          <li><a href="video.php"><?=Dict::_('H_fm4')?></a></li>
					</ul>
				</li>
	           <li><a href="pages/info.php?info=services" class="urlparam" data-text="scrollto"><?=Dict::_('H2')?></a>
			   </li>
	           <li><a href="pages/info.php?info=AboutUs"><?=Dict::_('H4')?></a></li>
             <li>   <div id="logo"><a href="index.php"> <img src="./images/logo.png" alt="Логотип"/></a></div>   </li>
	           <li><a href="pages/info.php?info=ContactUs"><?=Dict::_('H5')?></a></li>
			   <li><a href="#".html"><?=Dict::_('H6')?></a>
			     <ul id="login">
					<?php
            if (empty($myrow['id'])){
            //проверяем, не извлечены ли данные пользователя из базы. Если    нет, то он не вошел, либо пароль в сессии неверный. Выводим окно для входа.    Но мы не будем его выводить для вошедших, им оно уже не нужно.
            print    <<<HERE
    <div id="login_main_container">
      <div class="login_wraper">
        <div class="login_container">
                <div class="login_form_header_text">
                $login
                </div>
          <div>
            <form action="testreg.php" method="post" class="form-horizontal" id="loginform" name="loginform">
            <!-- testreg.php - это адрес обработчика. То есть, после нажатия на кнопку    "Войти", данные из полей отправятся на страничку testreg.php методом "post"  -->
            <div class="controls">
                                <span class="line_icon_left"></span>
                                <input class="fill_form_input" id="username" name="login" placeholder="Email or Login" type="text" size="15"    maxlength="15"
HERE;
            if(isset($_COOKIE['login'])) //есть ли переменная с логином в COOKIE. Должна быть,    если пользователь при предыдущем входе нажал на чекбокс "Запомнить    меня"
            {
            //если да, то вставляем в форму ее значение. При этом    пользователю отображается, что его логин уже вписан в нужную графу
            echo    ' value="'.$_COOKIE['login'].'"></div>'; // закриваю input i div
            }
print <<<HERE
            <!-- В текстовое поле (name="login" type="text") пользователь вводит свой    логин -->
            <div class="controls">
                   <span class="line_icon_left"></span>
                   <input class="fill_form_input" id="password" name="password" placeholder="Password" type="password" ize="15"    maxlength="15"
HERE;
            if (isset($_COOKIE['password']))//есть    ли переменная с паролем в COOKIE. Должна быть,    если пользователь при предыдущем входе нажал на чекбокс "Запомнить    меня"
            {
            //если да, то вставляем в форму ее значение. При этом пользователю    отображается, что его пароль уже вписан в нужную графу
            echo    ' value="'.$_COOKIE['password'].'"></div>';
            }
            print    <<<HERE
                <div class="logtext">
                   <span><a href="send_pass.php" class="ramember_text" href="#">$forgot_pasword?</a></span>
                </div>
            <!-- В поле для паролей (name="password"    type="password") пользователь вводит свой пароль -->
            <div class="logtext">
              <p class="ramember_text">
              $remember_me. <br>
              <input    name="autovhod" type="checkbox" value='1'>
            </p>
            </div>
<!--/*<p>
            <input type="submit"    name="submit" value="Войти">-->
            <!--    Кнопочка (type="submit")    отправляет данные на страничку testreg.php  -->
    <!--  </div>
  </div>
            <br>-->
            <!-- ссылка    на регистрацию, ведь как-то же должны гости туда попадать  -->
          <!--  <a    href="reg.php">Зарегистрироваться</a>--><br>
           <!-- ссылка    на восстановление пароля  -->
           <!--  <a href="send_pass.php">Забыли    пароль?</a>*/ -->
            <div class="login_link">
                <button class="login_form_batton_style" id="login_button" type="submit"  name="submit">$login</button>
           </div>
         </form>
             </div>
          </div>
       </div>  <!--// end of login wraper-->
         <div class="separat_line"></div>
              <div class="registration_container">
                  <div class="login_form_header_text"> $need_to_register?</div>
                    <div class="icon_registration">
                 <a id="facebook" href="?sn=facebook"><img src="images/fbookLogo.png" alt="$logotype"></a>
                  <a id="google" href="?sn=google"><img src="images/googleLogo.png" alt="$logotype"></a>
                    </div>
                    <div class="registration_botton">
                    <form action="reg.php">
                      <button class="login_form_batton_style" id="register">$register</button>
                    </form>
                      </div>
                </div>
            </div>
            <br>
          <!--//  Вы    вошли на сайт, как гость<br><a    href='#'>Эта    ссылка доступна только зарегистрированным пользователям</a>-->
HERE;
            }
else   if (!empty($myrow['id']))
            {
            //при удачном входе пользователю выдается все, что расположено    ниже между звездочками.
            //**********************************************************
print <<<HERE
  <li><a href='page.php?id=$myrow[id]&curPage=userPage'>$my_page</a></li>
  <li><a href='index.php'>$home</a></li>
  <li><a href='all_users.php'>$users</a></li>
  <br><br>
<!-- Между оператором     "print <<<HERE" выводится html код с нужными    переменными из php -->
           <li> <p>$hi, $_SESSION[login]</p> </li>
			<li><a href='exit.php'>$logout</a></li><br>
            <!-- выше ссылка на выход из аккаунта -->
<!--<li><a href='http://google.com'>Эта    ссылка доступна только зарегистрированным пользователям</a></li><br>-->
            <li><p>$your_avatar:</p></li><br>
            <li><img    alt='$_SESSION[login]' src='$avatar' style="width:150px;"> </li>
            <!-- Выше отображается аватар. Его адрес содержит    переменная $avatar -->
<!-- Именно здесь можно добавлять формы для отправки    комментариев и прочего... -->
HERE;
//************************************************************************************
            //при удачном входе пользователю выдается все, что расположено    ВЫШЕ между звездочками.
            }
?>
					</ul>
			   </li>
         <li id="langHoverLi"><a id="langHover" href="sity.html"><?=Dict::_('H7')?></a>

       <ul id="lang">
         <?php
         // echo '<div id="goLanguage" >Создать папку</div>';

         /*echo '<div id="goLanguage" >Создать папку</div>';
         echo '<li><form id="langRefresh2"><input id="goLanguage2" type="submit" value="Создать папку2"></form></li>';
         mysqli_query($db,"SET NAMES 'UTF8'");
         $result = mysqli_query($db,"SELECT code,langName FROM languageslist WHERE connection='yes'");
         while($row = mysqli_fetch_array($result))
         {
           $langName=$row['langName'];
            $code=$row['code'];
               echo '<li><a href="?lang='.$code.'">'.$langName.'</a></li>';
         }*/
         ?>
         <div id="langContent"></div>
      </ul>

     </li>
	         </ul>
         </nav>
  </div>
</div>
    <base href="http://localhost/newfet/">
  </body>
</html>
