<?php
require('db.php');

// Check if the user is logged in
if (!isset($_SESSION['isUserLoggedIn'])) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}

$userId = $_SESSION['user_id'];

// Add Account Details
if (isset($_POST['add-account'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profilepic']['name'];
  $imgtemp = $_FILES['profilepic']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM user WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['user_profile'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "INSERT INTO user (user_id, fullname, email, password, user_profile) ";
  $query .= "VALUES ($userId, '$fullname', '$email', '$password', '$imagename') ";
  $query .= "ON DUPLICATE KEY UPDATE fullname='$fullname', email='$email', password='$password', user_profile='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?accountsetting=true';</script>";
    exit();
  }
}

// Update account Details
if (isset($_POST['update-account'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profilepic']['name'];
  $imgtemp = $_FILES['profilepic']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM user WHERE user_id=$userId";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['user_profile'];
  }

  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE user SET fullname='$fullname', email='$email', password='$password', user_profile='$imagename' WHERE user_id = $userId";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../Home/account.php?accountsetting=true';</script>";
    exit();
  }
}

// Add waste
if (isset($_POST['add-waste'])) {
    $item = $_POST['item'];
    $weight = $_POST['weight'];
    $type = $_POST['wasteType'];

    // Concatenate selected values to form the date in YYYY-MM-DD format
    $xdate = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];

    // Query to select organization based on waste type
    $orgQuery = "SELECT name FROM orgs WHERE wasteType = '$type'";
    $orgResult = mysqli_query($db, $orgQuery);

    if ($orgResult) {
        // Fetch the organization name
        $orgRow = mysqli_fetch_assoc($orgResult);
        $contactOrg = $orgRow['name'];

        // Insert waste into the database with the contact organization
        $query = "INSERT INTO waste (item, weight, wasteType, xdate, contact) ";
        $query .= "VALUES ('$item', '$weight', '$type', '$xdate', '$contactOrg') ";
        $query .= "ON DUPLICATE KEY UPDATE item='$item', weight='$weight', wasteType='$type', xdate='$xdate', contact='$contactOrg'";

        $run = mysqli_query($db, $query);
        if ($run) {
            echo "<script>window.location.href='../index.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        echo "Error: " . mysqli_error($db);
    }
}





?>