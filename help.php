<?php
$db = mysqli_connect("localhost","root","42091i","is_db");
mysqli_query($db,"SET NAMES 'UTF8'");
//$lang= array ();
//$result = mysqli_query($db,"SELECT code,textVord,codeInc FROM enleng");
/*while($row = mysqli_fetch_array($result))
{
      $a=$row['code'].$row['codeInc'];
      $lang[$a] = $row ['textVord'];
}*/
//$result = mysqli_query ($db,"INSERT INTO ruleng (code,textVord,codeInc,folderName) SELECT code,textVord,codeInc,folderName FROM enleng");
$result3 = mysqli_query($db,"SELECT code,codeInc,folderName FROM enleng");
$row2 = mysqli_fetch_array($result3);
$code=$row2['code'];
$a=$row2['code'].$row2['codeInc'];
$codeInc=$row2['codeInc'];
$folderName=$row2['folderName'];
//$result = mysqli_query ($db,"INSERT INTO ruleng (code,codeInc,folderName) VALUES('$code','$codeInc','$folderName')");
$b=count($lang);
$id=41149;
foreach($lang as $code => $text) {

  $result = mysqli_query ($db,"UPDATE ruleng SET textVord='$text' WHERE id='$id'");// textVorde без E
  $id++;
  echo '<br> - '. $text;
  echo '<br> - '. $id;

  $array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
  $array2 = array( "b" => "yellow", "blue", "red","a" => "green");
  $result_array = array_intersect_assoc($array1, $array2);
  print_r($result_array);
  //$result = mysqli_query ($db,"DELETE FROM ruleng WHERE textVord='Отправить'" );
  //UPDATE MyGuests SET lastname='Doe' WHERE id=2
  //DELETE FROM Product WHERE type='pc'


}
   $result = mysqli_query ($db,"DELETE FROM ruleng WHERE id>'41216'" );
//echo count($lang);
return $lang;
?>
