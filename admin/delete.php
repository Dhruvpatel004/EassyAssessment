<?php
    include_once '../db.php';
    $a=$_GET['userid'];
    $sql = "DELETE FROM student WHERE SrNo='$a'";
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>