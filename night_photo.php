<!DOCTYPE html>
<?php
           // вся    процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
          include    ("bd.php");// файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь
          include    ("header.php");


            ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Really Cool jQuery Gallery Demo | Tutorialzine</title>
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="css/photo.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>
<script type="text/javascript" src="js/photo_nav_botton.js"></script>
</head>

<body>

<div id="wraper">

  <div id="heading"></div>

  <div id="content">
    <?php  include ("night_photo_code.php");?>
  </div>
</div>
<footer><?php  include ("footer.php"); ?></footer>

</body>
</html>
