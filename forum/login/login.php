<?php
include("connect.php");
session_start();
if(isset($_POST["login"])){
    if(empty($_POST["username"]) OR empty($_POST["password"])){
        echo "Alle velden invullen!";
    }
    else{
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $handle->prepare($query);
        $statement->execute(
            array(
                'username' => $_POST["username"],
                'password' => $_POST["password"]
            )
            );
            $count = $statement->rowCount();
            if ($count > 0){
                $_SESSION["username"] = $_POST["username"];
                header("location:../index.php");
            }
            else{
                echo "foute gegevens";
            }
            }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
	<p> De username en het wachtwoord voor het testaccount zijn <b>test</b> </p>
 <form method="post">
 <p>Username<input type="text" name="username"></p>
 <p>Password<input type="password" name="password"></p>
<input type="submit" name="login"> 
</body>
</html>