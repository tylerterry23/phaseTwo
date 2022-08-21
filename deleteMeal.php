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

<!-- php delete meal from database based of post id -->
<?php
    $id = $_POST['id'];
    $query = "DELETE FROM nutritionTracker WHERE mealID = $id";
    $result = mysqli_query($conn, $query);
    
    // get highest mealID from mealTracker table
    $query = "SELECT MAX(mealID) FROM mealTracker";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $maxID = $row[0];
    
    // update auto AUTO_INCREMENT value in mealTracker table
    $query = "ALTER TABLE nutritionTracker AUTO_INCREMENT = $maxID";
    $result = mysqli_query($conn, $query);
    
    // echo success message
    
?>

