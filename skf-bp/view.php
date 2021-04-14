<?php
include("connection.php");
session_start();
$id = $_GET['id'];


$sql = "SELECT * FROM brandportfolio WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

else{

    if ($_SESSION['role'] == 'admin')  {
        $url = "userlist2.php";
    }
    else if ($_SESSION['role'] == 'gpm') {
        $url = "userlist2gpm.php";
        $type = 'display:none;';
    }

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>View Details</title>
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
        <a href="<?php echo $url; ?>" class="btn btn-outline-info">Brand Portfolio List</a>
            <a type="button" href="#" class="btn btn-outline-danger">Logout</a>

            <div class="btn-group" role="group">

                <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a href="logout.php" class="dropdown-item">Logout</a>

                </div>
            </div>
        </div>
    </div>
    <h1 class="text-center" style="color: #0072bb"><?php echo $row['exname1'] ?> Profile </h1>

    <br>

    <div class="container">
        <div class="row shadow-lg bg-white rounded p-4">

            <div class="col-md-6 offset-md-3">
                <table class="table  table-bordered text-center table-responsive-md table-responsive-sm ">


                    <tr>
                        <th width="180px">Brand : </th>
                        <td><?php echo $row['brand'] ?></td>
                    </tr>
                    <tr style="<?php echo $type ?>">
                        <th width="150px">GPM ID : </th>
                        <td><?php echo $row['gpmid'] ?></td>
                    </tr>
                    <tr style="<?php echo $type ?>">
                        <th width="150px">GPM Name : </th>
                        <td><?php echo $row['gpmname'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Executive ID 1: </th>
                        <td><?php echo $row['exid1'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Executive Name 1: </th>
                        <td><?php echo $row['exname1'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Executive ID 2: </th>
                        <td><?php echo $row['exid2'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Executive Name 2: </th>
                        <td><?php echo $row['exname2'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Executive ID 3: </th>
                        <td><?php echo $row['exid3'] ?></td>
                    </tr>


                    <tr>
                        <th width="150px">Executive Name 3: </th>
                        <td><?php echo $row['exname3'] ?></td>
                    </tr>
                    <tr style="<?php echo $type ?>" >
                        <th width="150px">Status: </th>
                        <td><?php echo $row['status']==0 ? "Inactive" : "Active"; ?> </td>
                    </tr>

                    <tr>
                        <th width="150px">Segment: </th>
                        <td><?php echo $row['segment'] ?></td>
                    </tr>
                    <tr>
                        <th width="150px">Date & Time: </th>
                        <td><?php echo $showDate = date("Y-m-d h:iA", strtotime($row['date'])); ?></td>
                    </tr>

                </table>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success">Edit Again</a>
                <a type="button" href=" <?php echo $url ?>" class="btn btn-outline-success">Back</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>


<script language="javascript">

    $('document').ready(function(e) {

        $(".loader").fadeOut("slow");
    });

</script>

</body>

</html>