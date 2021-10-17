<html>
<head>
<title> Mederwerkers - Paneel </title>
<?php
session_start();
include_once 'dbconnect.php';
include_once 'config.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$DBcon->close();
$userRow=$query->fetch_array();
error_reporting(0);
?>
<body>
<form method="post" action="" >
    <p> Naam </p> <input type="text" name="username" />
    <p> Punten </p> <input type="int" name="points"/>
    <button type="submit" name="submit">Geef Punten</button>
</form>

<?php 
     if(isset($POST['submit'])){
           if(!isset($POST['username'])){
                 //Geen gebruikersnaam ingevuld
           }else if (!isset($POST['points'])){
                 //Geen punten ingevuld
           }else {
                 $username = mysqli_real_escape_string($DBcon, $_POST['username']);
$points= mysqli_real_escape_string($DBcon, $_POST['points']);
                //Geef de punten
                    $query = "UPDATE users SET points += '".$points." WHERE username = '".$username."'";
                   mysqli_query($DBcon, $query)or die(mysql_error());
           }
     }
?>

</body>
</html>