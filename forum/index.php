<?php
session_start();
include("login/connect.php");

if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $bericht = "Welkom $username";
    $posts = NULL;
    $func = "<br><a href='login/logout.php'> Uitloggen </a><br>
    <a href='system/create.php'> Maak een post </a><br>
    <a href='system/delete.php'> Delete een post </a><br>
    ";
}
else{
    $bericht = "U bent niet ingelogd";
    $func = "<a href='login/login.php'> Inloggen </a>";
    $posts = NULL;
}
$data = $handle->query("SELECT * FROM posts");
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
<center>
<body>
<h2> <?php echo $bericht ?> </h2>
<p> Posts: </p>
<table width="70%" border="1" cellpadding="5" cellspacing="5">
<tr>
    <th>Auteur</th>
    <th>Titel</th>
    <th>Inhoud</th>
    </tr>
<?php
foreach($data as $e){
    $auteur = htmlspecialchars($e["author"]);
    $titel = htmlspecialchars($e["post_title"]);
    $inhoud = htmlspecialchars($e["post_content"]);
    $p_id = $e["post_id"];
    echo "<tr>
    <td>$auteur</td>
    <td><a href='system/forum.php?post_id=$p_id'>$titel</a></td>
    <td>$inhoud</td>
    </tr>";
}
echo "</table>";
?>
<br>
<hr>
<br>

<?php echo $posts; ?>
    <?php echo $func; ?>

</center>
</body>
</html>