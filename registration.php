<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/bg.css">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $module    = stripslashes($_REQUEST['module']);
        $module    = mysqli_real_escape_string($con, $module);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        if($module=="student")
        {
        $query    = "INSERT into `student` (username, password, module, create_datetime)
                     VALUES ('$username', '$password', '$module', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>New Student is registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='admindashboard.php'>Go Dashboard</a> again.</p>
                  </div>";
            

        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
    if($module=="faculty")
        {
        $query    = "INSERT into `faculty` (username, password, module, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$module', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>New facultu registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='admindashboard.php'>Go Dashboard</a> again.</p>
                  </div>";
                  
                  
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
    else if($module=="admin")
        {
        $query    = "INSERT into `admin` (username, password, module, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$module', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>New Admin is registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='admindashboard.php'>Go Dashboard</a> again.</p>
                  </div>";
                  
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="module" placeholder="Student/Faculty/Admin">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>