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
    <link rel="stylesheet" href="../css/phaseTwo.css">
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

  // auto complete search
  $(function() {
    $( "#term" ).autocomplete({
      source: 'ajax-db-search.php',
    });
  });


  // function to delete workout from database on click
  function deleteWorkout(id) {
    var conf = confirm("Are you sure you want to delete this workout?");
    if (conf == true) {
      // delete from database using php
      $.ajax({
        type: "POST",
        url: "deleteWorkout.php",
        data: {id: id},
        success: function(data) {
          // reload page
          window.location=window.location;
        }
      });
    }
  }
  fot

  function checkCategory(val){
    var element=document.getElementById('exerciseCategory');
    if(val=='other')
      element.style.display='block';
    else  
      element.style.display='none';
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
          <li><a href="../login/login.php"><span class="glyphicon glyphicon-home"></span> Sign out</a></li>
        </ul>
      </nav>
    </div>


    <div id="mainNavigationRow">
      <nav class="navbar navbar-inverse navbar-static-top toggle ">
        <ul class="nav navbar-nav">
          <li><a href="../home/home.php">Home</a></li>
          <li class="active-phaseTwo"><a href="../workout/workout.php">Workout</a></li>
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

    <!-- begin row -->
    <div class="row">




      <div class="col-md-4">
        <h1> Workout </h1>


        <div id="logWorkout" class="panel panel-phaseTwo">
          <div class="panel-heading">
            <h1 class="panel-title">Log Workout</h1>
          </div>

          <div class="panel-body">
            <form action="workout.php" method="post">


              <div class="form-group">
                <label for="time">Date:</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Enter date" required>
              </div>

              <!-- TODO: Implement auto fill text -->
              <!-- workout select -->
              <div class="row">
                <!-- <div class="col-md-5">
                  <div class="form-group">
                    <label for="workout">Search Exercise:</label>
                    <input type="text" class="form-control" name="term" id="term" placeholder="Exercise Name or ID">
                  </div>
                </div> -->


                <!-- or -->
                <!-- <div class="col-md-1">
                  <div class="form-group">
                    <label>&nbsp;</label>
                    <p>or</p>
                  </div>
                </div> -->

                <!-- dropdown of exercises form database table excersice -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="workout">Select Exercise:</label>
                    <select class="form-control" id="workout" name="workout" required>
                      <option value="">Select Exercise</option>
                        <?php
                          $sql = "SELECT * FROM exercise";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<option value='" . $row["exerciseName"] . "'>" . $row["exerciseName"] . "</option>";
                            }
                          } else {
                            echo "0 results";
                          }
                        ?>
                    </select>
                  </div>
                </div>
                
              </div>

              <!-- sets and reps -->
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="sets">Sets:</label>
                    <input type="number" class="form-control" id="sets" name="sets" placeholder="# of Sets">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="weight">Weight:</label>
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="185, 185, 135">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="reps">Reps:</label>
                    <input type="text" class="form-control" id="reps" name="reps" placeholder="10, 10, 15">
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="notes">Notes:</label>
                <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter workout notes">
              </div>


              <button type="submit" name="logNewWorkout" class="btn btn-phaseTwo">Submit</button>
            </form>

            <?php
              if (isset($_POST['logNewWorkout'])) {
                // get exercise id from exercise table
                $sql = "SELECT exerciseID FROM exercise WHERE exerciseName = '" . $_POST["workout"] . "'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $exerciseID = $row["exerciseID"];
                  }
                } else {
                  echo "0 results";
                }

                $userID = "0001";
                $date = $_POST["date"];
                $sets = $_POST["sets"];
                $weight = $_POST["weight"];
                $reps = $_POST["reps"];
                $notes = $_POST["notes"];
                $sql = "INSERT INTO workoutTracker VALUES (NULL, '$userID', '$exerciseID', '$date', '$sets', '$weight', '$reps', '$notes')";
                if ($conn->query($sql) === TRUE) {
                  echo "<br><br> New workout logged successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
              }
            ?>
                
          </div>
        </div>
        



        <div id="addExercise" class="panel panel-phaseTwo">
          <div class="panel-heading">
            <h1 class="panel-title">Add Exercise</h1>
          </div>

          <div class="panel-body">
            <form action="workout.php" method="post">

                <!-- dropdown of exercises form database table excersice -->
              <div class="form-group">
                <label for="workout">Exercise Name:</label>
                <!-- text box to enter workout name -->
                <input type="text" class="form-control" id="exerciseName" name="exerciseName" placeholder="Enter Exercise Name" required>
              </div>
                

              <!-- sets and reps -->
              <div class="row">



                <div class="col-md-6">
                  <div class="form-group">
                    <label for="weight">Category:</label>
                    <!-- drop down of categories -->
                    <select class="form-control" id="category" name="exerciseCategory" onchange="checkCategory(this.value);" required>
                      <option value="">Select Category</option>
                      <option value="Barbell">Barbell</option>
                      <option value="Dumbbell">Dumbbell</option>
                      <option value="Machine / Other">Machine</option>
                      <option value="Bodyweight">Bodyweight</option>
                      <option value="Assisted Bodyweight">Assisted Bodyweight</option>
                      <option value="Reps Only">Reps Only</option>
                      <option value="Cardio">Cardio</option>
                      <option value="Duration">Duration</option>
                      <option value="other">Other</option>
                    </select>

                    <!-- if option other call javascript function  -->
                    <div id="exerciseCategory" style='display:none;'>
                      <br>
                      <label for="customCategory">Custom Category:</label>
                      <input type="text" class="form-control" name="customCategory"/>
                    </div>

                  </div>
                </div>

                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="sets">Main Muscle Group:</label>
                    <!-- drop down of muscle groups -->
                    <select class="form-control" id="muscleGroup" name="muscleGroup" required>
                      <option value="">Select Muscle</option>
                      <option value="arms">Arms</option>
                      <option value="back">Back</option>
                      <option value="chest">Chest</option>
                      <option value="legs">Legs</option>
                      <option value="shoulders">Shoulders</option>
                    </select>
                  </div>
                </div>
              </div>

              <button type="submit" name="addNewExercise" class="btn btn-phaseTwo">Submit</button>

              <!-- if addNewExercise is set add exercise to exercise table in database  -->
              <?php
                if (isset($_POST['addNewExercise'])) {

                  // exerciseID id is auto incremented
                  $exerciseName = $_POST["exerciseName"];

                  // if exerciseCategory is "" then get customCategory
                  if ($_POST["exerciseCategory"] == "" and $_POST["customCategory"] != "") {
                    $category = $_POST["customCategory"];
                  } else {
                    $category = $_POST["exerciseCategory"];
                  }

                  $muscleGroup = $_POST["muscleGroup"];

                  $sql = "INSERT INTO exercise VALUES (NULL, '$exerciseName', '$muscleGroup', '$category')";
                  if ($conn->query($sql) === TRUE) {
                    echo "<br><br> New exercise added successfully";
                    // refresh page
                    echo "<meta http-equiv='refresh' content='0'>";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                }
              ?>

            </form>          
                
          </div>
        </div>

        
      </div>

      

      <!-- Middle Col -->
      <div class="col-md-1"> &nbsp; </div>



      <!-- Right Col -->
      <div class="col-md-7">
        <h1> View Workout History </h1>
        <div class="panel panel-phaseTwo">
          <div class="panel-heading">
            <h1 class="panel-title">Workout Log</h1>
          </div>
          <div class="panel-body">
            <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label for="viewDate">Date:</label>
                  <input type="date" class="form-control" id="viewDate" name="date" placeholder="Enter date">
              </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">
                <label for="workout">Search Exercise:</label>
                <input type="text" class="form-control" id="workout" name="workout" placeholder="Enter Workout">
              </div>
            </div>

            <!-- dropdown of exercises -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="exercise">Select Exercise:</label>
                <select class="form-control" id="exercise" name="exercise">
                  <option value="">Select Exercise</option>
                  <option value="Squat">Squat</option>
                  <option value="Bench Press">Bench Press</option>
                  <option value="Deadlift">Deadlift</option>
                  <option value="Overhead Press">Overhead Press</option>
                  <option value="Barbell Row">Barbell Row</option>
                  <option value="Dumbbell Row">Dumbbell Row</option>
                  <option value="Dumbbell Curl">Dumbbell Curl</option>
                  <option value="Dumbbell Hammer Curl">Dumbbell Hammer Curl</option>
                </select>
              </div>
            </div>
    
            <div class="col-md-3">
              <div class="form-group">
                <label for="filter">Order By:</label>
                <select class="form-control" id="filter" name="filter">
                  <option value="Recent">Date</option>
                  <option value="Weight">Weight</option>
                  <option value="Reps">Reps</option>
                  <option value="Sets">Sets</option>
                    
                  
                </select>
              </div>
            </div>



          </div>

          <!-- php get values for table base on Date, Search Exercise, Select Exercise, Filter, -->
          <?php
            $sql = "SELECT * FROM workoutTracker";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // output data of each row
              echo "<table class='table table-striped' style=height:'20%';>";
              echo "<tr>";
              echo "<th>Date</th>";
              echo "<th>Exercise</th>";
              echo "<th>Sets</th>";
              echo "<th>Reps</th>";
              echo "<th>Weight</th>";
              echo "<th>Notes</th>";
              echo "<th></th>";
              echo "</tr>";
              while($row = $result->fetch_assoc()) {
                // get exercise name from exercise table
                $sql = "SELECT exerciseName FROM exercise WHERE exerciseID = " . $row["exerciseID"];
                $result2 = $conn->query($sql);
                if ($result2->num_rows > 0) {
                  // output data of each row
                  while($row2 = $result2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["workoutDate"] . "</td>";
                    echo "<td>" . $row2["exerciseName"] . "</td>";
                    echo "<td>" . $row["sets"] . "</td>";
                    echo "<td>" . $row["reps"] . "</td>";
                    echo "<td>" . $row["weight"] . "</td>";
                    echo "<td>" . $row["notes"] . "</td>";
                    // delete button with trashcan glyphicon
                    echo "<td><button type='button' class='btn btn-xs btn-danger' onclick='deleteWorkout(" . $row["workoutID"] . ")'><small><span class='glyphicon glyphicon-trash'></span></small></button></td>";
                    echo "</tr>";
                  }
                }
              }
              echo "</table>";
            } else {
              echo "0 results";
            }

            
          ?>
          <!-- traverse table page number -->
          <ul class="navbar-right pagination pagination-sm" style="margin-bottom: -.3em;margin-top: -.3em;">
            <li class="disabled"><a href="#">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <!--  -->
            
            <li class="disabled"><a href="#">&raquo;</a></li>
          </ul>

        </div>

            
      </div>

    </div>

      
       

        

      



    </div>
    <!-- end row -->
  



  </div>
  

    



  <!-- Conditions of Use / Privacy / Ads / Copyright Row -->
  <br><br>
  <div id="copyright">
    <p>
      <span><a href="#">Conditions of Use</a></span> &nbsp;
      <span><a href="#">Privacy Notice</a></span> &nbsp;
      <span><a href="#">Interest-Based Ads</a></span>
      <span class="navbar-right">&copy; 2014 Copyright Phase Two</span>
    </p>
  </div>
  <!-- End Copyright Row -->


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <script src="../bootstrap-3.0.0/assets/js/jquery.js"></script>
  <script src="../bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>   
   
</body>
</html>
