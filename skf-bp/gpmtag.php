<?php
include("connection.php");
session_start();
//Login session check
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
else{

    if ($_SESSION['role'] == 'admin')  {
        $url = "userlist2.php";
    }
    else if ($_SESSION['role'] == 'gpm') {
        $url = "userlist2gpm.php";
    }

}



$g= $_SESSION['gpmuserid'];


$gpmtagquery='SELECT brandportfolio.exid1 as exid1,brandportfolio.exname1 as exname1,brandportfolio.exid2 as exid2,brandportfolio.exname2 as exname2,brandportfolio.exid3 as exid3 ,brandportfolio.exname3 as exname3,brandportfolio.gpmid as gpmid,brandportfolio.gpmname as gpmname,gpmtag.bossid as bossid,gpmtag.bossname as bossname,gpmtag.designation as designation
FROM brandportfolio
LEFT JOIN gpmtag 
ON brandportfolio.gpmid = gpmtag.gpmid WHERE brandportfolio.status=1 GROUP BY exid1';

$result = $conn->query("$gpmtagquery");
$user = $result->fetch_all(MYSQLI_ASSOC);


?>


<!doctype html>
<html lang="en">

<head>
    <?php include("htmlIcon.php");?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"-->
<!--          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"-->
<!--          crossorigin="anonymous">-->
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/86b7ed0b27.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/kt-2.5.1/r-2.2.3/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <title>Gpm Tag</title>
    <style>
        .loader{ position: fixed;left: 0px;top: 0px;width:100%;height:100%;z-index: 9999;background: url(images/Preloader_1.gif) 50% 50% no-repeat rgb(249,249,249);}

    </style>

</head>

<body style="background: #f2f2f2">

<div class="loader"></div>
<?php if (isset($_SESSION['deleteOk'])) { ?>
    <div class="alert alert-success text-center font-weight-bold" role="alert">
        Successfully Deleted!
    </div>
<?php } ?>
<div class="container-fluid d-flex justify-content-around shadow-lg py-3 mb-4 bg-white rounded sticky-top">
    <a href="home.php"><img src="images/TransparentSkf.png" alt="Smiley face" height="40" width="80"></a>
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a href="#" class="btn btn-outline-success">Welcome! <?php echo $_SESSION['username1'] ?></a>
        <a href=" <?php echo $url ?>" class="btn btn-outline-info">Brand Portfolio List</a>
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

<h1 class="text-center" style="color: #0072bb">GPM Tag</h1>

<br>
<div class="container-fluid ">
    <div class="row shadow-lg bg-white rounded p-2 m-4">

        <div class="col-md-12">
            <table class="table table-sm table-bordered text-center table-responsive-md table-responsive-sm" id="example" name="example">

                <thead >
                <th>GPM ID</th>
                <th>GPM Name</th>
                <th>Executive</th>
                <th>Supervisor ID</th>
                <th>Supervisor Name</th>
<!--                <th>Actions</th>-->
                </thead>

                <tbody>

                <?php foreach ($user as $row) : ?>

                    <tr class="small">

                        <td><?php echo $row['gpmid'] ?></td>
                        <td><?php echo $row['gpmname'] ?> </td>

                        <td>
                            <?php

                            if($row['exname2'] == NULL && $row['exname3'] == NULL ){
                                echo "<p >".$row['exid1'].': '.$row['exname1']."</p>";
                            }
                            else if($row['exname1'] == NULL && $row['exname2'] == NULL ){
                                echo "<p >".$row['exid3'].': '.$row['exname3']."</p>";
                            }
                            else if($row['exname3'] == NULL && $row['exname1'] == NULL ){
                                echo "<p >".$row['exid2'].': '.$row['exname2']."</p>";
                            }

                            elseif ($row['exname2'] == NULL){
                                echo "<p class='text-primary'>".$row['exid1'].': '.$row['exname1']."</p>";
                                echo "<p class='text-success'>".$row['exid3'].': '.$row['exname3']."</p>";
                            }


                            elseif ($row['exname3'] == NULL){

                                echo "<p class='text-primary'>".$row['exid1'].': '.$row['exname1']."</p>";
                                echo "<p class='text-success'>".$row['exid2'].': '.$row['exname2']."</p>";
                            }
                            elseif ($row['exname1'] == NULL){

                                echo "<p class='text-success'>".$row['exid2'].': '.$row['exname2']."</p>";
                                echo "<p class='text-primary'>".$row['exid3'].': '.$row['exname3']."</p>";
                            }

                            else{
                                echo "<p class='text-primary'>".$row['exid1'].': '.$row['exname1']."</p>";
                                echo "<p class='text-success'>".$row['exid2'].': '.$row['exname2']."</p>";
                                echo "<p class='text-danger'>".$row['exid3'].': '.$row['exname3']."</p>";
                            }

                            ?>

                        </td>
                        <td><?php echo $row['bossid'] ?></td>
                        <td><?php echo $row['bossname']." ".'('.$row['designation'].")" ?></td>

                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"-->
<!--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"-->
<!--        crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/kt-2.5.1/r-2.2.3/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
                dom: 'Blfrtip',
                buttons: [

                    {
                        extend:    'copyHtml5',
                        text:      '<i class="fa fa-copy"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend:    'csvHtml5',
                        text:      '<i class="fa fa-file-csv"></i>',
                        titleAttr: 'CSV'
                    },
                    // {
                    //     extend:    'pdfHtml5',
                    //     text:      '<i class="fa fa-file-pdf"></i>',
                    //     titleAttr: 'PDF'
                    // }
                ],
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ],
                "scrollY": "700px",
                "scrollCollapse": true,
                "processing": true, // for show progress bar

            }

        );
    } );



</script>

<script language="javascript">

    $('document').ready(function(e) {

        $(".loader").fadeOut("slow");
    });

</script>



</body>

</html>

<?php unset($_SESSION['deleteOk']); ?>
