<?php
session_start();
include_once 'dbconnect.php';
include_once 'config.php';


if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <meta charset="UTF-8">
   <backup> <iput type="button" value="Uitloggen" onclick="window.location.href='logout.php?logout'" /> </backup>
<title> CC - Paneel </title>
</head>
<body>
<div class='all'>


  <div class="hoofd">
  <div class="alert alert-info">
    <strong>Info!</strong> Welkom! Het paneel is in <a href="#" class="alert-link">Onderhoud!</a>.
  </div>
<div class='naam'>
<h1> Welkom <?php echo $userRow['username']; ?> </h1>
</div>
<div class="knop">
  <a align="center" href="logout.php?logout" class="btn btn-default" role="button">uitloggen</a>
</div>
</div>
 </div>
<br>
<div class="panel panel-default">
  <div class="panel-heading">Tokens</div>
  <div class="panel-body">U hebt <?php echo $userRow['points'] ?> tokens </div>
 
</body>
</html>