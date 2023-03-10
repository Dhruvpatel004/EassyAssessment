<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <!-- <link rel="stylesheet" href="css/bg.css"/> -->
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="bg.css">
    <style>
    .admin-title {
        text-align: center;
        font-size: 2em;
        font-family: "Core Sans N W01 35 Light";
        font-weight: normal;
        margin: .67em 0;
        display: block;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 3px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    input {
        margin-top: 10px;
        margin-left: 33vw;
        border: 2px solid black;
        border-radius: 5px;
        padding-left: 50px;
        padding-right: 40px;
        text-align: center;
    }

    .admin-subbut {
        padding: 10px;
        padding-left: 8px;
        margin-left: 2vw;
    }
    </style>
</head>

<body>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
        $name = mysqli_real_escape_string($con, $name);
        
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $yearcode = stripslashes($_REQUEST['yearcode']);
        $yearcode = mysqli_real_escape_string($con, $yearcode);
        $branch = stripslashes($_REQUEST['branch']);
        $branch = mysqli_real_escape_string($con, $branch);
        $currsem = stripslashes($_REQUEST['currsem']);
        $currsem = mysqli_real_escape_string($con, $currsem);
        $module    = "student";
        $create_datetime = date("Y-m-d H:i:s");
       
    if($module=="student")
        {
        $query    = "INSERT into `student` (name,username,password,yearcode,branch,currsem,module, create_datetime)
                     VALUES ('$name','$username','$password', '$yearcode','$branch','$currsem','$module', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>New Student registered successfully.</h3><br/>
                  <p class='link'><a class='button' href='admindashboard.php'>Click here to go Dashboard</a></p>
                  </div>";
        }
        else if($module=="student")
        {
            $query    = "SELECT 'username,module,currsem' FROM `student` WHERE username='$username'AND currsem='$currsem'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        echo "<div class='form'>
        <h3>This User is already exists.</h3><br/>
        <p class='link'><a class='button' href='admindashboard.php'>Click here to go Dashboard</a> </p>
        </div>";
        }
        else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                
                  <p class='link'><a class='btn btn-info btn-sm' href='addstudent.php'>Click here to registration</a> again.</p>
                  </div>";
        }
    }
    
    } 
    
    
 
else {
?>
    <div class="container">

        <form class="form" action="" method="post">
            <h1 class="admin-title">Add Student</h1>
            <input type="text" class="admin-input" name="name" placeholder="name" required />
            <br>
            <input type="text" class="admin-input" name="username" placeholder="username" required />
            <input type="password" class="admin-input" name="password" placeholder="password" required />
            <input type="text" class="admin-input" name="yearcode" placeholder="yearcode">
            <input type="text" class="admin-input" name="branch" placeholder="branch">
            <input type="text" class="admin-input" name="currsem" placeholder="currsem" required />
            <div class="admin-subbut">
                <input type="submit" name="submit" value="Register" class="admin-button">
            </div>
        </form>

    </div>
    <?php
    }
?>
</body>

</html>