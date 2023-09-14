<?php
$P_ID = $_POST['P_ID'];
echo $P_ID;

echo "cancel order";

$host = "localhost";
$username = "root";
$password = "Prasad@123";
$dbname = "zomato";

// create connection
$conn = new mysqli($host, $username, $password, $dbname);

$stmt = $conn->prepare("DELETE FROM payment ORDER BY P_ID DESC LIMIT 1");
$stmt-> execute();
// close connection
$stmt->close();
$conn->close();
?>
