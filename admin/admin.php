<?php
require('../include/db.php');

if (!isset($_SESSION['isAdminLoggedIn'])) {
  echo "<script>window.location.href='adminLogin.php';</script>";
  exit;
}

$admin_id = $_SESSION['admin_id'];

$query = "SELECT * FROM admin 
          LEFT JOIN admin_about ON admin.admin_id = admin_about.admin_id 
          LEFT JOIN admin_homebg ON admin.admin_id = admin_homebg.admin_id  
          LEFT JOIN admin_home ON admin.admin_id = admin_home.admin_id 
          LEFT JOIN admin_social ON admin.admin_id = admin_social.admin_id 
          WHERE admin.admin_id = $admin_id";

$run = mysqli_query($db, $query);
if (!$run) {
  echo "Error executing query: " . mysqli_error($db);
  exit;
}

$admin_data = mysqli_fetch_array($run);
if (!$admin_data) {
  echo "Error fetching admin data: " . mysqli_error($db);
  exit;
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Dashboard</title>
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

    .content {
      margin-top: 60px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="../components/logout.php">
            Logout
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="admin.php?homesetting=true" class="brand-link">
        <img src="../images/logo.png" alt="userLTE Logo" class="brand-image">
        <span class="brand-text font-weight-bold">ADMIN PANEL</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../images/<?= $admin_data['admin_prof'] ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?= $admin_data['name'] ?>
            </a>
          </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info" style="justify-content: center; align-items: center; text-align: center;">
            <a href="#" class="d-block" style="font-style: italic;">
              Admin ID:
              <?= $admin_data['admin_id'] ?>
            </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="admin.php?homesetting=true"
                class="nav-link <?php echo isset($_GET['homesetting']) ? 'active' : ''; ?>">
                <i class="fa fa-home" aria-hidden="true"></i>
                <p>
                  Home Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?changebackground=true"
                class="nav-link <?php echo isset($_GET['changebackground']) ? 'active' : ''; ?>">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <p>
                  Change Background
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?aboutsetting=true"
                class="nav-link <?php echo isset($_GET['aboutsetting']) ? 'active' : ''; ?>">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                <p>
                  About Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?organizationsetting=true"
                class="nav-link <?php echo isset($_GET['organizationsetting']) ? 'active' : ''; ?>">
                <i class="fa fa-users" aria-hidden="true"></i>
                <p>
                  Organizations Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?wastesetting=true"
                class="nav-link <?php echo isset($_GET['wastesetting']) ? 'active' : ''; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
                <p>
                  Waste Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?accountsetting=true"
                class="nav-link <?php echo isset($_GET['accountsetting']) ? 'active' : ''; ?>">
                <i class="fa fa-user" aria-hidden="true"></i>
                <p>
                  User Section
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="admin.php?adminsetting=true"
                class="nav-link <?php echo isset($_GET['adminsetting']) ? 'active' : ''; ?>">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
                <p>
                  Admin Section
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <?php
            if (isset($_GET['changebackground'])) {
              ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage Home Background</h3>
                </div>
                <!-- /.card-header -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Background</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Background Image</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $q = "SELECT * from admin_homebg WHERE admin_id=$admin_id";
                        $r = mysqli_query($db, $q);
                        $c = 1;
                        while ($pi = mysqli_fetch_array($r)) {
                          ?>
                          <tr>
                            <td>
                              <?= $c ?>
                            </td>
                            <td>
                              <img src="../images/<?= $pi['background_img'] ?>" style="height: 170px; width: 200px;">
                            </td>
                          </tr>
                          <?php
                          $c++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- form start -->
                <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group ">
                      <label for="exampleInputEmail1">Choose Background Image</label>
                      <div class="input-container">
                        <input type="file" class="form-control" name="background" required>
                        <i class="fas fa-image icon"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <?php
                    $query = "SELECT * FROM admin_homebg WHERE admin_id = $admin_id";
                    $result = mysqli_query($db, $query);
                    $row_count = mysqli_num_rows($result);

                    if ($row_count == 0) {
                      echo '<button type="submit" name="add-background" class="btn btn-primary">Add Background</button>';
                    } else {
                      echo '<button type="submit" name="update-background" class="btn btn-primary">Save Changes</button>';
                    }
                    ?>
                  </div>
                </form>
              </div>

              <?php
            } elseif (isset($_GET['homesetting'])) {
              ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage Home Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Home</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Home Title 1</th>
                            <th>Home Title 2</th>
                            <th>Home Description</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from admin_home WHERE admin_id=$admin_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                                <?= $c ?>
                              </td>
                              <td>
                                <?= $pi['home_title'] ?>
                              </td>
                              <td>
                                <?= $pi['home_title2'] ?>
                              </td>
                              <td>
                                <?= $pi['home_desc'] ?>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- form start -->
                <form role="form" action="include/adminConfig.php" method="post">
                  <div class="card-body">
                    <div class="form-group ">
                      <label for="exampleInputEmail1">Title 1</label>
                      <input type="text" class="form-control" name="home_title" id="exampleInputEmail1"
                        placeholder="Enter Title 1" required>
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputPassword1">Title 2</label>
                      <input type="text" class="form-control" name="home_title2" id="exampleInputPassword1"
                        placeholder="Enter Title 2" required>
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputPassword1">Description</label>
                      <input type="text" class="form-control" name="home_desc" id="exampleInputPassword1"
                        placeholder="Enter Description" required>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="update-home" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage Social Media Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Social Media</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Twitter</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Skype</th>
                            <th>Youtube</th>
                            <th>Linkedin</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from admin_social WHERE admin_id=$admin_id";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                                <?= $c ?>
                              </td>
                              <td>
                                <?= $pi['twitter'] ?>
                              </td>
                              <td>
                                <?= $pi['facebook'] ?>
                              </td>
                              <td>
                                <?= $pi['instagram'] ?>
                              </td>
                              <td>
                                <?= $pi['skype'] ?>
                              </td>
                              <td>
                                <?= $pi['youtube'] ?>
                              </td>
                              <td>
                                <?= $pi['linkedin'] ?>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- form start -->
                <form role="form" action="include/adminConfig.php" method="post">
                  <div class="card-body">
                    <div class="form-group ">
                      <label for="exampleInputEmail1">Twitter</label>
                      <input type="text" class="form-control" name="twitter" id="exampleInputEmail1"
                        placeholder="Enter username">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputPassword1">Facebook</label>
                      <input type="text" class="form-control" name="facebook" id="exampleInputPassword1"
                        placeholder="Enter Username">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputPassword1">Instagram</label>
                      <input type="text" class="form-control" name="instagram" id="exampleInputPassword1"
                        placeholder="Enter username">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputPassword1">Skype</label>
                      <input type="text" class="form-control" name="skype" id="exampleInputPassword1"
                        placeholder="Enter username">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputPassword1">Youtube</label>
                      <input type="text" class="form-control" name="youtube" id="exampleInputPassword1"
                        placeholder="Enter username">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputPassword1">Linkedin</label>
                      <input type="text" class="form-control" name="linkedin" id="exampleInputPassword1"
                        placeholder="Enter username">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <?php
                    $query = "SELECT * FROM admin_social WHERE admin_id = $admin_id";
                    $result = mysqli_query($db, $query);
                    $row_count = mysqli_num_rows($result);

                    if ($row_count == 0) {
                      echo '<button type="submit" name="add-socialmedia" class="btn btn-primary">Add Social Media</button>';
                    } else {
                      echo '<button type="submit" name="update-socialmedia" class="btn btn-primary">Save Changes</button>';
                    }
                    ?>
                  </div>
                </form>
              </div>
              <?php
            } else if (isset($_GET['aboutsetting'])) {
              ?>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage About</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">About</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>About Description</th>
                              <th>MIssion</th>
                              <th>Vision</th>
                              <th>About Image</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $q = "SELECT * from admin_about WHERE admin_id=$admin_id";
                            $r = mysqli_query($db, $q);
                            $c = 1;
                            while ($about = mysqli_fetch_array($r)) {
                              ?>
                              <tr>
                                <td>
                                <?= $c ?>
                                </td>
                                <td>
                                <?= $about['about_desc'] ?>
                                </td>
                                <td>
                                <?= $about['mission'] ?>
                                </td>
                                <td>
                                <?= $about['vision'] ?>
                                </td>
                                <td>
                                  <img src="../images/<?= $about['about_img'] ?>" style="height: 70px; width: 100px;">
                                </td>
                              </tr>
                              <?php
                              $c++;
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- form start -->
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="exampleInputEmail1">About Image</label>
                        <div class="input-container">
                          <input type="file" class="form-control" name="profile" required>
                          <i class="fas fa-image icon"></i>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputPassword1">About Description</label><br>
                        <textarea cols="50"  class="form-control" name="about_desc" required></textarea>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputPassword1">Mision</label><br>
                        <textarea cols="50" class="form-control" name="mission" required></textarea>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputPassword1">Vision</label><br>
                        <textarea cols="50" class="form-control" name="vision" required></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <?php
                      $query = "SELECT * FROM admin_about WHERE admin_id = $admin_id";
                      $result = mysqli_query($db, $query);
                      $row_count = mysqli_num_rows($result);

                      if ($row_count == 0) {
                        echo '<button type="submit" name="add-about" class="btn btn-primary">Add About Details</button>';
                      } else {
                        echo '<button type="submit" name="update-about" class="btn btn-primary">Save Changes</button>';
                      }
                      ?>
                    </div>
                  </form>
                </div>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Manage Developers</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Developers</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th style="width: 10px">Developer's ID</th>
                              <th>Developer's Name</th>
                              <th>Developer's Description</th>
                              <th>Profile</th>
                              <th>Faccebook Username</th>
                              <th style="width: 40px">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $q = "SELECT * from admin_developers WHERE admin_id=$admin_id";
                            $r = mysqli_query($db, $q);
                            while ($developers = mysqli_fetch_array($r)) {
                              ?>
                              <tr>
                                <td>
                                <?= $developers['id'] ?>
                                </td>
                                <td>
                                <?= $developers['Name'] ?>
                                </td>
                                <td>
                                <?= $developers['Description'] ?>
                                </td>
                                <td>
                                  <img src="../images/<?= $developers['deve_profile'] ?>" style="height: 70px; width: 100px;">
                                </td>
                                <td>
                                <?= $developers['social'] ?>
                                </td>
                                <td>
                                  <a href="include/deletedeveloper.php?id=<?= $developers['id'] ?>">Delete</a>
                                </td>
                              </tr>
                              <?php
                              $c++;
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- form start -->
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Add a Developer</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Developers</h3>
                    </div>
                    <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group ">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" name="Name" required>
                        </div>
                        <div class="form-group ">
                          <label for="exampleInputEmail1">Description</label><br>
                          <textarea cols="50" class="form-control" name="Description" required></textarea>
                        </div>
                        <div class="form-group ">
                          <label for="exampleInputEmail1">Developer's Image</label>
                          <div class="input-container">
                            <input type="file" class="form-control" name="profile" required>
                            <i class="fas fa-image icon"></i>
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="exampleInputPassword1">Facebook Username</label>
                          <input type="text" class="form-control" name="social" required>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="add-developer" class="btn btn-primary">Add Developer</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card card-primary col-lg-12">
                  <div class="card-header">
                    <h3 class="card-title">Update Developer Information</h3>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Developers</h3>
                    </div>
                    <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group ">
                          <label for="exampleInputEmail1">Developer's ID</label>
                          <input type="text" class="form-control" name="id" required>
                        </div>
                        <div class="form-group ">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" name="Name" required>
                        </div>
                        <div class="form-group ">
                          <label for="exampleInputEmail1">Description</label><br>
                          <textarea cols="50" class="form-control" name="Description" required></textarea>
                        </div>
                        <div class="form-group ">
                          <label for="exampleInputEmail1">Developer's Image</label>
                          <div class="input-container">
                            <input type="file" class="form-control" name="profile" required>
                            <i class="fas fa-image icon"></i>
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="exampleInputPassword1">Facebook Username</label>
                          <input type="text" class="form-control" name="social" required>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" name="update-developer" class="btn btn-primary">Update Developer</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php
            } elseif (isset($_GET['organizationsetting'])) {
              ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage Organizations</h3>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Organizations</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">ID</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Waste Collecting</th>
                            <th>Image</th>
                            <th>Website Link</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $qq = "SELECT * from orgs WHERE admin_id = $admin_id";
                          $rr = mysqli_query($db, $qq);
                          $cc = 1;
                          while ($pii = mysqli_fetch_array($rr)) {
                            ?>
                            <tr>
                              <td>
                              <?= $pii['id'] ?>
                              </td>
                              <td>
                              <?= $pii['name'] ?>
                              </td>
                              <td>
                              <?= $pii['number'] ?>
                              </td>
                              <td>
                              <?= $pii['email'] ?>
                              </td>
                              <td>
                              <?= $pii['location'] ?>
                              </td>
                              <td>
                              <?= $pii['wasteType'] ?>
                              </td>
                              <td>
                                <img src="../images/<?= $pii['orgs_profile'] ?>" style="height: 150px; width: 130px;">

                              </td>
                              <td><a href="<?= $pii['website_link'] ?>" target="_blank">Open Link</a></td>
                              <td>
                                <a href="include/deleteorg.php?id=<?= $pii['id'] ?>">Delete</a>
                              </td>
                            </tr>
                            <?php
                            $cc++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card-header">
                  <h3 class="card-title">Add Organization</h3>
                </div>
                <div class="card">
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data"
                    onsubmit="return validateForm()">
                    <div class="card-body">

                      <div class="form-group ">
                        <label for="exampleInputEmail1">Orgs Name</label>
                        <input type="text" class="form-control" name="name" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="text" class="form-control" name="number" id="mobile" pattern="09[0-9]{9}"
                          title="Please enter a valid 11-digit mobile number starting with '09'" required>

                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" name="location" id="exampleInputEmail1" required>
                      </div>
                      <div class="form-group ">
                        <label for="wasteType">Waste Collecting</label>
                        <select class="form-control" id="wasteType" name="wasteType" required>
                          <option value="" disabled selected>Select Waste Collected</option>
                          <option value="Rinds, Peels, and Shells">Rinds, Peels, and Shells</option>
                          <option value="Meat and Bones">Meat and Bones</option>
                          <option value="Seeds and Nuts">Seeds and Nuts</option>
                          <option value="Stems, Leaves, and Plant Scraps">Stems, Leaves, and Plant Scraps</option>
                          <option value="Spoiled and Unusable">Spoiled and Unusable</option>
                        </select>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Orgs Profile</label>
                        <div class="input-container">
                          <input type="file" class="form-control" name="orgs_profile" required>
                          <i class="fas fa-image icon"></i>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Website Link</label>
                        <input type="url" class="form-control" name="website_link" id="website" required>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="add-organization" class="btn btn-primary">Add Organization</button>
                    </div>
                  </form>
                </div>
                <div class="card-header">
                  <h3 class="card-title">Update Organization Information</h3>
                </div>
                <div class="card">
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data"
                    onsubmit="return validateForm()">
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="org_id">Organization ID</label>
                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Orgs Name</label>
                        <input type="text" class="form-control" name="name" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="text" class="form-control" name="number" id="mobile" pattern="09[0-9]{9}"
                          title="Please enter a valid 11-digit mobile number starting with '09'" required>

                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" name="location" id="exampleInputEmail1" required>
                      </div>
                      <div class="form-group ">
                        <label for="wasteType">Waste Collecting</label>
                        <select class="form-control" id="wasteType" name="wasteType" required>
                          <option value="" disabled selected>Select Waste Collected</option>
                          <option value="Rinds, Peels, and Shells">Rinds, Peels, and Shells</option>
                          <option value="Meat and Bones">Meat and Bones</option>
                          <option value="Seeds and Nuts">Seeds and Nuts</option>
                          <option value="Stems, Leaves, and Plant Scraps">Stems, Leaves, and Plant Scraps</option>
                          <option value="Spoiled and Unusable">Spoiled and Unusable</option>
                        </select>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Orgs Profile</label>
                        <div class="input-container">
                          <input type="file" class="form-control" name="orgs_profile" required>
                          <i class="fas fa-image icon"></i>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Website Link</label>
                        <input type="url" class="form-control" name="website_link" id="website" required>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="update-organization" class="btn btn-primary">Update Organization</button>
                    </div>
                  </form>

                </div>
              </div>
            <?php
            } elseif (isset($_GET['wastesetting'])) {
              ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage Wastes</h3>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Wastes</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="width: 10px">ID</th>
                            <th>Item</th>
                            <th>Weight</th>
                            <th>Waste Type</th>
                            <th>Expiration Date</th>
                            <th>Contact</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $qq = "SELECT * from waste";
                          $rr = mysqli_query($db, $qq);
                          $cc = 1;
                          while ($pii = mysqli_fetch_array($rr)) {
                            ?>
                            <tr>
                              <td>
                              <?= $pii['id'] ?>
                              </td>
                              <td>
                              <?= $pii['item'] ?>
                              </td>
                              <td>
                              <?= $pii['weight'] ?> kg
                              </td>
                              <td>
                              <?= $pii['wasteType'] ?>
                              </td>
                              <td>
                              <?= $pii['xdate'] ?>
                              </td>
                              <td>
                              <?= $pii['contact'] ?>
                              </td>
                              <td>
                                <a href="include/deletewaste.php?id=<?= $pii['id'] ?>">Delete</a>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card-header">
                  <h3 class="card-title">Add Waste</h3>
                </div>
                <div class="card">
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data"
                    class="attractive-form" onsubmit="return validateForm()">
                    <input type="hidden" name="waste_id" value="<?php echo $waste_id; ?>">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="item">Item</label>
                        <input type="text" class="form-control" name="item" id="item" placeholder="Enter item" required>
                      </div>
                      <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight in kg"
                          required pattern="[0-9]+" title="Input must be numerical">
                        <div class="invalid-feedback">Please enter a numerical value for weight.</div>
                      </div>
                      <div class="form-group">
                        <label for="wasteType">Waste Type</label>
                        <select class="form-control" id="wasteType" name="wasteType" required>
                          <option value="" disabled selected>Select Waste Type</option>
                          <option value="Rinds, Peels, and Shells">Rinds, Peels, and Shells</option>
                          <option value="Meat and Bones">Meat and Bones</option>
                          <option value="Seeds and Nuts">Seeds and Nuts</option>
                          <option value="Stems, Leaves, and Plant Scraps">Stems, Leaves, and Plant Scraps</option>
                          <option value="Spoiled and Unusable">Spoiled and Unusable</option>
                        </select>
                      </div>
                      <div class="form-group ">
                        <label for="xdate">Expiration Date</label>
                        <div class="row">
                          <div class="col">
                            <select class="form-control" name="year" required>
                              <option value="" disabled selected>Select Year</option>
                              <?php
                              // Loop to generate options for years (from 2015 to 2050)
                              for ($year = 2015; $year <= 2050; $year++) {
                                echo "<option value='$year'>$year</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col">
                            <select class="form-control" name="month" required>
                              <option value="" disabled selected>Select Month</option>
                              <?php
                              // Loop to generate options for months
                              for ($i = 1; $i <= 12; $i++) {
                                $month = str_pad($i, 2, "0", STR_PAD_LEFT); // Add leading zero if needed
                                echo "<option value='$month'>$month</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col">
                            <select class="form-control" name="day" required>
                              <option value="" disabled selected>Select Day</option>
                              <?php
                              // Loop to generate options for days
                              for ($i = 1; $i <= 31; $i++) {
                                $day = str_pad($i, 2, "0", STR_PAD_LEFT); // Add leading zero if needed
                                echo "<option value='$day'>$day</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="add-waste" class="btn btn-primary">Add Waste</button>
                    </div>
                  </form>

                </div>
                <div class="card-header">
                  <h3 class="card-title">Update Waste</h3>
                </div>
                <div class="card">
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data"
                    class="attractive-form" onsubmit="return validateForm()">
                    <input type="hidden" name="waste_id" value="<?php echo $waste_id; ?>">
                    <!-- Use PHP to echo the waste ID here -->
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="item">Waste ID</label>
                        <input type="text" class="form-control" name="id" id="id" placeholder="Enter ID" required>
                      </div>
                      <div class="form-group ">
                        <label for="item">Item</label>
                        <input type="text" class="form-control" name="item" id="item" placeholder="Enter item" required>
                      </div>
                      <div class="form-group ">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight in kg"
                          required pattern="[0-9]+" title="Input must be numerical">
                        <div class="invalid-feedback">Please enter a numerical value for weight.</div>
                      </div>
                      <div class="form-group ">
                        <label for="wasteType">Waste Type</label>
                        <select class="form-control" id="wasteType" name="wasteType" required>
                          <option value="" disabled selected>Select Waste Type</option>
                          <option value="Rinds, Peels, and Shells">Rinds, Peels, and Shells</option>
                          <option value="Meat and Bones">Meat and Bones</option>
                          <option value="Seeds and Nuts">Seeds and Nuts</option>
                          <option value="Stems, Leaves, and Plant Scraps">Stems, Leaves, and Plant Scraps</option>
                          <option value="Spoiled and Unusable">Spoiled and Unusable</option>
                        </select>
                      </div>
                      <div class="form-group ">
                        <label for="xdate">Expiration Date</label>
                        <div class="row">
                          <div class="col">
                            <select class="form-control" name="year" required>
                              <option value="" disabled selected>Select Year</option>
                              <?php
                              // Loop to generate options for years (from 2015 to 2050)
                              for ($year = 2015; $year <= 2050; $year++) {
                                echo "<option value='$year'>$year</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col">
                            <select class="form-control" name="month" required>
                              <option value="" disabled selected>Select Month</option>
                              <?php
                              // Loop to generate options for months
                              for ($i = 1; $i <= 12; $i++) {
                                $month = str_pad($i, 2, "0", STR_PAD_LEFT); // Add leading zero if needed
                                echo "<option value='$month'>$month</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col">
                            <select class="form-control" name="day" required>
                              <option value="" disabled selected>Select Day</option>
                              <?php
                              // Loop to generate options for days
                              for ($i = 1; $i <= 31; $i++) {
                                $day = str_pad($i, 2, "0", STR_PAD_LEFT); // Add leading zero if needed
                                echo "<option value='$day'>$day</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="card-footer">
                      <button type="submit" name="update-waste" class="btn btn-primary">Update Waste</button>
                    </div>
                  </form>
                </div>

              </div>
            <?php
            } elseif (isset($_GET['accountsetting'])) {
              ?>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Manage User Accounts</h3>
                </div>
                <!-- /.card-header -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">User Accounts</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>User Profile</th>
                            <th>Code</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $q = "SELECT * from user";
                          $r = mysqli_query($db, $q);
                          $c = 1;
                          while ($pi = mysqli_fetch_array($r)) {
                            ?>
                            <tr>
                              <td>
                              <?= $pi['user_id'] ?>
                              </td>
                              <td>
                              <?= $pi['fullname'] ?>
                              </td>
                              <td>
                              <?= $pi['email'] ?>
                              </td>
                              <td>
                              <?= $pi['password'] ?>
                              </td>
                              <td>
                                <img src="../images/<?= $pi['user_profile'] ?>" style="height: 150px; width: 130px;">
                              </td>
                              <td>
                              <?= $pi['code'] ?>
                              </td>
                              <td>
                                <a href="include/deleteuser.php?user_id=<?= $pi['user_id'] ?>">Delete</a>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card card-primary col-lg-12">
                <div class="card-header">
                  <h3 class="card-title">Update User</h3>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                  </div>
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="exampleInputEmail1">User ID</label>
                        <input type="text" class="form-control" name="user_id" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="exampleInputEmail1" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Profile</label>
                        <div class="input-container">
                          <input type="file" class="form-control" name="profile" required>
                          <i class="fas fa-image icon"></i>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" name="password" id="exampleInputEmail1" required>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="update-user" class="btn btn-primary">Update User</button>
                    </div>
                  </form>
                </div>
                <div class="card-header">
                  <h3 class="card-title">Add User</h3>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">User Information</h3>
                  </div>
                  <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="exampleInputEmail1" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Profile</label>
                        <div class="input-container">
                          <input type="file" class="form-control" name="profile" required>
                          <i class="fas fa-image icon"></i>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" required>
                      </div>
                      <div class="form-group ">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" name="password" id="exampleInputEmail1" required>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="add-user" class="btn btn-primary">Add User</button>
                    </div>
                  </form>
                </div>
              </div>
          </section>
        <?php
            } elseif (isset($_GET['adminsetting'])) {
              ?>
          <div class="card card-primary col-lg-12">
            <div class="card-header">
              <h3 class="card-title">Manage Admin Information</h3>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Account</h3>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Admin ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Admin Profile</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $q = "SELECT * from admin";
                      $r = mysqli_query($db, $q);
                      $c = 1;
                      while ($pi = mysqli_fetch_array($r)) {
                        ?>
                        <tr>
                          <td>
                          <?= $pi['admin_id'] ?>
                          </td>
                          <td>
                          <?= $pi['name'] ?>
                          </td>
                          <td>
                          <?= $pi['email'] ?>
                          </td>
                          <td>
                          <?= $pi['password'] ?>
                          </td>
                          <td>
                            <img src="../images/<?= $pi['admin_prof'] ?>" style="height: 150px; width: 130px;">
                          </td>
                        </tr>
                        <?php
                        $c++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="card card-primary col-lg-12">
            <div class="card-header">
              <h3 class="card-title">Update Admin</h3>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Information</h3>
              </div>
              <form role="form" action="include/adminConfig.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Profile</label>
                    <div class="input-container">
                      <input type="file" class="form-control" name="profile" required>
                      <i class="fas fa-image icon"></i>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" name="password" id="exampleInputEmail1" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="update-admin" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
          </section>
      <?php } ?>
      <footer class="main-footer">
        <strong>Copyright &copy; 2024 <a href="#">Group 1</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b>2.0
        </div>
      </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
      <!-- /.control-sidebar -->
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>