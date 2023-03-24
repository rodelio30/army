<?php
$trainings_counter = 0;
$archive_trainings_counter = 0;
$archive_attendee_counter = 0;

// This line is Counting for the number of Registered trainings
$sql = "SELECT training_id FROM trainings WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $trainings_counter++;
  }
} else {
  $trainings_counter = 0;
} 
// This line is Counting for the number of Archive trainings 

$sql_archive = "SELECT training_id FROM trainings WHERE status = 'archive' ";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
while ($row = $result_archive->fetch_assoc()) {
$archive_trainings_counter++;
}
} else {
$archive_trainings_counter = 0;
}

// This line is Counting for the number of Archive Attendee 
$sql_archive_attendee = "SELECT att_id FROM training_attendance WHERE status = 'Declined' ";
$result_archive_attendee = $conn->query($sql_archive_attendee);

if ($result_archive_attendee->num_rows > 0) {
while ($row = $result_archive_attendee->fetch_assoc()) {
$archive_attendee_counter++;
}
} else {
$archive_attendee_counter = 0;
}
// This line is Counting for the number of Archive Attendee 
$sql_archive_attendee_sem = "SELECT att_id FROM seminar_attendance WHERE status = 'Declined' ";
$result_archive_attendee_sem = $conn->query($sql_archive_attendee_sem);

if ($result_archive_attendee_sem->num_rows > 0) {
while ($row = $result_archive_attendee_sem->fetch_assoc()) {
$archive_attendee_counter++;
}
} else {
$archive_attendee_counter = 0;
}