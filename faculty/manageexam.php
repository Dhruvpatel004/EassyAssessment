<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
    <style>
        body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
			
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
    </style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      table {
        border-collapse: separate;
        border-spacing: 0 15px;
      }
      th {
        background-color: #4287f5;
        color: white;
      }
      th,
      td {
        width: 150px;
        text-align: center;
        border: 1px solid black;
        padding: 5px;
      }
      h2 {
        color: #4287f5;
      }
    </style>
<table class="data-table">
		<!-- <caption class="title">All kuiz questions</caption> -->
		<thead>
			<tr>
				<th>Exam ID</th>
				<th>Course id</th>
				<th>Exam title</th>
				<th>Exam Time limit</th>
				<!-- <th>question time limit</th> -->
				<th>No of que</th>
				<th>ex dec </th>
				<th>Ex Status</th>
				<th>Edit</th>
				<th>Manage Que</th>

			</tr>
		</thead>
		<tbody>
        
        <?php 
            $conn = mysqli_connect("localhost","root","","easyassessment");
            // Check connection
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
			$fusername = $_SESSION['username'];
            $query = "SELECT * FROM exam  where fusername = '$fusername' ORDER BY status ";
            $select_exam = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_exam) > 0 ) {
            while ($row = mysqli_fetch_array($select_exam)) {
				$eno = $row['ex_id'];
                $qno = $row['ex_id'];
                $question = $row['cou_id'];
                $option1 = $row['ex_title'];
                $option2 = $row['ex_time_limit'];
                $option3 = $row['ex_questlimit'];
                $option4 = $row['ex_noofque'];
                $Answer = $row['ex_description'];
				$st = $row['status'];
                echo "<tr>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                // echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
                echo "<td>$st</td>";
                echo "<td> <a class='btn btn-primary btn-sm' href='?page=editexam&qno=$eno'> Edit </a></td>";
				echo "<td> <a class='btn btn-info btn-sm' href='?page=que&eno=$eno'>Manage Question</a></td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>
<?php
if (isset($_GET['eno'])) {
                include_once 'db.php';
                // include("auth_session.php");
                $a=$_GET['eno'];
                $page='que';
                // include "faculty/viewque.php?eno='$a'";
               
            }
			?>