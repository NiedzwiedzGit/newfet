<?php

$directory = 'gallery/'.$_GET['foto_folder'];


$allowed_types=array('jpg','jpeg','gif','png');
//$allowed_types2=array('avi','mkv','mp4','ogv','webm');
$file_parts=array();
$ext='';
$title='';
$i=0;
$typeOgg="video/ogg";
$typeWebm="video/webm";
$dataRow = Array();
$p = 0;

$dir_handle = @opendir($directory) or die("There is an error with your image directory!");
while  (false !==($file = readdir($dir_handle)))
{

	if($file=='.' || $file == '..') continue;

	$file_parts = explode('.',$file);
	$ext = strtolower(array_pop($file_parts));

	$title = implode('.',$file_parts);
	$title = htmlspecialchars($title);

	$nomargin='';

	if(in_array($ext,$allowed_types))
	{
		if(($i+1)%24==0) $nomargin='nomargin';
		echo '
		<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;background-size: cover;">
		<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
		</div>';
		$dataRow[$p] = $i;

		$p++;
		$i++;
	}

	/*if(in_array($ext,$allowed_types2))
	{
		if(($i+1)%24==0) $nomargin='nomargin';
		echo '
		<div class="row clearfix">
  <div class="col span_6 fwImage">
<div id="video-gallery" class="royalSlider videoGallery rsDefault">

';

		$i++;
	}*/
	/*if(in_array($ext,$allowed_types2))
	{
		if(($i+1)%24==0) $nomargin='nomargin';
		echo '
		<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
		<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;background-size: cover;">
		 <video id="movie" width="400" height="320" preload controls>
		   <source src="'.$directory.'/'.$file.'.mp4" />
		   <source src="'.$directory.'/'.$file.'.webm" type="'.$typeWebm.';" codecs="vp8, vorbis" />
		   <source src="'.$directory.'/'.$file.'.ogv" type="'.$typeOgg.';" codecs="theora, vorbis" />
		   <object id="flowplayer" type="application/x-shockwave-flash"
		      width="400" height="320">
		    <param name="movie" value="video/flowplayer-3.2.5.swf" />
		    <param name="flashvars" value=""'"config="{"clip":"'.$directory.'/'.$file.'.mp4"}"'" " />
		    <p>Загрузить видео в <a href="video/snowman.mp4">MP4</a>,
		         <a href="video/snowman.ogv">OGG</a> или
		         <a href="video/snowman.webm">WebM</a></p>
		   </object>
		   </video>
			</div>';

		$i++;
	}*/
}
echo sizeof($dataRow);
closedir($dir_handle);
?>
