<?php

if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: login.php");
    die();
}

require '../include/db.php'; 

$msg = "";

if (isset($_POST['submit'])) {
    // Retrieve form data
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

    // Check if the provided credentials match the data in the database
    $query = mysqli_query($db, "SELECT * FROM user WHERE user_id='{$user_id}' AND fullname='{$fullname}' AND email='{$email}'");

    if (mysqli_num_rows($query) > 0) {
        // If the credentials match, redirect the user to recover-password.php
        header("Location: recover-password.php?user_id={$user_id}");
        exit();
    } else {
        $msg = "<div class='alert alert-danger'>Invalid credentials. Please check your User ID, Fullname, and Email.</div>";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GreenBin | Forgot Password</title>
    <link href="../images/logo.png" rel="icon">
    <link href="../images/logo.png" rel="apple-touch-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../user/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../user/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../user/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</head>

<body style="background-image: url('../images/bg.png'); background-size: cover; background-position: center;"
    class="hold-transition login-page">
    <img
          src="../images/logo.png"
          alt="Green Bin"
          style="width: 140px; height: 150px"
        />
    <!-- form section start -->
    <div class="login-box">
        <div class="login-logo">
        <a href="../index.php"
          ><b style="color: #17ef63; font-weight: bold;">Green</b><b style="color: #FFF;">Bin</b></a
        >
        </div>
        <!-- /form -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password. </p>
                <?php echo $msg; ?>
                <form action="" method="post">
                <div class="input-group mb-3">
                        <input type="text" class="form-control" name="user_id" placeholder="Enter Your User ID" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="fullname" placeholder="Enter Your Fullname" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <button name="submit" class="btn btn-primary btn-block" type="submit">Proceed</button>
                </form>
                <div class="social-icons">
                    <p><br><br>Back to <a href="login.php">Login</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="../user/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../user/dist/js/adminlte.min.js"></script>
</body>

</html>