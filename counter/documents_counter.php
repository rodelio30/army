<?php
$documents_counter = 0;
$archive_documents_counter = 0;

// This line is Counting for the number of Registered documents
$sql = "SELECT docu_id FROM documents WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $documents_counter++;
  }
} else {
  $documents_counter = 0;
} 
// This line is Counting for the number of Archive documents 

$sql_archive = "SELECT docu_id FROM documents WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_documents_counter++;
}
} else {
$archive_documents_counter = 0;
}
