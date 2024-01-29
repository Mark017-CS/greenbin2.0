<?php
require('../include/db.php');
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
  exit;
}

$user_id = $_SESSION['user_id'];

// Set SQL_BIG_SELECTS=1 to avoid the "MAX_JOIN_SIZE" error
mysqli_query($db, "SET SQL_BIG_SELECTS=1");

// Retrieve data for the specific user based on user_id
$query = "SELECT * FROM user 
          WHERE user.user_id = $user_id";

$run = mysqli_query($db, $query);
if (!$run) {
  echo "Error executing query: " . mysqli_error($db);
  exit;
}

$user_data = mysqli_fetch_array($run);
if (!$user_data) {
  echo "Error fetching user data: " . mysqli_error($db);
  exit;
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Panel | Dashboard</title>
  <!-- Favicons -->
  <link href="../images/logo.png" rel="icon">
  <link href="../images/logo.png" rel="apple-touch-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../user/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../user/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../user/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../user/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../user/plugins/summernote/summernote-bs4.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../user/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../user/plugins/jqvmap/jqvmap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .input-container {
      position: relative;
    }

    .form-control {
      padding-right: 30px;
    }

    .icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      pointer-events: none;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            Return Home
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="account.php" class="brand-link">
        <img src="../images/logo.png" alt="userLTE Logo" class="brand-image">
        <span class="brand-text font-weight: bold;">USER PANEL</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../images/<?= $user_data['user_profile'] ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="portfolio.php?user_id=<?= $user_id ?>" class="d-block">
              <?= $user_data['fullname'] ?>
            </a>
          </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info" style="justify-content: center; align-items: center; text-align: center;">
            <a href="portfolio.php?user_id=<?= $user_id ?>" class="d-block" style="font-style: italic;">
              User ID: <?= $user_id ?>
            </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">       
            <li class="nav-item menu-open">
              <a href="account.php?accountsetting=true"
                class="nav-link <?php echo isset($_GET['accountsetting']) ? 'active' : ''; ?>">
                <i class="fa fa-user" aria-hidden="true"></i>
                <p>
                  Account Setting
                </p>
              </a>

            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
  <br>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <?php if (isset($_GET['accountsetting'])): ?>
          <div class="card card-primary col-lg-12">
            <div class="card-header">
              <h3 class="card-title">Manage Account</h3>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Account</h3>
              </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Profile</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $q = "SELECT * FROM user WHERE user_id = $user_id";
                    $r = mysqli_query($db, $q);
                    while ($pi = mysqli_fetch_array($r)): ?>
                      <tr>
                        <td><?= $pi['user_id'] ?></td>
                        <td><?= $pi['fullname'] ?></td>
                        <td><?= $pi['email'] ?></td>
                        <td><?= $pi['password'] ?></td>
                        <td><img src="../images/<?= $pi['user_profile'] ?>" style="height: 70px; width: 100px;"></td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <form role="form" action="../include/user.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Profile Picture</label>
                  <div class="input-container">
                    <input type="file" class="form-control" name="profilepic">
                    <i class="fas fa-image icon"></i>
                  </div>
                </div>
                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Full Name</label>
                  <input type="text" class="form-control" name="fullname">
                </div>
                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" class="form-control" name="password">
                </div>
              </div>
              <div class="card-footer">
                <?php
                $query = "SELECT * FROM user WHERE user_id = $user_id";
                $result = mysqli_query($db, $query);
                $row_count = mysqli_num_rows($result);

                if ($row_count == 0) {
                  echo '<button type="submit" name="add-account" class="btn btn-primary">Add User Details</button>';
                } else {
                  echo '<button type="submit" name="update-account" class="btn btn-primary">Save Changes</button>';
                }
                ?>
              </div>
            </form>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

    <footer class="main-footer">
      <strong>Copyright &copy; 2024 <a href="#">Group 1</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b>2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../user/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../user/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../user/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../user/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../user/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../user/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../user/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../user/plugins/moment/moment.min.js"></script>
  <script src="../user/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../user/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../user/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../user/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="../user/dist/js/adminlte.js"></script>
  <script src="../user/dist/js/pages/dashboard.js"></script>
  <script src="../user/dist/js/demo.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"
    defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>