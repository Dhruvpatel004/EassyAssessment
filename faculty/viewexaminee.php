<?php
$_GET['eno']
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Easy Assessment</title>
		<link rel="stylesheet" type="text/css" href="faculty/css/style.css">
		<link rel="stylesheet" type="text/css" href="faculty/style1.css">
	</head>
	<style>
		.butt {
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
  border-radius:5px;
}
	</style>
	<body>
		<header>
			<div class="container">
				<h1>view examinee</h1>
				<!-- <a href="../facultydashboard.php" class="start">Home</a> -->
				<?php
				$eno=$_GET['eno'];
				echo "<a href='?page=addque&eno=$eno' class='start'>ADD QUESTION  </a> ";
				echo "<a href='?page=addexaminee&eno=$eno' class='start'> ADD EXAMINEE</a>";
				// echo "<a href='?page=viewexaminee&eno=$eno' class='start'> view Examinee</a>";
				?>
				<!-- <a href="viewque.php" class="start">All Questions</a> -->
				<!-- <a href="players.php" class="start">Resulte</a> -->
				<!-- <a href="exit.php" class="start">Logout</a> -->
				
			</div>
		</header>

		
	<h1> All Examinee</h1>
	<table class="data-table">
		<!-- <caption class="title">Exam Question</caption> -->
		<thead>
			<tr>
				<th>Sr</th>
				<th>Exam Id</th>
				<th>Username</th>
				<th>Full name</th>
				<th>Branch</th>
				<th>Semster</th>
				<th>Marks</th>
				<th>Status</th>
				<!-- <th>Edit</th> -->
			</tr>
		</thead>
		<tbody>
        
        <?php 
            $conn = mysqli_connect("localhost","root","","easyassessment");
			$eno = mysqli_real_escape_string($conn , $_GET['eno']);
            $query = "SELECT * FROM exmminee JOIN exam
			ON   exmminee.ex_id = exam.ex_id WHERE exmminee.ex_id='$eno' ";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
				$sr = $row['sr'];
                $qno = $row['ex_id'];
                $question = $row['username'];
                $option1 = $row['fname'];
                $option2 = $row['branch'];
                $option3 = $row['sem'];
				$result = $row['result'];
                $option4 = $row['statuss'];
				$noofque = $row['ex_noofque'];
                // $Answer = $row['que_ans'];
                echo "<tr>";
                echo "<td>$sr</td>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
				echo "<td>$result / $noofque</td>";
                echo "<td>$option4</td>";
                // echo "<td>$Answer</td>";
                // echo "<td> <a class='butt' href='?page=editque&sr=$sr'> Edit </a></td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>


