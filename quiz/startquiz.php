<?php 
session_start();
$_SESSION['take']=1;
$_SESSION['taken']=$_SESSION['take'];
// echo $_SESSION['take'];

// $_SESSION['quiz'] = 1;

$ext=$_SESSION['examtitle'];
$sr= $_SESSION['sr'] ;
// $_SESSION['sr']=$_SESSION['sr']+1;
// $qno=$_SESSION['qno'];
$j=$_SESSION['j'];
$qno=$_SESSION['qarray'][$j];

$eno=$_SESSION['eno'];
$conn = mysqli_connect("localhost","root","","easyassessment");
			$query = "SELECT * FROM question WHERE ex_id = '$eno' AND que_id='$qno'" ;
			$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				// $qno = $row['que_id'];
                 $question = $row['question'];
                 $ans1 = $row['op1'];
                 $ans2 = $row['op2'];
                 $ans3 = $row['op3'];
                 $ans4 = $row['op4'];
                //  $correct_answer = $row['que_ans'];
                //  $_SESSION['quiz'] = $qno;
$totalqn = $_SESSION['qlimit'];
			}
?>

<html>

<head>
    <title>Quiz Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/que.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: rgb(224, 224, 235);
}

.container {
    background-color: #555;
    color: #ddd;
    border-radius: 10px;
    margin-inline: auto;
    padding: 37px 53px;
    word-wrap: break-word;
    padding-bottom: 10vh;
    margin-top: 25vh;
    font-family: 'Montserrat', sans-serif;
    max-width: 700px;
}
.header-timer {
	background-color: rgb(243, 192, 130);
	padding: 20px;
	/* text-align: center; */
}

input[type="radio"]+label:before {
    content: "";
    display: inline-block;
    width: 20px;
    height: 20px;
    padding: 5px;
    margin-right: 10px;
    margin-left: 5px;
    margin-bottom: 10px;
    background-clip: content-box;
    border: 2px solid #bbb;
    background-color: #e7e6e7;
    border-radius: 50%;
}

input[type="radio"]:checked+label:before {
    background-color: #939393;
}

label {
    display: flex;
    align-items: center;
}

.next {
    box-sizing: border-box;
    background: rgb(38, 183, 55);
    border-radius: 5px;
    padding: 5px;
    margin-top: 3vh;
    border: none;
    color: #ddd;
}

.exit {
    overflow: hidden;
    background-color: rgb(238, 42, 42);

}
</style>

<body onpaste="return false;" ondrop="return false;" autocomplete="off" oncopy="return false;"
    onmousedown="return noCopyMouse(event);" ondrag="return false" ondrop="return false">
    <header>
        <script type="text/javascript" src="myjs.js"></script>
        <div class="header-timer">
        <form name="cd">
<input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
 <label>Remaining Time : </label>
 <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
</form>

            <h1 id="timer"><?php 
				echo $ext;
				?></h1>
        </div>
    </header>
    </div>
    <main class="prevent-select">

        <div class="container">
            <div class="question">
                <div class="current">Question
                    <?php echo $sr; ?> of <?php echo $totalqn; ?>
                </div>
                <p class="question">
                    <?php echo $question; ?>
                </p>
                <form method="post" action="process.php">
                    <div class="option " id="options">
                        <label for="options">
                            <input name="choice" type="radio" value="a" required="">
                            <?php echo $ans1; ?>

                        </label>
                        <label for="options">
                            <input name="choice" type="radio" value="b" required="">
                            <?php echo $ans2; ?>

                        </label>
                        <label for="options">
                            <input name="choice" type="radio" value="c" required="">
                            <?php echo $ans3; ?>

                        </label>
                        <label for="options">
                            <input name="choice" type="radio" value="d" required="">
                            <?php echo $ans4; ?>

                        </label>
                    </div>

            </div>
            <div>
                <div class="start">
                <input name="submit" type="submit" value="Submit" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right" id="submitAnswerFrmBtn">
                </div>
                <input type="hidden" name="number" value="<?php echo $qno;?>">
            </div>
            <br>
            <br>

            <a href="done.php" class="exit">Submit</a>
            </form>

        </div>
    </main>
</body>

</html>


<?php


	
	



?>



<!-- 
<div class="container mt-sm-5 my-1">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><b>Q. which option best describes your job role?</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            <label class="options">Small Business Owner or Employee
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
            <label class="options">Nonprofit Owner or Employee
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
            <label class="options">Journalist or Activist
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
            <label class="options">Other
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="d-flex align-items-center pt-3">
        <div id="prev">
            <button class="btn btn-primary">Previous</button>
        </div>
        <div class="ml-auto mr-sm-5">
            <button class="btn btn-success">Next</button>
        </div>
    </div>
</div> -->