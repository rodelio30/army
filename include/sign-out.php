<?php
// include 'logout_warning.php';
require 'connect.php';
$_SESSION = [];
session_unset();
session_destroy();

header("Location: ../sign-in.php");
