<?php
include("connection.php");
session_start();


$exid = $_GET['exid'];

$sql = "UPDATE `employee` SET  
                                    status = '1'
                                    WHERE exid= '$exid' ";


if(mysqli_query($conn, $sql))
{
    $_SESSION['activeEmployee']= 1;
    header("Location: ViewEmployee.php");
}

else{
    $_SESSION['activeEmployee']= 1;
    header("Location: ViewEmployee.php");
}


?>