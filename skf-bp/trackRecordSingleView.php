<?php
include("connection.php");
session_start();


$id = $_GET['id'];
$tag = $_GET['tag'];
//Login session check
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

if (!isset($_SESSION['admin'])) {
    header("Location: home.php");
}


$sql = "SELECT * FROM `trackrecord` WHERE id = $id AND tag = '$tag' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//timestrap convert into am pm
$showDate = date("Y-m-d h:iA", strtotime($row['date']));


?>


<!doctype html>
<html lang="en">

<head>
    <?php include("htmlIcon.php");?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--font awesome-->
    <script src="https://kit.fontawesome.com/86b7ed0b27.js" crossorigin="anonymous"></script>

    <title>Brand Portfolio Activity Single Log</title>
    <!-- search -->
    <!--        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>-->
    <!--        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>-->

    <!--        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/r-2.2.3/sp-1.0.1/sl-1.3.1/datatables.min.css"/>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/kt-2.5.1/r-2.2.3/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>


    <style>
        .loader{ position: fixed;left: 0px;top: 0px;width:100%;height:100%;z-index: 9999;background: url(images/Preloader_1.gif) 50% 50% no-repeat rgb(249,249,249);}

    </style>


</head>

<body style="background: #f2f2f2">
<div class="loader"></div>
<div class="container-fluid d-flex justify-content-around shadow-lg py-3 mb-4 bg-white rounded sticky-top">
    <a href="home.php"><img src="images/TransparentSkf.png" alt="Smiley face" height="40" width="80"></a>
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a href="#" class="btn btn-outline-success">Welcome! <?php echo $_SESSION['username1'] ?></a>

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

<h1 class="text-center" style="color: #0072bb">Brand Portfolio Activity Single Log</h1>

<br>
<div class="container-fluid ">
    <div class="row shadow-lg bg-white rounded p-5 m-5 d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header d-flex justify-content-center ">Brand GPM Update</h3>
                <div class="card-body">
                    <h5 class="card-title">Brand: <?php echo "<span class='text-danger'>".$row['trinfo']."</span>" ?>
                        is updated by
                        <?php echo "<span class='text-success'>"."(".$row['tridbefore'].")"." ".$row['trnamebefore']."</span>" ?>
                        & Assigned to
                        <?php echo "<span class='text-primary'>"."(".$row['tridafter'].")"." ".$row['trnameafter']."</span>" ?>
                        on : <?php echo "<span class='text-danger'>".$showDate."</span>" ?>


                    </h5>
<!--                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->

                    <a href="home.php" class="btn btn-outline-success  ">Home</a>
                    <a href="trackRecordView.php" class="btn btn-outline-primary ">Back</a>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<!--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>-->
<!--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>-->
<!--    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/r-2.2.3/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/kt-2.5.1/r-2.2.3/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

<script language="javascript">

    $('document').ready(function(e) {

        $(".loader").fadeOut("slow");
    });

</script>

</body>

</html>

