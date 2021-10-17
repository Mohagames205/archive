<?php
include("connect.php");
session_start();

if(isset($_SESSION["username"])){
	header("location:cr/home.php");
}

if(isset($_POST["login"])){
    if(empty($_POST["username"]) OR empty($_POST["password"])){
        echo "Alle velden invullen!";
    }
    else{
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $handle->prepare($query);
        $statement->execute(
            array(
                'username' => htmlspecialchars($_POST["username"]),
                'password' => htmlspecialchars($_POST["password"])
            )
            );
            $count = $statement->rowCount();
            if ($count > 0){
                $gn = $handle->prepare("SELECT username FROM users WHERE username = :username");
                $gn->execute(["username" => $_POST["username"]]);
                $username = $gn->fetch(PDO::FETCH_ASSOC);
                $username = $username["username"];
                $_SESSION["username"] = $username; 
                header("location:cr/home.php");
            }
            else{
                $tag = "Foute gegevens!";
            }
            }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Inlog pagina om toegang te krijgen tot het staffpaneel">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <title>CakeRanking</title>

    <!-- Custom styles for this template -->
    <link href="style/login.css" rel="stylesheet">
    <style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(/staff/cr/cr/loader.gif) center no-repeat #fff;
}
</style>
<script>
$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
</head> 

<body>

<div class="se-pre-con"></div>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    
    <h2 class="active"> Sign In </h2>

    <!-- Icon -->
    <div class="fadeIn first">
    
      <img src="foto/up.svg" id="icon" alt="User Icon" />
    </div>
            <?php 
        if(!isset($tag)){
            $tag = NULL;
        }
        echo "<p style='color: red'>$tag </p>"; ?>

    <!-- Login Form -->
    <form method="POST">
      <input type="text" name="username" id="login" class="fadeIn second"  placeholder="login">
      <input type="password" name="password" id="password" class="fadeIn third" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <p class="underlineHover"> © CakeCraft 2018-2019 </p>
    </div>

  </div>
</div>
  </body>
</html>
