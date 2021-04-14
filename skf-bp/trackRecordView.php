<?php
include("connection.php");
session_start();
//Login session check
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

if (!isset($_SESSION['admin'])) {
    header("Location: home.php");
}

$result = $conn->query("SELECT * FROM `trackrecord`");
$user = $result->fetch_all(MYSQLI_ASSOC);

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

    <title>Brand Portfolio Activity Log</title>
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
        <a href="home.php" class="btn btn-outline-info">Home</a>
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

<h1 class="text-center" style="color: #0072bb">Brand Portfolio Activity Log</h1>

<br>
<div class="container-fluid ">
    <div class="row shadow-lg bg-white rounded p-2 m-4">

        <div class="col-md-12">
            <table class="table table-sm table-bordered text-center table-responsive-md table-responsive-sm  example" id="example" name="example">

                <thead >
                <th>ID</th>
                <th>Updater ID </th>
                <th>Updater Name</th>
                <th>Assigner Id</th>
                <th>Assigner Name</th>
                <th>Brand</th>
                <th>Date & Time</th>
                <th>Actions</th>
                </thead>

                <tbody>

                <?php foreach ($user as $row) : ?>

                    <tr class="small">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['tridbefore'] ?></td>
                        <td><?php echo $row['trnamebefore'] ?></td>
                        <td><?php echo $row['tridafter'] ?></td>
                        <td><?php echo $row['trnameafter'] ?></td>
                        <td><?php echo $row['trinfo'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td>
                            <a href="trackRecordSingleView.php?id=<?php echo $row['id']."&tag=".$row['tag']; ?>"><i class="fa fa-eye fa-2x"  aria-hidden="true"></i></a>
                        </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"-->
<!--            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"-->
<!--            crossorigin="anonymous"></script>-->
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
