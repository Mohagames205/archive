<?php

if(isset($_POST["form"])){
    $user = $_POST["user"];
    if(strtolower($user) == "bram#3630"){
        echo "<h2>The HASHED ip is: <b>189.486.45.5</b></h2>";
    }
    elseif(strtolower($user) == "mikail#7605"){
        echo "<h2>The HASHED ip is: <b>189.486.45.5</b></h2>";
    }
    else{
        $getal1 = rand(1,999);
        $getal2 = rand(1,999);
        $getal3 = rand(1,999);
        $getal4 = rand(1,999);
        $ip = $getal1 . '.' . $getal2 . '.' . $getal3 . '.' . $getal4;
        echo "<h2>The HASHED ip is:  <b>" . $ip . "</b></h2>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DiscordTool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <form method="POST">
    <input type="text" name="user" placeholder="user">
    <input type="submit" name="form">
    </form>
</body>
</html>