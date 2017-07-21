<!DOCTYPE html>
<?php
           // вся    процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
          include    ("bd.php");// файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь
          include    ("header.php");
        //  $foto_folder='gallery/night_photo';

            ?>
<html >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="../images/logo.png">
  <title>Video Gallery</title>


<link rel='stylesheet prefetch' href='http://dimsemenov.com/plugins/royal-slider/royalslider/skins/default/rs-default.css?v=1.0.4'>


      <link rel="stylesheet" href="css/video.css">
        <link rel="stylesheet" href="css/videoSlider.css">
      <!--  <link rel="stylesheet" href="css/videoReset.css">-->


</head>

<body >
  <div id="wraperPortfolio">
<div id="video-gallery" class="royalSlider videoGallery rsDefault">

   <a class="rsImg" data-rsVideo="https://vimeo.com/45830194" href="http://b.vimeocdn.com/ts/319/715/319715493_640.jpg">
    <div class="rsTmb">
      <h5>Stanley Piano</h5>
      <span>by Digital Kitchen</span>
    </div>
  </a>

   <a class="rsImg" data-rsVideo="https://vimeo.com/44878206" href="http://b.vimeocdn.com/ts/311/891/311891198_640.jpg">
    <div class="rsTmb">
      <h5>Dubstep Dispute</h5>
      <span>by Fluxel Media</span>
    </div>
  </a><a class="rsImg" data-rsVideo="https://vimeo.com/44878206" href="http://b.vimeocdn.com/ts/311/891/311891198_640.jpg">
    <div class="rsTmb">
      <h5>Dubstep Dispute</h5>
      <span>by Fluxel Media</span>
    </div>
  </a><a class="rsImg" data-rsVideo="https://vimeo.com/44878206" href="http://b.vimeocdn.com/ts/311/891/311891198_640.jpg">
    <div class="rsTmb">
      <h5>Dubstep Dispute</h5>
      <span>by Fluxel Media</span>
    </div>
  </a>
  <a class="rsImg" data-rsVideo="https://vimeo.com/45778774" href="http://b.vimeocdn.com/ts/318/502/318502540_640.jpg">
    <div class="rsTmb">
      <h5>The Epic & The Beasts</h5>
      <span>by Sebastian Linda</span>
    </div>
  </a>
   <a class="rsImg" data-rsVideo="https://vimeo.com/41132461" href="http://b.vimeocdn.com/ts/284/709/284709146_640.jpg">
    <div class="rsTmb">
      <h5>Barcode Band</h5>
      <span>by Kang woon Jin</span>
    </div>
  </a>
 <a class="rsImg" data-rsVideo="https://vimeo.com/44388232" href="http://b.vimeocdn.com/ts/308/375/308375094_640.jpg">
    <div class="rsTmb">
      <h5>Samm Hodges Reel</h5>
      <span>by Animal</span>
    </div>
  </a>
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://dimsemenov.com/plugins/royal-slider/royalslider/jquery.royalslider.min.js?v=9.3.6'></script>

    <script src="js/video.js"></script>

</body>
</html>
