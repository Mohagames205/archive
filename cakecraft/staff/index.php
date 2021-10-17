<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("connect.php");

if(isset($_POST["sollicitatie"])){
  if(isset($_POST["rank"]) && isset($_POST["naam"]) && isset($_POST["gd"]) && isset($_POST["discord"]) && isset($_POST["mot"])){
      $rank = htmlspecialchars($_POST["rank"]);
      $naam = htmlspecialchars($_POST["naam"]);
      $geboorte = htmlspecialchars($_POST["gd"]);
      $discord = htmlspecialchars($_POST["discord"]);
      $motivatie = htmlspecialchars($_POST["mot"]);
      $ip = $_SERVER['REMOTE_ADDR'];
      $datum = date("Y-m-d");
      $verstuur = $handle->prepare("INSERT INTO sollicitaties VALUES(id, :naam, :rank, :geboorte, :discord, :motivatie, status, :ip, :datum)");
      $verstuur->execute(["naam" => $naam, "rank" => $rank, "geboorte" => $geboorte, "discord" => $discord, "motivatie" => $motivatie, "ip" => $ip, "datum" => $datum]);
      $cookie_name = "UsrShowApply";
      setcookie($cookie_name, $naam, time() + (86400 * 30), "/");
      header("location:beta");

  }

  else{

    echo "Gelieve alle velden in te vullen!";
  }
  
}
  

?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CakeCraft | Staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>

</div>
<div class="title">
<h1>Solliciteer nu!</h1>
<p style="color: red;"> Wij zoeken momenteel alleen naar Builders </p>
<a class="btn btn-primary" href="beta">Beheer Sollicitaties</a>
</div>
<form method="post">
<div class="form-group">
<label for="naamfield">Voornaam</label>
<input type="text" class="form-control" placeholder="John Wick" id="naamfield" name="naam" required>
</div>
<div class="form-group">
<label for="discordfield">Discord#tag</label>
<input type="text" class="form-control" placeholder="JohnWick#1234" id="discordfield" name="discord" required>
</div>
<div class="form-group">
<label for="rankfield">Voor welke rank wil je solliciteren?</label>
<select class="form-control" id="rankfield" name="rank" required>
<option value="Builder">Builder</option>
<option value="Moderator">Moderator</option>
<option value="Administrator">Administrator</option>
<option value="Discordmod">Discord Moderator</option>
</select>
</div>
<div class="form-group">
<label for="gdfield">Geboortedatum</label>
<input id="gdfield" type="date" class="form-control"  name="gd" required>
</div>
<div class="form-group">
<label for="motivatiefield">Noteer uw motivatie</label>
<textarea class="form-control" id="motivatiefield" rows="3" name="mot" required></textarea>
</div>
<button type="submit" class="btn btn-primary" name="sollicitatie">Solliciteren</button>
</form>
<br>
<br>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Cookies</strong><p>Om deze website normaal te laten functioneren worden "koekjes" gebruikt, dit zijn kleine deeltjes met gegevens erin. Dit is nodig om de website te laten functioneren.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</body>
</html>