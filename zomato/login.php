<link rel="stylesheet" href="login.css">

<?php
// Start the session
session_start();



// Check if the login form has been submitted
if (isset($_POST['login'])) {
  // Retrieve the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];
  
 

  // Create a mysqli object and connect to the database
  $conn = mysqli_connect("localhost", "root", "Prasad@123", "zomato");

  // Check if the connection is successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare a SELECT query to retrieve the user with the specified email and password
  $query = "SELECT * FROM customer WHERE C_Name='$username' AND Password='$password'";

  // Execute the query and retrieve the result set
  $result = mysqli_query($conn, $query);

  // Check if the query was successful and the user exists
  if (mysqli_num_rows($result) == 1) {
    // Retrieve the user ID from the result set
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['C_ID'];
   $_SESSION['user_id']= $user_id;

    // Set the session variables and redirect to the home page
    $_SESSION['username'] = $username;
    header("Location: http://localhost/php/zomato/home.php");
    // exit();
  } else {
    // Display an error message if the login credentials are invalid`
    $error_message = "Invalid Credentials";
  }

  // Close the database connection 
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <script>
    alert("<?php
     if (isset($error_message)) {
        echo "$error_message";
      }
    ?>")
    </script>



  <form method="post" action="">
    <label for="username">Username</label>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" name="login" value="Login">
  </form>
  
</body>
</html>
