<!DOCTYPE html>
<?php
           // вся    процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
          include    ("bd.php");// файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь
          include    ("header.php");
        //  $foto_folder='gallery/night_photo';

            ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/logo.png">
<title>Portfolio</title>
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="css/portfolio.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/photo_nav_botton.js"></script>
<script type="text/javascript" src="js/propResizePicPortfolio.js"></script>
</head>

<body>

<div id="wraperPortfolio">

  <div id="contentP">
    <?php  include ("portfolio_logic_code.php");?>
  </div>
  <div class="pagination">
    <input type="button"  class="prevP" value="<?=Dict::_('H_portfolio1')?>" />
    <input type="button"  class="nextP" value="<?=Dict::_('H_portfolio2')?>" /><br>

    <span class="pageNumber"><?=Dict::_('H_portfolio2')?></span>
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="js/jquery_pagination2.js"></script>
  </div>
</div>
  <footer><?php  include ("footer.php"); ?></footer>

<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>

</body>
</html>
