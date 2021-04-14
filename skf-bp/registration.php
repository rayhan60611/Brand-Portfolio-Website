<?php
include("connection.php");
session_start();


$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

if(!isset($_SESSION['login'])){
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

    <title>Add New User</title>
    <style>
        .loader{ position: fixed;left: 0px;top: 0px;width:100%;height:100%;z-index: 9999;background: url(images/Preloader_1.gif) 50% 50% no-repeat rgb(249,249,249);}

        ul{
            background-color: #eee;
            cursor: pointer;
            max-height: 200px;
            overflow-y: scroll;
            overflow-x: hidden;

        }
        li{
            border: #0072bb 0.5px solid;
            padding: 5px;
            color: #0072bb;

        }
    </style>
</head>

<body class="" style="background: #f2f2f2">
<div class="loader"></div>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success text-center font-weight-bold" role="alert">
            Item Added Successfully!
        </div>
    <?php  } ?>
    <?php if (isset($_SESSION['duplicateItem'])) { ?>
        <div class="alert alert-danger text-center font-weight-bold" role="alert">
            This Item already Exists!
        </div>
    <?php  } ?>
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


    <h1 class="text-center" style="color: #0072bb">Brand Portfolio Registration</h1>
    </br>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 p-5 pt- shadow-lg bg-white rounded">

                <form action="store.php" method="POST">
                    <div class="form-group">
                        <label for="itemid">Item Id</label>
                        <input required type="text" class="form-control" name="itemid" placeholder="Enter Item Id">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input required type="text" class="form-control" name="description" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input required type="text" class="form-control" name="brand" placeholder="Enter Brand">
                    </div>

                    <div class="form-group">
                        <label for="gpmid">GPM ID</label>
                        <input required type="text" class="form-control" name="gpmid" id="gpm-id" placeholder="Enter GPM Id">
                    </div>

                    <div class="form-group">
                        <label for="gpmname">Enter GPM Name</label>
                        <input required type="text" class="form-control" name="gpmname" id="gpm-name" placeholder="Enter GPM Name">
                    </div>
                    <div class="form-group">
                        <label for="exid1">Enter EX ID 1</label>
                        <input  type="text" class="form-control" name="exid1" placeholder="Enter EX ID 1">
                    </div>
                    <div class="form-group">
                        <label for="exid2">Enter EX ID 2</label>
                        <input  type="text" class="form-control" name="exid2" placeholder="Enter EX ID 2">
                    </div>
                    <div class="form-group">
                        <label for="exid3">Enter EX ID 3</label>
                        <input  type="text" class="form-control" name="exid3" placeholder="Enter EX ID 3">
                    </div>

                    <div class="form-group">
                        <label for="exname1">Enter EX Name 1</label>
                        <input  type="text" class="form-control" name="exname1" placeholder="Enter EX Name 1">
                    </div>
                    <div class="form-group">
                        <label for="exname2">Enter EX Name 2</label>
                        <input  type="text" class="form-control" name="exname2" placeholder="Enter EX Name 2">
                    </div>
                    <div class="form-group">
                        <label for="exname3">Enter EX Name 3</label>
                        <input  type="text" class="form-control" name="exname3" placeholder="Enter EX Name 3">
                    </div>

                    <div class="form-group autocomplete" >
                        <label for="segment">Select Segment</label>
                        <input required type="text" class="form-control" name="segment" id="segment" placeholder="Enter Segment" autocomplete="off">
                        <div id="segmentList">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input required type="text" class="form-control" name="status" placeholder="Enter Status 1 or 0">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>





            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/kt-2.5.1/r-2.2.3/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>


    <script language="javascript">

        $('document').ready(function(e) {

            $(".loader").fadeOut("slow");
        });

    </script>

    Autocomplete
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    //Segment SEARCH
    $(document).ready(function(){

        $('#segment').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                $.ajax({
                    url:"segmentAutoComplete.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#segmentList').fadeIn();
                        $('#segmentList').html(data);
                    }
                });
            }
            else{
                $('#segmentList').fadeOut();
                $('#segmentList').html("");
            }

        });

        $(document).on('click','li',function () {
            $('#segment').val($(this).text());
            $('#segmentList').fadeOut();
        });



    });
    // Segment SEARCH END
</script>



</body>

</html>

<?php unset($_SESSION['duplicateItem']); ?>
<?php unset($_SESSION['success']); ?>