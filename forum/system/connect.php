<?php
$server = "localhost";
$username = "Mohamed";
$password = "Leuven65862";
$db = "forum";

try{
    $handle = new PDO("mysql:host=$server;dbname=$db", "$username", "$password");
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "SELECT * FROM users, posts";

    $data = $handle->query($query);

    echo "Database verbinding is succesvol!";
}
catch(PDOException $e){
    die("Oops! Error DBNC");
}
?>