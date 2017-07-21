<html>
    <head>
    <title>Регистрация</title>
	    <script src="js/prefixfree.min.js"></script>
		<link href="css/style.css" type="text/css" rel="stylesheet"/>
    </head>
    <body id="reg">
    <h2>Регистрация</h2>
    <form action="save_user.php" method="post">
	<form action="save_user.php" method="post" enctype="multipart/form-data">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
<div class="form">
	<p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
<p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
<p>
              <label>Ваш E-mail    *:<br></label>
              <input name="email"    type="text" size="15" maxlength="100">
            </p>
          <!-- Вводим е-майл -->
<p>
              <label>Выберите аватар. Изображение должно быть формата jpg, gif или png:<br></label>
              <input type="FILE" name="fupload">
            </p>
<p>
    <input type="submit" name="submit" value="Зарегистрироваться">
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
</p>
<!-- В переменную fupload отправится изображение, которое    выбрал пользователь. -->
          <p>Введите    код с картинки *:<br>
<p><img    src="my_codegen.php"></p>
            <p><input    type="text" name="code"></p>
            <!-- В “code/my_codegen.php” генерируется    код и рисуется изображение -->
<p>
            <input    type="submit" name="submit" value="Зарегистрироваться">
			</div>
</form>
    </body>
    </html>
