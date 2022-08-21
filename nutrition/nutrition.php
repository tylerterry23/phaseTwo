<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phaseTwo</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.0.0/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="phaseTwo.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../css/PhaseTwo.css">
    <link rel="stylesheet" href="../css/nutrition.css">

</head>



<!-- Add phaseTwo MySQL connection -->
<?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "terrytyler23";
  $db = "phaseTwo";
  
  // Connect to database
  $conn = mysqli_connect($servername, $username, $password, $db);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?>


<!-- javascript -->
<script>

  // return 
  function addSet() {

    
  }

  // function to delete Meal from database on click
  function deleteMeal(id) {
    var conf = confirm("Are you sure you want to delete this Meal?");
    if (conf == true) {
      // delete from database using php
      $.ajax({
        type: "POST",
        url: "deleteMeal.php",
        data: {id: id},
        success: function(data) {
          // reload page
          window.location=window.location;
        }
      });
    }
  }




  // function: change addClient display to block and hide updateClient and displayClient
  function showFinance() {
    // if style.display is none, change to block
    if (document.getElementById("finance").style.display == "none") {
      document.getElementById("finance").style.display = "block";
    
    }
    else {
      document.getElementById("finance").style.display = "none";

    
    }   
  }

</script>


    



<body>
  <!-- Header -->
  <header>

    <!-- Top Header Row -->
    <div id="topHeaderRow">
      <nav class="navbar navbar-inverse navbar-static-top ">
        <img src="../assets/logo.png" alt="logo" id="logo">
        <h1 class="navbar-text">Phase Two</h1>
        <ul class="nav navbar-nav navbar-right" id="upperNav">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li> 
          <li><a href="login.php"><span class="glyphicon glyphicon-home"></span> Sign out</a></li>
        </ul>
      </nav>
    </div>


    <div id="mainNavigationRow">
      <nav class="navbar navbar-inverse navbar-static-top toggle ">
        <ul class="nav navbar-nav">
          <li class="active-phaseTwo"><a href="home.php">Home</a></li>
          <li><a href="../workout/workout.php">Workout</a></li>
          <li><a href="../Nutrition/Nutrition.php">Nutrition</a></li>
          <li><a href="../MyInfo/MyInfo.php">MyInfo</a></li>
          <li>
            <a class="dropdown-toggle" data-toggle="dropdown">More...<span>&#9660;</span></a>
            <ul class="dropdown-menu p2background">
              <li><a href="trainer.php">Trainer (BETA)</a></li>
            </ul>
          </li>
        </ul>         
      </nav>
    </div>  
  </header>
  <!-- End Header -->




  <!-- Middle Container -->
  <div class="container-adj">




    <!-- Main Row -->
    <div class="row">




      <!-- Left Column -->
      <div class="col-md-4">
        <h1> Nutrition </h1>
        &nbsp;


        <!-- Panel For Meal Log -->
        <div id="logMeal" class="panel panel-primary">
          <div class="panel-heading">
            <h1 class="customPanelHead">Log Meal</h1>
          </div>

          <div class="panel-body">


            <form action="nutrition.php" method="post">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="time">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter date" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <!-- dropdown menu for Breakfast, Lunch, Dinner, or snack -->
                  <div class="form-group">
                    <label for="meal">Meal Type:</label>
                    <select class="form-control" id="meal" name="meal">
                      <option value="">Select Meal</option>
                      <option value="Breakfast">Breakfast</option>
                      <option value="Lunch">Lunch</option>
                      <option value="Dinner">Dinner</option>
                      <option value="Snack">Snack</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Select Food & Servings -->
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <!-- Dropdown to display all food name in database -->
                    <label for="food">Food:</label>
                    <select class="form-control" id="food" name="food" required>
                      <option value="">Select Food</option>
                      <?php
                        $sql = "SELECT * FROM food";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["foodID"] . "'>" . $row["foodName"] . "</option>";
                            }
                        } else {
                            echo "0 results";
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="servings">Servings:</label>
                    <input type="number" class="form-control" id="servings" name="servings" placeholder="# of Servings">
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="notes">Notes:</label>
                <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter Notes">
              </div>


              <button name="addNutrition" type="submit" class="btn btn-primary">Submit</button>
            </form>
            
            <!-- if addNutrition is set add information to nutritionTracker -->
            
            <?php
              if (isset($_POST['addNutrition'])) {

                // meal id == NULL for auto increment
                $userID = 0001;
                
                // get food id from food table value drawn from dropdown menu above
                $foodID = $_POST['food'];
     
                
                
                $mealDate = $_POST['date'];
                $mealType = $_POST['meal'];
                $servings = $_POST['servings'];
                $note = $_POST['notes']; 

                $sql = "INSERT INTO nutritionTracker (mealID, userID, foodID, mealDate, mealType, servings, note) VALUES (NULL, '$userID', '$foodID', '$mealDate', '$mealType', '$servings', '$note')";
                if ($conn->query($sql) === TRUE) {
                    echo "<br><br> New Meal logged successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
              }
                
            ?>


          </div>
        </div>
        <!-- End Panel For Meal Log -->
          


        <!-- Panel For Add Food -->
        <div id="addFood" class="panel panel-primary">
          <div class="panel-heading">
            <h1 class="customPanelHead">Add Food</h1>
          </div>

          <div class="panel-body">
            <form action="nutrition.php" method="post">


              <!-- Row: Food Name and Serving Size -->
              <div class="row">
                <div class="col-md-7">
                  <div class="form-group">
                    <label for="foodName">Food Name:</label>
                    <input type="text" class="form-control" id="foodName" name="foodName" placeholder="Enter Food Name" required>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="servingSize">Serving Size:</label>
                    <input type="text" class="form-control" id="servingSize" name="servingSize" placeholder="Ex: 1 sandwich" required>
                  </div>
                </div>
              </div>

            
            
              <!-- Calorie / Macro Input Row -->
              <div class="row">
                <!-- Calorie Input -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="calories">Calories: </label>
                    <input type="text" class="form-control" id="calories" name="calories" placeholder="Calories" required>
                  </div>
                </div>

                <!-- Fat Input -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="totalFat">Fat (g): </label>
                    <input type="text" class="form-control" id="totalFat" name="totalFat" placeholder="Fat">
                  </div>
                </div>

                <!-- Carb Input -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="totalCarbs">Carbs (g):</label>
                    <input type="text" class="form-control" id="totalCarbs" name="totalCarbs" placeholder="Carbs">
                  </div>
                </div>

                <!-- Protein Input -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="protein">Protein (g):</label>
                    <input type="text" class="form-control" id="protein" name="protein" placeholder="Protein">
                  </div>
                </div>
              </div>              

              <!-- Submit -->
              <button name="addFood" type="submit" class="btn btn-primary">Submit</button>
            </form>

            <!-- if addFood is set add information to food table -->
            <?php
              if (isset($_POST['addFood'])) {

                // food id == NULL for auto increment
                $foodName = $_POST['foodName'];
                $calories = $_POST['calories'];
                $totalFat = $_POST['totalFat'];
                $totalCarbs = $_POST['totalCarbs'];
                $protein = $_POST['protein'];
                $servingSize = $_POST['servingSize'];

                $sql = "INSERT INTO food (foodID, foodName, calories, totalFat, totalCarbs, protein, servingSize) VALUES (NULL, '$foodName', '$calories', '$totalFat', '$totalCarbs', '$protein', '$servingSize')";
                if ($conn->query($sql) === TRUE) {
                    echo "<br><br> New Food added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
              }
            ?>




                

            
          </div>
        </div>
        <!-- End Add Food Panel -->

      
      </div>
      <!-- End Left Column -->




      <!-- Middle Column (empty divider) -->
      <div class="col-md-1"> 
        &nbsp; 
      </div>
      <!-- End Middle Column -->




      <!-- Right Column -->
      <div class="col-md-7">
        <h1> View Nutrition History </h1>
        &nbsp;

        
        <!-- Panel For View Nutrition History -->
        <div id="viewNutrition" class="panel panel-primary">
          <div class="panel-heading">
            <h1 class="customPanelHead">View Nutrition History</h1>
          </div>
          
          <div class="panel-body">
            <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label for="viewDate">Date:</label>
                  <input type="date" class="form-control" id="viewDate" name="date" placeholder="Enter date">
              </div>
            </div>

            <!-- dropdown of exercises -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="meal">Select Meal:</label>
                <select class="form-control" id="meal" name="meal">
                  <option value="">Select Meal</option>
                  <option value="Breakfast">Breakfast</option>
                  <option value="Lunch">Lunch</option>
                  <option value="Dinner">Dinner</option>
                  <option value="Snack">Snack</option>
                </select>
              </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">
                <label for="searchFood">Search Food:</label>
                <input type="text" class="form-control" id="searchFood" name="searchFood" placeholder="Enter Food">
              </div>
            </div>

            
    
            <div class="col-md-3">
              <div class="form-group">
                <label for="filter">Filter:</label>
                <!-- calories, carbs, fat, protein, servings -->
                <select class="form-control" id="filter" name="filter">
                  <option value="">Order By: </option>
                  <option value="date">Date</option>
                  <option value="calories">Calories</option>
                  <option value="carbs">Carbs</option>
                  <option value="fat">Fat</option>
                  <option value="protein">Protein</option>
                  <option value="servings">Servings</option>
                </select>
              </div>
            </div>

          </div>

          


          <!-- table display all logged meals -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Date</th>
                <th>Food</th>
                <th>Calories</th>
                <th>Fat</th>
                <th>Carbs</th>
                <th>Protein</th>
                <th>Servings</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tbody>
              <?php
                // query to join food and nutrition Tracker tables
                $sql = "SELECT f.foodName, f.calories, f.totalFat, f.totalCarbs, f.protein,  n.mealDate, n.mealID, n.servings, n.note FROM food f, nutritionTracker n WHERE n.foodID=f.foodID;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                              <td>".$row["mealDate"]."</td>
                              <td>".$row["foodName"]."</td>
                              <td>".$row["calories"]."</td>
                              <td>".$row["totalFat"]."</td>
                              <td>".$row["totalCarbs"]."</td>
                              <td>".$row["protein"]."</td>
                              <td>".$row["servings"]."</td>
                              <td>".$row["note"]."</td>
                              <td><button type='button' class='btn btn-xs btn-danger' onclick='deleteMeal(" . $row["mealID"] . ")'><small><span class='glyphicon glyphicon-trash'></span></small></button></td>
                            </tr>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
              ?>
            </tbody>
          </table>
          <!-- end table -->

          <!-- traverse table page number -->
          <ul class="pagination pagination-sm">
            <li class="disabled"><a href="#">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li class="disabled"><a href="#">&raquo;</a></li>
          </ul>

            
            


          </div>
        </div>
        <!-- End View Nutrition History Panel -->

        
      </div>
      <!-- End Right Column -->




    </div>
    <!-- End Main Row -->


  </div>
  <!-- End Main Container -->
  



  

    



  <!-- Footer -->

  
  <footer class="container-fluid" style="margin-top:20em">

    <!-- Footer Top -->
    <div class="row">



      <!-- About Us -->
      <div class="col-md-5">
        <h4><span class="glyphicon glyphicon-info-sign"></span> About Us</h4>
        <p>Fitness goals are awesome and those who make those goals a reality are heros. Being a trainer can be hard and time consuming, we strive to make it easier and more convenient in every way possible. Phase Two will provide a platform aimed toward trainers with multiple clients to keep track of body, workout, and payment information.</p>
        
        &nbsp;

        <p>This is only a hypothetical website all images and other copyrighted materials copyright to their respected owners.</p>
      </div>
      <!-- End About Us -->



      <!-- Access Links -->
      <div class="col-md-3">
        <h4><span class="glyphicon glyphicon-earphone"></span> Customer Service</h4>
        <ul class="list-unstyled footerSpaced">
          <li><a href="#">Phone Number</a></li>
          <li><a href="#">Email</a></li>
          <li><a href="#">Report Issues</a></li>
          <li><a href="#">Terms and Conditions</a></li>
        </ul> 
      </div>   
      <!-- End Access Links -->
    

        
      <!-- Contact / Feedback -->
      <div class="col-md-4">
        <h4><span class="glyphicon glyphicon-envelope"></span> Contact us</h4>
        <form class="form-group">
          
          <div class="formHorizontal">
            <input class="form-control" type="text" name="email" placeholder="Enter name ...">
          </div>

          <div class="formHorizontal">
            <input class="form-control" type="email"  name="email" placeholder="Enter email ...">
          </div>

          <div class="formHorizontal">
            <textarea class="form-control" rows="3" placeholder="Enter message ..."></textarea>
          </div>
          
          <button class="btn btn-primary btn-block" type="submit">Submit</button>
        </form>  
      </div>
      <!-- End Contact / Feedback -->



    </div>
    <!-- End Footer Top -->



    <!-- Copyright Row -->
    <div id="copyrightRow">
      <div class="col-md-12">
        <p>All images are copyright to their owners. This is just a hypothetical site
        <span class="navbar-right">&copy; 2014 Copyright Phase Two</span></p>
      </div>
    </div>
    <!-- End Copyright Row -->




  </footer>
  <!-- End Footer -->


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <script src="bootstrap-3.0.0/assets/js/jquery.js"></script>
  <script src="bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>    
</body>
</html>
