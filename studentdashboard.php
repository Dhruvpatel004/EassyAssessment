<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    

<!-- <link rel="stylesheet" href="css/bg.css"/> -->
<link rel="stylesheet" href="faculty/index.css">

</head>
<body>
    <script src="faculty/index.js"></script>
    <nav>
    <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Easy Assessment</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                    <li><a href="?page=home">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
               

              
                <li>
                    <i class="uil uil course"></i>
                    <button class="dropdown-btn">
                        <p>COURSE</p>
                    </button>
                    <div class="dropdown-container">
                        <!-- <a href="?page=addcourse">
                            <i class="uil uil student"></i>
                            <span class="link-name linkin">Add Course</span>
                        </a> -->
                        <a href="?page=courselist">
                            <i class="uil uil student"></i>
                            <span class="link-name linkin">Course list</span>
                        </a>
                    </div>
                </li>
                <li>
                    <i class="uil uil course"></i>
                    <button class="dropdown-btn">
                        <p>EXAM</p>
                    </button>
                    <div class="dropdown-container">
                        <a href="?page=activeexam">
                            <i class="uil uil student"></i>
                            <span class="link-name linkin">Pending Exam</span>
                        </a>
                        <a href="?page=upcomingexam">
                            <i class="uil uil student"></i>
                            <span class="link-name linkin">Upcoming Exam</span>
                        </a>
                        <a href="?page=oldexam">
                            <i class="uil uil student"></i>
                            <span class="link-name linkin">Old Exam</span>
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="logout-mode">
                <li><a href="logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <!-- <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name ">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li> -->
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <p>Hey, <?php echo $_SESSION['username']; ?></p>
        </div>

        <div class="dash-content">
            <br>
            <?php
            
            if (!isset($_GET['page'])) {
                include "student/home.php";
            } else {
            switch ($_GET['page']) {
                case "home":
                     include "student/home.php";
                break;
                // case "facultylist":
                //     include "faculty/facultylist.php";
                //     break;

                    case "upcomingexam":
                    include "student/upcomingexam.php";
                    break;

                    case "courselist":
                    include "faculty/courselist.php";
                    break;

                    case "activeexam":
                         include "student/activeexam.php";
                    break;
                    
                case "giveexam":
                     include "student/giveexam.php";
                break;

                case "oldexam":
                    // $eno=$_GET['eno'];
                    include "student/oldexam.php";
                break;
                
                default:
                     include "student/home.php";
                };
            }
            
            ?>

        </div>


        </div>
        </div>
    </section>
    <script src="faculty/script.js"></script>
</body>
</html>

<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling; if (dropdownContent.style.display === "block") { dropdownContent.style.display = "none"; }
            else { dropdownContent.style.display = "block"; }
        });
    }

</script>

<?php
  if (isset($_GET['suserid'])) {
    include_once 'db.php';
    include("auth_session.php");
    $a=$_GET['suserid'];
    $sql = "DELETE FROM student WHERE username ='$a'";
    if (mysqli_query($con, $sql)=='true') {
        echo "<script> ;
			window.location.href = 'admindashboard.php?page=studentlist'; </script>" ;
        
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
     
}




?>
 