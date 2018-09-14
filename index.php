<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/logo.png">
    <title>IS Product</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/prefixfree.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/mobile_menu.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/scrolOpasity.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel='stylesheet prefetch' href='http://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'>
    	  <link href="css/headerWalk.css" type="text/css" rel="stylesheet"/>
        <link href="css/slier_index_style.css" type="text/css" rel="stylesheet"/>
        <link href="css/style.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">
				<link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Neuton|Oswald">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  </head>
  <?php  //розміщено тут для того щоб можна було динамічно змінювати позицію
               // вся процедура2винен бути в тій же папці, що і всі інші, якщо це не так, то просто змініть шлях
                include    ("headerNew.php");
                ?>
  <body>
<div id="wraperIndex">
  <div id="scrollBotton">
  </div>
  
<!-- <h1> <a href="#">.</a></h1> -->
	<!-- ====================================
	Contenedor Slider
	=======================================-->
	<section id="slider" class="container">
		<ul class="slider-wrapper">
		<li class="current-slide">
			<img src="http://i9.photobucket.com/albums/a88/creaticode/1_zpsc6871490.jpg" title="" alt="">

			<div class="caption">
				<h2 class="slider-title">Diseño web</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, placeat est. Alias illo hic quo nobis, aspernatur iste ut voluptate.</p>
			</div>
		</li>

		<li>
			<img src="http://i9.photobucket.com/albums/a88/creaticode/2_zps6ccd36bd.jpg" title="" alt="">

			<div class="caption">
				<h2 class="slider-title">Diseño Responsive</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum, similique!</p>
			</div>
		</li>

		<li>
			<img src="http://i9.photobucket.com/albums/a88/creaticode/4_zps611bc9f9.jpg" title="" alt="">

			<div class="caption">
				<h2 class="slider-title">Identidad Corporativa</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dicta laudantium voluptatem minima! Dolorum tempore dolores excepturi omnis provident. Commodi quis aperiam maiores, dolore a perferendis!</p>
			</div>
		</li>

		<li>
			<img src="http://i9.photobucket.com/albums/a88/creaticode/3_zps70e4fcc5.jpg" title="" alt="">

			<div class="caption">
				<h2 class="slider-title">Desarrollo Web</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolore dignissimos laudantium.</p>
			</div>
		</li>
		</ul>
		<!-- Sombras -->
		<div class="slider-shadow"></div>

		<!-- Controles de Navegacion -->
		<ul id="control-buttons" class="control-buttons"></ul>
	</section>


	<!-- Imagenes Copyright -->
	<p class="authors">
		Las imagenes usadas en esta demostracíon no son de mi propiedad. <a href="https://www.flickr.com/photos/flickr/galleries/72157645330786244/">Autores de las Imagenes</a>
	</p>
	<div id="iconsIndex">
		<p class="home">
      <img src="images/house.png" alt="">
    </p>
	</div>
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

    <script src="js/slier_index.js"></script>
  </div>

<?php include ("footer.php"); ?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/headerWalk.js" async></script>

  </body>
</html>
