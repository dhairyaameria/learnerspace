<?php

include('config/session.php');
include('config/db_connect.php');

if (!empty($_SESSION['name'])) {
    header('Location: index.php');
}

$login_username = $login_password = '';
$username = $first_name = $last_name =$email = $password = $usertype = '';

$errors = array('login_username' => '', 'login_password' => '', 'username' => '', 'first_name' => '', 'last_name' => '', 'email' => '', 'password' => '');
$login = $register = '';

if (isset($_POST['login'])) {
    unset($_POST['register']);
    $sql = 'SELECT id,username,first_name,last_name,email,usertype,password,created_at FROM  users';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);

    foreach ($users as $user) {
        // validate user
        if ($_POST['login_username'] == $user['username'] && $_POST['login_password'] == $user['password']) {
            session_start();
           
            $_SESSION['login'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['usertype'] = $user['usertype'];

            $cookie_name = "learnerspace";
            $cookie_value = $_SESSION['user_id'];
            $_SESSION['cookieName'] = $cookie_name;
            $_SESSION['cookieValue'] = $cookie_value;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

            header('Location: index.php');
        } else {
            $login_username = $_POST['login_username'];
            $login_password = $_POST['login_password'];
        }
    }
    $login = 'Login failed!';
}

if (isset($_POST['register'])) {
    unset($_POST['login']);

    // check username
    if (empty($_POST['username'])) {
        $errors['username'] = 'A username is required <br/>';
    } else {
        $username = $_POST['username'];
        if (strlen($username) < 4) {
            $errors['username'] = 'Username must be at least 4 characters <br/>';
        }
    }

    // check name
    if (empty($_POST['first_name'])) {
        $errors['first_name'] = 'A name is required <br/>';
    } else {
        $first_name = $_POST['first_name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $first_name)) {
            $errors['first_name'] = 'Name must be letters and spaces only <br/>';
        }
    }

    
    // check name
    if (empty($_POST['last_name'])) {
        $errors['last_name'] = 'A name is required <br/>';
    } else {
        $last_name = $_POST['last_name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $last_name)) {
            $errors['last_name'] = 'Name must be letters and spaces only <br/>';
        }
    }

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br/>';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address <br/>';
        }
    }

    // check password
    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required <br/>';
    } else {
        $password = $_POST['password'];
        if (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters <br/>';
        }
    }

    if (empty($_POST['usertype'])) {
        $errors['usertype'] = 'Your role is required <br/>';
    }

    if (!array_filter($errors)) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
        $created_at = date('Y-m-d H:i:s');
        
        // create sql
        $sql = "INSERT INTO users(username, first_name,last_name, email, password, usertype,created_at) VALUES('$username', '$first_name','$last_name', '$email', '$password', '$usertype','$created_at')";
        echo $sql;
        // save to db and check
        if (mysqli_query($conn, $sql)) {
            // success
            $username = $first_name= $last_name = $email = $password = '';
            $login = 'Registration succesful!';
        } else {
            // error
            $login = 'Registration failed!';
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}

$name = 'Guest';

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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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

<section id="intro">
    <div class="intro-container wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 border-right">
                    <h2 class="text-white">Login</h2>
                    <div class="container" style="padding: 40px 80px;">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div style="height: 60px;"></div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="login_username" placeholder="Username" value="<?php echo htmlspecialchars($login_username); ?>">
                                <div class="text-warning"><?php echo $errors['login_username']; ?></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="login_password" placeholder="Password">
                                <div class="text-warning"><?php echo $errors['login_password']; ?></div>
                            </div>
                            <input type="submit" name="login" value="Login" class="about-btn">
                            <div class="text-warning"><?php echo $login; ?></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 border-left">
                    <h2 class="text-white">Register new user</h2>
                    <div class="container" style="padding: 40px 80px;">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div class="form-group">
                                <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>">
                                <div class="text-warning"><?php echo $errors['username']; ?></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo htmlspecialchars($first_name); ?>">
                                <div class="text-warning"><?php echo $errors['first_name']; ?></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?php echo htmlspecialchars($last_name); ?>">
                                <div class="text-warning"><?php echo $errors['last_name']; ?></div>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="E-mail" value="<?php echo htmlspecialchars($email); ?>">
                                <div class="text-warning"><?php echo $errors['email']; ?></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                <div class="text-warning"><?php echo $errors['password']; ?></div>
                            </div>
                            <div class="form-group">
                            <input type="radio" id="Student" name="usertype" value="0">
                                <label for="0">Student</label><br>
                            <input type="radio" id="Lecturer" name="usertype" value="1">
                                <label for="1">Lecturer</label><br>
                            </div>
                            <input type="submit" name="register" value="Register" class="about-btn">
                            <div class="text-warning"><?php echo $register; ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



 </body>

 </html>
