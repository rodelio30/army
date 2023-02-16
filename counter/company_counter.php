<?php
$company_counter = 0;
$archive_company_counter = 0;

// This line is Counting for the number of Registered company
$sql = "SELECT company_id FROM company WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $company_counter++;
  }
} else {
  $company_counter = 0;
} 
// This line is Counting for the number of Archive company 

$sql_archive = "SELECT company_id FROM company WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_company_counter++;
}
} else {
$archive_company_counter = 0;
}
