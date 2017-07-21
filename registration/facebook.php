
<?php
  session_start();

############################################################################
#            ███  ████  ████  ███  ████   ████  ████  █  █                 #
#            █    █  █  █  █  █    █  ██  █  █  █  █  █ █                  #
#            ███  ████  █     ███  ████   █  █  █  █  ██                   #
#            █    █  █  █  █  █    █  ██  █  █  █  █  █ █                  #
#            █    █  █  ████  ███  ████   ████  ████  █  █                 #

 if($_SESSION['sn']=='facebook'){
//Реєестрація через фейсбук
$client_id = '532412186952096'; // Client ID
$client_secret = '49ab44ba02ad824829557eee7e50ac71'; // Client secret
$redirect_uri = 'http://localhost/newfet/'; // Redirect URIs

$url = 'https://www.facebook.com/dialog/oauth';

$params = array(
    'client_id'     => $client_id,
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'scope'         => 'email,user_birthday'
);
//echo 'heloo before from face';
 $facebook = ''. $url . '?' . urldecode(http_build_query($params)) .'';
 $network='Facebook';
//echo("<script>location.href='$facebook'</script>");   //redirect with mix of php and js
header("Location:$facebook");//cleen php redirect

if (isset($_GET['code'])) {
  echo 'heloo from face IF';

    $result = false;
    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'client_secret' => $client_secret,
        'code'          => $_GET['code']
    );

    $url = 'https://graph.facebook.com/oauth/access_token';

    $tokenInfo = null;
    parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);

    if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
        $params = array('access_token' => $tokenInfo['access_token']);

        $userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?fields=email,name,link,gender,birthday&'. urldecode(http_build_query($params))), true);

        if (isset($userInfo['id'])) {
            $userInfo = $userInfo;
            $result = true;
            //  $_SESSION['id'] = $userInfo['id'];//!! не перевірене якшо шо то можна стерти

        }
    }

    if ($result) {

      /*  echo "Социальный ID пользователя: " . $userInfo['id'] . '<br />';
        echo "Имя пользователя: " . $userInfo['name'] . '<br />';
        echo "Email: " . $userInfo['email'] . '<br />';
        echo "Ссылка на профиль пользователя: " . $userInfo['link'] . '<br />';
        echo "Пол пользователя: " . $userInfo['gender'] . '<br />';
        echo "ДР: " . $userInfo['birthday'] . '<br />';
        echo '<img src="http://graph.facebook.com/' . $userInfo['id'] . '/picture?type=large" />'; echo "<br />";*/

        $_SESSION['avatar']='http://graph.facebook.com/' . $userInfo['id'] . '/picture?type=large';

        $email_users=mysqli_query($db,"SELECT email FROM users_sn WHERE email='$userInfo[email]'");
        $myEmail = mysqli_fetch_array($email_users);

        if($myEmail['email']!=$userInfo['email']){
        mysqli_query ($db,"INSERT INTO users_sn (id_sn,login,email,link_sn,gender)
                      VALUES('$userInfo[id]','$userInfo[name]','$userInfo[email]','$userInfo[link]','$userInfo[gender]')");
}else{
    echo "такий користувач вже існує" ;
}
        }

      /* $result = mysqli_query($db,"SELECT * FROM users_sn WHERE login='$userInfo[name]'"); //извлекаем из базы все данные о пользователе с    введенным логином и паролем\
         //мы    дописали «AND activation='1'», то есть пользователь будет искаться только среди активированных.    Желательно добавить это условие к другим подобным проверкам данных    пользователя
                    $myrow= mysqli_fetch_array($result);*/
                    //if(){}
                    include_once 'paste.php';//файл який визначає чи є споріднені акаунти,
                                              //тобто чи це та сама людина заходить з іншого джерела

    }
  }

  #            ███  ████  ████  ███  ████   ████  ████  █  █                 #
  #            █    █  █  █  █  █    █  ██  █  █  █  █  █ █                  #
  #            ███  ████  █     ███  ████   █  █  █  █  ██                   #
  #            █    █  █  █  █  █    █  ██  █  █  █  █  █ █                  #
  #            █    █  █  ████  ███  ████   ████  ████  █  █                 #
  ############################################################################

 //////////////////////////////////////////////////////////////////////////////

  ############################################################################
  #                     ████  ████  ████  ████  █    ███                     #
  #                     █     █  █  █  █  █     █    █                       #
  #                     █ ██  █  █  █  █  █ ██  █    ███                     #
  #                     █  █  █  █  █  █  █  █  █    █                       #
  #                     ████  ████  ████  ████  ███  ███                     #
  else if($_SESSION['sn']=='google'){
    $client_id = '897813812940-22u6tmhqa836uhhu5v9cg0s1nrqggfom.apps.googleusercontent.com'; // Client ID
    $client_secret = 'gPZKMkvlr2tDLl8ZpSTFgci3'; // Client secret
    $redirect_uri = 'http://localhost/newfet/'; // Redirect URIs C:\Server\data\htdocs\IS_webpage2\newfet\registration\google.php

    $url = 'https://accounts.google.com/o/oauth2/auth';

    $params = array(
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code',
        'client_id'     => $client_id,
        'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
    );

     $google = '' . $url . '?' . urldecode(http_build_query($params)) .'';
 $network='Google';
  /*   echo $google = '
     <!DOCTYPE html>
     <html >
       <head>
         <meta charset="UTF-8">
     	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>'.$network.' registration</title>
     		<link href="css/style.css" type="text/css" rel="stylesheet"/>
     <base href="http://localhost/IS_webpage2/newfet/">
       </head>
       <body>
         <div id="sn_reg">
        <a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Google</a></p>
        </div>
     </body>
     </html>';
    //header("Location:$google");*/
header("Location:$google");
     //for($i=0;$i<=1;$i++){
    //echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=$google'></head></html>";
    //}

    if (isset($_GET['code'])) {
        $result = false;

        $params = array(
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri'  => $redirect_uri,
            'grant_type'    => 'authorization_code',
            'code'          => $_GET['code']
        );

        $url = 'https://accounts.google.com/o/oauth2/token';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        curl_close($curl);
        $tokenInfo = json_decode($result, true);

        if (isset($tokenInfo['access_token'])) {
            $params['access_token'] = $tokenInfo['access_token'];

            $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
            if (isset($userInfo['id'])) {
                $userInfo = $userInfo;
                $result = true;
                  $_SESSION['id'] = $userInfo['id'];//!! не перевірене якшо шо то можна стерти
            }
        }

        if ($result) {
          /*  echo "Социальный ID пользователя: " . $userInfo['id'] . '<br />';
            echo "Имя пользователя: " . $userInfo['name'] . '<br />';
            echo "Email: " . $userInfo['email'] . '<br />';
            echo "Ссылка на профиль пользователя: " . $userInfo['link'] . '<br />';
            echo "Пол пользователя: " . $userInfo['gender'] . '<br />';
            echo '<img src="' . $userInfo['picture'] . '" />'; echo "<br />";*/
            $_SESSION['avatar']=$userInfo['picture'];

        /*    include('classSimpleImage.php');
      $image = new SimpleImage();
      $image->load('$_SESSION[avatar]');
      $image->resize(400, 200);
    //  $image->save('image1.jpg');*/

              $url = 'https://accounts.google.com/o/oauth2/auth';
            echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>"; //redirect to home page
            $beginOfGid=mb_substr($userInfo['id'], 0, 2, 'UTF-8'); //вибираю перші 2 числа(початок) користувацького id
            echo "начало пользователя: " . $beginOfGid . '<br />';
            $userInfo['id'] = mb_substr($userInfo['id'], 2, 21, 'UTF-8'); //приходиться різати бо має довжину в 21 знаки а Bigint вміщає в себе тільки 20

            $email_users=mysqli_query($db,"SELECT email FROM users_sn WHERE email='$userInfo[email]'");
            $myEmail = mysqli_fetch_array($email_users);
            if (!empty($_SESSION['id']))
                      {echo "оп цаца";}
            if($myEmail['email']!=$userInfo['email']){
              mysqli_query ($db,"INSERT INTO users_sn (id_sn,login,email,link_sn,gender)
                            VALUES('$userInfo[id]','$userInfo[name]','$userInfo[email]','$userInfo[link]','$userInfo[gender]')");
        echo "не працює" . $userInfo['name'] . '<br />';
    }else{
        echo "такий користувач вже існує" ;
    }
        }
      /*  $result = mysqli_query($db,"SELECT * FROM users_sn WHERE login='$userInfo[name]'"); //извлекаем из базы все данные о пользователе с    введенным логином и паролем\
         //мы    дописали «AND activation='1'», то есть пользователь будет искаться только среди активированных.    Желательно добавить это условие к другим подобным проверкам данных    пользователя
                    $myrow= mysqli_fetch_array($result);
        if (empty($myrow['id']))
        {
          echo "ну і шо далі";
        }else{
          $_SESSION['login']=$userInfo['name'];
            $_SESSION['beginOfGid']=$beginOfGid;
          $_SESSION['link']=$userInfo['link'];
          //$_SESSION['id']=$userInfo['id'];
          echo $_SESSION['login'];
        }*/
        include_once 'paste.php';//файл який визначає чи є споріднені акаунти,
                                  //тобто чи це та сама людина заходить з іншого джерела

    }
  }


  #                             ███  █  █  ████
  #                             █    ██ █  █  ██
  #                             ███  █ ██  █  ██
  #                             █    █  █  █  ██
  #                             ███  █  █  ████
  #                     ████  ████  ████  ████  █    ███                     #
  #                     █     █  █  █  █  █     █    █                       #
  #                     █ ██  █  █  █  █  █ ██  █    ███                     #
  #                     █  █  █  █  █  █  █  █  █    █                       #
  #                     ████  ████  ████  ████  ███  ███                     #
  ############################################################################

  //  header("Location:$facebook");
   //echo("<script>location.href='$facebook'</script>");
//echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>";
 ?>
