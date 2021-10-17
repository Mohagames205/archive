<?php include("../login/connect.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <?php
    $p_id = $_GET["post_id"];
    $get_post_by_id = $handle->prepare("SELECT * FROM posts WHERE post_id = :pid");
    $get_post_by_id->execute(["pid" => $p_id]);
?>
<center>
    
<?php
    foreach($get_post_by_id as $e){
        $auteur = htmlspecialchars($e["author"]);
        $title = htmlspecialchars($e["post_title"]);
        $inhoud = htmlspecialchars($e["post_content"]);
        echo "<h1>$title</h1>
        <p style='border:3px; border-style:solid; border-color:lightblue; padding: 0.5%;'>$inhoud</p>";
}
echo "</table></center>";
    ?>
</body>
</html>