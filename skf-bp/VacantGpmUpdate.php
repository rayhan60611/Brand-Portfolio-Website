<?php
include("connection.php");
session_start();
$brand = $_GET['brand'];





$sql = "SELECT * FROM `brandportfolio` WHERE brand = '$brand'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

///dropdown
$sql2 = "SELECT * FROM `gpmtag`";
$result2 = mysqli_query($conn, $sql2);


///track record start //

$_SESSION['BeforeGpmId'] = $row['gpmid'];
$_SESSION['BeforeGpmName'] = $row['gpmname'];


///track record end//

?>

<?php

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
else{

    if ($_SESSION['role'] == 'admin')  {
        $url = "userlist2.php";
        //admin read-only html tags dom manupulation
        $readonly=' ';
        $type = 'text';
        ?>


        <?php
    }
    else if ($_SESSION['role'] == 'gpm') {
        $url = "userlist2gpm.php";
        //gpm read-only html tags dom manupulation
        $readonly='readonly';
        $type = 'hidden';
        ?>
        <!--        <style type="text/css">#itemid, #description ,#status,#exid1,#exid2,#exid3,#exname1,#exname2,#exname3,#segment {-->
        <!--                display:none;-->
        <!--            }-->
        <!--        </style>-->

        <?php
    }

}

?>


<!doctype html>
<html lang="en">

<head>
    <?php include("htmlIcon.php");?>
    <!--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <title>Vacant GPM List</title>

    <style>
        .loader{ position: fixed;left: 0px;top: 0px;width:100%;height:100%;z-index: 9999;background: url(images/Preloader_1.gif) 50% 50% no-repeat rgb(249,249,249);}

    </style>


</head>

<body style="background: #f2f2f2">
<div class="loader"></div>
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
<h1 class="text-center" style="color: #0072bb">Vacant GPM List</h1>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 p-5 pt- shadow-lg bg-white rounded">
            <form action="VacantGpmUpdateQuery.php?brand=<?php echo $brand ?>" method="POST">



                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input required type="text" class="form-control" name="brand" placeholder="Enter Brand"
                           value="<?php echo $brand ?>" <?php echo $readonly ?>>
                </div>


                <div class="form-group" id="gpmid">
                    <select class="form-control select2 " name="gpm" required>
                        <option value="">Select New GPM</option>
                        <option value="Vacant Vacant">Vacant</option>
                        <?php
                        if($result2){
                            while($rows=mysqli_fetch_array($result2)){
                                $gpmIdColoumn = $rows['gpmid'];
                                $gpmNameColoumn = $rows['gpmname'];
                                echo " <option value='$gpmIdColoumn $gpmNameColoumn' >$gpmIdColoumn-$gpmNameColoumn </option>";
                            }
                        }

                        ?>
                    </select>

                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

            <script>
                $('.select2').select2({ width: '100%'});
            </script>
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