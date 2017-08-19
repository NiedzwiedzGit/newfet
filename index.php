<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logo.png">
    <title>IS Product</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/prefixfree.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel='stylesheet prefetch' href='http://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'>
		    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    	  <link href="css/headerWalk.css" type="text/css" rel="stylesheet"/>
        <link href="css/slier_index_style.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Neuton|Oswald">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  </head>
  <?php  //розміщено тут для того щоб можна було динамічно змінювати позицію
               // вся процедура2винен бути в тій же папці, що і всі інші, якщо це не так, то просто змініть шлях
                include    ("header.php");
                ?>
  <body>
  <!--  <div id="content">
        <h2>Welcome!</h2>
        <p>Hi, welcome to the demonstration for the NETTUTS tutorial - "How to Load In and Animate Content with jQuery"</p>
        <p>In this tutorial we will be taking your average everyday website and enhancing it with jQuery. We will be adding ajax functionality so that the content loads into the relevant container instead of the user having to navigate to another page. We will also be integrating some awesome effects...</p>
    </div>-->
<div id="wraperIndex">
  <!--<div id="slider">
    <div id="filter"></div>
    <figure>
      <img src="../images/Doggy.jpg" alt>
      <img src="../images/DSC_1903.jpg" alt>
      <img src="../images/DSC_1929.jpg" alt>

    </figure>
  </div>-->
<!-- безперервна анімація
  <div id="textContent">
    <section class="hero">

      <p >
      Spice up your type with CSS
      <span>
        IS Product
      </span>
      &mdash; no JavaScript required &mdash;
    </p>
</section>
    </div>
-->
<h1>Slider | <a href="http://creaticode.com/blog">Creaticode</a></h1>
	<!-- ====================================
	Contenedor Slider
	=======================================-->
	<section id="slider" class="container">
		<ul class="slider-wrapper">
		<li class="current-slide">
			<img src="./gallery/night_photo/sity_2.jpg" title="" alt="">

			<div class="caption">
				<h2 class="slider-title">Diseño web</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, placeat est. Alias illo hic quo nobis, aspernatur iste ut voluptate.</p>
			</div>
		</li>

		<li>
			<img src="./gallery/night_photo/glases.jpg" title="" alt="">

			<div class="caption">
				<h2 class="slider-title">Diseño Responsive</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum, similique!</p>
			</div>
		</li>

		<li>
			<img src="./gallery/night_photo/DSC_1367_1.jpg" title="" alt="">

			<div class="caption">
				<h2 class="slider-title">Identidad Corporativa</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dicta laudantium voluptatem minima! Dolorum tempore dolores excepturi omnis provident. Commodi quis aperiam maiores, dolore a perferendis!</p>
			</div>
		</li>

		<li>
			<img src="./gallery/night_photo/DSC_2394.jpg" title="" alt="">

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
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

    <script src="js/slier_index.js"></script>
  </div>
<?php include ("footer.php"); ?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/headerWalk.js" async></script>
    <script language="JavaScript" type="text/javascript" src="js/mobile_menu.js"></script>

  </body>
</html>
