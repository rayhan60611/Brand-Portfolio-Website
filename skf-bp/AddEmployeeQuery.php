<?php
include("connection.php");
session_start();

$exid = mysqli_real_escape_string($conn,$_POST['exid']);
$exname = mysqli_real_escape_string($conn,$_POST['exname']);

///check_duplicate_emplyee///
$check_duplicate_emplyee = "SELECT * FROM `employee` WHERE `exid`='$exid'";
$result = mysqli_query($conn, $check_duplicate_emplyee);
$count = mysqli_num_rows($result);


$sql = "INSERT INTO `employee` VALUES(NULL ,'$exid','$exname','1',NOW())";

if ($count>0){
    $_SESSION['duplicateEmployee']= 1;
    header("Location: AddEmployee.php");

}
else{
    if(mysqli_query($conn, $sql))
    {
        $_SESSION['alert']= 1;
        header("Location: AddEmployee.php");
    }

    else{

        $_SESSION['error']= 1;
       header("Location: AddEmployee.php");
    }
}





?>