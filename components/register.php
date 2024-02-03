<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
  require('../include/db.php');

  $fullName = $_POST["fullName"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];

  $targetDir = "../images/";
  $fileName = $_FILES["userProfile"]["name"];
  $targetFile = $targetDir . $fileName;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["userProfile"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    echo '<script>alert("File is not an image.");</script>';
    $uploadOk = 0;
  }

  if ($_FILES["userProfile"]["size"] > 5000000) {
    echo '<script>alert("Sorry, your file is too large.");</script>';
    $uploadOk = 0;
  }

  if (
    $imageFileType != "jpg" &&
    $imageFileType != "png" &&
    $imageFileType != "jpeg" &&
    $imageFileType != "gif"
  ) {
    echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo '<script>alert("Sorry, your file was not uploaded.");</script>';
  } else {
    if (move_uploaded_file($_FILES["userProfile"]["tmp_name"], $targetFile)) {
      $emailQuery = "SELECT * FROM user WHERE email = '$email'";
      $emailResult = mysqli_query($db, $emailQuery);
      if (mysqli_num_rows($emailResult) > 0) {
        echo '<script>alert("Email already exists. Please choose a different email.");</script>';
      } else {
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
          echo '<script>alert("Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number.");</script>';
        } else {
          $query = "INSERT INTO user (fullname, email, password, user_profile) VALUES ('$fullName', '$email', '$password', '$fileName')";
          $result = mysqli_query($db, $query);

          if ($result) {
            echo '<script>alert("Registration successful!");</script>';
            echo '<script>window.location.href = "login.php";</script>';
            exit();
          } else {
            echo '<script>alert("Registration failed. Please try again.");</script>';
          }
        }
      }
    } else {
      echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>GreenBin | Registration Page</title>
  <link href="../images/logo.png" rel="icon" />
  <link href="../images/logo.png" rel="apple-touch-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../user/plugins/fontawesome-free/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../user/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../user/dist/css/adminlte.min.css" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body style="background-image: url('../images/bg.png'); background-size: cover; background-position: center;"
  class="hold-transition login-page">
  <img
          src="../images/logo.png"
          alt="Green Bin"
          style="width: 90px; height: 100px"
        />
  <div class="register-box">
    <div class="register-logo">
    <a href="../index.php"
          ><b style="color: #17ef63; font-weight: bold;">Green</b><b style="color: #FFF;">Bin</b></a
        >
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <input type="file" class="form-control" name="userProfile" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-image"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="fullName"
              value="<?php echo isset($fullName) ? $fullName : ''; ?>" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email"
              value="<?php echo isset($email) ? $email : ''; ?>" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="confirmPassword"
              id="confirmPassword" required />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="showPassword" />
              <label class="custom-control-label" for="showPassword">Show Password</label>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required />
                <label for="agreeTerms">
                  I agree to the <a href="https://www.portfolioonline.com.au/termsAndConditions.s"
                    target="_blank">terms</a>
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
            </div>
          </div>
        </form>
        <a href="login.php" class="text-center">I already have an Account</a>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../user/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../user/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
  <script>
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const showPasswordCheckbox = document.getElementById('showPassword');

    showPasswordCheckbox.addEventListener('change', function () {
      const passwordType = showPasswordCheckbox.checked ? 'text' : 'password';
      passwordInput.setAttribute('type', passwordType);
      confirmPasswordInput.setAttribute('type', passwordType);
    });
  </script>
</body>

</html>