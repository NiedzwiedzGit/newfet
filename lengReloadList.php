<?php
echo'<li id="goLanguage" href="sity.html"><a href="#">+</a></li>';
//echo '<li><form id="langRefresh2"><input id="goLanguage2" type="submit" value="Создать папку2"></form></li>';
$db = mysqli_connect("localhost","root","42091i","is_db");
mysqli_query($db,"SET NAMES 'UTF8'");
$result = mysqli_query($db,"SELECT code,langName FROM languageslist WHERE connection='yes'");
while($row = mysqli_fetch_array($result))
{
  $langName=$row['langName'];
   $code=$row['code'];
      echo '<li class="countLanguage"><a href="?lang='.$code.'">'.$langName.'</a></li>';
}
?>
