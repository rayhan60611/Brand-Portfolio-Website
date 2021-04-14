<?php
include("connection.php");
session_start();



$brand = $_GET['brand'];

$gpmIdBefore= $_SESSION['BeforeGpmId'];
$gpmNameBefore= $_SESSION['BeforeGpmName'];


//$gpmid = mysqli_real_escape_string($conn,$_POST['gpmid']);
//$gpmname = mysqli_real_escape_string($conn,$_POST['gpmname']);
$data = mysqli_real_escape_string($conn,$_POST['gpm']);

$splittedstring=explode(" ",$data,2);
$gpmid =$splittedstring[0];
$gpmname = $splittedstring[1];


$sql = "UPDATE `brandportfolio` SET 
                                    gpmid = '$gpmid',
                                    gpmname = '$gpmname'
                                    WHERE brand = '$brand'";

if(mysqli_query($conn, $sql))
{
    //echo "Registration Successfull";
    header("Location: userlist2gpm.php");
    $sql1 = "INSERT INTO `trackrecord` VALUES(NULL ,'$gpmIdBefore','$gpmNameBefore','$gpmid','$gpmname','$brand','BGU',NOW())";
    mysqli_query($conn, $sql1);


}

else{

    echo "Update Failed ".mysqli_error($conn);

}


$conn->close();

?>