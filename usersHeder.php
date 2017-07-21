<html>
<head>
<script src="js/prefixfree.min.js"></script>
<link href="css/style.css" type="text/css" rel="stylesheet"/>
<link href="css/star_beckground.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Iceland" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Sarpanch&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
</head>
<body id="My_page">

<div id="My_page_header">

<?php
include("logic\langPageReload.php");
$home=Dict::_('H8');
$my_page=Dict::_('H9');
$users=Dict::_('H10');
$logout=Dict::_('H11');
$lang=Dict::_('H7');
//меню в хедері
print <<<HERE
<nav>
  <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
      <div class='menu-button'></div>
  </label>
<div id="menu">
<ul id="menu_ul">
<li><a href="page.php?id=$myrow2[id]&curPage=userPage">$my_page</a></li>
<li><a href='index.php'>$home</a></li>
<li><a href="all_users.php?curPage=allUsers">$users</a></li>
<li><a href='exit.php'>$logout</a></li>

<li><a href="#">$lang</a>
<ul>
<li id="ru"><a href="$_SESSION[curPage]$symbol lang=ru">Русский</a></li>
<li id="en"><a href="$_SESSION[curPage]$symbol lang=en">English</a></li>
<li id="pl"><a href="$_SESSION[curPage]$symbol lang=pl">Polski</a></li>
</ul>
</li>
</ul><br><br>
</div>
</nav>
HERE;
?>
</div>

  </body>
</html>
