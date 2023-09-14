<?php
// database connection settings
$host = "localhost";
$username = "root";
$password = "Prasad@123";
$dbname = "zomato";

// create connection
$conn = new mysqli($host, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// adding data to database

$rest="select * from restaurant";
$all_restaurant = $conn->query($rest);

$stmt = "select * from Menucard";
$menu = $conn->query($stmt);

?>
<!DOCTYPE html>
<html>
<title>Make a order</title>
<link rel="stylesheet" href="mkorder.css">
<link rel="php" href="submit_odr.php">
<a href="home.html"> Back to home page</a>

<body>
    <h1 id="h1">Make a order</h1>

    <form action="submit_odr.php" method="POST">
        <p class="box1">Select Restaurant</p>
        
<div class="rest_name">

        <?php
            while($row = mysqli_fetch_assoc($all_restaurant)){
                ?>
               
  <input type="radio" name="R_NAMRE" value=<?php echo $row["R_NAMRE"];
                ?>><?php echo $row["R_NAMRE"];
                
                ?> <br>
                
  <?php
            }
            ?>

</div>

        
<hr>

        <h2 id="h2"> select menu</h2>
        <br>
        <div class="menu">
             <?php
            while($row = mysqli_fetch_assoc($menu)){
                ?>
               
  <input type="radio" name="Menu" value=<?php echo $row["Menu"];
                ?>><?php echo $row["Menu"];
                
                ?> <br>
                
  <?php
            }
            ?>
           
        <!-- <?php
            while ($M_row = mysqli_fetch_assoc($menu)) {
                ?>
  <input type="radio" name="Menu" value=<?php echo $M_row["Menu"];
                ?>><?php echo $M_row["Menu"];
                ?> <br>
  <?php
            }
            ?> -->
            </div>

        </select>
<br><br>
        
<p>Select the Payment:</p>

<label for="Online">
<input type="radio"  name="mode" value = 'Online'><b>Online</b></label>
<label for="Offline">
<input type="radio" name="mode" value = 'Offline'><b>Offline</b></label>


<br><br>
       
        <button type="submit" class="placeordrbtn" onclick="add()" name= order> Place Order

    </form>

  

   
</body>
<!-- <script>
alert("order sucessfull!!");
</script> -->
</html>
