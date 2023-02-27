<?php
include '../../include/connect.php';

$aor_id = $_GET['ID'];

$sql = "DELETE FROM aor WHERE aor_id = $aor_id ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive.php");
} else {
  echo "Error updating record: " . $conn->error;
}
