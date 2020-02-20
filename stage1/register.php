<!DOCTYPE html>
	<html lang="en">
	<head>
        <meta charset="utf-8"> 
        <title> Как с помощью PHP и MySQL создать систему регистрации и авторизации пользователей</title>
        <link href="css/style.css" media="screen" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container mregister">
            <div id="login">
                <h1>Регистрация</h1>
                <form action="register.php" id="registerform" method="post"name="registerform">
                    <p><label for="username">Полное имя<br>
                    <input class="input" id="username" name="username"size="32"  type="text" value=""></label></p>
                    <p><label for="email">E-mail<br>
                    <input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
                    <p><label for="password">Имя пользователя<br>
                    <input class="input" id="password" name="password"size="20" type="text" value=""></label></p>
                    <p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
                </form>
            </div>
        </div>
    <footer>
        © 2014 <a href="!#">copyright</a>. Все права защищены.
    </footer>
    </body>
</html>