<?php
$db = mysqli_connect("localhost","root","42091i","is_db");
mysqli_query($db,"SET NAMES 'UTF8'");
$lang= array ();
$result = mysqli_query($db,"SELECT code,textVord,codeInc FROM ruleng");
while($row = mysqli_fetch_array($result))
{
      $a=$row['code'].$row['codeInc'];
      $lang[$a] = $row ['textVord'];
}
return $lang;
 ?>
