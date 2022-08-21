<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap core CSS (3.0.0) -->
    <link href="../bootstrap-3.0.0/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <!-- login.css from css folder -->
    <link href="../css/login.css" rel="stylesheet">
    


</head>


<!-- Database Connection -->
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


<!-- Javascript Functions -->
<script>

    // Display login form
    function displayLogin() {
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("options").style.display = "none";
    }



    function validateLogin() {
        var x = document.forms["loginForm"]["username"].value;
        if (x == "") {
            alert("Username must be filled out");
            return false;
        }

        var y = document.forms["loginForm"]["password"].value;
        if (y == "") {
            alert("Password must be filled out");
            return false;
        }
    }
</script>


<!-- Body -->
<body>

    <!-- center container -->
    


    

    <!-- Login / Register -->
    <div class="panel panel-default" id="options" style="display: block">
        <div class="panel-heading">
            <img src="../assets/logo.png" alt="Spartan Logo" >
            <h1>PHASE TWO</h1>
        </div>

        <div class="panel-body">

            <form>
                <input name="login" type="button" class="btn btn-lg btn-outline-dark" value="Login" onclick="displayLogin();"></>
                <input href="phaseTwo.php" type="button" class="btn btn-lg btn-outline-dark" value="Register"></>
            </form>
        </div>
    </div>



    <!-- Login Information Input -->

    <div class="panel panel-default" id="loginForm" style="display: none">

        <div class="panel-heading">
            <h2>Welcome Back!</h2>
        </div>

        <div class="panel-body">
            <form action="login.php" method="post" onsubmit="return validateLogin()">
                <br>
                <div>
                    <label class="float-left" for="inputPassword">Username:</label>
                    <input type="text" class="form-control" id="inputPassword" placeholder="Password">
                </div>
                <br>
                <div>
                    <label  class="float-left" for="inputPassword">Password:</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>

                
                <!-- Login Button -->
                <br><button type="button" class="btn btn-lg btn-outline-dark"><a href="../home/home.php">Login</a></button>


                <!-- Forgot password -->
                <br><br><a href="forgotPassword.php">Forgot password?</a>

                <br>

                <!-- Register -->
                <a href="phaseTwo.php">Register</a>

            </form>
        </div>
    </div>

        
                    



    
            
       
            
        

</body>



</html>