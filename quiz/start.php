<?php
session_start(); 
if (isset($_GET['eno'])) {
$eno=$_GET['eno'];
// $eno=$_GET['eno'];
$_SESSION['eno']=$eno;
$_SESSION['score']=0;
$_SESSION['qlimit']=0;
$_SESSION['sr'] =1;



$conn = mysqli_connect("localhost","root","","easyassessment");


$query = "SELECT * FROM exam WHERE ex_id='$eno'";

$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
// $total = mysqli_num_rows($run);
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				$noofque = $row['ex_noofque'];
                 $couid = $row['cou_id'];
                 $extitle = $row['ex_title'];
                 $des = $row['ex_description'];
				
                 $timelimit = $row['ex_time_limit'];
                //  $ans4 = $row['op4'];
                //  $correct_answer = $row['que_ans'];
                //  $_SESSION['sr'] = 1;
				 $_SESSION['qlimit']=$noofque;
				 $_SESSION['j']=0;
                //  echo $_SESSION['qlimit'];
				 echo '<br>';

			}
			// $time = time();
			// // echo $time;
			// $_SESSION['start_time'] = $time;
			// // $allowed_time =$timelimit*60;
			// $allowed_time =0.5*60;
			// $_SESSION['time_up'] = $_SESSION['start_time'] + ($allowed_time) ;
			// echo $_SESSION['start_time'];
			// echo '<br>';
			// echo $_SESSION['time_up'];


			$queryq = "SELECT que_id FROM question WHERE ex_id='$eno' ORDER BY rand() LIMIT $noofque ";
$runq = mysqli_query($conn,$queryq ) or die(mysqli_error($conn));
	$i = 0;
	// $sr;
	$_SESSION['qarray']=array();
	
	while ($row = mysqli_fetch_array($runq)) { ?>
<?php $questId = $row['que_id']; 
	//  $srno=$row['sr'];

	 $sr[$i]=$questId;
	 array_push($_SESSION['qarray'],$questId); 
		// echo $questId;
		$take=$_SESSION['take'];
		// echo $take;
		$i++;
	}

	// echo $take;
	$_SESSION['examtitle']=$extitle;
	if($take==1)
	{
		header("location: done.php");

	}

?>

<html>

<head>
    <title>EXAM</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
    body {
	font-family: arial;
	font-size: 15px;
	line-height: 1.6em;
	background-color: rgb(255, 255, 255);
}
.content
{
	/* display: flex; */
	justify-content: center;
	min-height: auto;
	padding: 37px 53px;
	background:rgb(0 25 138);
}
.exit
{
	overflow: hidden;
    margin-top:2px;
	background-color: rgb(238, 42, 42);
	
}
    .main-container
{
    background-color:rgb(126 97 23 / 85%);
    color: #ddd;
    border-radius: 10px;
    margin-inline: auto;
    padding-bottom: 12vh;
    font-family: 'Montserrat', sans-serif;
    max-width: 700px;
}
</style>
<body>
    <script src="full.js"></script>
    <header>
        <div class="header">
            <h1>EXAM</h1>

        </div>
    </header>

    <main>
        <div class="content">
            <div class="main-container">
                <h2>Welcome to Easy Assessment !</h2>
                <ul>
                    <li><strong>COURSE CODE : </strong><?php echo $couid; ?></li>
                    <li><strong>EXAM TITLE: </strong><?php echo $extitle; ?></li>
                    <li><strong>EXAM Description: </strong><?php echo $des; ?></li>
                    <li><strong>Number of questions: </strong><?php echo $noofque; ?></li>
                    <li><strong>Type: </strong>Multiple Choice</li>
                    <li><strong>Estimated time for each question: </strong><?php echo "   "; ?> seconds</li>
                    <li><strong>Score: </strong> &nbsp; +1 point for each correct answer</li>
                </ul>
                <?php
	          
			  echo "<a href='startquiz.php ' class='start' >Start Quiz</a>";
			  ?>
                <a class='exit'href="../studentdashboard.php" class="add">Exit</a>

            </div>
        </div>
    </main>

    <footer>
        <div class="footer">
            Copyright @ 21CS041
        </div>
    </footer>

</body>

</html>

<?php }
else {
	header("location: index.php");
}
?>