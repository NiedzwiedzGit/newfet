<?php


$directory = 'gallery/night_photo';

$allowed_types=array('jpg','jpeg','gif','png');
$file_parts=array();
$ext='';
$title='';
$i=0;

$dir_handle = @opendir($directory) or die("There is an error with your image directory!");

while ($file = readdir($dir_handle))
{
	if($file=='.' || $file == '..') continue;

	$file_parts = explode('.',$file);
	$ext = strtolower(array_pop($file_parts));

	$title = implode('.',$file_parts);
	$title = htmlspecialchars($title);

	$nomargin='';

	if(in_array($ext,$allowed_types))
	{
		if(($i+1)%10==0) $nomargin='nomargin';

		echo '
		<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;">
		<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
		</div>';

		$i++;
	}
}

closedir($dir_handle);

?>
