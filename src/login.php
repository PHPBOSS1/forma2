<?php
namespace MyProject;

session_start();
?>

<?php require_once("src/includes/connection.php"); ?>
<?php include("src/includes/header.php"); ?>
<?php

if(isset($_SESSION["session_username"])){
    header("Location: /intropage.php");
} else {}

if(isset($_POST["login"])){

    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);

    if(!empty($username) && !empty($password)) {

        $query =mysqli_query($con, "SELECT * FROM Users WHERE username = '".$username."' AND password='".$password."'");
        $numrows=mysqli_num_rows($query);

        if($numrows!=0){
            while($row=mysqli_fetch_assoc($query)){

                $dbusername=$row['username'];
                $dbpassword=$row['password'];
            }
            if($username == $dbusername && $password == $dbpassword) {

                $_SESSION['session_username']=$username;
                require('includes/redirect.php');
                exit();

            }
        } else {
            echo "Неверное имя пользователя или пароль!";
        }
    } else {
        $message = "Все поля обязательны для заполнения!";
    }
}
?>
