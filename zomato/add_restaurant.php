<!DOCTYPE html>
<html>
<title>Add restaurant</title>
<link rel="stylesheet" href="add_restaurant.css">
<link rel="php" href="addrestau.php">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">



<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js
" crossorigin="anonymous"></script>

  <header>

    <ul class="nav">
      <li> <a href="home.php">home</a></li>
      <li> <a href="http://localhost/php/zomato/add_restaurant.php">Add your restaurant</a></li>
      <li> <a href="#">login</a> </li>
      <li> <a href="sign_up.html">sign up</a> </li>
      <li> <a href="http://localhost/php/zomato/show_restaurant.php">See Restraurant</a> </li>

    </ul>


  </header>


  <div class="container">
    <div class="title">
      <h2 id="h2">Restaurant Sign up</h2>
      <hr>
    </div>
    <div class="form">
      <form action="addrestau.php" method="POST">
        
        <label for="R_ID"></label>
        <input type="text" placeholder="Enter R_ID" id="R_ID" name="R_ID" required>
      </form>
    </div>

  </div>
  <!-- <div class="details">

      

      <label for="R_NAMRE"></label>
      <input type="text" id="R_NAMRE" placeholder="Enter name" name="R_NAMRE" required>

      <label for="R_PINCODE"></label>
      <input type="number" id="R_PINCODE" placeholder="Enter pincode" name="R_PINCODE" required>

    </div>
    <div class="address">
      <label for="R_ADDRESS"></label>
      <input type="text" id="R_ADDRESS" placeholder="Enter address" name="R_ADDRESS" required>

    </div>





    <label for="R_CONTACT"></label>
    <input type="number" id="R_CONTACT" placeholder="Enter contact" name="R_CONTACT" required><br><br>

    </div>
    <div class="button">
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>







    </div> -->

</body>

</html>