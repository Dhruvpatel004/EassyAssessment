<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exam</title>
    <link rel="stylesheet" type="text/css" href="css/addexam.css">
</head>
<style>
.container {
    margin-left: 25vw;
}

input {
    margin-top: 10px;
    /* margin-left: 33vw; */
    border: 2px solid black;
    border-radius: 5px;
    padding-left: 20px;
    padding-right: 20px;
}

label {
    display: inline-block;
    width: 150px;
    text-align: right;
}

.faculty-subbut {
    
    padding-right:25px;
    padding-left: 25px;
    margin-left: 10vw;
}
</style>

<body>
    <?php

$con = mysqli_connect("localhost","root","","easyassessment");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
if (isset($_POST['ccode'])) {
    // $examid = stripslashes($_REQUEST['examid']);
    // $examid = mysqli_real_escape_string($con, $examid);
    // removes backslashes
    $courseid = stripslashes($_REQUEST['ccode']);
    //escapes special characters in a string
    $courseid = mysqli_real_escape_string($con, $courseid);


    $examtitle = stripslashes($_REQUEST['examtitle']);
    $examtitle = mysqli_real_escape_string($con, $examtitle);
    $examtimelimit = stripslashes($_REQUEST['examtimelimit']);
    $examtimelimit = mysqli_real_escape_string($con, $examtimelimit);
    $quetlimit = stripslashes($_REQUEST['quetlimit']);
    $quetlimit = mysqli_real_escape_string($con, $quetlimit);
    $noofque = stripslashes($_REQUEST['noofque']);
    $noofque = mysqli_real_escape_string($con, $noofque);
    $exdescription = stripslashes($_REQUEST['exdescription']);
    $exdate = stripslashes($_REQUEST['dateofexam']);
    $exdescription = mysqli_real_escape_string($con, $exdescription);
    $module    = "student";
    $fusername = $_SESSION['username'];
    // $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `exam` (cou_id,ex_title,ex_time_limit,ex_questlimit,ex_noofque,ex_description,exam_date,fusername)VALUES ('$courseid', '$examtitle','$examtimelimit','$quetlimit','$noofque','$exdescription','$exdate','$fusername')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
              <h3>New exam is registered successfully.</h3><br/>
              <p class='link'>Click here to <a href='facultydashboard.php'>Go Dashboard</a> again.</p>
              </div>";
        }   else {
                echo "<div class='form'>
                <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='facultydashboard.php'>dashboard</a> again.</p>
              </div>";
                }
    }
else{
?>
    <div class="container">
        <form class="addexam" action="" method="post">

            <label for="">course :</label>

            <select name="ccode">
                <option value="">Select Course</option>
                <?php 
    $query ="SELECT ccode FROM course";
    $result = $con->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['ccode'];
    ?>
                <?php
    //selected option
    if(!empty($courseName) && $courseName== $option){
    // selected option
    ?>
                <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                <?php 
continue;
   }?>
                <option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
                <?php
    }}
    ?>
            </select>
            <br><br>
            <label for="">Exam Title</label>
            <input type="text" name="examtitle" placeholder="exam title" required>
            <br><br>
            <label for="">Exam Title limit</label>
            <input type="number" name="examtimelimit" placeholder="exam title limit" required>
            <br><br>
            <label for="">Question Title limit</label>
            <input type="number" name="quetlimit" placeholder="Question title limit" required>
            <br><br>
            <label for="">No of Question</label>
            <input type="number" name="noofque" placeholder="number of question" required>
            <br><br>
            <label for="">Date : </label>
            <input type="date" name="dateofexam" required>
            <br><br>
            <label for="examdescription">Exam description</label>
            <br>
            <textarea name="exdescription" rows="4" cols="50"></textarea>
            <div class="faculty-subbut">
                <input type="submit" name="submit" value="Register" class="faculty-button">
            </div>
        </form>
    </div>
    <?php
}
?>

</body>

</html>