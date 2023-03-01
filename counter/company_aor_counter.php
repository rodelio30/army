<?php
$company_aor_counter = 0;

// This line is Counting for the number of Registered company_aor
$sql = "SELECT aor_id FROM aor where company_name = '$company_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $company_aor_counter++;
  }
} else {
  $company_aor_counter = 0;
} 
