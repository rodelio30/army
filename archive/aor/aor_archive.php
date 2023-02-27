<?php
include '../../include/connect.php';

$aor_id = $_GET['ID'];

$sql = "UPDATE aor SET status='archive' WHERE aor_id=$aor_id";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_aor.php");
} else {
  echo "Error updating record: " . $conn->error;
}