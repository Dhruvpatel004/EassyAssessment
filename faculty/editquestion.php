
<?php 
$conn = mysqli_connect("localhost","root","","easyassessment");

if (isset($_GET['Sr'])) {
	$sr = mysqli_real_escape_string($conn , $_GET['Sr']);
	if (is_numeric($sr)) {
		$query = "SELECT * FROM question WHERE sr = '$sr' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $abc=$row['ex_id'];
				 $qno = $row['que_id'];
                 $question = $row['question'];
                 $ans1 = $row['op1'];
                 $ans2 = $row['op2'];
                 $ans3 = $row['op3'];
                 $ans4 = $row['op4'];
                 $correct_answer = $row['que_ans'];
			}
		}
		else {
			echo "<script> alert('error');
			window.location.href = '../facultydashboard.php'; </script>" ;
		}
	}
	else {
		header("location: ../facultydashboard.php';");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
	// $conn = mysqli_connect("localhost","root","","easyassessment");
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);
    

	$query = "UPDATE question SET question = '$question' , op1 = '$choice1' , op2= '$choice2' , op3 = '$choice3' , op4 = '$choice4' , que_ans= '$correct_answer' WHERE sr = '$sr' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully updated'); </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Easy Assessment</title>
		<link rel="stylesheet" type="text/css" href="faculty/css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<!-- <h1>PHP-Kuiz</h1> -->
				<!-- <a href="facultydashboard.php" class="start">Home </a> -->
				<!-- <a href="add.php" class="start">Add Question</a> -->
				<?php

				echo "<a href='?page=que&eno=$abc' class='start'>All Questions</a>";
				?>
				<!-- <a href="exit.php" class="start">Logout</a> -->
				
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Update a question...</h2>
				<form method="post" action="">
					

					<p>
						<label>Question</label>
						<input type="text" name="question" required="" value="<?php echo $question; ?>">
					</p>
					<p>
						<label>Choice #1</label>
						<input type="text" name="choice1" required="" value="<?php echo $ans1; ?>">
					</p>
					<p>
						<label>Choice #2</label>
						<input type="text" name="choice2" required="" value="<?php echo $ans2; ?>">
					</p>
					<p>
						<label>Choice #3</label>
						<input type="text" name="choice3" required="" value="<?php echo $ans3; ?>">
					</p>
					<p>
						<label>Choice #4</label>
						<input type="text" name="choice4" required="" value="<?php echo $ans4; ?>">
					</p>
					<p>
						<label>Correct answer</label>
						<select name="answer" >
                        <option value="a">Choice #1 </option>
                        <option value="b">Choice #2</option>
                        <option value="c">Choice #3</option>
                        <option value="d">Choice #4</option>
                    </select>
					</p>
					<p>
						
						<input type="submit" name="submit" value="Save">
					</p>
				</form>
			</div>
		</main>

		

	</body>
</html>







