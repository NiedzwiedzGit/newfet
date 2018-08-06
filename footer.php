<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/prefixfree.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/mobile_menu.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/scrolOpasity.js"></script> <!-- Код відповідає за те щоб на всіх браузерах коректно відпрацювувалась анімвція і z-index футера  -->
        <script language="JavaScript" type="text/javascript" src="js/cursorDetection.js"></script> <!-- Код відповідає за те щоб на всіх браузерах коректно відпрацювувалась анімвція і z-index футера  -->
        <!--<script language="JavaScript" type="text/javascript" src="js/middle.js"></script>-->
        <script language="JavaScript" type="text/javascript" src="js/fluensScroll.js"></script>
		    <link href="css/style.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>
<footer>
<div id="fBack"></div>
    <ul id="home">
        <li>
            <p class="home"><?=Dict::_('F_7')?></p>
            <a class="logo_footer" href="#">IS product <i>&copy; 2016</i></a>
        </li>
        <li>
            <p class="services"><?=Dict::_('F_5')?></p>
            <ul>
                <li ><a href="pages/info.php?info=services#scrollto1"><?=Dict::_('F_1')?></a></li>
                <li><a href="pages/info.php?info=services#scrollto2"><?=Dict::_('F_2')?></a></li>
                <li><a href="pages/info.php?info=services#scrollto3"><?=Dict::_('F_3')?></a></li>
                <li><a href="pages/info.php?info=services#scrollto4"><?=Dict::_('F_4')?></a></li>
            </ul>
        </li>
        <li>
            <p class="reachus"><?=Dict::_('F_6')?></p>
            <ul>
                <li><a href="pages/info.php?info=ContactUs">Email</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li>(48) 530-093-787</li>
            </ul>
        </li>
        <li>
            <p class="clients"><?=Dict::_('F_8')?></p>
            <ul>
                <li><a href="#">Login Area</a></li>
                <li><a href="#">Support Center</a></li>
                <li><a href="#" onclick="return false;">FAQ</a></li>
            </ul>
        </li>
    </ul>
</footer>
</body>
</html>
