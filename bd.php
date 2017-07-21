<?php
$db = mysqli_connect("localhost","root","42091i","is_db");
   include_once 'registration/facebook.php';
   require_once("classes/dict.php");

    //mysqli_select_db ("is_db",$db);

if(isset($_GET['lang'])){
  $_SESSION['lang']=trim(strip_tags($_GET['lang']));
  $date=time()+30*24*60*60;
  setcookie('lang',trim(strip_tags($_GET['lang'])),$date);
}
else if($_COOKIE['lang']){
  $_SESSION['lang']=$_COOKIE['lang'];
}
else{
  $_SESSION['lang']='en';
}
$dict= include 'language/'.$_SESSION['lang'].'.php';

if(isset($_GET['sn'])){
  $_SESSION['sn']=$_GET['sn'];
 //include_once 'registration/'.$_SESSION['sn'].'.php';
//  sleep(1);
 if($_SESSION['sn']=='facebook'){
   //$_SESSION['sn']=null;
 echo("<script>location.href='registration/facebook.php'</script>");

  }
  else if($_SESSION['sn']=='google'){
  echo("<script>location.href='registration/facebook.php'</script>");
   }
}
  else {
    $_SESSION['sn']=null;
  }
/*if(isset($_SESSION['sn'])){
  return 0;
echo 'heloo';
}else{*/


//echo("<script>location.href='$facebook'</script>");


//echo "<html><head><meta    http-equiv='Refresh' content='0;    URL='$'sn'></head></html>";*/



 ?>
