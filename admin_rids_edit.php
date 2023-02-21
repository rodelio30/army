<?php 
include 'system_checker.php';

$user_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM army_users WHERE id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id       = $res['id'];
  $firstname     = $res['firstname'];
  $middle_name   = $res['middle_name'];
  $lastname      = $res['lastname'];
  $username      = $res['username'];
  $email         = $res['email'];
  $type          = $res['type'];
  $rank          = $res['rank'];
  $company       = $res['company'];
  $afpsn         = $res['afpsn'];
  $status        = $res['status'];
  $user_status   = $res['user_status'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
}

if (isset($_POST['rids_update'])) {
  $firstname     = $_POST['firstname'];
  $lastname      = $_POST['lastname'];
  $middle_name   = $_POST['middle_name'];
  $rank          = $_POST['rank'];
  $company       = $_POST['company'];
  $afpsn         = $_POST['afpsn'];
  $status        = $_POST['status'];

  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  $brsvc                = $_POST['brsvc'];
  $afpos                = $_POST['afpos'];
  $soc_enlistment       = $_POST['soc_enlistment'];
  $initial_rank         = $_POST['initial_rank'];
  $date_of_comsn_enlist = $_POST['date_of_comsn_enlist'];
  $authority            = $_POST['authority'];
  $mobilization_center  = $_POST['mobilization_center'];
  $designation          = $_POST['designation'];
  $squad                = $_POST['squad'];
  $platoon              = $_POST['platoon'];
  $battalion            = $_POST['battalion'];
  $size_cs              = $_POST['size_cs'];
  $size_cap             = $_POST['size_cap'];
  $size_bda             = $_POST['size_bda'];

//   This line below is for Get the Personall Information
    $p_o                  = $_POST['p_o'];
    $company_name_address = $_POST['company_name_address'];
    $tel_no               = $_POST['tel_no'];
    $home_address         = $_POST['home_address'];
    $town                 = $_POST['town'];
    $res_tel_no           = $_POST['res_tel_no'];
    $mobile_number        = $_POST['mobile_number'];
    $birth_date           = $_POST['birth_date'];
    $birth_place          = $_POST['birth_place'];
    $age                  = $_POST['age'];
    $religion             = $_POST['religion'];
    $blood_type           = $_POST['blood_type'];
    $tin                  = $_POST['tin'];
    $sss                  = $_POST['sss'];
    $philhealth           = $_POST['philhealth'];
    $height               = $_POST['height'];
    $weight               = $_POST['weight'];
    $marital_status       = $_POST['marital_status'];
    $sex                  = $_POST['sex'];
    $fb_account           = $_POST['fb_account'];
    $email                = $_POST['email'];
    $special_skills       = $_POST['special_skills'];
    $language             = $_POST['language'];

    // This line below is to get the below information of RIDS form
    $promo_rank            = $_POST['rank'];
    $date_of_rank          = $_POST['date_of_rank'];
    $rank_authority        = $_POST['rank_authority'];
    $military_schooling    = $_POST['military_schooling'];
    $school                = $_POST['school'];
    $school_date_graduated = $_POST['school_date_graduated'];
    $awards                = $_POST['awards'];
    $awards_authority      = $_POST['awards_authority'];
    $date_awarded          = $_POST['date_awarded'];
    $relation              = $_POST['relation'];
    $name                  = $_POST['name'];
    $course                = $_POST['course'];
    $course_school         = $_POST['course_school'];
    $course_date_graduated = $_POST['course_date_graduated'];
    $unit_cad              = $_POST['unit_cad'];
    $unit_authority        = $_POST['unit_authority'];
    $unit_date_started     = $_POST['unit_date_started'];
    $unit_date_end         = $_POST['unit_date_end'];
    $unit_assignment       = $_POST['unit_assignment'];
    $assign_authority      = $_POST['assign_authority'];
    $assign_date_from      = $_POST['assign_date_from'];
    $assign_date_to        = $_POST['assign_date_to'];
    $position              = $_POST['position'];
    $pos_authority         = $_POST['pos_authority'];
    $pos_date_from         = $_POST['pos_date_from'];
    $pos_date_to           = $_POST['pos_date_to'];


  mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', middle_name = '$middle_name', rank = '$rank', company = '$company', afpsn = '$afpsn', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where id = '$user_id'") or die("Query Reservist is incorrect....");
  
  mysqli_query($conn, "update rpi set brsvc = '$brsvc', afpos_mos = '$afpos', soc_enlistment = '$soc_enlistment', initial_rank = '$initial_rank', date_of_comsn_enlist = '$date_of_comsn_enlist', authority = '$authority', mobilization_center = '$mobilization_center', designation = '$designation', squad = '$squad', platoon = '$platoon', battalion = '$battalion', size_cs = '$size_cs', size_cap = '$size_cap', size_bda = '$size_bda' where reservist_id = '$user_id'") or die("Query RPI is incorrect....");

  mysqli_query($conn, "update personal_information set p_o = '$p_o', company_name_address = '$company_name_address', tel_no = '$tel_no', home_address = '$home_address', town = '$town', res_tel_no = '$res_tel_no', mobile_number = '$mobile_number', birth_date = '$birth_date', birth_place = '$birth_place', age = '$age', religion = '$religion', blood_type = '$blood_type', tin = '$tin', sss = '$sss', philhealth = '$philhealth', height = '$height', weight = '$weight', marital_status = '$marital_status', sex = '$sex', fb_account = '$fb_account', email = '$email', special_skills = '$special_skills', language = '$language' where reservist_id = '$user_id'") or die("Query Personal Information is incorrect....");

  mysqli_query($conn, "update below_info set 
    rank = '$promo_rank',
    date_of_rank = '$date_of_rank',
    rank_authority = '$rank_authority',
    military_schooling = '$military_schooling',
    school = '$school',
    school_date_graduated = '$school_date_graduated',
    awards = '$awards',
    awards_authority = '$awards_authority',
    date_awarded = '$date_awarded',
    relation = '$relation',
    name = '$name',
    course = '$course',
    course_school = '$course_school',
    course_date_graduated = '$course_date_graduated',
    unit_cad = '$unit_cad',
    unit_authority = '$unit_authority',
    unit_date_started = '$unit_date_started',
    unit_date_end = '$unit_date_end',
    unit_assignment = '$unit_assignment',
    assign_authority = '$assign_authority',
    assign_date_from = '$assign_date_from',
    assign_date_to = '$assign_date_to',
    position = '$position',
    pos_authority = '$pos_authority',
    pos_date_from = '$pos_date_from',
    pos_date_to = '$pos_date_to' where reservist_id = '$user_id'") or die("Query Below Information is incorrect....");
  
  echo '<script type="text/javascript"> alert(" ' . $rank . ' ' . $firstname. ' ' . $lastname . ' updated!.")</script>';
  header('Refresh: 0; url=admin_rids_view.php?ID='.$user_id.'');
  // End of Else in Inactive if
}

  $result_rpi       = mysqli_query($conn, "SELECT * FROM rpi WHERE reservist_id='$user_id'");
  while ($res   = mysqli_fetch_array($result_rpi)) {
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
  } 

  $result_pi       = mysqli_query($conn, "SELECT * FROM personal_information WHERE reservist_id='$user_id'");
  while ($res   = mysqli_fetch_array($result_pi)) {
    $p_o                  = $res['p_o'];
    $company_name_address = $res['company_name_address'];
    $tel_no               = $res['tel_no'];
    $home_address         = $res['home_address'];
    $town                 = $res['town'];
    $res_tel_no           = $res['res_tel_no'];
    $mobile_number        = $res['mobile_number'];
    $birth_date           = $res['birth_date'];
    $birth_place          = $res['birth_place'];
    $age                  = $res['age'];
    $religion             = $res['religion'];
    $blood_type           = $res['blood_type'];
    $tin                  = $res['tin'];
    $sss                  = $res['sss'];
    $philhealth           = $res['philhealth'];
    $height               = $res['height'];
    $weight               = $res['weight'];
    $marital_status       = $res['marital_status'];
    $sex                  = $res['sex'];
    $fb_account           = $res['fb_account'];
    $email                = $res['email'];
    $special_skills       = $res['special_skills'];
    $language             = $res['language'];
  } 

  $result_below   = mysqli_query($conn, "SELECT * FROM below_info WHERE reservist_id='$user_id'");
  while ($res     = mysqli_fetch_array($result_below)) {
    $promo_rank            = $res['rank'];
    $date_of_rank          = $res['date_of_rank'];
    $rank_authority        = $res['rank_authority'];
    $military_schooling    = $res['military_schooling'];
    $school                = $res['school'];
    $school_date_graduated = $res['school_date_graduated'];
    $awards                = $res['awards'];
    $awards_authority      = $res['awards_authority'];
    $date_awarded          = $res['date_awarded'];
    $relation              = $res['relation'];
    $name                  = $res['name'];
    $course                = $res['course'];
    $course_school         = $res['course_school'];
    $course_date_graduated = $res['course_date_graduated'];
    $unit_cad              = $res['unit_cad'];
    $unit_authority        = $res['unit_authority'];
    $unit_date_started      = $res['unit_date_started'];
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

// include 'admin_rids_query.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
		$nav_active = 'rids';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                        <h1 class="h3 mb-3 header-dash">
                          <?php if(!$isReservist) {
                            ?>
                          <a href="admin_rids.php" class="linked-navigation">Reservist List </a> / <a href="admin_rids_view.php?ID=<?php echo $user_id?>" class="linked-navigation"><?php echo $username ?> </a> 
                            <?php
                          } ?>
                        </h1>

                    <?php include 'reservist_form_edit.php'?>
                </div>
            </main>

            <?php include 'system_controller/footer.php' ?>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>