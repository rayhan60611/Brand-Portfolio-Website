<?php
include("connection.php");
session_start();


$userid = $_POST['userid'];
$password = $_POST['password'];


$sql = "SELECT * FROM user WHERE userid='$userid' and  password ='$password' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$rowcount = mysqli_num_rows($result);
if($rowcount == 1 )
{
    $_SESSION['login']= true;
    $_SESSION['role']= $row['role'];
    $_SESSION['username1'] = $row['username'];
    $_SESSION['userid1'] = $row['userid'];
    $_SESSION['gpmuserid']= $userid;
    header("Location: home.php");
}

else{

    $_SESSION['loginerror']= true;
    header("Location: login.php");
}




?>