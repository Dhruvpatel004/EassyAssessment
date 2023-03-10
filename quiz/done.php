<?php
session_start();

$res=$_SESSION['score'];
// echo $res;
$conn = mysqli_connect("localhost","root","","easyassessment");
$user=$_SESSION['username'];
$en=$_SESSION['eno'];
            // $query = "SELECT * FROM exmminee WHERE username='$user' AND statuss='active' ";
            $query = "UPDATE exmminee SET statuss = 'deactive' , result = '$res'   WHERE ex_id = '$en' AND username='$user' ";
// correct_answer
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
if (mysqli_affected_rows($conn) > 0 ) {
    echo "<script>alert('You have successfully give exam. ');
    window.location.href= '../studentdashboard.php?page=home'; </script> " ;
}
else {
    "<script>alert('error, try again!'); </script> " ;
}

?>