<?php
session_start();
include("../connect.php");
include("includes/audit.inc.php");

if(isset($_SESSION["custom"])){
    $usernamea = htmlspecialchars($_SESSION["username"]);
    $bericht = "Welkom $usernamea";
    $username = htmlspecialchars($_SESSION["custom"]);
    $naam = $username;
    $usernamequery = $handle->prepare("SELECT username FROM user_ranks WHERE username = :naam");
    $us = $usernamequery->execute(["naam" => $naam]);
    $username = $usernamequery->fetch(PDO::FETCH_ASSOC);
    
    if(!empty($username)){
        $user = "EX";
        $username = $username["username"];
    }
    else{
        $username = $naam;
        $rank = "Guest";
        $node = "De gebruiker staat niet in onze database";
        $user = "DNEX";
    }

}

else{
    header("location:../index.php");
}

if(isset($_POST["logout"])){
  session_destroy();
  header("location:../index.php");
}


if(isset($_POST["nieuwe_rank"])){
    $allowed_ranks = array(0, 1, 2, 3, 4, 5, 6);
    $nieuwe_rank = htmlspecialchars($_POST["nieuwe_rank"]);
    if(in_array($nieuwe_rank, $allowed_ranks)){
        $reason = htmlspecialchars($_SESSION["reason"]);
        $change_date = date('d/m/Y');
        $change_type = "Custom";
        if($user == "DNEX"){
            $old_rank = 1;
            $userinsert = $handle->prepare("INSERT INTO user_ranks (username, rank_id, node) VALUES(:username, :rank_id, :node)");
            $userinsert->execute(["username" => $username, "rank_id" => $_POST["nieuwe_rank"], "node" => "B"]);
            $new_rank = $_POST["nieuwe_rank"];
            rank_audit($usernamea, $change_type, $username, $old_rank, $new_rank,$reason, $change_date);
            unset($_SESSION['custom']);
            unset($_SESSION['reason']);
            header("LOCATION:home.php?naam=$username");
        }
        else{
            $rank_id_query = $handle->prepare("SELECT rank_id, node FROM user_ranks WHERE username = :username");
            $rank_id_query->execute(["username" => $username]);
            $userdata = $rank_id_query->fetch(PDO::FETCH_ASSOC);
            $old_rank = $userdata["rank_id"];
            $wijzigen = $handle->prepare("UPDATE user_ranks SET rank_id = :rank_id WHERE username = :username");
            $wijzigen->execute(["rank_id" => $_POST["nieuwe_rank"], "username" => $username]);
            $new_rank = $_POST["nieuwe_rank"];;
            $reason = $_SESSION["reason"];
            rank_audit($usernamea, $change_type, $username, $old_rank, $new_rank,$reason, $change_date);
            header("LOCATION:home.php?naam=$username");
        }
    }
    else{
        ?>
        <script> alert("U kan deze persoon geen Owner maken!"); </script>
        <?php
    }
    
    
}








?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CakeRankings - Staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" type="text/css" href="style/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head> 

<body>
    <div class="name">
    <a href="home.php"> Home </a>
    <?php echo "<p id='a'> $bericht </p>" ?>
    <form method="POST">
        <button name="logout" class="btn btn-outline-light">Uitloggen</button>
        <a role="button" class="btn btn-outline-light" href="../paneel">Sollicitaties</a>
    </form>
</div>




<div class="tabel">
<table class="table table-striped table-dark table-bordered">
    <th colspan="3" class="nametable"> <?php echo $username ?> </th>
</table>
<form method="POST">
    <select name="nieuwe_rank" class="custom_select">
    <option value="0">Ontslagen</option>
    <option value="1">Guest</option>
    <option value="2">Helper</option>
    <option value="3">Moderator</option>
    <option value="4">Developer</option>
    <option value="5">Administrator</option>
    <option value="6">CoOwner</option>
    </select>
    <br>
    <button type="submit">Wijzigen</button>
    </form>
</div>
<br>
<hr>
<p style="color: white; text-align: center;">Made with ♥ by Mohamed | <a href="https://github.com/Mohagames205/flowpanel">FlowPanel</a> version 1.2 PreRelease </p>
</main>
</body>
</html>