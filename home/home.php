<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.0.0/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/phaseTwo.css" rel="stylesheet">
    <link href="../css/homePage.css" rel="stylesheet">


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


<!-- chart.js for progress chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>







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

    <!-- Row 1 Welcome Session user -->
    <div class="row">
      <div class="col-md-12">
        <h1>Welcome Back Tyler,</h1>
      </div>
    </div>

    &nbsp;
    

    <!-- Row 2 -->
    <div class="row">
      <div class="col-md-5">

        <!-- panel to show updates -->
        <div class="panel panel-phaseTwo">

          <!-- panel heading -->
          <div class="panel-heading">
            <h3 class="panel-title">Today's Progress<span class="navbar-right"><?php echo date('F j, Y') ?></span></h3>
          </div>
          

          <!-- php todays date format month name, day, year -->
        

          <div class="panel-body">
            <!-- label -->
            <label id="calBar">776 Calories Remaining</label>
            <div class="progress progress" style="height:4em;">
              <div class="progress-bar progress-bar-phaseTwo2"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                <span class="sr-only">45% Complete</span>
              </div>
            </div>
          
            <!-- macro row -->
            <!-- horizontal divider -->
            <hr>
            <b id="calBar">Macros</b>
            <br><br>
            

            <label> Carbs: 408.36g / 492g </label><br>
            <div class="progress">
              <div class="progress-bar progress-bar-phaseTwo"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 83%">
                <span class="sr-only">45% Complete</span>
              </div>
            </div>
            <label> Fat: 94.32g / 131g </label><br>
            <div class="progress">
              <div class="progress-bar progress-bar-phaseTwo"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                <span class="sr-only">45% Complete</span>
              </div>
            </div>
            <label> Protein: 36g / 197g </label><br>
            <div class="progress">
              <div class="progress-bar progress-bar-phaseTwo"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 91%">
                <span class="sr-only">45% Complete</span>
              </div>
            </div>
            <!-- end macro row -->
          </div>
        </div>
        <!-- end panel to show updates -->

    
      </div>


      <!-- column 1 for space -->
      <div class="col-md-1">
      </div>








      <div class="col-md-6">

        <div class="panel panel-phaseTwo">
          <div class="panel-heading heading-phaseTwo">
            <h3 class="panel-title">Personal Records</h3>
          </div>
          

          <div class="panel-body">
            <!-- two dropdown menus -->
            <div class="row">
              <div class="col-md-5">
                <label>Chart View:</label>
                <select class="form-control p2background">
                  <option>Max Weight Lifted</option>
                  <option>Body Weight Progress</option>
                </select>
              </div>
              <div class="col-md-5">
                <label>Exercise: </label>
                <!-- dropdown menu with all exercise name from exercise table -->
                <!-- sql query -->
                <select class='form-control p2background'>
                  <option value="">Bench Press (Smith Machine)</option>
                <?php
                  $sql = "SELECT * FROM exercise";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row["exerciseID"] . "'>" . $row["exerciseName"] . "</option>";
                        
                    }
                  }
                ?>
                </select>
                
              </div>
              <div class="col-md-2">
                <div>
                  <label>&nbsp;</label>
                  <button type="submit" class="btn btn-phaseTwo form-control" >Update</button>
                </div>
              </div>
          
            </div>
            <!-- submit button -->

            
            


            <div id="weightChartDisplay" style="display:block">
              &nbsp;
              <canvas id="weightChart" style="width:100%;max-width:600px"></canvas>
            </div>

            <div id="weightChartDisplay" style="display:none">
              <canvas id="maxChart" style="width:100%;max-width:600px"></canvas>
            </div>


          </div>
        </div>
        <!-- end panel to Personal Records -->

       


        

        
      </div>



    </div>


  </div>
  <!-- end container -->
    

        






  
  
    

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


  <!-- ========================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../bootstrap-3.0.0/assets/js/jquery.js"></script>
  <script src="../bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>
  


  <!-- charts -->
  <script>
    var xValues = ['5/6','5/12','5/16','5/21','5/31','6/6','6/14','6/20','7/1','7/8','7/15'];
    var yValues = [160,162.5,170,170,180,185,185,195,210,210,225,250];

    new Chart("weightChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "#ffa500",
          borderColor: "#ffa500",
          data: yValues
          
        }]
      },
      options: {
        title: {
          display: true,
          fontSize: 20,
          fontColor: "#999999",
          text: "Max Weight"
        },

        legend: {display: false},
        scales: {
          yAxes: [{
            ticks: {min: 140, max:250},
            scaleLabel: {
              display: true,
              fontSize: 20,
              fontColor: "#999999",
              labelString: 'Weight (lbs)'
            }
          }],
          xAxes: [{
            scaleLabel: {
              display: true,
              fontSize: 20,
              fontColor: "#999999",
              labelString: 'Date'
            }
          }]
        }
      }
    });
  </script>

  <script>
    var xValues = [50,60,70,80,90,100,110,120,130,140,150];
    var yValues = [7,8,8,9,9,9,10,11,14,14,15];

    new Chart("maxChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "#428bca",
          borderColor: "#428bca",
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          fontSize: 20,
          fontColor: "black",
          text: "World Wide Wine Production"
        },
        
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
  </script>
  

</body>
</html>



