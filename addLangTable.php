<<?php
session_start();
$taskOption=$_SESSION['langIndex'];
$taskOption2=$_POST['taskOption2'];
//$test=$taskOption2.'sdfgdsfgasdgfd';
$table=$taskOption.'leng';
$db = mysqli_connect("localhost","root","42091i","is_db");
mysqli_query($db,"SET NAMES 'UTF8'");
$result2 = mysqli_query($db,"CREATE TABLE $table LIKE plleng");
if($result2){
  $changeLangStatus = mysqli_query ($db,"UPDATE  languageslist SET showLang='yes',connection='yes' WHERE code='$taskOption'");// textVorde без E
$_SESSION['langIndex']=arrey();
}
//if($taskOption2){echo $taskOption2;}else{echo"noo";}
$result3 = mysqli_query($db,"INSERT INTO $table SELECT * FROM plleng");
$id=1;
foreach($taskOption2 as $code => $text) {
  $result = mysqli_query ($db,"UPDATE $table SET textVord='$text' WHERE id='$id'");// textVorde без E
  $id++;
}

/*foreach ($taskOption2  as $value) {
  // code...
  echo '----'.$value;
}*/
echo $taskOption;
 ?>
