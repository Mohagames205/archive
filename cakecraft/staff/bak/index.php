<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("../connect.php");
if(isset($_POST["delete"])){
    $id = $_POST["delete"];
    $del = $handle->prepare("DELETE FROM sollicitaties WHERE id = :id");
    $del->execute(['id' => $id]);
}

?>

<!DOCTYPE html>
<html>
<head>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4749540091741940",
    enable_page_level_ads: true
  });
</script>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
<div class="name">
    <h1>Sollicitatie overzicht</h1>
</div>

<?php
$count = $data->rowCount();
if ($count > 0){
    ?>
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
<tr>
    <th>ID</th>
    <th>Naam</th>
    <th>Rank</th>
    <th>Motivatie</th>
    <th>Status</th>

    </tr>
</thead>
    <?php
    $displayinfo = $_COOKIE["UsrShowApply"];
    $mijnsollicitatie = $handle->prepare("SELECT * FROM sollicitaties WHERE naam = :displayinfo");
    $mijnsollicitatie->execute(["displayinfo" => $displayinfo]);
    
    foreach($mijnsollicitatie as $e){
        $status = $e["status"];
        
        if($status == "Geaccepteerd"){
            $tstat = "table-success";
          }
          elseif($status == "Verwerken"){
            $tstat = "table-warning";
          }
          elseif($status == "Afgewezen"){
            $tstat = "table-danger";
          }
          else{
              $tstat = NULL;
          }
          
        echo "<tr class='$tstat'>
        <td>".$e['id']."</td>
        <td>".$e['naam']."</td>
        <td>".$e['rank']."</td>
        <td>".$e['motivatie']."</td>
        <td>".$e['status']."</td>

        ";
        ?>
        <td> <form method='post' name='deleteinv'>
        <button name='delete' type='submit' style='display: hidden;' value='<?php echo $e["id"] ?>'>Verwijder</button>
        </td>
        </tr>
        </form>
    </div>
    <?php
    }
     
}
else{
    ?>
    <table width="70%" border="1" cellpadding="5" cellspacing="5">
<tr>
    <th>Sollicitaties</th>
    </tr> 
<?php
        echo "<tr>
        <td>Geen sollicitaties om te behandelen!</td>";
        ?>
        </tr>
    <?php
    }
?>
</body>
</html>