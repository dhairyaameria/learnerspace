<?php
include('config/session.php');
include('config/db_connect.php');

$desc1 = $_POST['desc1'];
$desc2 = $_POST['desc2'];
$desc3 = $_POST['desc3'];
$desc4 = $_POST['desc4'];
$desc5 = $_POST['desc5'];
$coursid = $_POST['coursid'];

echo "<br>Desc is " . $desc1 . " course id is " . $coursid;

    if($_POST['desc5'] == "" && $_POST['desc4'] == "" && $_POST['desc3'] == "" && $_POST['desc2'] == null){
        $sql = "UPDATE course_detail SET desc1='$desc1' WHERE id='$coursid'";
        mysqli_query($conn, $sql);
    }

    if($_POST['desc5'] == "" && $_POST['desc4'] == "" && $_POST['desc3'] == ""){
        $sql = "UPDATE course_detail SET desc2='$desc2', desc1='$desc1' WHERE id='$coursid'";
        mysqli_query($conn, $sql);
    }

    if($_POST['desc5'] == "" && $_POST['desc4'] == ""){
        $sql = "UPDATE course_detail SET desc2='$desc2', desc3='$desc3', desc1='$desc1' WHERE id='$coursid'";
        mysqli_query($conn, $sql);
    }

    if($_POST['desc5'] == ""){
        $sql = "UPDATE course_detail SET desc2='$desc2', desc3='$desc3', desc4='$desc4', desc1='$desc1' WHERE id='$coursid'";
        mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE course_detail SET desc2='$desc2', desc3='$desc3', desc4='$desc4', desc5='$desc5', desc1='$desc1' WHERE id='$coursid'";
        mysqli_query($conn, $sql);
    }

    echo "<script> location.href='courses.php'; </script>";
    exit;