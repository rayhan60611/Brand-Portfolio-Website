<?php
include("connection.php");
session_start();





?>
<!--<script type="text/javascript">-->
<!--    var x = document.getElementById("itemid");-->
<!--</script>-->


<?php

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
else{

    if ($_SESSION['role'] == 'admin')  {
        $url = "userList2.php";
        $url2 = "AddEmployee.php";
    }
    else if ($_SESSION['role'] == 'gpm') {
        $url = "userList2gpm.php";
        $url2 = "AddEmployee.php";
    }

}

?>


<!doctype html>
<html lang="en">

<head>
<!--            <script src="js/jquery.js"></script>-->
    <?php include("htmlIcon.php");?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <title>Add New Employee</title>
    <style>
        .loader{ position: fixed;left: 0px;top: 0px;width:100%;height:100%;z-index: 9999;background: url(images/Preloader_1.gif) 50% 50% no-repeat rgb(249,249,249);}

    </style>
</head>

<body style="background: #f2f2f2">
<div class="loader"></div>
<?php if (isset($_SESSION['duplicateEmployee'])) { ?>
    <div class="alert alert-danger text-center font-weight-bold" role="alert">
        This Employee ID already Exists!
    </div>
<?php  } ?>

<?php if (isset($_SESSION['alert'])) { ?>
    <div class="alert alert-success text-center font-weight-bold" role="alert">
        New Employee Added!
    </div>
<?php  } ?>


<div class="d-flex justify-content-around shadow-lg py-3 mb-4 bg-white rounded sticky-top">
    <a href="home.php"><img src="images/TransparentSkf.png" alt="skf" height="40" width="80"></a>

    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a href="#" class="btn btn-outline-success">Welcome! <?php echo $_SESSION['username1'] ?></a>
        <a href="<?php echo $url; ?>" class="btn btn-outline-info">Brand Portfolio List</a>
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
<h1 class="text-center" style="color: #0072bb">Add New Employee</h1>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 p-5 pt- shadow-lg bg-white rounded">
            <form action="AddEmployeeQuery.php" method="POST">

                <div class="form-group " id="exid">
                    <label for="exid">Employee Id</label>
                    <input required type="text" class="form-control" name="exid" placeholder="Enter Employee Id"
                           value="">
                </div>

                <div class="form-group " id="exname">
                    <label for="exname">Employee Id</label>
                    <input required type="text" class="form-control" name="exname" placeholder="Enter Employee Name"
                           value="">
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <a type="button" href="ViewEmployee.php" class="btn btn-outline-primary">View Employee List</a>
                <a type="button" href="home.php" class="btn btn-outline-success">Home</a>
            </form>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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

<?php unset($_SESSION['duplicateEmployee']); ?>
<?php unset($_SESSION['alert']); ?>