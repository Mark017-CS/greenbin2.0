<?php
require('../../include/db.php');

// Check if the Admin is logged in
if (!isset($_SESSION['isAdminLoggedIn'])) {
  echo "<script>window.location.href='adminLogin.php';</script>";
  exit();
}

$admin_id = $_SESSION['admin_id'];

if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];

  $query = "DELETE FROM user WHERE user_id=$user_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?accountsetting=true';</script>";
    exit();
  }
}
?>
