<?php
// database connection settings
$host = "localhost";
$username = "root";
$password = "Prasad@123";
$dbname = "sign_up";

// create connection
$conn = new mysqli($host, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// connection successful
echo "Connected successfully";

// close connection
$conn->close();
?>
