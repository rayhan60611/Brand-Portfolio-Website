<?php
include("connection.php");
session_start();


$exid = $_GET['exid'];

$sql = "UPDATE `employee` SET  
                                    status = '0'
                                    WHERE exid= '$exid' ";


if(mysqli_query($conn, $sql))
{
    $_SESSION['deleteOk']= 1;
    header("Location: ViewEmployee.php");
}

else{
    $_SESSION['deleteFailed']= 1;
    header("Location: ViewEmployee.php");
}


?>