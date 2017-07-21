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
<html >
  <head>
    <title="Dict::_('H_up10')"></title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link href="css/header2.css" type="text/css" rel="stylesheet"/>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jsAjaxLoad.js"></script>

</head>

<body>
  <div id="mainB">
  <div class="bg">
     <div class="bg1">

     </div>
  </div>
</div>
<div class="over">
  <div class="dial">
    <div class="grad">

    </div>
  </div>
  <div class="container">
  <div class="nav">
    <ul id="nav">
      <li id="email">
        <a>
          <img src="http://grantcr.com/files/iemail.png" />
        </a>
        <ul class="emailUl">
      <li><a href="portfolio.php?foto_folder=night_photo"><?=Dict::_('H_fm1')?></a></li>
      <li><a href="portfolio.php?foto_folder=portraits"><?=Dict::_('H_fm2')?></a></li>
      <li><a href="portfolio.php?foto_folder=art_work"><?=Dict::_('H_fm3')?></a></li>
      </ul>
      </li>
      <li id="photo">
        <a>
          <img src="http://grantcr.com/files/iphoto.png" />
        </a>
        <ul class="photoUl">
      <li><a href="portfolio.php?foto_folder=night_photo"><?=Dict::_('H_fm1')?></a></li>
      <li><a href="portfolio.php?foto_folder=portraits"><?=Dict::_('H_fm2')?></a></li>
      <li><a href="portfolio.php?foto_folder=art_work"><?=Dict::_('H_fm3')?></a></li>
      </ul>
      </li>
      <li id="cloud" class="active">
        <a>
          <img src="http://grantcr.com/files/icloud.png" />
        </a>
        <ul class="infoUl">
      <li><a href="pages/info.php?info=AboutUs"><?=Dict::_('H4')?></a></li>
      <li><a href="pages/info.php?info=services"><?=Dict::_('H2')?></a></li>
      <li><a href="pages/info.php?info=ContactUs"><?=Dict::_('H5')?></a></li>
      </ul>

      </li>
      <li id="portfolio">
        <a>
          <img src="http://grantcr.com/files/portfolio.png" />
        </a>
      </li>
      <li id="settings">
        <a>
          <img src="http://grantcr.com/files/settings.png" />
        </a>
      </li>
      <li id="settings2">
        <a>
          <img src="http://grantcr.com/files/settings.png" />
        </a>
      </li>
    </ul>
  </div>
  </div>
</div>

  <div class="screen">

  </div>

<div id="mainB2">
<div class="bg">
   <div class="bg1">

   </div>
</div>
</div>
<div class="over2">


  <div class="dial2">
    <div class="grad2">

    </div>
  </div>

  <div class="container">
    <div class="knob-surround">
<span class="min">Min</span>
<span class="max">Max</span>

<div class="ticks">
  <div class="tick activetick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
  <div class="tick"></div>
</div>
</div>
</div>
</div>



  <script src="js/volume.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/header2.js"></script>

  </body>
</html>
