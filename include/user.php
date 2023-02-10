<?php
require 'connect.php';
date_default_timezone_set("Asia/Manila");

function login($conn, $email, $password)
{
  $query = "Select * FROM users
     WHERE
      `email`    = '$email'     AND
      `password` = '$password'";

  $res = $conn->query($query);
  $records = array();

  while ($row = $res->fetch_assoc()) {
    array_push($records, $row);
  }

  return json_encode($records);
}