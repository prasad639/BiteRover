<link rel="stylesheet" href="end.css">
<?php

session_start();


?>
<script>
    var seconds = 30;
    function countdown() {
        seconds--;
        if (seconds < 0) {
            window.location = "home.php";
        } else {
            document.getElementById("timer").innerHTML = seconds.toString();
            setTimeout(countdown, 1000);
        }
    }

</script>
<script>


</script>

<p id="end">Your order is successfully placed! You will be redirected to the home page in <span id="timer">30</span>
    seconds.</p>

<?php
$Restaurant = $_POST['R_NAMRE'];
$Menu = $_POST['Menu'];
$Mode = $_POST['mode'];
$customer_id = $_SESSION['user_id'];
$restaurant_name = $Restaurant;
$menu = $Menu;



$host = "localhost";
$username = "root";
$password = "Prasad@123";
$dbname = "zomato";


// create connection
$conn = new mysqli($host, $username, $password, $dbname);
$amt = "select O_Amount from Menucard where menu='$Menu'";

$display = $conn->query($amt);
$row = mysqli_fetch_assoc($display);

$O_Amount = $row["O_Amount"];


$date = date(" j  F Y ") . "";
$time = date(" h:i:s A ") . "";

$stmt = $conn->prepare("insert into final_order(R_name,menu,O_date,O_time,O_Amount) values(?,?,?,?,?)");

$stmt->bind_param("ssssi", $Restaurant, $Menu, $date, $time, $O_Amount);
$stmt->execute();


$stmt = $conn->prepare("insert into payment(C_ID,R_name,P_mode,P_date,P_time,amount) values(?,?,?,?,?,?)");
$stmt->bind_param("sssssi", $customer_id,$Restaurant, $Mode, $date, $time, $O_Amount);
$stmt->execute();

echo "<script>countdown();</script>";

echo '<button  id="cancel" onclick="cancelOrder()">Cancel Order</button>';
$amount = $O_Amount;

// $query = "SELECT * FROM payment WHERE C_ID='$customer_id' ";

// // Execute the query and retrieve the result set
// $result = mysqli_query($conn, $query);

// // Check if the query was successful and the user exists
// if (mysqli_num_rows($result) == 1) {
//   // Retrieve the user ID from the result set
//   $row = mysqli_fetch_assoc($result);
//   global $payment_id;
//   $payment_id= $row['P_ID'];
//   echo $payment_id;
 

// }


// Build SQL query
$sql = "SELECT P_ID FROM payment ORDER BY P_ID DESC LIMIT 1;";

// Execute SQL query
$result = mysqli_query($conn, $sql);

// Check if query was successful
if ($result) {
  // Fetch payment_id from result set
  $row = mysqli_fetch_assoc($result);
  $payment_id = $row['P_ID'];
} else {
  // Handle error if query failed
  echo "Error fetching payment_id: " . mysqli_error($conn);
}


// close connection
$stmt->close();
$conn->close();

?>



<script>
    function cancelOrder() {
        alert("Hello");
        // add your code here to cancel the order
        if (confirm("Are you sure you want to cancel this order?")) {
            // If the user confirms, delete the entry from the database
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "cancel_order.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    alert("Your order has been cancelled!");
                    window.location = "home.php";
                }
            };
            xhr.send("menu=" + encodeURIComponent("<?php echo $Menu; ?>"));
        }
    }
</script>

<h3>
    <a href="home.php">Back to Home Page</a>
</h3>

<?php



?>

<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
		}
		th {
			background-color: #f2f2f2;
		}
		.receipt-header {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
		}
		.receipt-divider {
			border-bottom: 1px solid #ccc;
			margin-bottom: 20px;
		}
		.receipt-details {
			margin-bottom: 20px;
		}
	</style>
</head>

<?php


?>


<body>
	<div class="receipt-header">Receipt</div>
	<div class="receipt-divider"></div>
	<table>
		<tr>
			<th>Customer ID:</th>
			<td><?php echo $customer_id; ?></td>
		</tr>
		<tr>
			<th>Payment ID:</th>
			<td><?php echo $payment_id; ?></td>
		</tr>
		<tr>
			<th>Restaurant Name:</th>
			<td><?php echo $restaurant_name; ?></td>
		</tr>
		<tr>
			<th>Menu:</th>
			<td><?php echo $menu; ?></td>
		</tr>
		<tr>
			<th>Amount:</th>
			<td>$<?php echo number_format($amount, 2); ?></td>
		</tr>
		<tr>
			<th>Payment Mode:</th>
			<td><?php echo $Mode; ?></td>
		</tr>
		<tr>
			<th>Date:</th>
			<td><?php echo $date; ?></td>
		</tr>
		<tr>
			<th>Time:</th>
			<td><?php echo $time; ?></td>
		</tr>
	</table>
	<div class="receipt-divider"></div>
</body>
</html>
