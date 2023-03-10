
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <!-- <link rel="stylesheet" href="css/bg.css"/> -->
    <style>
    .admin-title
{
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

input{
    margin-top: 10px;
margin-left: 33vw;
border: 2px solid black;
border-radius: 5px;
padding-left: 50px;
padding-right: 40px;
text-align: center;
}
.admin-subbut
{
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
    if (isset($_REQUEST['cname'])) {
        // removes backslashes
        $cname = stripslashes($_REQUEST['cname']);
        //escapes special characters in a string
        $cname = mysqli_real_escape_string($con, $cname);
        
        $ccode = stripslashes($_REQUEST['ccode']);
        $ccode = mysqli_real_escape_string($con, $ccode);
        $csem = stripslashes($_REQUEST['csem']);
        $csem = mysqli_real_escape_string($con, $csem);
        $module    = "course";
        $create_datetime = date("Y-m-d H:i:s");
       
    if($module=="course")
        {
        $query    = "INSERT into `course` (cname,ccode,csem, module, create_datetime)
                     VALUES ('$cname', '$ccode','$csem', '$module', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>New course registered successfully.</h3><br/>
                  <p class='link'>Click here to <a class='button' href='admindashboard.php'>Go Dashboard</a> again.</p>
                  </div>";
                  
                  
        } 
        else if($module=="course")
        {
        $query    = "SELECT 'ccode,module' FROM `student` WHERE ccode='$ccode'";
        $result = mysqli_query($con, $query);
        echo "<div class='form'>
        <h3>This Course is already exists.</h3><br/>
        <p class='link'>Click here to <a class='button' href='admindashboard.php'>registration</a> again.</p>
        </div>";
        }
        else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                
                  <p class='link'>Click here to <a class='button' href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
    
    } 
    else {
?>
<div class="container">

    <form class="form" action="" method="post">
        <h1 class="admin-title">Course Registration</h1>
        <input type="text" class="admin-input" name="cname" placeholder="cname" required />
        <br>
        <input type="text" class="admin-input" name="ccode" placeholder="Course code">
        <input type="number" class="admin-input" name="csem" placeholder="sem">
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