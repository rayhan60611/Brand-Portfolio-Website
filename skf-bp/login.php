<?php
session_start();


if (isset($_SESSION['login'])) {
    header("Location: home.php");
}


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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Portfolio Login Panel</title>


</head>
<body style="background: #f2f2f2">

    <?php if (isset($_SESSION['loginerror'])) { ?>
        <div class="alert alert-danger text-center font-weight-bold" role="alert">
            User Name Or Password Invalid!
        </div>
        
    <?php  } ?>
    <div class="container-fluid d-flex justify-content-around shadow-lg py-3 mb-4 bg-white rounded sticky-top">
        <a href="login.php"><img src="images/TransparentSkf.png" alt="Smiley face" height="40" width="80"></a>
       <i class="" style="color: #0072bb" aria-hidden="true"><strong><?php include("clock.php");?></strong></i>
    </div>
    <br>
    <br>


    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 p-5 pt- shadow-lg bg-white rounded font-weight-bold" style="color: #0072bb">
                <h1 class="text-center" style="color: #0072bb">Portfolio Login</h1>
                </br>

                </br>
                <form action="loginquery.php" method="POST">
                    <div class="form-group " >
                        <label for="userid">User ID</label>
                        <input required type="text" class="form-control p-2" name="userid" placeholder="User ID">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control p-2" name="password" placeholder="Enter Password">
                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">Log In <i class="fas fa-sign-in-alt"></i></button>
                </form>





            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<?php unset($_SESSION['loginerror']); ?>