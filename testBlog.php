
<?php
header("Location: ". $_GET['next_script'].'?name'=$_POST['name']);
$file = file_get_contents('json/blog.json');  // Открыть файл data.json

$taskList = json_decode($file,TRUE);        // Декодировать в массив

unset($file);                               // Очистить переменную $file
$name=$_POST["name"];
$title=$_POST["title"];
$taskList[] = array('name'=>$name,
                    'title'=>$title);        // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной'

file_put_contents('json/blog.json',json_encode($taskList));  // Перекодировать в формат и записать в файл.

unset($taskList);

//echo $name;
//  exit    ( header('Location: http://localhost/newfet/blog.php'));  //як приклад як то можна органзувати
 ?>
