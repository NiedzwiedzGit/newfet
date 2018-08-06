<?php
//include ('../bd.php');
$db = mysqli_connect("localhost","root","42091i","is_db");
mysqli_query($db,"SET NAMES 'UTF8'");
$lang= array ();
$result = mysqli_query($db,"SELECT code,textVord,codeInc FROM enleng");
while($row = mysqli_fetch_array($result))
{
      $a=$row['code'].$row['codeInc'];
      $lang[$a] = $row ['textVord'];
}


/*foreach($lang as $code => $text) {
  $result = mysqli_query ($db,"INSERT INTO enleng (code,textVord) VALUES('$code','$text')");
   echo '<br>'. $code .' - '. $text;
}*/
//echo count($lang);


return $lang;
 ?>
