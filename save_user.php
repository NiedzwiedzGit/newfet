
 <?php
          if (isset($_POST['login'])) {$login = $_POST['login'];    if ($login == ''){ unset($login);}} //заносим    введенный пользователем логин в переменную $login, если он пустой, то    уничтожаем переменную
          if    (isset($_POST['password'])) { $password=$_POST['password']; if ($password    =='') { unset($password);} }
          if    (isset($_POST['check_pass'])) { $check_pass=$_POST['check_pass']; if ($check_pass    =='') { unset($check_pass);} }
          //заносим введенный    пользователем пароль в переменную $password, если он пустой, то уничтожаем    переменную
          if (isset($_POST['code'])) {$code = $_POST['code']; if    ($code == '') {unset($code);} } //заносим    введенный пользователем защитный код в переменную $code, если он пустой, то    уничтожаем переменную
		      if (isset($_POST['email'])) {$email = strtolower($_POST['email']); if ($email == '') {unset($email);} } //заносим введений користувачем e-mail ш вереводим його в нижній регістр, якщо він пустий то знищуєм змінну
          if (empty($login) or empty($password)or empty($code) or empty($email))

            //добавим    переменную с e-mail адресом
            //если    пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем    скрипт
            {
            //exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!"); //останавливаем    выполнение сценариев
              exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=3'));  //як приклад як то можна органзувати
            }
            if    (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) //проверка    е-mail адреса регулярными выражениями на корректность
            {
              //exit    ("Неверно введен е-mail!");
                exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=12'));  //як приклад як то можна органзувати

            }
            if($password!=$check_pass){

                //exit    ("Не правильно підтверджений пароль");
                  exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=13'));  //як приклад як то можна органзувати

            }
          function generate_code() //запускаем    функцию, генерирующую код. Можно даже вывести ее в отдельный файл.
          {
              $hours = date("H"); // час
              $minuts = substr(date("H"), 0 ,    1);// минута
              $mouns = date("m");    // месяц
              $year_day = date("z"); // день в году
              $str = $hours . $minuts . $mouns .    $year_day; //создаем строку
              $str =    md5(md5($str)); //дважды шифруем в md5
                  $str =    strrev($str);// реверс строки
                  $str =    substr($str, 3, 6); // извлекаем 6 символов,    начиная с 3
                  // Вам конечно же можно постваить другие значения, так    как, если взломщики узнают, каким именно способом это все генерируется, то в    защите не будет смысла.
              $array_mix = preg_split('//',    $str, -1, PREG_SPLIT_NO_EMPTY);
              srand ((float)microtime()*1000000);
              shuffle ($array_mix);
                  //Тщательно перемешиваем, соль, сахар по вкусу!!!
              return implode("",    $array_mix);
          }
          function    chec_code($code) //проверяем код
          {
              $code = trim($code);//удаляем пробелы
              $array_mix = preg_split ('//',    generate_code(), -1, PREG_SPLIT_NO_EMPTY);
              $m_code = preg_split ('//', $code, -1,    PREG_SPLIT_NO_EMPTY);
              $result = array_intersect ($array_mix,    $m_code);
          if    (strlen(generate_code())!=strlen($code))
          { return    FALSE;}
          if    (sizeof($result) == sizeof($array_mix))
          {   return TRUE;}
          else
          {   return FALSE;}}
          // после сравнения проверяем,    пускать ли пользователя дальше или, он сделал ошибку, и остановить скрипт
          if    (!chec_code($_POST['code']))

          {
        //  exit ("Вы ввели неверно код с картинки"); //останавливаем выполнение сценариев
            exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=14'));  //як приклад як то можна органзувати

          }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);

	// аватарка і збереження користувача********************************************

//добавляем проверку на длину логина и пароля
            if    (strlen($login) < 3 or strlen($login) > 15) {
            //exit    ("Логин должен состоять не менее чем из 3 символов и не более чем из    15.");
            exit    (header('Location: http://localhost/newfet/errorMessage.php?errorNum=15'));  //як приклад як то можна органзувати

            }
            if    (strlen($password) < 3 or strlen($password) > 15) {
            //exit    ("Пароль должен состоять не менее чем из 3 символов и не более чем из    15.");
            exit    (header('Location: http://localhost/newfet/errorMessage.php?errorNum=16'));  //як приклад як то можна органзувати

            }

if    (!empty($_FILES['fupload'])) //проверяем, отправил    ли пользователь изображение
            {
            $fupload = $_FILES['fupload'];
			$fupload = trim($fupload);
              if ($fupload =='' or empty($fupload)) {
                                 unset($fupload);// если переменная $fupload пуста, то удаляем ее
                                                            }
            }
if    (!isset($fupload) or empty($fupload) or $fupload =='')
            {
            //если переменной не существует (пользователь не отправил    изображение),то присваиваем ему заранее приготовленную картинку с надписью    "нет аватара"
            $avatar    = "avatars/noavtats.jpg"; //можете    нарисовать net-avatara.jpg или взять в исходниках
            }
else
            {

            //иначе - загружаем изображение пользователя
            $path_to_90_directory    = 'avatars/';//папка,    куда будет загружаться начальная картинка и ее сжатая копия

            if(preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['fupload']['name']))//проверка формата исходного изображения
                      {
                               $filename =    $_FILES['fupload']['name'];
                               $source =    $_FILES['fupload']['tmp_name'];
                               $target =    $path_to_90_directory . $filename;
                               move_uploaded_file($source,    $target);//загрузка оригинала в папку $path_to_90_directory
         if(preg_match('/[.](GIF)|(gif)$/',    $filename)) {
                     $im    = imagecreatefromgif($path_to_90_directory.$filename) ; //если оригинал был в формате gif, то создаем    изображение в этом же формате. Необходимо для последующего сжатия
                     }
                     if(preg_match('/[.](PNG)|(png)$/',    $filename)) {
                     $im =    imagecreatefrompng($path_to_90_directory.$filename) ;//если    оригинал был в формате png, то создаем изображение в этом же формате.    Необходимо для последующего сжатия
                     }

                     if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/',    $filename)) {
                               $im =    imagecreatefromjpeg($path_to_90_directory.$filename); //если оригинал был в формате jpg, то создаем изображение в этом же    формате. Необходимо для последующего сжатия
                     }
//СОЗДАНИЕ КВАДРАТНОГО ИЗОБРАЖЕНИЯ И ЕГО ПОСЛЕДУЮЩЕЕ СЖАТИЕ    ВЗЯТО С САЙТА www.codenet.ru
// Создание квадрата 90x90
            // dest - результирующее изображение
            // w - ширина изображения
            // ratio - коэффициент пропорциональности
$w    = 90;  //    квадратная 90x90. Можно поставить и другой размер.
// создаём исходное изображение на основе
            // исходного файла и определяем его размеры
            $w_src    = imagesx($im); //вычисляем ширину
            $h_src    = imagesy($im); //вычисляем высоту изображения
                     // создаём    пустую квадратную картинку
                     // важно именно    truecolor!, иначе будем иметь 8-битный результат
                     $dest = imagecreatetruecolor($w,$w);
         //    вырезаем квадратную серединку по x, если фото горизонтальное
                     if    ($w_src>$h_src)
                     imagecopyresampled($dest, $im, 0, 0,
                                         round((max($w_src,$h_src)-min($w_src,$h_src))/2),
                                      0, $w, $w,    min($w_src,$h_src), min($w_src,$h_src));
         // вырезаем    квадратную верхушку по y,
                     // если фото    вертикальное (хотя можно тоже серединку)
                     if    ($w_src<$h_src)
                     imagecopyresampled($dest, $im, 0, 0,    0, 0, $w, $w,
                                      min($w_src,$h_src),    min($w_src,$h_src));
         // квадратная картинка    масштабируется без вырезок
                     if ($w_src==$h_src)
                     imagecopyresampled($dest,    $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);
$date=time();    //вычисляем время в настоящий момент.
            imagejpeg($dest,    $path_to_90_directory.$date.".jpg");//сохраняем    изображение формата jpg в нужную папку, именем будет текущее время. Сделано,    чтобы у аватаров не было одинаковых имен.
//почему именно jpg? Он занимает очень мало места + уничтожается    анимирование gif изображения, которое отвлекает пользователя. Не очень    приятно читать его комментарий, когда краем глаза замечаешь какое-то    движение.
$avatar    = $path_to_90_directory.$date.".jpg";//заносим в переменную путь до аватара.

$delfull    = $path_to_90_directory.$filename;
            unlink($delfull);//удаляем оригинал загруженного    изображения, он нам больше не нужен. Задачей было - получить миниатюру.
            }
            else
                     {
                                //в случае    несоответствия формата, выдаем соответствующее сообщение
                     //exit ("Аватар должен быть в    формате <strong>JPG,GIF или PNG</strong>");
                      exit    (  header('Location: http://localhost/newfet/errorMessage.php?errorNum=17'));  //як приклад як то можна органзувати

                             }
            //конец процесса загрузки и присвоения переменной $avatar адреса    загруженной авы
            }
$password    = md5($password);//шифруем пароль
$password    = strrev($password);// для надежности добавим реверс
$password    = $password."b3p6f";

            //можно добавить несколько своих символов по вкусу, например,    вписав "b3p6f". Если этот пароль будут взламывать методом подбора у    себя на сервере этой же md5,то явно ничего хорошего не выйдет. Но советую    ставить другие символы, можно в начале строки или в середине.
//При этом необходимо увеличить длину поля password в базе.    Зашифрованный пароль может получится гораздо большего размера.
// ********************************************
 // подключаемся к базе
    include ('bd.php');// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
 // проверка на существование пользователя с таким же логином
    $result = mysqli_query($db,"SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
  //  exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=18'));  //як приклад як то можна органзувати

    }

 // если такого нет, то сохраняем данные
$result3 = mysqli_query ($db,"INSERT INTO users (login,password,avatar,email,date) VALUES('$login','$password','$avatar','$email',NOW())");
// Проверяем, есть ли ошибки
if ($result3=='TRUE')
{

$result4 = mysqli_query ($db,"SELECT id FROM users WHERE login='$login'");//извлекаем идентификатор пользователя. Благодаря ему у нас и будет уникальный код активации, ведь двух одинаковых идентификаторов быть не может.
$myrow4 = mysqli_fetch_array($result4);
$activation = md5($myrow4['id']).md5($login);//код активации аккаунта. Зашифруем через функцию md5 идентификатор и логин. Такое сочетание пользователь вряд ли сможет подобрать вручную через адресную строку.

$subject = "Подтверждение регистрации";//тема сообщения
$message = "Здравствуйте! Спасибо за регистрацию на isproduct.com\nВаш логин: ".$login."\n
Перейдите по ссылке, чтобы активировать ваш аккаунт:\nhttp://localhost/newfet/activation.php?login=".$login."&code=".$activation."\nС уважением,\n
Администрация citename.ru";//содержание сообщение
$headers =  'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type:text/plane; Charset=windows-1251\r\n' . "\r\n";
mail($email, $subject, $message, $headers);//отправляем сообщение

echo "Вам на E-mail выслано письмо с cсылкой, для подтверждения регистрации. Внимание! Ссылка действительна 1 час. <a href='index.php'>Главная страница</a>"; //говорим о отправленном письме пользователю
}

else {
//exit ("Ошибка! Вы не зарегистрированы."); //останавливаем выполнение сценариев
  exit    ( header('Location: http://localhost/newfet/errorMessage.php?errorNum=19'));  //як приклад як то можна органзувати

     }
?>
