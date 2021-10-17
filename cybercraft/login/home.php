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

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
   <meta charset="UTF-8">
   <backup> <iput type="button" value="Uitloggen" onclick="window.location.href='logout.php?logout'" /> </backup>
<title> CC - Paneel </title>
</head>
<body>
<div class='all'>
<div class='hoofd'>
<h1 align='center'> CyberCraft - Paneel </h1>
<p> Welkom <?php echo $userRow['username']; ?> </p>
<p> CyberCity maakt gebruik van SmartPlots ©, dit betekent dat alle plots hier komen te staan. </p>
<p> <b> Alles word nog ingesteld! </b> </p>
<?php echo "<p> Er zijn $ATPlots bezet in CyberCity</p>"; ?>
<p> Uw rank is </p> <?php echo $$userRow['username']; ?>
<br>
<p> Uw aantal geld is </p><?php echo ${"m" . $userRow['username']}; ?>
<p> U hebt <?php echo ${"w" . $userRow['username']}; ?> Waarschuwingen! </p>
<h3> Leer meer over waarschuwingen door HIER te drukken </h3>
</div>

<div class='knop'>
<input type="button" value="Uitloggen" onclick="window.location.href='logout.php?logout'" />
</div>
 </div>
</body>
</html>


