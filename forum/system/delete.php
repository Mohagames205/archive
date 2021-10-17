<?php
session_start();
include("../login/connect.php");
if(isset($_POST["delete"])){
    //$id = $_POST['delete'];
    //$del = $handle->prepare("DELETE FROM posts WHERE post_id = :id");
    //$del->execute(['id' => $id]);
    //$delprocess->execute(["id" => $ide]);
	echo "<script> Deze functie is uitgeschakeld! </script>";

}
if(isset($_SESSION["username"])){
    $gebruikersnaam = $_SESSION["username"];
    $zoek_post = $handle->prepare("SELECT * FROM posts WHERE author = :gebruikersnaam");
    $zoek_post->execute(['gebruikersnaam' => $gebruikersnaam]);
    //$geg = $zoek_post->fetch(PDO::FETCH_ASSOC);

   
?>
<html>
<head>
</head>
<body>
<table width="70%" border="1" cellpadding="5" cellspacing="4">
	<thead>
<tr>
    <th>Post ID</th>
    <th>Titel</th>
    <th>Inhoud</th>
	<th>Delete</th>
    </tr>
	</thead>
	<tbody>
    <?php

foreach($zoek_post as $e){
    $ide = htmlspecialchars($e["post_id"]);
    $titel = htmlspecialchars($e["post_title"]);
    $inhoud = htmlspecialchars($e["post_content"]);
    echo "<tr>
    <td>$ide</td>
    <td>$titel</td>
    <td>$inhoud</td>"
    ?>
    <td> <form method='post' name='deleteuser'>
	<button name="delete" type="submit" value=<?= $e["post_id"] ?> > Delete </button>
	</tbody>
    </form></td>
    </tr>
    <?php
    
}
echo "</table>";
echo "<br>
<br>
<hr>";
echo "<a href='../index.php'> Home </a>";
}
else{
    header("location:../index.php");
}

?>  
</body>
</html>