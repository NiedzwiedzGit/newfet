
<?php
  session_start();
$client_id = '897813812940-22u6tmhqa836uhhu5v9cg0s1nrqggfom.apps.googleusercontent.com'; // Client ID
$client_secret = 'gPZKMkvlr2tDLl8ZpSTFgci3'; // Client secret
$redirect_uri = 'http://localhost/IS_webpage2/newfet/'; // Redirect URIs C:\Server\data\htdocs\IS_webpage2\newfet\registration\google.php

$url = 'https://accounts.google.com/o/oauth2/auth';

$params = array(
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'client_id'     => $client_id,
    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
);

 $google = '' . $url . '?' . urldecode(http_build_query($params)) .'';

echo $google = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Google</a></p>';

//header("Location:$google");

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
        if (isset($userInfo['id'])) {епти
            $userInfo = $userInfo;
            $result = true;
              $_SESSION['id'] = $userInfo['id'];//!! не перевірене якшо шо то можна стерти
        }
    }

    if ($result) {
        echo "Социальный ID пользователя: " . $userInfo['id'] . '<br />';
        echo "Имя пользователя: " . $userInfo['name'] . '<br />';
        echo "Email: " . $userInfo['email'] . '<br />';
        echo "Ссылка на профиль пользователя: " . $userInfo['link'] . '<br />';
        echo "Пол пользователя: " . $userInfo['gender'] . '<br />';
        echo '<img src="' . $userInfo['picture'] . '" />'; echo "<br />";
      //$_SESSION['avatar']='http://graph.facebook.com/' . $userInfo['id'] . '/picture?type=large';

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
    $result = mysqli_query($db,"SELECT * FROM users_sn WHERE login='$userInfo[name]'"); //извлекаем из базы все данные о пользователе с    введенным логином и паролем\
     //мы    дописали «AND activation='1'», то есть пользователь будет искаться только среди активированных.    Желательно добавить это условие к другим подобным проверкам данных    пользователя
                $myrow= mysqli_fetch_array($result);
    if (empty($myrow['id']))
    {
      echo "ну і шо далі";
    }else{
      $_SESSION['login']=$userInfo['name'];
        $_SESSION['beginOfGid']=$beginOfGid;
      //$_SESSION['id']=$userInfo['id'];
      echo $_SESSION['login'];
    }

}

?>
