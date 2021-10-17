<?php include("variables.php"); ?>
<!DOCTYPE html>
<html>
<body bgcolor="#f3f3f3">
<br>
<center>
<h1> Bereken de vierkantswortel! </h1>
<p>
   <?php if(!empty($_POST)): ?>
   <?php $bron = htmlspecialchars($_POST["getal"]);  ?>
 
    <?php if(is_numeric($bron) And $bron >= 0): 
    $uitkomst = sqrt($bron);
    echo "<p> De uitkomst is: <b>$uitkomst</b></p>";?>
    <br>
    <?php $a = htmlspecialchars($_SERVER["PHP_SELF"]); ?>
    <form action="<?php echo $a  ?>" method="post">
    Getal: <input type="text" name="getal">
    <br> <br>
   <input type="submit">
   </form>
    <?php else: ?>
    <?php echo "<p> <b>$bron</b> is ongeldig! </p>";?>
    <br>
    <?php $a = htmlspecialchars($_SERVER["PHP_SELF"]); ?>
    <form action="<?php echo $a  ?>" method="post">
    Getal: <input type="text" name="getal">
    <br> <br>
   <input type="submit">
    <?php endif; ?>
<?php else: ?>


<?php $a = htmlspecialchars($_SERVER["PHP_SELF"]); ?>
<form action="<?php echo $a  ?>" method="post">
    Getal: <input type="text" name="getal">
    <br> <br>
   <input type="submit">
   </form>

<?php endif; ?>
</p>
</center>
</body>
</html>