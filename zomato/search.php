
<form method="get">
    <input type="text" name="search" placeholder="Search restaurant by name">
    <button type="submit">Search</button>
</form>
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
$search_term = isset($_GET['search']) ? $_GET['search'] : '';
$stmt = "SELECT * FROM restaurant WHERE R_NAMRE LIKE '%$search_term%'";
$all_restaurant = $conn->query($stmt);
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="show_restaurant.css">
<link rel="php" href="menu.php">
<link rel="scipt" href="button.js">
<script src="button.js"></script>

<body>

    <header>
        <ul class="nav">
            <li><a href="home.html">home</a></li>
            <li><a href="add_restaurant.php">Add your restaurant</a></li>
            <li><a href="#">login</a></li>
            <li><a href="sign_up.html">sign up</a></li>
            <li><a href="http://localhost/php/zomato/show_restaurant.php">See Restraurant</a></li>
        </ul>
    </header>
    <br><br>
    <h1 id="h1"> Select restaurant</h1>

   
    
    
    <main  class="container" style="display: flex;
    flex-wrap: wrap;">
        <?php
        while ($row = mysqli_fetch_assoc($all_restaurant)) {
            ?>




            <div class="rest_name">
           
                <h1 class="product_name">

                    <?php echo $row["R_NAMRE"];
                        ?>
                    </h1>
                    <p class="product_Address">
                        <?php echo $row["R_ADDRESS"]; ?>
                    </p>
                    <p class="product_contact">
                        <?php echo $row["R_CONTACT"]; ?>
                    </p>



                    <div>
                    <?php
                    // Generate a unique ID based on the current timestamp
                     $button_id = $row["R_NAMRE"];
                     global $button_id;
                    // echo $button_id;
                    // echo '<a href="./menu.php"& button_id='.$button_id.'><button_id=' . $button_id . ' class="orderbtn" >See Menu</button></a>';
                    // <button id=$button_id type="submit" class="orderbtn" onclick="afterclick()">Order </button>

                    // Output a button with the dynamic ID
                    
                    echo' <a href="mkorder.php"><button id="' . $button_id . '" type="submit" class="orderbtn"  onclick="afterclick()" >See Menu</button> </a>';
                    ?>

                    
                </div>




            </div>



            <?php
        }
        ?>
       
        


    </main>
    <!-- <script>

        // Get the container element
        const container = document.getElementById('container1');

        // Add an event listener for clicks on the container element
        container.addEventListener('click', function (event) {
            // Handle the click event here
            alert("event listener");
        });


        function afterclick() {
            alert("clicked");
            // var id =document.getElementsByClassName

        }

    </script> -->
</body>
</html>