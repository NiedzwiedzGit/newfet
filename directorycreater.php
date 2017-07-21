<?PHP
$foldername = iconv ( "UTF-8", "CP1251", $_POST["dir"] ) ;
mkdir("gallery/".$foldername,0777,true);
exit("<meta http-equiv='refresh' content='0; url= index.php'>");
?>
