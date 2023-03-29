<?php 
$result       = mysqli_query($conn, "SELECT * FROM reservists WHERE reservist_id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id        = $res['reservist_id'];
  $army_id        = $res['army_id'];
  $firstname      = $res['firstname'];
  $middle_name    = $res['middle_initial'];
  $lastname       = $res['lastname'];
  $extname        = $res['extname'];
  $rank_id        = $res['rank_id'];
  $company_id     = $res['company_id'];
  $afpsn          = $res['afpsn'];
  $home_address   = $res['home_address'];
  $birth_date     = $res['date_of_birth'];
  $age            = $res['age'];
  $sex            = $res['sex'];
  // $promo_rank     = $res['rank'];
  $status         = $res['status'];
  $user_status    = $res['user_status'];
  $date_modified  = $res['date_modified'];
  $time_modified  = $res['time_modified'];
}
  $result_rids       = mysqli_query($conn, "SELECT * FROM rids WHERE reservist_id='$user_id'");
  while ($res   = mysqli_fetch_array($result_rids)) {
    // Reservist Personal Information
    $brsvc                = $res['brsvc'];
    $afpos_mos            = $res['afpos_mos'];
    $soc_enlistment       = $res['soc_enlistment'];
    $initial_rank         = $res['initial_rank'];
    $date_of_comsn_enlist = $res['date_of_comsn_enlist'];
    $authority            = $res['authority'];
    $mobilization_center  = $res['mobilization_center'];
    $designation          = $res['designation'];
    $squad                = $res['squad'];
    $platoon              = $res['platoon'];
    $battalion            = $res['battalion'];
    $size_cs              = $res['size_cs'];
    $size_cap             = $res['size_cap'];
    $size_bda             = $res['size_bda'];

    // Personal Information
    $p_o                  = $res['p_o'];
    $company_name_address = $res['company_name_address'];
    $tel_no               = $res['tel_no'];
    $town                 = $res['town'];
    $res_tel_no           = $res['res_tel_no'];
    $mobile_number        = $res['mobile_number'];
    $birth_place          = $res['birth_place'];
    $religion             = $res['religion'];
    $blood_type           = $res['blood_type'];
    $tin                  = $res['tin'];
    $sss                  = $res['sss'];
    $philhealth           = $res['philhealth'];
    $height               = $res['height'];
    $weight               = $res['weight'];
    $marital_status       = $res['marital_status'];
    $fb_account           = $res['fb_account'];
    $email                = $res['email'];
    $special_skills       = $res['special_skills'];
    $language             = $res['language'];

    // Below info
    $date_of_rank          = $res['date_of_rank'];
    $rank_authority        = $res['rank_authority'];
    $military_schooling    = $res['military_schooling'];
    $school                = $res['school'];
    $school_date_graduated = $res['school_date_graduated'];
    $awards                = $res['awards'];
    $awards_authority      = $res['awards_authority'];
    $date_awarded          = $res['date_awarded'];
    $relation              = $res['relation'];
    $dependents_name       = $res['dependents_name'];
    $course                = $res['course'];
    $course_school         = $res['course_school'];
    $course_date_graduated = $res['course_date_graduated'];
    $unit_cad              = $res['unit_cad'];
    $unit_authority        = $res['unit_authority'];
    $unit_date_started     = $res['unit_date_started'];
    $unit_date_end         = $res['unit_date_end'];
    $unit_assignment       = $res['unit_assignment'];
    $assign_authority      = $res['assign_authority'];
    $assign_date_from      = $res['assign_date_from'];
    $assign_date_to        = $res['assign_date_to'];
    $position              = $res['position'];
    $pos_authority         = $res['pos_authority'];
    $pos_date_from         = $res['pos_date_from'];
    $pos_date_to           = $res['pos_date_to'];
  } 

// Get the rank name
if($rank_id != 0) {
  $result_rank = mysqli_query($conn, "SELECT * FROM ranks WHERE rank_id = '$rank_id'");
  while ($res      = mysqli_fetch_array($result_rank)) {
    $rank_name = $res['rank_name'];
  }
} else {
    $rank_name = 'None';
}

// Get the company name
if($company_id != 0) {
  $result_company       = mysqli_query($conn, "SELECT * FROM company WHERE company_id = '$company_id'");
  while ($res      = mysqli_fetch_array($result_company)) {
    $company_name = $res['company_name'];
  }
} else {
    $company_name = 'None';
}

?>