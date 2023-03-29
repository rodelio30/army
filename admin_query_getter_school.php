<?php
$school_name    = '';
$school_address = '';
$rank_name      = '';

// Get the School name
if($school_id == 0) {
  $school_name    = 'None';
  $school_address = 'None';
} else {
  $result_school = mysqli_query($conn, "SELECT * FROM schools WHERE school_id = '$school_id'");
  while ($res      = mysqli_fetch_array($result_school )) {
  $school_name    = $res['school_name'];
  $school_address = $res['school_address'];
  }
}

// Get the rank name
if($rank_id == 0) { 
  $rank_name = 'None';
} else {
  $result_rank = mysqli_query($conn, "SELECT * FROM ranks WHERE rank_id = '$rank_id'");
  while ($res      = mysqli_fetch_array($result_rank)) {
  $rank_name = $res['rank_name'];
  }
}

?>