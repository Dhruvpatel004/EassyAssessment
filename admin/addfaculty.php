
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration Faculty</title>
    <link rel="stylesheet" href="css/bg.css"/>
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
.boxin
{
 padding: auto;
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

</style>

</head>


<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $name=stripslashes($_REQUEST['name']);
        $name=mysqli_real_escape_string($con, $name);
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);

        // $module    = stripslashes($_REQUEST['module']);
        // $module    = mysqli_real_escape_string($con, $module);
        $module="faculty";
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $subcode=stripslashes($_REQUEST['subcode']);
        $subcode=mysqli_real_escape_string($con, $subcode);

        $create_datetime = date("Y-m-d H:i:s");

    if($module=="faculty")
        {
        $query    = "INSERT into `faculty` (name,username, password,subcode, module, create_datetime)
                     VALUES ('$name','$username', '$password','$subcode' ,'$module', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>New facultu registered successfully.</h3><br/>
                  <p class='link'>Click here to <a class='button' href='admindashboard.php'>Go Dashboard</a> again.</p>
                  </div>";
                  
                  
        } 
        else if($module=="faculty")
        {
        $query    = "SELECT 'username,module' FROM `faculty` WHERE username='$username'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        echo "<div class='form'>
        <h3>This username is already exists.</h3><br/>
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
   
    } else {
?>
<div class="container">

    <form class="form" action="" method="post">
        <h1 class="admin-title">Add Faculty</h1>
        <input type="text" class="admin-input" name="name" placeholder="name" required />
        <input type="text" class="admin-input" name="username" placeholder="Username" required />
        
        <input type="password" class="admin-input" name="password" placeholder="Password">
        <input type="text" class="admin-input" name="subcode" placeholder="subcode" required />
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