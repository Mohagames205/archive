<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Smartoken";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user_id, username, email, password, points, usertype FROM tbl_users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " Gebruiker: " . $row["username"]. " ID: <br> " . $row["user_id"]. " Email: " . $row["email"]. " Tokens:  " . $row["points"]." <br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>