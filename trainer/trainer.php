<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phaseTwo</title>

    <!-- Bootstrap core CSS -->
    <link href="..//bootstrap-3.0.0/dist/css/bootstrap.css" rel="stylesheet">

    <!-- link phaseTwo.css from css folder -->
    <link href="../css/phaseTwo.css" rel="stylesheet">

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


<!-- show id=demo on click, used in buttons 2 and 3 for update client info and display -->
<script>
  // if updateClientInfo is clicked display id="updateClientInfo"
  function getIDName() {
    if (document.getElementById("updateClientInfo").style.display === "none") 
      document.getElementById("updateClientInfo").style.display = "block";

      // get text from id="getID" and make getID variable
      var getID = document.getElementById("getID").value;
      document.getElementById("clientIDInput").innerHTML = getID;

      // get text from id="getName" and make getName variable
      var getName = document.getElementById("getName").value;
      document.getElementById("clientNameInput").innerHTML = getName;
  }

  // if displayClientInfo is clicked display id="displayClientInfo"
  function getIDName2() {
    if (document.getElementById("displayClientInfo").style.display === "none") 
      document.getElementById("displayClientInfo").style.display = "block";

      // get text from id="getID" and make getID variable
      var getID = document.getElementById("getID").value;
      document.getElementById("clientIDInput").innerHTML = getID;

      // get text from id="getName" and make getName variable
      var getName = document.getElementById("getName").value;
      document.getElementById("clientNameInput").innerHTML = getName;
  }

  
  

  // function: change addClient display to block and hide updateClient and displayClient
  function addClient() {
        document.getElementById("addClient").style.display = "block";
        document.getElementById("updateClient").style.display = "none";
        document.getElementById("displayClient").style.display = "none";
    }   

    // function: change updateClient display to block and hide addClient and displayClient
    function updateClient() {
        document.getElementById("updateClient").style.display = "block";
        document.getElementById("addClient").style.display = "none";
        document.getElementById("displayClient").style.display = "none";
    }

    // function: change displayClient display to block and hide addClient and updateClient
    function displayClient() {
        document.getElementById("displayClient").style.display = "block";
        document.getElementById("addClient").style.display = "none";
        document.getElementById("updateClient").style.display = "none";
    }

    // function: if submit button is clicked do not reset form
    function noReset() {
      // submit form information
      document.getElementById("addClient").submit();
      event.preventDefault();
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
    <div class="row">

       <!-- left column -->
       <div class="col-md-2"> 
        <div class = "panel panel-default">

          <div class = "panel-heading">
            <h3 class="panel-title">Upcoming Sessions </h3>
          </div>

          <div class="panel-body ">
            <label><b>Aug 19 (Powerhouse) </b></label>
            <p class="panelContent">Tyler Terry</p>


            <label><b>Aug 20 (Planet Fitness) </b></label>
            <p class="panelContent">Daniel Baker</p>

            <strong class="cartText">This Week: <span class="text-danger"><small>5 Sessions</small></span></strong>
            <div>
              <a type="button" class="btn btn-primary btn-xs">
                <span class="glyphicon glyphicon-info-sign"></span> View All Sessions</a>  
            </div>
          </div>
        </div> <!-- end panel -->

        <div class = "panel panel-default"> 
          <div class = "panel-heading">
            <h3 class="panel-title">Recently Viewed</h3>
          </div>
          <ul class="list-group">
              <li class="list-group-item"><a href="#">Richard Tate</a></li>
              <li class="list-group-item"><a href="#">Patricia Block</a></li>
              <li class="list-group-item"><a href="#">Patrick Pellegrin</a></li>
              <li class="list-group-item"><a href="#">View All Clients...</a></li>
          </ul>
        </div> <!-- End Popular Artist -->

        <div class = "panel panel-danger">
          <div class = "panel-heading">
            <h3 class="panel-title">OVERDUE PAYMENTS</h3>
          </div>
          <ul class="list-group">
            <li class="list-group-item"><a href="#">Richard Tate</a>
            <br>Owed: $300.00</>
            <br>Last Payment: 6/11</></li>

            <li class="list-group-item"><a href="#">Elliott Rush</a>
            <br>Owed: $426.70</>
            <br>Last Payment: 8/12</></li>

            <li class="list-group-item"><a href="#">Robert Laskey</a>
            <br>Owed: $1023.80</>
            <br>Last Payment: 4/8</></li>

            <li class="list-group-item"><a href="#">View All Overdue...</a></li>
          </ul>
        </div> <!-- End Popular Genres -->

      </div> <!-- end col-md-2 -->

      <!-- Client Interface Add / Update / View -->
      <div class="col-md-10">
        <h2>Client Menu</h2>

        &nbsp;


        <!-- Client Nav Buttons -->
        <form id=ClientNav method="post">
          <!-- Bootstrap 'type="button" class="btn btn-outline-info" not working properly' -->
          <!-- Instead made css to replicate bootstrap features -->


          <!-- BUTTON: Add Client Information (Size: medium) -->
          <button type="button" class="btn btn-gray btn-md midColButtons" onclick="addClient()">Add New Client</button>

          &nbsp;

          <!-- BUTTON: Update Client Information (Size: medium) -->
          <button type="button" class="btn btn-gray btn-md midColButtons" onclick="updateClient()">Update Client</button>

          &nbsp;

          <!-- BUTTON: Display Client Information (Size: medium) -->
          <button type="button" class="btn btn-gray btn-md midColButtons" onclick="displayClient()">Display Client</button>

        </form> 


        &nbsp;
        

        
        <!-- Add new client -->
        <!-- TODO: stay on screen after submit -->
        <!-- TODO: input validation -->
        <div id="addClient" style="display:block">

          <form id="newClient" class="form-group" method="post" onsubmit="noReset();">

            <!-- echo highest clientid + 1 -->
            <?php
            //   $sql = "SELECT MAX(clientID) FROM client";
            //   $result = mysqli_query($conn, $sql);
            //   $row = mysqli_fetch_row($result);
            //   $highestClientID = $row[0];
            //   $highestClientID++;
              $highestClientID = 0002;
            ?>
            <label for="clientID">Client ID:</label>
            <input type="text" class="form-control" id="clientID" name="clientID" value="<?php echo sprintf('%04d', $highestClientID); ?>" readonly><br>
            
            <!-- Client Name -->
            <label for="clientName">*Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name"><br>

            <div class="row">
              <div class="col-md-6">
                <!-- Client Phone Number -->
                <label for="phone">*Client Phone Number:</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone"><br>
              </div>
                
              <div class="col-md-6">
                <!-- Client Email -->
                <label for="email">*Client Email:</label>
                <input type="text" name="email" class="form-control" placeholder="Email"><br>
              </div>
            </div>


            <!-- Client Emergency Contact -->
            <div class="row">

              <!-- Client Emergency Contact Phone Number -->
              <div class="col-md-6">
                <label for="emergencyContact">Emergency Contact Affiliation:</label>
                <input type="text" name="emergencyContact" class="form-control" placeholder="Emergency Contact"><br>
              </div>

              <!-- Client Emergency Contact Phone Number -->
              <div class="col-md-6">
                <label for="emergencyPhone">Contact Phone Number:</label>
                <input type="text" name="emergencyPhone" class="form-control" placeholder="Emergency Phone"><br>
              </div>
            </div>

            <!-- Schedule -->
            <label for="clientName">Schedule:</label>

              <div class="row">
                <div class="col-md-3">
                  <label class="checkbox"><input type="checkbox" name="U">Sunday</label>
                  <label class="checkbox"><input type="checkbox" name="M">Monday</label>
                </div>

                <div class="col-md-3">
                  <label class="checkbox"><input type="checkbox" name="T">Tuesday</label>
                  <label class="checkbox"><input type="checkbox" name="W">Wednesday</label>
                </div>
                
                <div class="col-md-3">
                  <label class="checkbox"><input type="checkbox" name="R">Thursday</label>
                  <label class="checkbox"><input type="checkbox" name="F">Friday</label>
                </div>

                <div class="col-md-3">
                  <label class="checkbox"><input type="checkbox" name="S">Saturday</label>
                </div>

                <!-- for each checkbox checked add value to an array -->
                <!-- initialize $schedule -->
                <?php
                  $schedule = "";
                  if (isset($_POST['U'])) {
                    $schedule .= "U";
                  }
                  if (isset($_POST['M'])) {
                    $schedule .= "M";
                  }
                  if (isset($_POST['T'])) {
                    $schedule .= "T";
                  }
                  if (isset($_POST['W'])) {
                    $schedule .= "W";
                  }
                  if (isset($_POST['R'])) {
                    $schedule .= "R";
                  }
                  if (isset($_POST['F'])) {
                    $schedule .= "F";
                  }
                  if (isset($_POST['S'])) {
                    $schedule .= "S";
                  }
                ?>

              </div>

            <!-- Additional Information (large textbox) -->
            <br>
            <label for="additionalInformation">Additional Information:</label>
            <textarea class="form-control" name="additionalInformation" rows="5" id="comment"></textarea><br>
            
            <!-- Submit Button -->
            <input type="submit" name="submitNewClient" value="Add Client" class="btn btn-primary">
          </form>


          <!-- if submit the add information to database with success message -->
          <?php if (isset($_POST['submitNewClient'])): ?>
            <?php
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $emergencyContact = $_POST['emergencyContact'];
                $emergencyPhone = $_POST['emergencyPhone'];           
                $additionalInfo = $_POST['additionalInformation'];
                
                $sql = "INSERT INTO client (clientID, clientName, phone, email, emergencyContact, emergencyPhone, schedule, additionalInfo)
                VALUES (0, '$name', '$phone', '$email', '$emergencyContact', '$emergencyPhone', '$schedule', '$additionalInfo')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>
          <?php endif; ?>
            
        </div>
      
        
          




       <!-- Update User Information -->
       <div id="updateClient" style="display:none">
       <!-- text box to get client name and text box to get clientID -->
            <form id="updateClient" class="form-group" method="post" onsubmit="noReset();">
                <label for="clientName">Client Name:</label>
                <input type="text" name="clientName" class="form-control" placeholder="Name" value="Tyler Terry"><br>
                <label for="clientID">Client ID:</label>
                <input type="text" name="clientID" class="form-control" placeholder="Client ID" value="0001"><br>
                <input type="submit" name="submitUpdateClient" value="Search" class="btn btn-primary"><br>
            </form>
        
        
    
    

        <!-- ---------------------------------------- SQL / Variables ---------------------------------------- -->

        <!-- MyInformation SQL / Variables -->
        <?php
            $sql = "SELECT * FROM user WHERE userID = '0001'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            //   variables
            $userID = $row['userID'];


            $userType = $row['userTypeID'];
            $temp = $row['userTypeID'];
            $uname = $row['uname'];
            $pword = $row['pword'];
            $fname = $row['fname'];
            $lname = $row['lname'];

            // get age from date of birth (dob)
            $dateOfBirth = $row['dob'];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $age = $diff->format('%y');


            $dob = $row['dob'];
            $zipcode = $row['zipcode'];
            $email = $row['email'];
            $regDate = $row['regDate'];

            // get userType name from userType table
            $sql = "SELECT typeName FROM userType WHERE typeID = '$userType'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $userType = $row['typeName'];
        ?> 


        <!-- Body Composition SQL / Variables -->
        <?php
            $sql = "SELECT * FROM userDetails WHERE userID = '0001'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
            // variables
            $height = $row['height'];
            $startWeight = $row['startWeight'];
            $currentWeight = $row['currentWeight'];
            $goalWeight = $row['goalWeight'];
            $bmi = $row['bmi'];
            $bodyFat = $row['bodyFat'];
            $fatFreeWeight = $row['fatFreeWeight'];
            $subcutaneousFat = $row['subcutaneousFat'];
            $visceralFat = $row['visceralFat'];
            $bodyWater = $row['bodyWater'];
            $skeletalMuscle = $row['skeletalMuscle'];
            $muscleMass = $row['muscleMass'];
            $boneMass = $row['boneMass'];
            $protein = $row['protein'];
            $bmr = $row['bmr'];
            $metabolicAge = $row['metabolicAge'];
        ?>


        <!-- ---------------------------------------------- FORMS ---------------------------------------------- -->


        <!-- My Information Form / Body Composition From -->
        <form id=updateClient method="post">

            <!-- ---------------------------------------- My Information ---------------------------------------- -->
            <table id="myInformation" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                    <th class="active" colspan="4"> My Information</th>
                    </tr>
                </thead>
                <tr>
                    <td>User ID</td>
                    <!-- textbox -->
                    <td><input type="text" class="form-control" name="userID" value="<?php echo $userID; ?>" readonly></td>
                    <td>User Type</td>
                    <!-- dropdown menu with user type options -->
                    <td>
                        <select class="form-control" name="userType" >
                            <option value="<?php echo $temp; ?>"><?php echo $userType; ?></option>
                            <option value="1">Maintain</option>
                            <option value="2">Weight Loss</option>
                            <option value="3">Weight Gain</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" class="form-control" name="uname" value="<?php echo $uname; ?>" ></td>
                    <td>Password</td>
                    <!-- href password reset -->
                    <td><a href="passwordReset.php">Reset Password</a></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" ></td>
                    <td>Last Name</td>
                    <td><input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" ></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <!-- display format Month DD / MM / YYYY -->
                    <td>
                        <input type="text" class="form-control" name="dob" value="<?php echo "$dob"; ?>" >
                        <p><span class="glyphicon glyphicon-info-sign"></span> Change Date of Birth in order to change age. </p>
                    </td>
                    <td>Zip Code</td>
                    <td><input type="number" class="form-control" name="zipcode" value="<?php echo $zipcode; ?>" ></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="form-control" name="email" value="<?php echo $email; ?>" ></td>
                    <td>Registration Date</td>
                    <td><input type="text" class="form-control" name="regDate" value="<?php echo $regDate; ?>" readonly></td>
                </tr>
            </table>
                
            
            &nbsp;


            <!-- ---------------------------------------- Body Composition ---------------------------------------- -->
            <table id="bodyComposition" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                    <th class="active" colspan="4"> Body Composition Information</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                    <th>Age:</th>
                        <td><input type="text" class="form-control" name="age" value="<?php echo $age; ?>" readonly></td>
                    <th>Start Weight:</th>
                        <td><input type="text" class="form-control" name="startWeight" value="<?php echo $startWeight; ?>"></td>
                    <tr>
                        <th>Height:</th>
                        <td><input type="text" class="form-control" name="height" value="<?php echo $height; ?>" ></td>
                    
                    <th>Current <br><br> Goal Weight:</th>
                        <td>
                            <input type="text" class="form-control" name="currentWeight" value="<?php echo $currentWeight; ?>" >
                            <input type="text" class="form-control" name="goalWeight" value="<?php echo $goalWeight; ?>">
                        </td>
                    </tr>

                    <tr>
                    <th>BMI:</th>
                        <td><input type="text" class="form-control" name="bmi" value="<?php echo $bmi; ?>"></td>
                
                    <th>Body Fat %:</th>
                        <td><input type="text" class="form-control" name="bodyFat" value="<?php echo $bodyFat; ?>"></td>
                    </tr>

                    <tr>
                    <th>Fat-Free Body Weight:</th>
                        <td><input type="text" class="form-control" name="fatFreeWeight" value="<?php echo $fatFreeWeight; ?>"></td>
                    
                    <th>Subcutaneous Fat %:</th>
                        <td><input type="text" class="form-control" name="subcutaneousFat" value="<?php echo $subcutaneousFat; ?>"></td>
                    </tr>

                    <tr>
                    <th>Visceral Fat:</th>
                        <td><input type="text" class="form-control" name="visceralFat" value="<?php echo $visceralFat; ?>"></td>

                    <th>Body Water %:</th>
                        <td><input type="text" class="form-control" name="bodyWater" value="<?php echo $bodyWater; ?>"></td>
                    </tr>

                    <tr>
                    <th>Skeletal Muscle %:</th>
                        <td><input type="text" class="form-control" name="skeletalMuscle" value="<?php echo $skeletalMuscle; ?>"></td>

                    <th>Muscle Mass:</th>
                        <td><input type="text" class="form-control" name="muscleMass" value="<?php echo $muscleMass; ?>"></td>
                    </tr>

                    <tr>
                    <th>Bone Mass:</th>
                        <td><input type="text" class="form-control" name="boneMass" value="<?php echo $boneMass; ?>"></td>

                    <th>Protein %:</th>
                        <td><input type="text" class="form-control" name="protein" value="<?php echo $protein; ?>"></td>
                    </tr>

                    <tr>
                    <th>BMR:</th>
                        <td><input type="text" class="form-control" name="bmr" value="<?php echo $bmr; ?>"></td>

                    <th>Metabolic Age:</th>
                        <td><input type="text" class="form-control" name="metabolicAge" value="<?php echo $metabolicAge; ?>"></td>
                    </tr>

                </tbody>
            </table>

            &nbsp;

            <input type="submit" class="btn btn-primary" id="byeButton" name="updateUser" style="display:block" onclick="updateClient();" value="Update Client Info">
        </form>
        

        <!-- ------------------------------------------- SQL / Updates ------------------------------------------- -->




        <!-- My Information SQL / Update Table -->
        <?php
            if(isset($_POST['updateUser'])){
                $userType = $_POST['userType'];
                $uname = $_POST['uname'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];

                $dob = $_POST['dob'];
                $zipcode = $_POST['zipcode'];
                $email = $_POST['email'];
                $regDate = $_POST['regDate'];
                $sql = "UPDATE user SET userTypeID = '$userType', uname = '$uname', fname = '$fname', lname = '$lname', dob = '$dob', zipcode = '$zipcode', email = '$email', regDate = '$regDate' WHERE userID = '$userID'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    // run success message function
                    echo '<BODY onLoad="successMessage()">';
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        ?>

            

        <!-- Body Composition SQL / Update Table -->
        <?php
            if(isset($_POST['updateUser'])){
                
                $height = $_POST['height'];
                $startWeight = $_POST['startWeight'];
                $currentWeight = $_POST['currentWeight'];
                $goalWeight = $_POST['goalWeight'];
                $bmi = $_POST['bmi'];
                $bodyFat = $_POST['bodyFat'];
                $fatFreeWeight = $_POST['fatFreeWeight'];
                $subcutaneousFat = $_POST['subcutaneousFat'];
                $visceralFat = $_POST['visceralFat'];
                $bodyWater = $_POST['bodyWater'];
                $skeletalMuscle = $_POST['skeletalMuscle'];
                $muscleMass = $_POST['muscleMass'];
                $boneMass = $_POST['boneMass'];
                $protein = $_POST['protein'];
                $bmr = $_POST['bmr'];
                $metabolicAge = $_POST['metabolicAge'];
                
                $sql = "UPDATE userDetails SET startWeight = '$startWeight', currentWeight = '$currentWeight', goalWeight = '$goalWeight', bmi = '$bmi', bodyFat = '$bodyFat', fatFreeWeight = '$fatFreeWeight', subcutaneousFat = '$subcutaneousFat', visceralFat = '$visceralFat', bodyWater = '$bodyWater', skeletalMuscle = '$skeletalMuscle', muscleMass = '$muscleMass', boneMass = '$boneMass', protein = '$protein', bmr = '$bmr', metabolicAge = '$metabolicAge' WHERE userID = '0001'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    // run success message function
                    echo '<BODY onLoad="successMessage()">';
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        ?>

    


    </div>
    <!-- End Update User Information -->








    <!-- Display Client Information -->
    <div id="displayClient" style="display:none">
        <form id="updateClient" class="form-group" method="post" onsubmit="noReset();">
            <label for="clientName">Client Name:</label>
            <input type="text" name="clientName" class="form-control" placeholder="Name" value="Tyler Terry"><br>
            <label for="clientID">Client ID:</label>
            <input type="text" name="clientID" class="form-control" placeholder="Client ID" value="0001"><br>
            <input type="submit" name="submitUpdateClient" value="Search" class="btn btn-primary"><br>
        </form>


        <!-- echo clientID 0001 from database -->
        <?php
            $sql = "SELECT * FROM user WHERE userID = '0001'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            //   variables
            $userID = $row['userID'];


            $userType = $row['userTypeID'];
            $uname = $row['uname'];
            $pword = $row['pword'];
            $fname = $row['fname'];
            $lname = $row['lname'];

            // get age from date of birth (dob)
            $dateOfBirth = $row['dob'];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $age = $diff->format('%y');


            $dob = $row['dob'];
            $zipcode = $row['zipcode'];
            $email = $row['email'];
            $regDate = $row['regDate'];

            // get userType name from userType table
            $sql = "SELECT typeName FROM userType WHERE typeID = '$userType'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $userType = $row['typeName'];
        ?>

        <!-- My Information -->
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="active" colspan="4">My Information</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><b>User ID:</</td>
                <td><?php echo $userID; ?></td>
                <td><b>Goal:</</td>
                <td><?php echo $userType; ?></td>
            </tr>
            <tr>
                <td><b>Username:</</td>
                <td><?php echo $uname; ?></td>
                <td><b>Password:</</td>
                <!-- replace characters with black stars -->
                <td><?php echo str_repeat("*", strlen($pword)); ?></td>
            </tr>
            <tr>
                <td><b>First Name:</</td>
                <td><?php echo $fname; ?></td>
                <td><b>Last Name:</</td>
                <td><?php echo $lname; ?></td>
            </tr>
            <tr>
                <td><b>Age:</</td>
                <td><?php echo $age; ?></td>
                <td><b>Zipcode:</</td>
                <td><?php echo $zipcode; ?></td>
            </tr>
            <tr>
                <td><b>Email:</</td>
                <td><?php echo $email; ?></td>
                <td><b>Registration Date:</</td>
                <!-- format date Month Name, DD, YYYY -->
                <td><?php echo date("F j, Y", strtotime($regDate)); ?></td>
            </tr>
            </tbody>
        </table>



        <!-- get information of userDetails -->
        <?php
            $sql = "SELECT * FROM userDetails WHERE userID = '0001'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
            // variables
            $height = $row['height'];
            $startWeight = $row['startWeight'];
            $currentWeight = $row['currentWeight'];
            $goalWeight = $row['goalWeight'];
            $bmi = $row['bmi'];
            $bodyFat = $row['bodyFat'];
            $fatFreeWeight = $row['fatFreeWeight'];
            $subcutaneousFat = $row['subcutaneousFat'];
            $visceralFat = $row['visceralFat'];
            $bodyWater = $row['bodyWater'];
            $skeletalMuscle = $row['skeletalMuscle'];
            $muscleMass = $row['muscleMass'];
            $boneMass = $row['boneMass'];
            $protein = $row['protein'];
            $bmr = $row['bmr'];
            $metabolicAge = $row['metabolicAge'];
        ?>

        &nbsp;

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="active" colspan="4"> Body Composition Information</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th>Age:</th>
                <td><?php echo $age; ?></td>
                <th>Start Weight:</th>
                <td><?php echo $startWeight; ?> lbs</td>
            <tr>
                <th>Height:</th>
                <td><?php echo $height; ?></td>

                <th>Current / Goal Weight:</th>
                <td><?php echo $currentWeight; ?> lbs / <?php echo $goalWeight; ?> lbs</td>
            </tr>

            <tr>
                <th>BMI:</th>
                <td><?php echo $bmi; ?></td>
            
                <th>Body Fat %:</th>
                <td><?php echo $bodyFat; ?>%</td>
            </tr>

            <tr>
                <th>Fat-Free Body Weight:</th>
                <td><?php echo $fatFreeWeight; ?> lb</td>
            
                <th>Subcutaneous Fat %:</th>
                <td><?php echo $subcutaneousFat; ?>%</td>
            </tr>

            <tr>
                <th>Visceral Fat:</th>
                <td><?php echo $visceralFat; ?></td>

                <th>Body Water %:</th>
                <td><?php echo $bodyWater; ?>%</td>
            </tr>

            <tr>
                <th>Skeletal Muscle %:</th>
                <td><?php echo $skeletalMuscle; ?>%</td>

                <th>Muscle Mass:</th>
                <td><?php echo $muscleMass; ?> lb</td>
            </tr>

            <tr>
                <th>Bone Mass:</th>
                <td><?php echo $boneMass; ?> lb</td>

                <th>Protein %:</th>
                <td><?php echo $protein; ?>%</td>
            </tr>

            <tr>
                <th>BMR:</th>
                <td><?php echo $bmr; ?> <small>KCAL</small></td>

                <th>Metabolic Age:</th>
                <td><?php echo $metabolicAge; ?></td>
            </tr>

            </tbody>
        </table>
        </div>
    </div>
    


    

    


















    


    

</div> <!-- end row -->

</div> 
<!-- End Middle container -->






  <!-- Footer -->
  <br> 
  <br>
  <footer class="container-fluid">

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



  <!-- ========================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="bootstrap-3.0.0/assets/js/jquery.js"></script>
  <script src="bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>    
</body>
</html>



