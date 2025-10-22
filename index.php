<?php
session_start();
require "db.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $emp_code = $_POST['code'];
    $emp_email = $_POST['email'];
    $emp_password = $_POST['password'];
    $hashedPassword = md5($emp_password);
    $dbName = "employee" . $emp_code;

    $sql2 = "SELECT * FROM db_records WHERE db_name = '$dbName'";

    $sql = "SELECT * FROM employees_credential WHERE email = '$emp_email' AND password = '$hashedPassword'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_query($conn, $sql2)->num_rows > 0) {
        if (mysqli_query($conn, $sql)->num_rows > 0) {
            $_SESSION['db_code'] = "employee" . $emp_code;
            header("location: dashboard.php");
        } else {
            echo "Invalid Password/Email";
        }
    } else {
        echo "Invalid Code";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row">
                            <img src="https://i.imgur.com/CXQmsmF.png" class="logo">
                        </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                            <img src="https://i.imgur.com/uNGdWHi.png" class="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                            <div class="facebook text-center mr-3">
                                <div class="fa fa-facebook"></div>
                            </div>
                            <div class="twitter text-center mr-3">
                                <div class="fa fa-twitter"></div>
                            </div>
                            <div class="linkedin text-center mr-3">
                                <div class="fa fa-linkedin"></div>
                            </div>
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="line"></div>
                            <small class="or text-center">Or</small>
                            <div class="line"></div>
                        </div>
                        <form method="POST">
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Employee Code</h6>
                                </label>
                                <input class="mb-4" type="text" name="code" placeholder="Enter a code">
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email Address</h6>
                                </label>
                                <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address">
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input type="password" name="password" placeholder="Enter password">
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input id="chk1" type="checkbox" name="chk" class="custom-control-input">
                                    <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                                </div>
                                <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                            </div>
                            <div class="row mb-3 px-3">
                                <button type="submit" class="btn btn-blue text-center">Login</button>
                            </div>
                        </form>
                        <div class="row mb-4 px-3">
                            <small class="font-weight-bold">Don't have an account? <a href="sign_up.php" class="text-danger ">Register</a></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3">
                    <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                    <div class="social-contact ml-4 ml-sm-auto">
                        <span class="fa fa-facebook mr-4 text-sm"></span>
                        <span class="fa fa-google-plus mr-4 text-sm"></span>
                        <span class="fa fa-linkedin mr-4 text-sm"></span>
                        <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>