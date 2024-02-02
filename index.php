<?php
require('include/db.php');

// Retrieve data from the user table
$query = "SELECT user_id, user_profile FROM user";
$result = mysqli_query($db, $query);

// Fetch data from the homebg table
$queryHomebg = "SELECT * FROM admin_homebg";
$resultHomebg = mysqli_query($db, $queryHomebg);
$pi = mysqli_fetch_array($resultHomebg);

// Fetch data from the admin about table
$queryHomeAbout = "SELECT * FROM admin_about";
$resultHomeAbout = mysqli_query($db, $queryHomeAbout);
$pii = mysqli_fetch_array($resultHomeAbout);

// Fetch data from the admin services table
$querywaste = "SELECT * FROM waste";
$resultwaste = mysqli_query($db, $querywaste);
$piii = mysqli_fetch_array($resultwaste);

// Fetch data from the admin socials table
$querySocial = "SELECT * FROM admin_social";
$resultSocial = mysqli_query($db, $querySocial);
$social = mysqli_fetch_array($resultSocial);

// Fetch data from the admin home table
$queryHome = "SELECT * FROM admin_home";
$resultHome = mysqli_query($db, $queryHome);
$home = mysqli_fetch_array($resultHome);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>GreenBin</title>
  <!-- Favicons -->
  <link href="images/logo.png" rel="icon">
  <link href="images/logo.png" rel="apple-touch-icon">
  <!-- box icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script>
    window.onload = function () {
      if (performance.navigation.type === 1) {
        // Page is reloaded
        location.href = "#home";
      }
    };
  </script>
  <style>
    body {
      font-family: "Open Sans", sans-serif;
      background-color: #040404;
      color: #fff;
      overflow-y: scroll;
    }

    .navbar-link {
      font-weight: bold;
      color: #FFF !important;
      text-shadow: lightgreen;
    }

    .gray-background::placeholder {
      color: black;
    }

    .gray-background {
      color: black;
    }

    .gray-background {
      background-color: gray;
      color: white;
    }

    .gray-background:focus {
      background-color: gray;
      color: white;
    }

    .background-image {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: 0.3;
      z-index: -1;
      background: url('images/<?= $pi['background_img'] ?>') top right no-repeat;
      background-size: cover;
    }

    .attractive-form {
      margin-top: 50px;
      border: 1px solid #1DB954;
      border-radius: 5px;
      align-items: center;
      padding: 20px;
    }

    .attractive-form .form-group {
      margin-bottom: 15px;
    }

    .attractive-form label {
      font-weight: bold;
    }

    .attractive-form input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .attractive-form button[type="submit"] {
      background-color: #1DB954;
      align-items: center;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    .attractive-form button[type="submit"]:hover {
      background-color: white;
      color: green;
    }
  </style>
</head>

<body>
  <div class="background-image"></div>
  <!-- ======= Header ======= -->
  <header class="header " id="header">
    <div class="container">
      <h1><a href="index.php"><b style="color: #1DB954; font-style: italic; ">
            <img src="images/logo.png" alt="Green Bin" style="width: 50px; height: 60px" />
            <?= $home['home_title'] ?>
          </b><b style="color: #FFF;">
            <?= $home['home_title2'] ?>
          </b></a></a></h1>
      <h2>
        <?= $home['home_desc'] ?>
      </h2>
      <!-- navbar -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#header">Home</a></li>
          <li><a class="nav-link" href="#about">About Us</a></li>
          <li><a class="nav-link" href="#food">Food Wastes</a></li>
          <li><a class="nav-link" href="#orgs">Organizations</a></li>
          <li><a class="nav-link" href="#contact">Contact</a></li>
          <?php
          session_start();
          if (isset($_SESSION['user_id'])) {
            echo '<li><a href="Home/account.php?accountsetting=true" target="_blank"><b class="navbar-link">ACCOUNT</b></a></li>';
            echo '<li><a href="components/logout.php"><b class="navbar-link">Logout</b></a></li>';
          } else {
            echo '<li><a href="components/register.php"><b class="navbar-link">Register</b></a></li>';
            echo '<li><a href="components/login.php"><b class="navbar-link">Login</b></a></li>';
          } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="https://twitter.com/<?= $social['twitter'] ?>" class="twitter" target="_blank"><i
            class="bi bi-twitter"></i></a>
        <a href="https://facebook.com/<?= $social['facebook'] ?>" class="facebook" target="_blank"><i
            class="bi bi-facebook"></i></a>
        <a href="https://instagram.com/<?= $social['instagram'] ?>" class="instagram" target="_blank"><i
            class="bi bi-instagram"></i></a>
        <a href="https://join.skype.com/<?= $social['skype'] ?>" class="google-plus" target="_blank"><i
            class="bi bi-skype"></i></a>
        <a href="https://youtube.com/<?= $social['youtube'] ?>" class="youtube" target="_blank"><i
            class="bi bi-youtube"></i></a>
        <a href="https://linkedin.com/<?= $social['linkedin'] ?>" class="linkedin" target="_blank"><i
            class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </header><!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <!-- ======= About Us ======= -->
    <div class="about-me container">
      <div class="section-title">
        <h2>About Us</h2>
        <p>Learn more about us</p>
      </div>
      <div class="row">
        <div class="col-lg-4" style="justify-content: center; align-items: center;" data-aos="fade-right">
          <img src="images/<?= $pii['about_img'] ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <p style="text-align: justify;">
            <?= $pii['about_desc'] ?>
          </p>
        </div>
      </div>
    </div><!-- End About Us-->
    <!-- ======= Mission ======= -->
    <div class="about-me container">
      <div class="section-title">
        <h2>Our Mission</h2>
        <p>Mission</p>
      </div>
      <div class="row">
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <p style="text-align: justify;">
            <?= $pii['mission'] ?>
          </p>
        </div>
        <div class="col-lg-4" style="justify-content: center; align-items: center;" data-aos="fade-right">
          <img src="images/mission.png" style="height: 250px; width: 250px;" class="img-fluid" alt="">
        </div>
      </div>
    </div><!-- End Mission-->
    <!-- ======= Vision ======= -->
    <div class="about-me container">
      <div class="section-title">
        <h2>Our Vision</h2>
        <p>Vision</p>
      </div>
      <div class="row">
        <div class="col-lg-4" style="justify-content: center; align-items: center;" data-aos="fade-right">
          <img src="images/vision.png" style="height: 250px; width: 250px;" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <p style="text-align: justify;">
            <?= $pii['vision'] ?>
          </p>
        </div>
      </div>
    </div><!-- End Vision-->
    <!-- Developers-->
    <div class="developers">
      <div class="container">
        <div class="section-title">
          <h2>Developers</h2>
          <p>The Developers</p>
        </div>
        <div class="row developers-container">
          <?php
          $query = "SELECT * FROM admin_developers";
          $result = mysqli_query($db, $query);
          while ($developers = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-4 col-md-6 developers-item">
              <div class="developers-wrap">
                <img src="images/<?= $developers['deve_profile'] ?>" class="img-fluid developers-image" alt="">
                <div class="developers-info">
                  <h4 style="text-transform: uppercase;">
                    <?= $developers['Name'] ?>
                  </h4>
                  <p>
                    <?= $developers['Description'] ?>
                  </p>
                  <div class="developers-links">
                    <a href="images/<?= $developers['deve_profile'] ?>" data-gallery="portfoliosGallery"
                      class="portfolio-lightbox" title="<?= $developers['Name'] ?>" target="_blank"><i
                        class="bx bx-plus"></i></a>
                    <a href="https://facebook.com/<?= $developers['social'] ?>" target="_blank"
                      data-gallery="portfoliosGallery"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
  </section><!-- End About Section -->

  <?php

// Check if the user is logged in (you need to have a variable indicating the user's login status)
$userLoggedIn = isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn'];
?>

<!-- ======= wastes Section ======= -->
<section id="food" class="services">
  <div class="container">
    <div class="section-title">
      <h2>Food Wastes</h2>
      <p>Food Wastes</p>
      <input type="text" id="myInput" placeholder="Search for items..."
        style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; width: 100%; max-width: 500px; font-size: 16px; margin-bottom: 20px;">
    </div>

    <div class="card card-primary">
      <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-bordered" id="myTable">
              <thead>
              <tr>
                  <th
                    style="text-align: center; border-right: 1px solid green; width: 10px; background-color: #1DB954;">#
                  </th>
                  <th style="text-align: center; border-right: 1px solid green; background-color: #1DB954;">Item</th>
                  <th style="text-align: center; border-right: 1px solid green; background-color: #1DB954;">Weight</th>
                  <th style="text-align: center; border-right: 1px solid green; background-color: #1DB954;">Waste Type
                  </th>
                  <th style="text-align: center; border-right: 1px solid green; background-color: #1DB954;">Expiration
                    Date</th>
                  <th style="text-align: center; border-right: 1px solid green; background-color: #1DB954;">Contact</th>
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
                    <td><?= $cc ?></td>
                    <td><?= $pii['item'] ?></td>
                    <td><?= $pii['weight'] ?> kg</td>
                    <td><?= $pii['wasteType'] ?></td>
                    <td><?= $pii['xdate'] ?></td>
                    <td><?= $pii['contact'] ?></td>
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
    </div>

    <?php if ($userLoggedIn): ?>
    <form role="form" action="include/user.php" method="post" enctype="multipart/form-data" class="attractive-form"
      onsubmit="return validateForm()">
      <div class="card" style="background: rgba(0, 0, 0, 0.9); opacity: 0.8;">
        <div class="card-body">
          <div class="form-group">
            <label for="item">Item</label>
            <input type="text" class="form-control" name="item" id="item" placeholder="Enter item" required>
          </div>
          <div class="form-group">
            <label for="weight">Weight</label>
            <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight in k" required
              pattern="[0-9]+" title="Input must be numerical">
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
          <div class="form-group">
            <label for="xdate">Expiration Date</label>
            <div class="row">
              <div class="col">
                <select class="form-control" name="year" required>
                  <option value="" disabled selected>Year</option>
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
                  <option value="" disabled selected>Month</option>
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
                  <option value="" disabled selected>Day</option>
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
        <div class="card-footer text-center">
          <button type="submit" name="add-waste" class="btn btn-primary">Add Waste</button>
        </div>
      </div>
    </form>
    <?php endif; ?>

  </div>
</section>
<!-- End wastes Section -->



  <!-- ======= Orgs Section ======= -->
  <section id="orgs" class="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Organizations</h2>
        <p>Organizations</p>
      </div>
      <!-- Filter Section -->
      <div class="filter-icon" onclick="toggleFilterOptions()">
        <i class="fas fa-filter"></i> Filter <i class="arrow-icon fas fa-angle-down"></i>
      </div>
      <div class="filter-options">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php
              for ($i = 65; $i <= 90; $i++) {
                $letter = chr($i);
                echo '<li data-filter=".' . $letter . '">' . $letter . '</li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="row portfolio-container">
        <?php
        $query = "SELECT * FROM orgs ";
        $result = mysqli_query($db, $query);
        while ($orgs = mysqli_fetch_array($result)) {
          $nameStartingLetter = strtoupper(substr($orgs['name'], 0, 1));
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item <?= $nameStartingLetter ?>">
            <div class="portfolio-wrap"> <!-- removes the hover effect -->
              <?php
              // Check if orgs_profile is empty
              if (empty($orgs['orgs_profile'])) {
                // If empty, set a default image path
                $default_image = "images/default.jpg";
              } else {
                // If not empty, use the orgs_profile
                $default_image = "images/" . $orgs['orgs_profile'];
              }
              ?>

              <!-- Use the default_image variable as the src attribute -->
              <img src="<?= $default_image ?>" class="img-fluid portfolio-image" alt="">
              <div class="portfolio-info">
                <h4 style="font-weight: bold; text-transform: uppercase;">
                  <?= $orgs['name'] ?>
                </h4>
                <p style="font-style: italic;">
                  (Waste Collecting:
                  <?= $orgs['wasteType'] ?>)
                </p>
                <p>
                  <?= $orgs['number'] ?>
                </p>
                <p style="text-transform: lowercase;">
                  <?= $orgs['email'] ?>
                </p>
                <p>
                  <?= $orgs['location'] ?>
                </p>
                <div class="portfolio-links">
                  <a href="images/<?= $orgs['orgs_profile'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox"
                    title="<?= $orgs['name'] ?>" target="_blank"><i class="bx bx-plus"></i></a>
                  <a href="<?= $orgs['website_link'] ?>" target="_blank" data-gallery="portfolioGallery"><i
                      class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>
      <div class="row mt-2">
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>Address</h3>
            <p>
              Philippines
            </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
              <?php if ($social['twitter'] != '') { ?>
                <a href="https://twitter.com/<?= $social_media['twitter'] ?>" class="twitter"><i
                    class="bi bi-twitter"></i></a>
              <?php } ?>
              <?php if ($social['facebook'] != '') { ?>
                <a href="https://facebook.com/<?= $social_media['facebook'] ?>" class="facebook"><i
                    class="bi bi-facebook"></i></a>
              <?php }
              if ($social['instagram'] != '') { ?>
                <a href="https://instagram.com/<?= $social_media['instagram'] ?>" class="instagram"><i
                    class="bi bi-instagram"></i></a>
              <?php }
              if ($social['skype'] != '') { ?>
                <a href="https://skype.com/<?= $social_media['skype'] ?>" class="google-plus"><i
                    class="bi bi-skype"></i></a>
              <?php }
              if ($social['skype'] != '') { ?>
                <a href="https:/youtube.com/<?= $social_media['youtube'] ?>" class="youtube"><i
                    class="bi bi-youtube"></i></a>
              <?php }
              if ($social['linkedin'] != '') { ?>
                <a href="https://linkedin.com/<?= $social_media['linkedin'] ?>" class="linkedin"><i
                    class="bi bi-linkedin"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>
              <a href="mailto:greenbin2.0@gmail.com?subject=Subject%20Here&body=Your%20message%20goes%20here"
                class="email-link">greenbin2.0@gmail.com</a>
            </p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>
              0912345678
            </p>
          </div>
        </div>
      </div>
      <div class="section-title" style="margin-top: 30px;">
        <h2>Feedback</h2>
        <p>Feedback Form</p>
      </div>
      <form id="feedbackForm" class="mt-4">
        <div class="row">
          <div class="col-md-6 form-group mt-3">
            <input type="text" name="fullName" class="form-control gray-background" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="email" class="form-control gray-background" name="email" placeholder="Your Email" required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="tel" class="form-control gray-background" name="mobileNumber" placeholder="Mobile Number"
              required>
          </div>
          <div class="col-md-6 form-group mt-3">
            <input type="text" class="form-control gray-background" name="subject" placeholder="Email Subject" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control gray-background" name="message" rows="5" placeholder="Your Message"
            required></textarea>
        </div>
        <div class="text-center">
          <button type="button" class="btn btn-primary mt-3" onclick="validateAndSendEmail()">Send Email</button>
        </div>
      </form>



  </section>
  <!-- End Contact Section -->

  <div class="credits">
    For concerns Email Us @ <a
      href="mailto:greenbin2.0@gmail.com?subject=Subject%20Here&body=Your%20message%20goes%20here">greenbin2.0@gmail.com</a>
    | Copyright &copy; 2024 <a href="#">by Group 1 | All Rights Reserved.</a>
  </div>

  <!-- SCRIPTS -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script>
    function validateAndSendEmail() {
      var fullName = document.getElementsByName('fullName')[0].value.trim();
      var email = document.getElementsByName('email')[0].value.trim();
      var mobileNumber = document.getElementsByName('mobileNumber')[0].value.trim();
      var subject = document.getElementsByName('subject')[0].value.trim();
      var message = document.getElementsByName('message')[0].value.trim();

      if (fullName === '' || email === '' || mobileNumber === '' || subject === '' || message === '') {
        alert("Please fill out all required fields.");
        return;
      }

      // Construct mailto link with prefilled fields
      var mailtoLink = "mailto:" + encodeURIComponent("greenbin2.0@gmail.com") +
        "?subject=" + encodeURIComponent(subject) +
        "&body=" + encodeURIComponent("Name: " + fullName + "\n" +
          "Email: " + email + "\n" +
          "Mobile Number: " + mobileNumber + "\n" +
          "Subject: " + subject + "\n\n" +
          "Message: " + message);

      // Open default email client
      window.location.href = mailtoLink;
    }
  </script>
  <script>
    function toggleFilterOptions() {
      var filterOptions = document.querySelector(".filter-options");
      var arrowIcon = document.querySelector(".arrow-icon");
      if (filterOptions.style.display === "none") {
        filterOptions.style.display = "block";
        arrowIcon.classList.remove("fa-angle-down");
        arrowIcon.classList.add("fa-angle-up");
      } else {
        filterOptions.style.display = "none";
        arrowIcon.classList.remove("fa-angle-up");
        arrowIcon.classList.add("fa-angle-down");
      }
    }
  </script>
  <script>
    // JavaScript function to generate the email link with form data and clear placeholders
    function generateEmailLinkAndClearPlaceholders() {
      const fullName = document.getElementsByName('fullName')[0];
      const email = document.getElementsByName('email')[0];
      const mobileNumber = document.getElementsByName('mobileNumber')[0];
      const subject = document.getElementsByName('subject')[0];
      const message = document.getElementsByName('message')[0];

      const emailBody = `Name: ${fullName.value}\nEmail: ${email.value}\nMobile Number: ${mobileNumber.value}\nSubject: ${subject.value}\n\nYour Message: ${message.value}`;
      const encodedEmailBody = encodeURIComponent(emailBody);

      const mailtoLink = `mailto:portfoliowebsite617@gmail.com?subject=Contact%20Form%20Submission&body=${encodedEmailBody}`;

      // Clear input field values after generating the email link
      fullName.value = '';
      email.value = '';
      mobileNumber.value = '';
      subject.value = '';
      message.value = '';

      return mailtoLink;
    }

    // Attach the JavaScript function to the "Send Email" button's click event
    document.querySelector('.btn-primary').addEventListener('click', function () {
      const mailtoLink = generateEmailLinkAndClearPlaceholders();
      this.href = mailtoLink;
    });
  </script>

  <script>
    function validateForm() {
      var weight = document.getElementById("weight").value;
      if (isNaN(weight)) {
        document.getElementById("weight").classList.add("is-invalid");
        return false;
      }
      return true;
    }
  </script>


  <script>
    // Function to filter table rows based on user input
    function filterTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Change index to match the column you want to filter
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    // Event listener for input field
    document.getElementById("myInput").addEventListener("input", filterTable);
  </script>
</body>

</html>