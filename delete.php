<?php
include('config/session.php');
include('config/db_connect.php');

if(isset($_POST['delete'])){
    $coursid = $_POST['coursid'];
    $sql="DELETE FROM course WHERE id ='$coursid' ";
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("DELETE SUCCESFUL")</script>'; 
        echo "<script> location.href='courses.php'; </script>";
        exit;
    }
}