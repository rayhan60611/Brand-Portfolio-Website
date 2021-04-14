<?php
include("connection.php");
session_start();

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//$id = $_GET['id'];
//
//
//$conn = mysqli_connect('localhost', 'root', '', 'rayhan');
//$sql = "SELECT * FROM brandportfolio WHERE id = $id";
//$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_assoc($result);

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
else{

if ($_SESSION['role'] == 'admin') {
        $url = "userlist2.php";
        $_SESSION['admin']=1;
    $urlgpmtag = 'gpmtag.php';
    $activityurl = "trackRecordView.php";
    $add_New_Employee_Url="AddEmployee.php";
    ?>



    <?php
    }
else if ($_SESSION['role'] == 'gpm') {
    $url = "userlist2gpm.php";
    $_SESSION['gpm']=1;
    $urlgpmtag = 'gpmtag.php';
?>

<style type="text/css">#activityLog ,#addEmployee {
        display:none;
    }
</style>

    <?php

    }

//echo $_SESSION['role'];
}
?>


<!doctype html>
<html lang="en">

<head>
    <?php include("htmlIcon.php");?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Portfolio Home Page</title>

    <style>
        .loader{ position: fixed;left: 0px;top: 0px;width:100%;height:100%;z-index: 9999;background: url(images/Preloader_1.gif) 50% 50% no-repeat rgb(249,249,249);}

    </style>

</head>

<body style="background: #f2f2f2">
<div class="loader"></div>
<div class="d-flex justify-content-around shadow-lg py-3 mb-4 bg-white rounded sticky-top">
    <a href="home.php"><img src="images/TransparentSkf.png" alt="Smiley face" height="40" width="80"></a>


    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a href="#" class="btn btn-outline-success">Welcome! <?php echo $_SESSION['username1'] ?></a>
        <!--        <a href="userlist.php" class="btn btn-outline-info">Brand Portfolio List</a>-->
        <a type="button" href="#" class="btn btn-outline-danger">Logout</a>

        <div class="btn-group" role="group">

            <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a href="logout.php" class="dropdown-item">Logout</a>

            </div>
        </div>
    </div>
</div>
<h1 class="text-center" style="color: #0072bb">Portfolio Home Page</h1>

<br>

<div class="container">
    <div class="row shadow-lg bg-white rounded p-4  justify-content-center">

        <div class="col-md-4 ">

            <div class="card text-white bg-success mb-3 ">
                <div class="card-header"><h5 class="card-title">Brand Portfolio</h5></div>
                <div class="card-body">

                    <p class="card-text">Here You Will Find SK+F Brand Portfolio Informations</p>
                    <a href="<?php echo $url ?>" class="btn btn-outline-light btn-block">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header"><h5 class="card-title">GPM Tag</h5></div>
                <div class="card-body">

                    <p class="card-text">Here You Will Find SK+F GPM Tag Informations</p>
                    <a href="<?php echo $urlgpmtag ?>" class="btn btn-outline-light btn-block">Go</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 " id="activityLog">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header"><h5 class="card-title">Activity Log</h5></div>
                <div class="card-body">

                    <p class="card-text">Here You Will Find Activity Log Informations</p>
                    <a href="<?php echo $activityurl; ?>" class="btn btn-outline-light btn-block">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 " id="addEmployee">
            <div class="card text-white bg-info mb-3">
                <div class="card-header"><h5 class="card-title">Employee Info</h5></div>
                <div class="card-body">

                    <p class="card-text">Here You Can Add & Show & Delete New Employee</p>
                    <div class="btn-group " role="group">
                        <a id="btnGroupDrop2" type="button" class="btn btn-outline-dark dropdown-toggle " data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Employee
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                            <a href="AddEmployee.php" class="btn btn-success dropdown-item">Add Employee</a>
                            <a href="ViewEmployee.php" class="btn btn-success dropdown-item">View/Delete Employee</a>
                        </div>
                    </div>
<!--                    <a href="--><?php //echo   $add_New_Employee_Url; ?><!--" class="btn btn-outline-light btn-block">Go</a>-->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


<script src="js/jquery.js"></script>
<script language="javascript">

    $('document').ready(function(e) {

        $(".loader").fadeOut("slow");
    });

</script>

</body>

</html>
