<?php
$foldername = iconv ( "UTF-8", "CP1251", $_GET['foto_folder'] );
function removeDirectory($dir) {
  if ($objs = glob($dir."/*")) {
     foreach($objs as $obj) {
       is_dir($obj) ? removeDirectory($obj) : unlink($obj);
     }
  }
  rmdir($dir);
}
if ($foldername!=""){
removeDirectory("gallery/".$foldername);

$db = mysqli_connect("localhost","root","42091i","is_db");
$result3 = mysqli_query($db,"SELECT code FROM languageslist WHERE connection='yes'");
while($row2 = mysqli_fetch_array($result3)){
  $code=$row2['code'];
  $teble=$code.'leng';
$result4 = mysqli_query($db,"DELETE FROM $teble WHERE folderName='$foldername'");
}

exit("<meta http-equiv='refresh' content='0; url= index.php'>");
}
else
  exit("<meta http-equiv='refresh' content='0; url= index.php'>")
 ?>
