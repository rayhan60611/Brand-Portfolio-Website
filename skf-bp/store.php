<?php
include("connection.php");
session_start();




$itemid = mysqli_real_escape_string($conn,$_POST['itemid']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$brand = mysqli_real_escape_string($conn,$_POST['brand']);
$gpmid =mysqli_real_escape_string( $conn,$_POST['gpmid']);
$gpmname = mysqli_real_escape_string($conn,$_POST['gpmname']);
$exid1 = mysqli_real_escape_string($conn,$_POST['exid1']);
$exid2 = mysqli_real_escape_string($conn,$_POST['exid2']);
$exid3 =mysqli_real_escape_string( $conn,$_POST['exid3']);
$exname1 =mysqli_real_escape_string( $conn,$_POST['exname1']);
$exname2 = mysqli_real_escape_string($conn,$_POST['exname2']);
$exname3 = mysqli_real_escape_string($conn,$_POST['exname3']);
$segment = mysqli_real_escape_string($conn,$_POST['segment']);
$status =mysqli_real_escape_string($conn, $_POST['status']);

$check_duplicate_item = "SELECT * FROM `brandportfolio` WHERE `itemid`='$itemid'";
$result = mysqli_query($conn, $check_duplicate_item);
$count = mysqli_num_rows($result);


$sql = "INSERT INTO brandportfolio VALUES(NULL ,'$itemid','$description','$brand' ,'$gpmid' , '$gpmname','$exid1','$exid2','$exid3' ,'$exname1','$exname2' ,'$exname3'  , '$segment','$status',NOW())";

if ($count>0){
    $_SESSION['duplicateItem']= 1;
    header("Location: registration.php");

}
else{



if(mysqli_query($conn, $sql))
{
    $_SESSION['success']= 1;
    header("Location: registration.php");
}

else{

    $_SESSION['error']= 1;
    header("Location: registration.php");
}

}


?>