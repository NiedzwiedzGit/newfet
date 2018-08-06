<?PHP

$db = mysqli_connect("localhost","root","42091i","is_db");
mysqli_query($db,"SET NAMES 'UTF8'");
$resultCodeEleng = mysqli_query($db,"SELECT code,codeInc FROM enleng WHERE code='H_fm'");
$row2 = mysqli_fetch_array($resultCodeEleng);
//echo count($row2)+1;
$numOfRow=count($row2)+1;
$code="H_fm";
$codeInc=$numOfRow+1;
//$textVord=$_POST['dir'];

$arrayLangTable = array(); //тассив для запису даних з таблиці  languageslist в ассоцівтивній формі
$resultLang = mysqli_query($db,"SELECT code,langName FROM languageslist");
while($rowLang = mysqli_fetch_array($resultLang)){
$codeCountry=$rowLang['code'];
$langName=$rowLang['langName'];
$arrayTest["$codeCountry"]="$langName";
  }

$nameDirectory=$code.$codeInc;
$foldername = iconv ( "UTF-8", "CP1251", $nameDirectory ) ;
mkdir("gallery/".$foldername,0777,true);

foreach($arrayTest as $codeCountry=> $langName) {
  //echo $code;
  $textVordTest=$_POST["$codeCountry"];
//echo $code.'--'.$langName.'<br>';
$table=$codeCountry.'leng';
if($textVordTest){
  $result2 = mysqli_query ($db,"INSERT INTO $table (code,textVord,codeInc,folderName) VALUES('$code','$textVordTest','$codeInc','$nameDirectory')");
  //echo $codeCountry."---yasssss---".$textVordTest."<br>";
       }
}
//$result2 = mysqli_query ($db,"INSERT INTO enleng (code,textVord,codeInc,folderName) VALUES('$code','$textVord','$codeInc','$nameDirectory')");
exit("<meta http-equiv='refresh' content='0; url= index.php'>");
?>
