<!DOCTYPE html>
<?php

include('config/session.php');
include('config/db_connect.php');

if(!isset($_COOKIE[ $_SESSION['cookieName']])) {
  // echo "Cookie named '" .  $_SESSION['cookieName']  . "' is not set!";
} 
else {
  echo "Cookie '" .  $_SESSION['cookieName'] . "' is set!<br>";
  echo "Value is: " .  $_SESSION['cookieValue'];
}
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Learner's Space</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
 
<body>
<?php include('partials/header.php'); ?>  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100" >
      <h1>E-Learning Platform</h1>
      <h2>One stop for all your Resources.</h2>
      <?php if (empty($_SESSION['username'])) : ?>   
        <?php else : ?>  
          <a href="courses.php" class="btn-get-started">Get Started</a>
      <?php endif; ?>
      <?php if (empty($_SESSION['username'])) : ?>
        <a href="login.php" class="btn-get-started">Log In</a>
        <?php else : ?>
          <a href="logout.php" class="btn-get-started">Log Out</a>
      <?php endif; ?>
    </div>
  </section><!-- End Hero -->

 
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <?php include('partials/footer.php'); ?>
</body>

</html>
