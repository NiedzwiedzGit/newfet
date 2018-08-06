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

<script type="text/javascript" src="js/nanobar.js"></script>
<script type="text/javascript" src="js/nanobarUse.js"></script>
<script type="text/javascript" src="js/photo_nav_botton.js"></script>
<script type="text/javascript" src="js/propResizePicPortfolio.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
  <script>

</script>
<div id="wraperPortfolio">

  <div id="contentP">
    <?php  include ("portfolio_logic_code.php");?>
  </div>
  <div class="pagination">
 <div id="progressbar"></div>
  <button  data-hover="&#8592;" class="prevP" value="<?=Dict::_('H_portfolio1')?>"><div>Preveus!</div></button>
  <button  data-hover="&#8592;" class="nextP" value="<?=Dict::_('H_portfolio2')?>"><div>Next!</div></button>

<span class="pageNumber"><?=Dict::_('H_portfolio2')?> </span>


    <script src="js/jquery_pagination2.js"></script>
  </div>
</div>
  <footer><?php  include ("footer.php"); ?></footer>

<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>

</body>
</html>
