<?php
$rank_name      = '';
$company_name   = '';
// Get the rank name
if($rank_id == 0) { 
  $rank_name = 'None';
} else {
  $result_rank = mysqli_query($conn, "SELECT * FROM ranks WHERE rank_id = '$rank_id'");
  while ($res      = mysqli_fetch_array($result_rank)) {
  $rank_name = $res['rank_name'];
  }
}

// Get the company name
if($company_id == 0) {
  $company_name = 'None';
}else {
  $result_company       = mysqli_query($conn, "SELECT * FROM company WHERE company_id = '$company_id'");
  while ($res      = mysqli_fetch_array($result_company)) {
  $company_name = $res['company_name'];
  }
}
?>