<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Examinee</title>
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
</head>


<body>
    
<?php
$eno=$_GET['eno'];
				echo "<a class='butt' href='?page=viewexaminee&eno=$eno' class='start'> view Examinee</a><br>";

        if (isset($_GET['eno'])) {
            $con = mysqli_connect("localhost","root","","easyassessment");
            $aa=$_GET['eno'];
            // $sqla = "SELECT * FROM exam WHERE ex_id='$aa' ";
            $query = "SELECT * FROM exam WHERE ex_id='$aa'";
            $select_exam = mysqli_query($con, $query) or die(mysqli_error($con));
    echo "Exam id : ";
    echo $aa;
    if (mysqli_num_rows($select_exam) > 0 ) {
        while ($row = mysqli_fetch_array($select_exam)) {
            // $eno = $row['ex_id'];
            $qno = $row['ex_id'];
            $question = $row['cou_id'];
            $option1 = $row['ex_title'];
            echo "<br>COURSE CODE : ";
                echo $question;
                echo "<br>EXAM TITLE : ";
                echo $option1;
                echo "<br><br>";
            }
        }
        }
        ?>

    <div class="container">
    <form class="addexam" action="" method="post">

     <label for="">Branch : </label>
     <select name="branch" id="branch">
        <option value="">Select Here</option>
        <option value="cse">CSE</option>
        <option value="ce">CE</option>
        <option value="it">IT</option>
        <option value="me">ME</option>
        <option value="ee">EE</option>
        <option value="ec">EC</option>
     </select>
            
     <label for="">Semister : </label>
     <select name="sem" id="sem">
        <option value="">Select Here</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        
     </select>
            <br><br>
            <!-- <label for="">Exam Title</label>
            <input type="text" name="examtitle" placeholder="exam title">
            <br><br>
            <label for="">Exam Title limit</label>
            <input type="number" name="examtimelimit" placeholder="exam title limit">
            <br><br>
            <label for="">Question Title limit</label>
            <input type="number" name="quetlimit" placeholder="Question title limit">
            <br><br>
            <label for="">No of Question</label>
            <input type="number" name="noofque" placeholder="number of question">
            <br><br>
            <label for="examdescription">Exam description</label>
            <br>
            <textarea name="exdescription" rows="4" cols="50"></textarea> -->
            <div class="faculty-subbut">
                <input type="submit" name="submit" value="Add " class="faculty-button">
            </div>
            
          
        </form>
        
        <table class="tabel">
        <thead>
            <tr>
                <th>Sr.No.</th>
                <th>Name</th>
                <th>Username</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>Exam Title</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php

$con = mysqli_connect("localhost","root","","easyassessment");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
if (isset($_POST['sem'])) {
    
    $aa=$_GET['eno'];
    // echo $a;
    $branch=htmlentities(mysqli_real_escape_string($con , $_POST['branch']));
    $sem=htmlentities(mysqli_real_escape_string($con , $_POST['sem']));
    // read all row from database table
    $sql = "SELECT * FROM student WHERE branch = '$branch' AND currsem ='$sem'";
    $result = $con->query($sql);
    $sqla = "SELECT ex_title FROM exam WHERE ex_id='$aa' ";
    $resulta = $con->query($sql);
    if (!$result) {
        die("Invalid query: " . $connection->error);
    }

    // read data of each row
    while($row = $result->fetch_assoc()) {
        $a=$row["username"];
        $b=$row["name"];

        $query = "INSERT INTO exmminee(ex_id,username,fname, branch,sem,statuss) VALUES ('$aa','$a' ,'$b' ,'$branch','$sem' ,'active') " ;
	$run = mysqli_query($con , $query) or die(mysqli_error($con));
	// if (mysqli_affected_rows($conn) > 0 ) {
	// 	echo "<script>alert('Question successfully added');
	// 	window.location.href = 'viewexam.php?qno=$eno'; </script> " ;
    //     // echo $eno;
	// }
	// else {
	// 	"<script>alert('error, try again!'); </script> " ;
	// }
        echo "<tr>
            <td>" . $row["Sr.No."] . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["username"] . "</td>
            <td>" . $row["branch"] . "</td>
            <td>" . $row["currsem"] . "</td>
            <td>" . $aa . "</td>
            <td>
                <a class='btn btn-danger btn-sm' href='?suserid=$a'>Delete</a>
            </td>
            
            
        </tr>";
        
    }
    
    }
    ?>
    </tbody>
    </table>
    </div>
    

</body>

</html>
