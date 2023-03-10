<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eassy Asses</title>
    <link rel="stylesheet" href="css/login.css.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/nav.css">
    
</head>

<body>
    
    <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $module = stripslashes($_REQUEST['module']);
        $module = mysqli_real_escape_string($con, $module);
        // Check user is exist in the database
        if($module=="student")
        {
        $query    = "SELECT 'username,module,password' FROM `student` WHERE username='$username'AND password='$password'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: studentdashboard.php");
        } else {
               echo "<script type='text/javascript'>alert('Invalid Credentials ! Please try again.');
            window.location.assign('index.php')</script>";
        }}
        else if($module=="faculty")
        {
        $query    = "SELECT 'username,module,password' FROM `faculty` WHERE username='$username'AND password='$password'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: facultydashboard.php");
        } else {
            echo "<script type='text/javascript'>alert('Invalid Credentials ! Please try again.');
            window.location.assign('index.php')</script>";
        }}
        else if($module=="admin")
        {
        $query    = "SELECT 'username,module,password' FROM `admin` WHERE username='$username'AND password='$password'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: admindashboard.php");
        } else {
              echo "<script type='text/javascript'>alert('Invalid Credentials ! Please try again.');
            window.location.assign('index.php')</script>";
        }}
    } else {
?>



    <header class="header">
    <nav class="navbar">
    <div class="logo">
        <img src="img/logo.png" alt="LOGO" width="150px" height="100px">
    </div>
    <div class="title">
        <h1 class="titleOne">Easy Assessment</h1>
        <h2 class=" titleTwo">Easy Place to Assess student</h2>

    </div>
    <div class="list">
        <ul>
            <li class="listItem">
                <a href="index.php" onclick="openFullscreen();">HOME</a>
            </li>
            <!-- <li class="listItem">
                <a href="#">LOGIN</a> -->
            <li>
            </li>
            <li class="listItem">
                <a href="about.php" onclick="openFullscreen();">ABOUT US</a>
            </li>
            <li class="listItem">
                <a href="contact.php" onclick="openFullscreen();">CONTACT</a>
            </li>

        </ul>
        <!-- <button onclick="openFullscreen();" o>Open Fullscreen</button> -->
    </div>
</nav>
    </header>

    <main class="main">
    <div class="tt">

<div class="col-lg-6 col-md-8 login-box">

    <div class="col-lg-12 login-title">
        <h2>Login Here</h2>
    </div>

    <div class="col-lg-12 login-form">
        <div class="col-lg-12 login-form">
        <form method="post" class="login">
            
            <div class="username form-group">
            <label for="" class="form-control-label">Username : *</label>
            <input type="text" class="form-control" name="username" placeholder="Username" autofocus="true" required/>
            </div>
            <div class="password form-group">
                <label for="" class="form-control-label">Password : *</label>
                <input type="password" name="password" placeholder="Password" autofocus="true" required/>
            </div>
            <div class="module form-group form-group">
                <label for="" class="form-control-label" autofocus="true" required>Select : *</label>
                <select name="module" id="module" class="sl" autofocus="true" required>
                    <option value="">Select Here</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="but btn">
            <input type="submit" value="Login" name="submit" class="login-button" autofocus="true"/>
                <button type="reset" class="login-button">Reset</button>
            </div>
        </form>
        </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
        </div>
        <div class="img" >
            <div class="sideimg">
                <img src="img/bg.jpg" alt="bg" width="600px" height="500px" >
            </div>
        </div>
    </main>
    <footer>
        <h4 class="titleFour">
            Easy Assessment
        </h4>
        <p>&copy; All right are received by 21cs036,21cs037,21cs041 </p>
    </footer>
    <?php
}
?>
</body>

</html>