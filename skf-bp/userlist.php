<?php
include("connection.php");
session_start();
$sql = "SELECT * FROM brandportfolio";
$result = mysqli_query($conn, $sql);

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}





?>


    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">

        <title>Brand Portfolio List</title>
    </head>

    <body style="background: #f2f2f2">
    <?php if (isset($_SESSION['deleteOk'])) { ?>
        <div class="alert alert-success text-center font-weight-bold" role="alert">
            Successfully Deleted!
        </div>
    <?php } ?>
    <div class="d-flex justify-content-around shadow-lg py-3 mb-4 bg-white rounded">
        <a href="home.php"><img src="images/TransparentSkf.png" alt="Smiley face" height="40" width="80"></a>

        <!-- <p class="font-weight-bold text-success">Welcome! <?php echo $row['exname'] ?></p> -->

        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a href="#" class="btn btn-outline-success">Hi! <?php echo $_SESSION['username1'] ?></a>
            <a href="registration.php" class="btn btn-outline-info">New Registration</a>
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
    <h1 class="text-center" style="color: #0072bb">Brand Portfolio List</h1>
    <br>
    <div class="container">
        <div class="row shadow-lg bg-white rounded p-4">
            <!-- <div class="col-md-2">
              <a href="registration.php" class="btn btn-info">Register Now</a>
            </div> -->
            <div class="col-md-12 ">
                <table class="table table-sm table-bordered text-center table-responsive-md table-responsive-sm">
                    <tr>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item ">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </tr>
                    <thead>
                    <th>Brand</th>
                    <th>GPM ID</th>
                    <th>GPM Name</th>
                    <th>Executive ID</th>
                    <th>Executive Name</th>
                    <th>Segment</th>
                    <th>Date & Time</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>

                            <td><?php echo $row['brand'] ?></td>
                            <td><?php echo $row['gpmid'] ?></td>
                            <td><?php echo $row['gpmname'] ?></td>
                            <td><?php echo $row['exid'] ?></td>
                            <td><?php echo $row['exname'] ?></td>
                            <td><?php echo $row['segment'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm">View</a>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>"
                                   onclick="return confirm('Are You Sure about deleting <?php echo $row['exname']; ?>?') "
                                   class="btn btn-outline-danger btn-sm">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>

                    </tbody>
                </table>
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

<?php unset($_SESSION['deleteOk']); ?>