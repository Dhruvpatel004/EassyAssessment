
<?php 

$conn = mysqli_connect("localhost","root","","easyassessment");
if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);

    $eno = mysqli_real_escape_string($conn , $_GET['eno']);
    $checkqsn = "SELECT * FROM question WHERE ex_id='$eno' ";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO question(ex_id,que_id, question , op1,op2,op3,op4,que_ans) VALUES ($eno,'$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully added');
		window.location.href = '?page=que&eno=$eno'; </script> " ;
        // echo $eno;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Add Que</title>
		<link rel="stylesheet" type="text/css" href="faculty/css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<!-- <h1>PHP-Kuiz</h1> -->
				<!-- <a href="../facultydashboard.php" class="start">Home</a> -->
				<!-- <a href="add.php" class="start">Add Question</a> -->
				<?php
				$qno=$_GET['eno'];
				echo "<a href='?page=que&eno=$qno' class='start'>All Questions</a>";
				?>
				<!-- <a href="players.php" class="start">Players</a> -->
				<!-- <a href="exit.php" class="start">Logout</a> -->
				
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Add a question...</h2>
				<form method="post" action="">

					<p>
						<label>Question</label>
						<input type="text" name="question" required="">
					</p>
					<p>
						<label>Choice #1</label>
						<input type="text" name="choice1" required="">
					</p>
					<p>
						<label>Choice #2</label>
						<input type="text" name="choice2" required="">
					</p>
					<p>
						<label>Choice #3</label>
						<input type="text" name="choice3" required="">
					</p>
					<p>
						<label>Choice #4</label>
						<input type="text" name="choice4" required="">
					</p>
					<p>
						<label>Correct answer</label>
						<select name="answer">
                        <option value="a">Choice #1 </option>
                        <option value="b">Choice #2</option>
                        <option value="c">Choice #3</option>
                        <option value="d">Choice #4</option>
                    </select>
					</p>
					<p>
						
						<input type="submit" name="submit" value="Submit">
					</p>
				</form>
			</div>
		</main>

		

	</body>
</html>

