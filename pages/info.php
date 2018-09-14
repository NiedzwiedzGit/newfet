<!DOCTYPE html>
<?php
include "../headerNew.php";
 ?>
 <html>
   <head>
     <meta charset="UTF-8">
     <link rel="shortcut icon" href="../images/logo.png">
     <title>IS Product</title>
 	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <script src="js/prefixfree.min.js"></script>
         <script src="js/mobile_menu.js"></script>
         <script src="js/jquery-scrollto.js"></script>
         <script src="js/fluensScroll.js"></script>
         
         

 		 <link href="css/style.css" type="text/css" rel="stylesheet"/>
     <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <link href="css/info.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
    #AboutUs{
    /*  position: absolute;*/
      color: white;
    }
    </style>
   </head>
   <body>

<?php
error_reporting( E_ERROR );
if (!empty($_SESSION['login']) and !empty($_SESSION['password']))  //якшо виконана класична реєстрація
{
$result = mysqli_query($db,"SELECT email,login FROM users WHERE login='$login' AND password='$password'");
  $value = mysqli_fetch_array($result);
  $e_mail="";
  $name='';

  $e_mail2="E-mail";  //Запасні лейбли на випадок коли зайшли через реєстрацію
  $name2='Name';      //Запасні лейбли на випадок коли зайшли через реєстрацію
}else if(!empty($_SESSION['login']) || !empty($_SESSION['link'])){  //якшо виконана реєстрація через соціальну мережу
   //if($impotr=="yes"){
  $result= mysqli_query($db,"SELECT email,login FROM users_sn WHERE login='$_SESSION[login]'");
    $value = mysqli_fetch_array($result);
    $e_mail="";
    $name='';

    $e_mail2="E-mail";  //Запасні лейбли на випадок коли зайшли через реєстрацію
    $name2='Name';      //Запасні лейбли на випадок коли зайшли через реєстрацію
}else{
  $value[email]="";
  $value[login]="";
  $e_mail="E-mail";
  $name='Name';
  $e_mail2="";  //Запасні лейбли на випадок коли зайшли через реєстрацію
  $name2='';      //Запасні лейбли на випадок коли зайшли через реєстрацію
}
$AboutUsFile=file_get_contents('../language/AboutUsLang/aboutUs_'.$_SESSION['lang'].'.php');
if($_GET['info']=='AboutUs'){
            print    <<<HERE
   <div id="AboutUs">
$AboutUsFile
</div>
HERE;
}
else if($_GET['info']=='services'){
            print    <<<HERE
<div id="services">
      $AboutUsFile
</div>
HERE;
}
else if($_GET['info']=='ContactUs'){
            print    <<<HERE
            <script>
            if($('input:text').length===0){}else{}
            </script>
<div id="ContactUs">
<section class="get-in-touch">
 <h1 class="title">Get in touch</h1>
 <form class="contact-form row"  action="sendContactMail.php" method="post" enctype="multipart/form-data">
    <div class="form-field col x-50">
    <label class="label2" name="enteredEmail">$name2</label>
       <input id="name" class="input-text js-input" name="name" type="text" value="$value[login]" required>
       <label class="label" name="name">$name</label>
    </div>
    <div class="form-field col x-50">
       <label class="label2" name="enteredEmail">$e_mail2</label>
       <input id="email" class="input-text js-input" name="enteredEmail" type="email" value="$value[email]" required>
       <label class="label" name="enteredEmail">$e_mail</label>
    </div>
    <div class="form-field col x-100">
      <textarea  rows="10" cols="20" id="message" class="input-text js-input" name="message" type="text" required ></textarea>
       <label class="label_message" name="message" maxlength="255">Message</label>
    </div>
    <div class="form-field col x-100 align-center">
       <input class="submit-btn" type="submit"  value="Submit">
    </div>
 </form>
</section>
</div>
<div id="content">
</div>
<script src="js/ContactUs.js"></script>
HERE;
}?><script src="js/headerNew.js"></script></body></html>
