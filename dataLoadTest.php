<?PHP
session_start();
$db = mysqli_connect("localhost","root","42091i","is_db");
mysqli_query($db,"SET NAMES 'UTF8'");
$taskOption=$_POST['taskOption'];
$_SESSION['langIndex']=$taskOption;
//$taskOption2=$_POST['taskOption2'];

$trable2=$_SESSION['lang'];
$table=$trable2.'leng';
$result = mysqli_query($db,"SELECT textVord FROM $table");
$row = mysqli_fetch_array($result);
while($row = mysqli_fetch_array($result))
{
$langName=$row['textVord'];
$code=$taskOption;
  echo '<br><br><div id="contentLangInput">Фраза '.$langName.' :<br></div>';
  echo  '<input id="contentLangInput2"  type="text" name="taskOption2[]"><br>';
}
//echo $taskOption2;
/*for($i=0;$i<10;$i++){
echo 'Имя папки: <input type="text" name="dir"><br>';
}*/
?>
