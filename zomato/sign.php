<?php

$C_ID  = $_POST['C_ID'];
$C_NAME = $_POST['C_NAME'];
$C_ADDRESS  = $_POST['C_ADDRESS'];
$C_CONTACT  = $_POST['C_CONTACT'];
$C_DOB  = $_POST['C_DOB'];
$Gender  = $_POST['Gender'];
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
    echo "Connected successfully";
    echo "C_ID";
}
// adding data to database




$stmt =$conn->prepare("insert into Customer(C_ID,C_NAME,C_ADDRESS,C_CONTACT,C_DOB,Gender) values(?,?,?,?,?,?)");


$stmt->bind_param("ssssss",$C_ID,$C_NAME,$C_ADDRESS,$C_CONTACT,$C_DOB,$Gender);
$stmt->execute();

// connection successful



// close connection
$stmt->close();
$conn->close();
?>
