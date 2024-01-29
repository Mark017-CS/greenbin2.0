<?php
require('../../include/db.php');

// Check if the admin is logged in
if (!isset($_SESSION['isAdminLoggedIn'])) {
  echo "<script>window.location.href='adminLogin.php';</script>";
  exit();
}

$admin_id = $_SESSION['admin_id'];

// Add Website About Details
if (isset($_POST['add-about'])) {
  $desc = mysqli_real_escape_string($db, $_POST['about_desc']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin_about WHERE  admin_id=$admin_id";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['about_img'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "INSERT INTO admin_about (admin_id, about_desc, about_img) ";
  $query .= "VALUES ($admin_id, '$imagename', '$desc') ";
  $query .= "ON DUPLICATE KEY UPDATE about_img='$imagename', about_desc='$desc'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}

// Add Website Developer
if (isset($_POST['add-developer'])) {
  $name = mysqli_real_escape_string($db, $_POST['Name']);
  $desc = mysqli_real_escape_string($db, $_POST['Description']);
  $social = mysqli_real_escape_string($db, $_POST['social']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin_developers WHERE  admin_id=$admin_id";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['deve_profile'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "INSERT INTO admin_developers (admin_id, Name, Description, deve_profile, social) ";
  $query .= "VALUES ($admin_id, '$name', '$desc', '$imagename', '$social') ";
  $query .= "ON DUPLICATE KEY UPDATE Name='$name', Description='$desc',  deve_profile='$imagename', social='$social'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}

// Add Organization
if (isset($_POST['add-organization'])) {
  $orgs_name = $_POST['name'];
  $orgs_email = $_POST['email'];
  $orgs_num = $_POST['number'];
  $orgs_loc = $_POST['location'];
  $orgs_website = $_POST['website_link'];
  $type = $_POST['wasteType'];
  $imagename = time() . $_FILES['orgs_profile']['name'];
  $imgtemp = $_FILES['orgs_profile']['tmp_name'];

  if ($imgtemp == '') {
      $q = "SELECT * FROM orgs WHERE admin_id=$admin_id";
      $r = mysqli_query($db, $q);
      $d = mysqli_fetch_array($r);
      $imagename = $d['orgs_profile'];
  } else {
      move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "INSERT INTO orgs (name, number, email, location, wasteType, orgs_profile, website_link, admin_id) ";
  $query .= "VALUES ('$orgs_name', '$orgs_num', '$orgs_email', '$orgs_loc', '$type', '$imagename', '$orgs_website', $admin_id) ";
  $query .= "ON DUPLICATE KEY UPDATE name='$orgs_name', number='$orgs_num', email='$orgs_email', location='$orgs_loc', orgs_profile='$imagename', website_link='$orgs_website', wasteType='$type'";

  $run = mysqli_query($db, $query);
  if ($run) {
      echo "<script>window.location.href='../admin.php?organizationsetting=true';</script>";
      exit();
  }
}

// Update Organization
if (isset($_POST['update-organization'])) {
  $orgs_id = $_POST['id'];
  $orgs_name = $_POST['name'];
  $orgs_email = $_POST['email'];
  $orgs_num = $_POST['number'];
  $orgs_loc = $_POST['location'];
  $orgs_website = $_POST['website_link'];
  $type = $_POST['wasteType'];
  $imagename = time() . $_FILES['orgs_profile']['name'];
  $imgtemp = $_FILES['orgs_profile']['tmp_name'];

  if ($imgtemp == '') {
      // Image not uploaded, fetch existing image from the database
      $existingQuery = "SELECT * FROM orgs WHERE id=$orgs_id";
      $existingResult = mysqli_query($db, $existingQuery);
      $existingData = mysqli_fetch_assoc($existingResult);
      $imagename = $existingData['orgs_profile'];
  } else {
      // Image uploaded, move it to the destination folder
      move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  // Check if the organization already exists
  $existingQuery = "SELECT * FROM orgs WHERE id=$orgs_id";
  $existingResult = mysqli_query($db, $existingQuery);

  if (mysqli_num_rows($existingResult) > 0) {
      // Organization exists, update it
      $updateQuery = "UPDATE orgs SET name='$orgs_name', number='$orgs_num', email='$orgs_email', location='$orgs_loc', orgs_profile='$imagename', website_link='$orgs_website', wasteType='$type' WHERE id=$orgs_id";

      $run = mysqli_query($db, $updateQuery);
      if ($run) {
          echo "<script>window.location.href='../admin.php?organizationsetting=true';</script>";
          exit();
      } else {
          echo "Error updating organization: " . mysqli_error($db);
      }
  } else {
      // Organization doesn't exist, insert it
      $insertQuery = "INSERT INTO orgs (name, number, email, location, wasteType, orgs_profile, website_link, admin_id) ";
      $insertQuery .= "VALUES ('$orgs_name', '$orgs_num', '$orgs_email', '$orgs_loc', '$type', '$imagename', '$orgs_website', $admin_id)";

      $run = mysqli_query($db, $insertQuery);
      if ($run) {
          echo "<script>window.location.href='../admin.php?organizationsetting=true';</script>";
          exit();
      } else {
          echo "Error adding organization: " . mysqli_error($db);
      }
  }
}



// Add Website Background
if (isset($_POST['add-background'])) {
  $imagename = time() . $_FILES['background']['name'];
  $imgtemp = $_FILES['background']['tmp_name'];

  move_uploaded_file($imgtemp, "../../images/$imagename");

  $query = "INSERT INTO admin_homebg (admin_id, background_img) ";
  $query .= "VALUES ($admin_id, '$imagename') ";
  $query .= "ON DUPLICATE KEY UPDATE background_img='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?changebackground=true';</script>";
    exit();
  }
}

// Add Website User
if (isset($_POST['add-user'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $imagename = 'default.jpg';
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "INSERT INTO user (fullname, email, password, user_profile) VALUES ('$fullname', '$email', '$password', '$imagename')";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?accountsetting=true';</script>";
    exit();
  }
}

// Add Website Social Media Details
if (isset($_POST['add-socialmedia'])) {
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $skype = $_POST['skype'];
  $linkedin = $_POST['linkedin'];

  $query = "INSERT INTO admin_social (user_id, twitter, facebook, instagram, skype, linkedin) ";
  $query .= "VALUES ($admin_id, '$twitter', '$facebook', '$instagram', '$skype', '$linkedin') ";
  $query .= "ON DUPLICATE KEY UPDATE twitter='$twitter', facebook='$facebook', instagram='$instagram', skype='$skype', linkedin='$linkedin'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?homesetting=true';</script>";
    exit();
  }
}

// Update Website Social Media
if (isset($_POST['update-socialmedia'])) {
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $skype = $_POST['skype'];
  $youtube = $_POST['youtube'];
  $linkedin = $_POST['linkedin'];

  $query = "UPDATE admin_social SET twitter='$twitter', facebook='$facebook', instagram='$instagram', skype='$skype', youtube='$youtube', linkedin='$linkedin' WHERE admin_id = $admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?homesetting=true';</script>";
    exit();
  }
}

// Update Website Home Details
if (isset($_POST['update-home'])) {
  $home_title = $_POST['home_title'];
  $home_title2 = $_POST['home_title2'];
  $home_desc = $_POST['home_desc'];

  $query = "UPDATE admin_home SET home_title='$home_title', home_title2='$home_title2', home_desc='$home_desc' WHERE admin_id = $admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?homesetting=true';</script>";
    exit();
  }
}

// Update Website Admin Details
if (isset($_POST['update-admin'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['admin_prof'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "UPDATE admin SET name='$name', email='$email', password='$password', admin_prof='$imagename'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?adminsetting=true';</script>";
    exit();
  }
}

// Update Website Users
if (isset($_POST['update-user'])) {
  $userId = mysqli_real_escape_string($db, $_POST['user_id']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM user";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['user_profile'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "UPDATE user SET fullname='$fullname', email='$email', password='$password', user_profile='$imagename' WHERE user_id='$userId'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?accountsetting=true';</script>";
    exit();
  }
}

// Add Waste
if (isset($_POST['add-waste'])) {
  $item = $_POST['item'];
  $weight = $_POST['weight'];
  $type = $_POST['wasteType'];
  $category = $_POST['category'];
  $status = $_POST['status'];

  // Concatenate selected values to form the date in YYYY-MM-DD format
  $xdate = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];

  // Query to select organization based on waste type
  $orgQuery = "SELECT name FROM orgs WHERE wasteType = '$type'";
  $orgResult = mysqli_query($db, $orgQuery);

  if ($orgResult) {
    // Fetch the organization name
    $orgRow = mysqli_fetch_assoc($orgResult);
    $contactOrg = $orgRow['name'];

    $query = "INSERT INTO waste (item, weight, wasteType, xdate, category, status, contact) ";
    $query .= "VALUES ('$item', '$weight', '$type', '$xdate', '$category', '$status', '$contactOrg') ";
    $query .= "ON DUPLICATE KEY UPDATE item='$item', weight='$weight', wasteType='$type', xdate='$xdate', category='$category', status='$status', contact='$contactOrg'";

    $run = mysqli_query($db, $query);
    if ($run) {
      echo "<script>window.location.href='../admin.php?wastesetting=true';</script>";
      exit();
    } else {
      echo "Error: " . mysqli_error($db);
    }
  }
}



// Update waste
if (isset($_POST['update-waste'])) {
  $waste_id = $_POST['id'];
  $item = $_POST['item'];
  $weight = $_POST['weight'];
  $type = $_POST['wasteType'];

  // Concatenate selected values to form the date in YYYY-MM-DD format
  $xdate = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];

  $query = "UPDATE waste SET item='$item', weight='$weight', wasteType='$type', xdate='$xdate' WHERE id='$waste_id'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?wastesetting=true';</script>";
    exit();
  }
}

// Validate waste
if (isset($_POST['validate-waste'])) {
  $waste_id = $_POST['id'];
  $category = $_POST['category'];
  $status = $_POST['status'];


  $query = "UPDATE waste SET category='$category', status='$status' WHERE id='$waste_id'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?wastesetting=true';</script>";
    exit();
  }
}


// Update Website About Details
if (isset($_POST['update-about'])) {
  $desc = mysqli_real_escape_string($db, $_POST['about_desc']);
  $mission = mysqli_real_escape_string($db, $_POST['mission']);
  $vision = mysqli_real_escape_string($db, $_POST['vision']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin_about WHERE admin_id=$admin_id";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['profile_pic'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "UPDATE admin_about SET about_img='$imagename',mission='$mission', vision='$vision',  about_desc='$desc' WHERE  admin_id = $admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}

// Update Website Developers
if (isset($_POST['update-developer'])) {
  $Id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['Name']);
  $desc = mysqli_real_escape_string($db, $_POST['Description']);
  $social = mysqli_real_escape_string($db, $_POST['social']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM admin_developers";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['deve_profile'];
  } else {
    move_uploaded_file($imgtemp, "../../images/$imagename");
  }

  $query = "UPDATE admin_developers SET Name='$name', Description='$desc', deve_profile='$imagename', social='$social' WHERE id='$Id'";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?aboutsetting=true';</script>";
    exit();
  }
}

// Update Website Background
if (isset($_POST['update-background'])) {
  $imagename = time() . $_FILES['background']['name'];
  $imgtemp = $_FILES['background']['tmp_name'];

  move_uploaded_file($imgtemp, "../../images/$imagename");

  $query = "UPDATE admin_homebg SET background_img='$imagename' WHERE admin_id = $admin_id";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href='../admin.php?changebackground=true';</script>";
    exit();
  }
}