<?php 

session_start();
// $newtime = time();

if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}


// $t=$_SESSION['time_up'];
$conn = mysqli_connect("localhost","root","","easyassessment");


        // $_SESSION['start_time'] = $newtime;
		// $qno = $_SESSION['qno'];
        
		$eno = $_SESSION['eno'];
        $totalqn = $_SESSION['qlimit'];

        // $_SESSION['eno']=$eno;

        // $_SESSION['qno'] = $_SESSION['qno'] + 1;
        $sr=$_SESSION['sr'];
        $_SESSION['sr'] = $_SESSION['sr'] + 1;
        $j=$_SESSION['j'];
        $_SESSION['j']=$_SESSION['j']+1;
        $qno=$_SESSION['qarray'][$j];
		// $nextqno = $qno+1;
        // $sr=$_SESSION['quiz'] ;
        // $_SESSION['quiz'] =$_SESSION['quiz']+1;
		$selected_choice = $_POST['choice'];

		$query = "SELECT que_ans FROM question WHERE ex_id = '$eno' AND que_id='$qno' ";
        $run = mysqli_query($conn , $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($run) > 0 ) {
        	$row = mysqli_fetch_array($run);
        	$correct_answer = $row['que_ans'];
        }
        if ($correct_answer == $selected_choice) {
        	$_SESSION['score']++;
        }

        

        if ($sr == $totalqn) {
        	header("location: done.php");
        }
        else {
        	header("location: startquiz.php");
        }

    



?>