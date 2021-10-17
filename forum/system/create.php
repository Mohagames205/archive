<?php
session_start();
include("../login/connect.php");
if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $bericht = "Welkom $username";
}
else{
    header("location:../index.php");
}

if(isset($_POST["pc"])){
    if(empty($_POST["titel"] OR $_POST["inhoud"])){
        echo "Gelieve alle velden in te vullen";
    }
    else{
        $pt = $_POST['titel'];
        $pi = $_POST['inhoud'];
        $stmt = $handle->prepare("INSERT INTO posts values(post_id, :post_title, :post_content, :author)");
		$stmt->execute(["post_title" => $pt, "post_content" => $pi, "author" => $username]);
        header("location:../index.php");
        //hier de query
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <form method='post'>
    <p>Titel: <input type='text' name='titel'></p>
    <p>Inhoud: <input type='text' name='inhoud'></p>
    <input type='submit' name='pc'>
    </form>
    <br>
    <br>
    <hr>
    <a href='../index.php'> Home </a>
</body>
</html>