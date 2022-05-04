<?php

include('config/session.php');
include('config/db_connect.php');

// write query for all course
$sql = 'SELECT id, course_name, course_code, lecturer_name, image_ext FROM course ORDER BY id';

// $user_id = $_SESSION['user_id'];
// $sql = "SELECT id, course_name, course_code, lecturer_name, image_ext FROM course WHERE user_id = $user_id ORDER BY id";


// make query & get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$course = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

?>

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
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<?php include('partials/header.php'); ?>  
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Courses</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- start code here -->
<section id="speakers" class="wow fadeInUp">
  <div class="container">

    <div class="row">
      <?php foreach ($course as $courses) : ?>

        <div class="col-lg-4 col-md-6" style="padding: 50;">
          <div class="speaker" style="height: 200px;">
            <!-- <h1><?php //echo htmlspecialchars($Course['Course']); 
                      ?></h1> -->
            <?php
            //  echo '<img class="img-fluid" width="100%" src="' . $Course['image_url'] . '">';
            echo '<img class="img-fluid" style="width:100%; height:200;" src="img/uploads/Course' . $courses['id'] . '.' . $courses['image_ext'] . '">';
            ?>
            <div class="details" style="min-height: 100px;">
              <h3><a href="Course-details.php?id=<?php echo $courses['id'] ?>"><?php echo htmlspecialchars($courses['course_name']); ?></a></h3>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
    <br> <br>
    <?php if (!empty($_SESSION['username'])) : ?>                 
        <div class="text-center">
          <a style="margin-top: 30px; margin-bottom: 30px;" class="btn btn-danger btn-lg" href="add.php" role="button">+ Add Course</a>
        </div> 
    <?php endif; ?>
  </div>
</section>

    <!-- end code here -->

  </main><!-- End #main -->

  <?php include('partials/footer.php'); ?>

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

</body>

</html>
