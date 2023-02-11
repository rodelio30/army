<?php
// session_unset();
// session_destroy();

// header("location: ../sign-in.php");
require 'connect.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../sign-in.php");
