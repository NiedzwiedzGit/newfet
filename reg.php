<html>
    <head>
    <title>Registration</title>
	         <script src="js/prefixfree.min.js"></script>


		<link href="css/style.css" type="text/css" rel="stylesheet"/>
    </head>
    <body id="reg">
	<form id="msform" action="save_user.php" method="post" enctype="multipart/form-data">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
    <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>

  <fieldset>
   <h2 class="fs-title">Create your account</h2>
   <h3 class="fs-subtitle">This is step 1</h3>
   <input type="text" name="login" placeholder="Login" size="15" maxlength="15"/>
   <input name="email" type="text" size="15" maxlength="100" placeholder="Email" />
   <input name="password" type="password" size="15" maxlength="15"  placeholder="Password" />
   <input type="password" name="check_pass" placeholder="Confirm Password" />
   <img src="my_codegen.php"><br>
   <input type="text" name="code">
   <input type="button" name="next" class="next action-button" value="Next" />
 </fieldset>
 <fieldset>
    <h2 class="fs-title">Social Profiles</h2>
    <h3 class="fs-subtitle">Your presence on the social network</h3>
    <input type="text" name="twitter" placeholder="Twitter" />
    <input type="text" name="facebook" placeholder="Facebook" />
    <input type="text" name="gplus" placeholder="Google Plus" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" />
    <input type="text" name="lname" placeholder="Last Name" />
    <input type="text" name="phone" placeholder="Phone" />
    <textarea name="address" placeholder="Address"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input    type="submit" name="submit" class="action-button" value="Register" />
  </fieldset>

         </form>
         <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
         <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
         <script src="js/registration.js"></script>
    </body>
    </html>
