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

<!-- php delete workout from database based of post id -->
<?php
    $id = $_POST['id'];
    $query = "DELETE FROM workoutTracker WHERE workoutID = $id";
    $result = mysqli_query($conn, $query);

    // get highest workoutID from workoutTracker table
    $query = "SELECT MAX(workoutID) FROM workoutTracker";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $maxID = $row[0];

    // update auto AUTO_INCREMENT value in workoutTracker table
    $query = "ALTER TABLE workoutTracker AUTO_INCREMENT = $maxID";
    $result = mysqli_query($conn, $query);

    // echo success message

?>

