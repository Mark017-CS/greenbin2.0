<?php
require('../include/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];

  $errors = [];
  if (empty($password)) {
    $errors[] = "Password is required.";
  }
  if ($password !== $confirmPassword) {
    $errors[] = "Passwords do not match.";
  }
  if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
    $errors[] = "Password must be at least 8 characters long and include at least one lowercase letter, one uppercase letter, and one number.";
  }

  if (empty($errors)) {
    $email = $_POST['email'];

    $updateQuery = "UPDATE user SET password = '$password' WHERE email = '$email'";
    if (mysqli_query($conn, $updateQuery)) {
      header("Location: login.php");
      exit();
    } else {
      $errors[] = "Failed to update the password. Please try again.";
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Art Abode | Recover Password</title>
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
</head>

<body style="background-image: url('../images/bg.png'); background-size: cover; background-position: center;"
  class="hold-transition login-page">
  <img
          src="../images/logo.png"
          alt="Green Bin"
          style="width: 140px; height: 150px"
        />
  <div class="login-box">
    <div class="login-logo">
    <a href="../index.php"
          ><b style="color: #17ef63; font-weight: bold;">Green</b><b style="color: #FFF;">Bin</b></a
        >
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">
          You are only one step away from your new password, recover your password now.
        </p>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
          </div>
        </form>
        <?php if (!empty($errors)) { ?>
          <div class="alert alert-danger mt-3">
            <?php foreach ($errors as $error) {
              echo $error . "<br>";
            } ?>
          </div>
        <?php } ?>
        <p class="mt-3 mb-1">
          <a href="login.php">Login</a>
        </p>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../user/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../user/dist/js/adminnlte.min.js"></script>
</body>

</html>