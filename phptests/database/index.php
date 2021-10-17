<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "connect.php";?>
    
</head>
<body>
    <?php

    $a = htmlspecialchars($_SERVER["PHP_SELF"]);
    ?>


    <?php if(!empty($_POST)): 
    $naam = $_POST["naam"];
    $leeftijd = $_POST["leeftijd"];
    $nationaliteit = $_POST["nationaliteit"];
    $query = "INSERT INTO test VALUES('$naam',$leeftijd, '$nationaliteit')";
    $data = $handle->query($query);
    echo "<ul>
    <li> Naam: $naam </li>
    <li> Leeftijd: $leeftijd </li>
    <li> Nationaliteit: $nationaliteit </li>
    </ul>";

    else: ?>

    <form action="<?php echo $a  ?>" method="post">
    Uw naam: <input type="text" name="naam"><br><br>
    Uw leeftijd <input type="number" name="leeftijd"><br><br>
    Uw nationaliteit <input type="text" name="nationaliteit"><br><br>
    <br> <br>
   <input type="submit">
   </form>

<?php endif; ?>
</body>
</html>