<?php

session_start();
include('config/session.php');

session_unset();
session_destroy();
header('Location: login.php');

?>