<?php
    include_once 'db.php';
    $sql = "DELETE FROM users WHERE userid='" . $_GET["userid"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>