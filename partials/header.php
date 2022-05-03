
<!DOCTYPE html>
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
   <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="index.php">Learner's Space</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <?php if (empty($_SESSION['username'])) : ?>   
        <?php else : ?>  
          <li><a href ="profile.php"><?php echo $_SESSION['first_name']?></a></li>
      <?php endif; ?>
       
          <li><a href="about.php">About</a></li>     
          <li><a href="courses.php">Courses</a></li>
          <li><a href="template.php">Resources</a></li>
          <li><a href="calendar.php">Calendar</a></li>  
          <li><a href="noti.php">Notification</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <?php if (empty($_SESSION['username'])) : ?>
        <a href="login.php" class="get-started-btn">Log In</a>
        <?php else : ?>
          <a href="logout.php" class="get-started-btn">Log Out</a>
      <?php endif; ?>
    </div>
  </header><!-- End Header -->
</body>
</html>