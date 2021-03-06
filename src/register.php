<?php
namespace MyProject;

require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<?php
if(isset($_POST["src/register"])){

    $full_name= htmlspecialchars($_POST['full_name']);
    $email=htmlspecialchars($_POST['email']);
    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);

    if(!empty($full_name) && !empty($email) && !empty($username) && !empty($password)) {


        $query=mysqli_query($con, "SELECT * FROM Users WHERE username = '".$username."'");

        $numrows=mysqli_num_rows($query);

        if($numrows==0) {

            $sql="INSERT INTO Users (full_name, email, username, password) VALUES ('$full_name','$email', '$username', '$password')";

            $result=mysqli_query($con, $sql);

            if($result){
                $message = "Аккаунт успешно создан!";
            } else {
                $message = "Ощибка доступа к базе данных";
            }
        } else {
            $message = "Имя пользователя уже занято!";
        }

    } else {

        $message = "Все поля обязательны для заполнения!";

    }
}
?>
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
        <form action="register.php" id="registerform" method="post" name="registerform">
            <p><label for="user_login">Полное имя<br>
                    <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
            <p><label for="user_pass">Имя пользователя<br>
                    <input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
            <p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
            <p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя пользователя</a>!</p>
        </form>
    </div>
</div>
<footer>
Сделано программистом
</footer>
</body>
</html>

