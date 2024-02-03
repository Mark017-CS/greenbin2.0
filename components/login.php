<?php
require('../include/db.php');

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($_POST['login_type'] == 'user') {
    $query = "SELECT * FROM user WHERE email='$email' && password='$password'";
    $run = mysqli_query($db, $query);
    $row_count = mysqli_num_rows($run);

    if ($row_count > 0) {
      session_start();
      $data = mysqli_fetch_array($run);
      $_SESSION['user_id'] = $data['user_id']; // Store the user ID in the session
      $_SESSION['isUserLoggedIn'] = true; // Set the session variable to indicate that the user is logged in

      // Check if "Remember Me" checkbox is selected
      if (isset($_POST['remember'])) {
        // Set cookies for email and password
        setcookie('email', $_POST['email'], time() + (86400 * 30), '/');
        setcookie('password', $_POST['password'], time() + (86400 * 30), '/');
      } else {
        // Clear cookies for email and password
        setcookie('email', '', time() - 3600, '/');
        setcookie('password', '', time() - 3600, '/');
      }

      header("Location: ../index.php");
      exit();
    } else {
      echo "<script>alert('Incorrect email id or password!')</script>";
    }
  } elseif ($_POST['login_type'] == 'admin') {
    // Check if the email and password are valid for admin login
    $query = "SELECT * FROM admin WHERE email='$email' && password='$password'";
    $run = mysqli_query($db, $query);
    $row_count = mysqli_num_rows($run);

    if ($row_count > 0) {
      // Login successful
      session_start();
      $data = mysqli_fetch_array($run);
      $_SESSION['admin_id'] = $data['admin_id']; // Store the admin ID in the session
      $_SESSION['isAdminLoggedIn'] = true; // Set the session variable to indicate that the admin is logged in

      // Remove cookies for email and password
      setcookie('email', '', time() - 3600, '/');
      setcookie('password', '', time() - 3600, '/');

      header("Location: ../admin/admin.php?homesetting=true");
      exit();
    } else {
      echo "<script>alert('Incorrect email id or password!')</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GreenBin | Log in</title>
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

  <style>
    .password-toggle-icon {
      cursor: pointer;
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      color: #999;
      z-index: 1;
      display: none;
    }

    .password-toggle-icon:hover {
      color: #666;
    }
  </style>
</head>

<body style="background-image: url('../images/bg.png'); background-size: cover; background-position: center;"
  class="hold-transition login-page"><img
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
        <p class="login-box-msg">Log in</p>
        <form method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required
              value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required
              value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock" id="lockIcon"></span>
              </div>
            </div>
            <span class="fas fa-eye password-toggle-icon" id="eyeIcon"></span>
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="rememberMe">Remember Me</label>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="icheck-primary">
                <input type="radio" id="userLogin" name="login_type" value="user" checked>
                <label for="userLogin">
                  User
                </label>
              </div>
            </div>
            <div class="col-6">
              <div class="icheck-primary">
                <input type="radio" id="adminLogin" name="login_type" value="admin">
                <label for="adminLogin">
                  Admin
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
        <p class="mb-1">
          <a href="forgot-password.php">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Register</a>
        </p>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../user/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../user/dist/js/adminlte.min.js"></script>
  <script>
    var passwordInput = document.querySelector('#password');
    var lockIcon = document.getElementById('lockIcon');
    var eyeIcon = document.getElementById('eyeIcon');

    passwordInput.addEventListener('input', function () {
      if (passwordInput.value !== '') {
        lockIcon.style.display = 'none';
        eyeIcon.style.display = 'block';
      } else {
        lockIcon.style.display = 'block';
        eyeIcon.style.display = 'none';
      }
    });

    eyeIcon.addEventListener('click', function () {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      }
    });
  </script>
</body>

</html>