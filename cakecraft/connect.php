<?php
$server = "localhost";
$username = "Mohamed";
$password = "Leuven65862";
$db = "scoreboard";

try{
    $handle = new PDO("mysql:host=$server;dbname=$db", "$username", "$password");
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e){
    die("Oops! Error DBNC" . " " . $e);
}
?>