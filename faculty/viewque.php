<?php
$_GET['eno']
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Easy Assessment</title>
		<link rel="stylesheet" type="text/css" href="faculty/style.css">
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
.danger
{
    background-color:#FF0000;
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
				<h1>Manage Exam</h1>
				<!-- <a href="../facultydashboard.php" class="start">Home</a> -->
				<?php
				$eno=$_GET['eno'];
				echo "<a class='butt' href='?page=addque&eno=$eno' class='start'>Add Question  </a> ";
				echo "<a class='butt' href='?page=addexaminee&eno=$eno' class='start'> Add Examinee</a>";
				echo "<a class='butt' href='?page=viewexaminee&eno=$eno' class='start'> view Examinee</a><br>";
				?>
				<!-- <a href="viewque.php" class="start">All Questions</a> -->
				<!-- <a href="players.php" class="start">Resulte</a> -->
				<!-- <a href="exit.php" class="start">Logout</a> -->
				
			</div>
		</header>

		
	<h1> All Questions</h1>
	<table class="data-table">
		<!-- <caption class="title">Exam Question</caption> -->
		<thead>
			<tr>
				<th>Q.NO</th>
				<th>Question</th>
				<th>Option1</th>
				<th>Option2</th>
				<th>Option3</th>
				<th>Option4</th>
				<th>Correct Answer </th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
        
        <?php 
            $conn = mysqli_connect("localhost","root","","easyassessment");
			$eno = mysqli_real_escape_string($conn , $_GET['eno']);
            $query = "SELECT * FROM question WHERE ex_id='$eno' ORDER BY que_id DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
				$sr = $row["que_id"];
                $De=$row["sr"];
                echo "<tr>
                <td>" . $row["que_id"] . "</td>
                <td>" . $row["question"] . "</td>
                <td>" . $row["op1"] . "</td>
                <td>" .$row["op2"]."</td>
                <td>" . $row["op3"] . "</td>
                <td>" . $row["op4"] . "</td>
                <td>" . $row["que_ans"] . "</td>
                <td>
                <a class='butt' href='?page=editque&Sr=$De'> Edit </a>
                    </td>
                    <td>
                    <a class='danger' href='?queid=$sr&eid=$eno'> Delete </a>
                </td>
            </tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>




