<?php
include("connection.php");
session_start();

$data = mysqli_real_escape_string($conn,$_POST['gpm']);

$splittedstring=explode(" ",$data,2);
$gpmid =$splittedstring[0];
$gpmname = $splittedstring[1];


$id =$_GET['id'];
$itemid = mysqli_real_escape_string($conn,$_POST['itemid']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$brand = mysqli_real_escape_string($conn,$_POST['brand']);
$gpmid = mysqli_real_escape_string($conn,$_POST['gpmid']);
$gpmname = mysqli_real_escape_string($conn,$_POST['gpmname']);
///executes 1///
$data = mysqli_real_escape_string($conn,$_POST['ex1']);
$exsplittedstring1=explode(" ",$data,2);
$exid1 =$exsplittedstring1[0];
$exname1 = $exsplittedstring1[1];

///executes 2///
$executive2 = mysqli_real_escape_string($conn,$_POST['ex2']);
$exsplittedstring2=explode(" ",$executive2,2);
$exid2 =$exsplittedstring2[0];
$exname2 = $exsplittedstring2[1];

///executes 3///
$executive3 = mysqli_real_escape_string($conn,$_POST['ex3']);
$exsplittedstring3=explode(" ",$executive3,2);
$exid3 =$exsplittedstring3[0];
$exname3 = $exsplittedstring3[1];

///segment///
$segment = mysqli_real_escape_string($conn,$_POST['segment']);

$status = mysqli_real_escape_string($conn,$_POST['status']);



$sql = "UPDATE `brandportfolio` SET   itemid = '$itemid',
                                    description = '$description',
                                    brand = '$brand',
                                    gpmid = '$gpmid',
                                    gpmname = '$gpmname',
                                    exid1 = '$exid1',
                                    exid2 = '$exid2',
                                    exid3 = '$exid3',
                                    exname1 = '$exname1',
                                    exname2 = '$exname2',
                                    exname3 = '$exname3',
                                    segment = '$segment',
                                    status = '$status'
                                    WHERE id= '$id' ";

if(mysqli_query($conn, $sql))
{
    //echo "Registration Successfull";
    header("Location: view.php?id=".$id);

}

else{

    echo "Update Failed";
    //echo $itemid , $id;
}


$conn->close();

?>