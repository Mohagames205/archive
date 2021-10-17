<?php
$server = "localhost";
$username = "Mohamed";
$password = "Leuven65862";
$db = "arcdb";

try{
    $handle = new PDO("mysql:host=$server;dbname=$db", "$username", "$password");
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "SELECT * FROM test";

    $data = $handle->query($query);

} 
catch(PDOException $e){
    die("Oops! Error DBNC");
}
?>