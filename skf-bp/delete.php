<?php
include("connection.php");
session_start();


$id = $_GET['id'];

$sql = "DELETE FROM brandportfolio WHERE id = $id";


 if(mysqli_query($conn, $sql))
 {
    $_SESSION['deleteOk']= 1;
     header("Location: userlist2.php");
 }

 else{
    $_SESSION['deleteFailed']= 1;
    header("Location: userlist2.php");
 }


?>