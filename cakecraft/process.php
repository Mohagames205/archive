<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("staff/connect.php");

$name = $_GET["name"];
$balance = $_GET["balance"];

$verstuur = $handle->prepare("INSERT INTO gebruikers VALUES(id, :balance, :name)");
$verstuur->execute(["balance" => $balance, "name" => $name]);

?>
