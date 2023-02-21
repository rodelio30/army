<?php
$dash_select      = '';
$users_select      = '';
$rank_select   = '';
$reservist_select = '';
$admin_select     = '';
$staff_select     = '';
$commander_select = '';
$school_select    = '';
$schools_select    = '';
$archive_select    = '';
$company_select    = '';
$rids_select    = '';
$student_select    = '';
$course_select    = '';
$appoint_select    = '';
$training_select    = '';
$seminar_select    = '';

if ($nav_active == 'dashboard') {
    $dash_select = 'active';
}
if ($nav_active == 'users') {
    $users_select = 'active';
}
if ($nav_active == 'rank') {
    $rank_select = 'active';
}
if ($nav_active == 'reservist') {
    $reservist_select = 'active';
}
if ($nav_active == 'admin') {
    $admin_select = 'active';
}
if ($nav_active == 'staff') {
    $staff_select = 'active';
}
if ($nav_active == 'commander') {
    $commander_select = 'active';
}
if ($nav_active == 'school') {
    $school_select = 'active';
}
if ($nav_active == 'schools') {
    $schools_select = 'active';
}
if ($nav_active == 'archive') {
    $archive_select = 'active';
}
if ($nav_active == 'company') {
    $company_select = 'active';
}
if ($nav_active == 'rids') {
    $rids_select = 'active';
}
if ($nav_active == 'student') {
    $student_select = 'active';
}
if ($nav_active == 'course') {
    $course_select = 'active';
}
if ($nav_active == 'appoint') {
    $appoint_select = 'active';
}
if ($nav_active == 'training') {
    $training_select = 'active';
}
if ($nav_active == 'seminar') {
    $seminar_select = 'active';
}

if($isSadmin || $isAdmin || $isStaff){
    include 'side_navigation_admin.php';
} else if($isCommander){
    include 'side_navigation_commander.php';
} else if($isSchool){
    include 'side_navigation_school_coordinator.php';
} else if($isReservist){
    include 'side_navigation_reservist.php';
}
?>