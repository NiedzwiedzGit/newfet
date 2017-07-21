<!DOCTYPE html>
<?php
include    ("bd.php");
switch ($_GET['errorNum']) {
  case '1':
    $massege=Dict::_('H_errors1');
    break;
    case '2':
      $massege=Dict::_('H_errors2');
      break;
      case '3':
        $massege=Dict::_('H_errors3');
        break;
        case '4':
          $massege=Dict::_('H_errors4');
          break;
          case '5':
            $massege=Dict::_('H_errors5');
            break;
            case '6':
              $massege=Dict::_('H_errors6');
              break;
              case '7':
                $massege=Dict::_('H_errors7');
                break;
                case '8':
                  $massege=Dict::_('H_errors8');
                  break;
  case '9':
    $massege=Dict::_('H_errors9');
    break;
    case '10':
      $massege=Dict::_('H_errors10');
      break;
      case '11':
        $massege=Dict::_('H_errors11');
        break;
        case '12':
          $massege=Dict::_('H_errors12');
          break;
          case '13':
            $massege=Dict::_('H_errors13');
            break;
            case '14':
              $massege=Dict::_('H_errors14');
              break;
              case '15':
                $massege=Dict::_('H_errors15');
                break;
                case '16':
                  $massege=Dict::_('H_errors16');
                  break;
  case '17':
    $massege=Dict::_('H_errors17');
    break;
    case '18':
      $massege=Dict::_('H_errors18');
      break;
      case '19':
        $massege=Dict::_('H_errors19');
        break;
        case '20':
          $massege=Dict::_('H_errors20');
          break;
  default:
    # code...
    break;
}
 ?>
<html >
  <head>
    <title="Dict::_('H_up10')"></title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/prefixfree.min.js"></script>
        <script src="js/loginWithPicture.js"></script>
        <script src="js/mobile_menu.js"></script>
          <script src="js/middle.js"></script>

          <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
         <script type="text/javascript" src="jquery.disable.text.select.js"></script>

		<link href="css/errorMessage.css" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400" rel="stylesheet">
<base href="http://localhost/IS_webpage2/newfet/">

  </head>
   <body>

     <script>
     function goBack() {
         window.history.back();
     }
     $(function() {
$('#wraper').disableTextSelect(); // and enableTextSelect() to re-enable it again
});
     </script>

<div id="wraper">
   <div id="massageDiv">
  <h2  data-silver="<?=$massege;?>"><?=$massege;?></h2>
   </div>
   <h2 id="line" data-gold="........................">........................</h2>
   <a id="goBack"  onclick="goBack()"><h2 data-gold="back">back</h2></a>
   <a id="goMain" href="index.php"><h2 data-gold="main page">main page</h2></a>
</div>
   </body>
</html >
