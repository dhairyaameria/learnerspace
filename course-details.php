<?php
session_start();
include('config/session.php');
include('config/db_connect.php');

// write query for all coursw
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
if (isset($_GET['id'])) {
  $course_id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT * FROM course WHERE id = $course_id";
  $result = mysqli_query($conn, $sql);
  $course = mysqli_fetch_assoc($result);
  mysqli_free_result($result);  

  $sql = "SELECT * FROM course_detail WHERE id = $course_id";
  $result = mysqli_query($conn, $sql);
  $detail = mysqli_fetch_assoc($result);
  mysqli_free_result($result);  
}

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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<?php include('partials/header.php'); ?>  
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2><?php echo $course['course_name'] ?> Course</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <div class="speaker" style="height: 300px;">
              <?php
              //  echo '<img class="img-fluid" width="100%" src="' . $Course['image_url'] . '">';
              echo '<img class="img-fluid" style="width:100%; height:300;" src="img/uploads/Course' . $course['id'] . '.' . $course['image_ext'] . '">';
              ?>
            </div>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Name</h5>
              <!--<p><a href="#">Application Development</a></p>-->
              <p><?php echo $course['course_name'] ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course code</h5>
              <p><?php echo $course['course_code'] ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Lecturer Name</h5>
              <p><?php echo $course['lecturer_name'] ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Schedule</h5>
              <p>10 a.m. - 12 a.m.</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
            <button style="width: 100%; padding: 10px;"><a style="color:black"href="template.php">Course File</a></button> <br><br>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
            <button style="width: 100%; padding: 10px;"><a style="color:black"href="setting.php?id=<?php echo $detail['id'];?>">Course Setting</a></button> <br>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->

    <!-- ======= Cource Details Tabs Section ======= -->
    <section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <h2>Shortcut Link</h2>
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="" href="https://trello.com/en">Trello Board</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">Description 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">Description 3</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">Description 4</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-5">Description 5</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h2>About <?php echo $course['course_name'] ?>  Course Description</h2>
                    <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h2>About <?php echo $course['course_name'] ?>  Course Description Part 2</h2>
                    <p><?php echo 'Desc1: <br>' . $detail['desc1']; ?></p>
                    <p><br><br> Description from Database <br></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h2>About <?php echo $course['course_name'] ?>  Course Description Part 3</h2>
                    <?php echo 'Desc2: <br>' . $detail['desc2']; ?>
                    <p><br><br> Description from Database <br></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h2>About <?php echo $course['course_name'] ?>  Course Description Part 4</h2>
                    <?php echo 'testing ' . $detail['desc3']; ?>
                    <p class="font-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h2>About <?php echo $course['course_name'] ?>  Course Description Part 5</h2>
                    <p class="font-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Cource Details Tabs Section -->

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
