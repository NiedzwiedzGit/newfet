
<?php
include "../bd.php";
 
$AboutUsFile=file_get_contents('../language/AboutUsLang/aboutUs_'.$_SESSION['lang'].'.php');
if($_GET['info']=='AboutUs'){
echo($AboutUsFile);
}
?>
