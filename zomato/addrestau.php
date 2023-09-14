<?php

$R_ID  = $_POST['R_ID'];
$R_NAME = $_POST['R_NAMRE'];
$R_ADDRESS  = $_POST['R_ADDRESS'];
$R_PINCODE  = $_POST['R_PINCODE'];
$R_CONTACT  = $_POST['R_CONTACT'];

// $R_ID  = "212";
// $R_NAME = "KJHVBHJHJ";
// $R_ADDRESS  = "KJBNIKNUHBJH";
// $R_PINCODE  ="5635651";
// $R_CONTACT  = "68545454";


// database connection settings
$host = "localhost";
$username = "root";
$password = "Prasad@123";
$dbname = "zomato";

// create connection
$conn = new mysqli($host, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}else{
    
    
}
// adding data to database


function Alert(){
    echo '<script>alert("Restaurant registration Sucessfull!!")</script>';

}

$stmt =$conn->prepare("insert into restaurant(R_ID,R_NAMRE,R_ADDRESS,R_PINCODE,R_CONTACT) values(?,?,?,?,?)");


$stmt->bind_param("sssis",$R_ID,$R_NAME,$R_ADDRESS,$R_PINCODE,$R_CONTACT);
$stmt->execute();
Alert();










// close connection
$stmt->close();
$conn->close();

header("Location: http://localhost/php/zomato/add_restaurant.php");
die();
?>
