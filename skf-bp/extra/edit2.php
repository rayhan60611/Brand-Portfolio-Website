<?php
include("connection.php");
session_start();
$id = $_GET['id'];


$sql = "SELECT * FROM brandportfolio WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//executive 1 dropdown query
$sql2 = "SELECT DISTINCT `exid`,exname FROM `employee` where status='1'";
$result2 = mysqli_query($conn, $sql2);

//executive 2 dropdown query
$sql3 = "SELECT DISTINCT `exid`,exname FROM `employee` where status='1'";
$result3 = mysqli_query($conn, $sql3);
//
////executive 3 dropdown query
$sql4 = "SELECT DISTINCT `exid`,exname FROM `employee` where status='1'";
$result4 = mysqli_query($conn, $sql4);

//segment dropdown query
$sql5 = "SELECT DISTINCT `segment` FROM `brandportfolio` ORDER BY `segment` ASC";
$result5 = mysqli_query($conn, $sql5);

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
        <style type="text/css">#itemid, #description ,#gpmid,#gpmname,#status {
                display:none;
            }
        </style>

        <?php
    }

}

?>


<!doctype html>
<html lang="en">

<head>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <title>Update User Info</title>
</head>

<body style="background: #f2f2f2">
<div class="d-flex justify-content-around shadow-lg py-3 mb-4 bg-white rounded">
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
<h1 class="text-center" style="color: #0072bb">Update Portfolio Information</h1>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 p-5 pt- shadow-lg bg-white rounded">
            <form action="edit2query.php?id=<?php echo $id ?>" method="POST">
                <div class="form-group " id="itemid">
                    <label for="itemid">Item Id</label>
                    <input required type="text" class="form-control" name="itemid" placeholder="Enter Item Id"
                           value="<?php echo $row['itemid'] ?>">
                </div>
                <div class="form-group" id="description">
                    <label for="description">Description</label>
                    <input required type="text" class="form-control" name="description" placeholder="Enter Brand"
                           value="<?php echo $row['description'] ?>">
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input required type="text" class="form-control" name="brand" placeholder="Enter Brand"
                           value="<?php echo $row['brand'] ?>" <?php echo $readonly ?>>
                </div>
                <div class="form-group" id="gpmid">
                    <label for="gpmid">GPM ID</label>
                    <input required type="text" class="form-control" name="gpmid" placeholder="Enter GPM Id"
                           value="<?php echo $row['gpmid'] ?>">
                </div>

                <div class="form-group" id="gpmname">
                    <label for="gpmname">Enter GPM Name</label>
                    <input required type="text" class="form-control" name="gpmname" placeholder="Enter GPM Name"
                           value="<?php echo $row['gpmname'] ?>">
                </div>

                <div class="form-group" >
                    <select class="form-control select2" name="ex1" required>
                        <option value="">Select Executive 1</option>
                        <?php
                        if($result2){
                            while($rows=mysqli_fetch_array($result2)){
                                $ex1IdColoumn = $rows['exid'];
                                $ex1NameColoumn = $rows['exname'];
                                echo " <option value='$ex1IdColoumn $ex1NameColoumn' >$ex1IdColoumn-$ex1NameColoumn </option>";
                            }
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group" >
                    <select class="form-control select2" name="ex2" required>
                        <option value=" ">Select Executive 2</option>
                        <?php
                        if($result3){
                            while($rows=mysqli_fetch_array($result3)){
                                $ex2IdColoumn = $rows['exid'];
                                $ex2NameColoumn = $rows['exname'];
                                echo " <option value='$ex2IdColoumn $ex2NameColoumn' >$ex2IdColoumn-$ex2NameColoumn </option>";
                            }
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group" >
                    <select class="form-control select2" name="ex3" required>
                        <option value=" ">Select Executive 3</option>
                        <?php
                        if($result4){
                            while($rows=mysqli_fetch_array($result4)){
                                $ex3IdColoumn = $rows['exid'];
                                $ex3NameColoumn = $rows['exname'];
                                echo " <option value='$ex3IdColoumn $ex3NameColoumn'>$ex3IdColoumn-$ex3NameColoumn </option>";
                            }
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group" >
                    <select class="form-control select2" name="segment" required>
                        <option value="">Select Segment</option>
                        <?php
                        if($result5){
                            while($rows=mysqli_fetch_array($result5)){
                                $Segment = $rows['segment'];
                                echo " <option value='$Segment' >$Segment</option>";
                            }
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group" id="status">
                    <label for="status">Status</label>
                    <input required type="text" class="form-control" name="status" placeholder="Enter Status"
                           value="<?php echo $row['status'] ?>">
                </div>
                <button type="submit" class="btn btn-outline-primary">Update</button>
                <a type="button" href=" <?php echo $url ?>" class="btn btn-outline-primary">Back</a>
            </form>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

            <script>
                $('.select2').select2({ width: '100%' });
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
</body>

</html>