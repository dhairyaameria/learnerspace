<?php

include('config/session.php');
include('config/db_connect.php');

// write query for all course
$user_id = $_SESSION['user_id'];
$sql = "SELECT id, course_name, course_code, lecturer_name, image_ext FROM course WHERE user_id = $user_id ORDER BY id";

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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- This is fullCalendar code -->
  <link href='lib/main.css' rel='stylesheet' />
  <script src='lib/main.js'></script>
  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {

        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },

        displayEventTime: false, // don't show the time column in list view
        
        
        //new test code
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },
      editable: false,
      dayMaxEvents: true, // allow "more" link when too many events

        //finish test code

        // THIS KEY WON'T WORK IN PRODUCTION!!!
        // To make your own Google API key, follow the directions here:
        // http://fullcalendar.io/docs/google_calendar/


        googleCalendarApiKey: 'AIzaSyC0oBlsvVm4bg09sXMblkfzU5ljH4t6OZg',

        // Calendar ID
        events: 'dhairyaameria567@gmail.com',

        eventClick: function(arg) {
          // opens events in a popup window
          window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

          arg.jsEvent.preventDefault() // don't navigate in main tab
        },


        
        loading: function(bool) {
          document.getElementById('loading').style.display =
            bool ? 'block' : 'none';
        }

      });

      calendar.render();
    });

  </script>
  <style>

    body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #loading {
      display: none;
      position: absolute;
      top: 10px;
      right: 10px;
    }

    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }

  </style>

  <!-- Finish fullCalendar code -->


</head>

<body>

<?php include('partials/header.php'); ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
          <?php echo "Hello " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "<br>User ID : " . $user_id;?>
          <?php echo "<br>User Type : " . $_SESSION['usertype']; ?>
          <?php echo "<br>User Email : " . $_SESSION['email']; ?>
	    </div>
    </div><!-- End Breadcrumbs -->
<br/>
    <!-- ======= Events Section ======= -->


        <div class="row">  
          <!-- <div class="col-lg-9 col-md-6" style="border-style: solid; border-color: coral;"> -->
          <div class="col-lg-9 col-md-6">
            <form method="post">
                <!-- Calling fullCalendar -->
                <div id='loading'>loading...</div>
                <div id='calendar'></div>
            </form>
          </div>
          

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" style="text-align: center;" data-aos="fade-up">
            <div class="box">
              <br> <h2>Courses</h2> <br>
              <?php foreach ($course as $course) : ?>
                  <button style="width: 100%; padding: 10px;"><a style="color:black"href="Course-details.php?id=<?php echo $course['id'] ?>"><?php echo htmlspecialchars($course['course_name']); ?></a></button> <br>
              <?php endforeach?>                
                <?php if ($_SESSION['usertype'] == '1') : ?>                 
                    <div class="text-center">
                      <a style="margin-top: 30px; margin-bottom: 30px;" class="btn btn-danger btn-lg" href="add.php" role="button">+ Add Course</a>
                    </div> 
                <?php endif; ?>
            </div>
          </div>
        </div>


    </section><!-- End Events Section -->

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
