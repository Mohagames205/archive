<?php
$server = "localhost";
$username = "caken_mohamed";
$password = "Leuven65862";
$db = "cakenetn_forum";

try{
    $handle = new PDO("mysql:host=$server;dbname=$db", "$username", "$password");
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "SELECT * FROM users, posts";

    $data = $handle->query($query);

}
catch(PDOException $e){
    die("Oops! Error DBNC");
}
?>