
<?php 
if (isset($_GET['qno'])) {
    $conn = mysqli_connect("localhost","root","","easyassessment");
	$qno = mysqli_real_escape_string($conn , $_GET['qno']);
	if (is_numeric($qno)) {
		$query = "SELECT * FROM exam WHERE ex_id = '$qno' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $qno = $row['ex_id'];
                 $question = $row['cou_id'];
                 $ans1 = $row['ex_title'];
                 $ans2 = $row['ex_time_limit'];
                 $ans3 = $row['ex_noofque'];
                 $ans4 = $row['ex_description'];
                 $st=$row['status'];
                 $correct_answer = $row['ex_created'];
			}
		}
    }
    else {
        echo "<script> alert('error');
        window.location.href = 'manageexam.php'; </script>" ;
    }
}



?>
<?php 
if(isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost","root","","easyassessment");
// $qno = mysqli_real_escape_string($conn , $_GET['qno']);
$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
$st = htmlentities(mysqli_real_escape_string($conn , $_POST['sta']));



$query = "UPDATE exam SET cou_id = '$question' , ex_title = '$choice1' , ex_time_limit= '$choice2' , ex_noofque = '$choice3' , ex_description = '$choice4',status ='$st'  WHERE ex_id = '$qno' ";
// correct_answer
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
if (mysqli_affected_rows($conn) > 0 ) {
    echo "<script>alert('Question successfully updated');
    window.location.href= '?page=manageexam'; </script> " ;
}
else {
    "<script>alert('error, try again!'); </script> " ;
}
}

?>


<!DOCTYPE html>
<html>
<head>
    <!-- <title>PHP-Kuiz</title> -->
    <link rel="stylesheet" type="text/css" href="faculty/css/style.css">
</head>

<body>
    

    <main>
        <div class="container">
            <h2>Edit Exam</h2>
            <form method="post" action="">

                <p>
                    <label>Course Id : </label>
                    <input type="text" name="question" required="" value="<?php echo $question; ?>">
                </p>
                <p>
                    <label>Exam Title : </TItle></label>
                    <input type="text" name="choice1" required="" value="<?php echo $ans1; ?>">
                </p>
                <p>
                    <label>Exam Time Limit : </label>
                    <input type="text" name="choice2" required="" value="<?php echo $ans2; ?>">
                </p>
                <p>
                    <label>NO of Questions</label>
                    <input type="text" name="choice3" required="" value="<?php echo $ans3; ?>">
                </p>
                <p>
                    <label>Exam Description</label>
                    <input type="text" name="choice4" required="" value="<?php echo $ans4; ?>">
                </p>
                <p>
                    <label>Exam Status</label>
                    <select name="sta" id="">
                        <option value="<?php echo $st; ?>">curr : <?php echo $st; ?></option>
                        <option value="new">upcoming</option>
                        <option value="active">active</option>
                        <option value="old">Close</option>
                        
                    </select>
                 
                </p>
                <p>
                    <label>Exam Created : </label>
                    <label ><?php echo $correct_answer; ?></label>
                </p>
                <p>
                    
                    <input type="submit" name="submit" value="Submit">
                </p>
            </form>
        </div>
    </main>

    

</body>
</html>








