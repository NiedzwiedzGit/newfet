<?php
if(empty($_GET['curPage'])) //шоб не сварилось на те що не існує змінної
  {
    $_GET['curPage']=null;
  }
else{
switch ($_GET['curPage']) {
    case 'allUsers':
        clean();
        $_GET['curPage']="all_users.php";
        $_SESSION['curPage']=$_GET['curPage'];
      //  echo "tyt";
        break;
    case 'userPage':
        clean();
        $_GET['curPage']="page.php?id=$myrow2[id]";
        $_SESSION['curPage']=$_GET['curPage'];
        break;
 }
}


function clean(){                        //функція яка вичищає сесійну змінну
if (!empty($_SESSION['curPage'])){
  unset($_SESSION['curPage']);
  //echo "exist";
  }
}

$symbol="?";      //змінна яка дозволяє сполучати різні типи даних динамічно
if(isset($_GET['id'])=="$myrow2[id]"){  $symbol="&";}

 ?>
