<?php 
include 'system_checker.php';
if($isSchool){
  header("Location: index.php");
}

$user_id = $_GET['ID'];

include 'admin_rids_query.php';

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

    // Computation of Age
    $bday = new DateTime($birth_date);
    $today = new DateTime(date('m.d.y'));
    $diff = $today->diff($bday);
    // echo "<script>console.log('" . $diff->y. "');</script>";
    $age                  = $diff->y;

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


  // update info for army_users
  mysqli_query($conn, "update army_users set firstname = '$firstname', lastname = '$lastname', middle_name = '$middle_name',email = '$email', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where id = '$army_id'") or die("Query Reservist is incorrect....");
  
  // update info for reservist 
  mysqli_query($conn, "update reservists set firstname = '$firstname', lastname = '$lastname', middle_initial = '$middle_name', extname = '$extname', rank = '$rank', company = '$company', afpsn = '$afpsn', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where rg_id = '$user_id'") or die("Query Reservist is incorrect....");
  
  // update info for reservist personal information
  mysqli_query($conn, "update rids set 
    brsvc = '$brsvc',
    afpos_mos = '$afpos', 
    soc_enlistment = '$soc_enlistment', 
    initial_rank = '$initial_rank', 
    date_of_comsn_enlist = '$date_of_comsn_enlist', 
    authority = '$authority', 
    mobilization_center = '$mobilization_center', 
    designation = '$designation', 
    squad = '$squad', 
    platoon = '$platoon', 
    battalion = '$battalion', 
    size_cs = '$size_cs', 
    size_cap = '$size_cap', 
    size_bda = '$size_bda',
    p_o = '$p_o', 
    company_name_address = '$company_name_address', 
    tel_no = '$tel_no',
    town = '$town', 
    res_tel_no = '$res_tel_no', 
    mobile_number = '$mobile_number', 
    birth_place = '$birth_place', 
    religion = '$religion', 
    blood_type = '$blood_type', 
    tin = '$tin', 
    sss = '$sss', 
    philhealth = '$philhealth', 
    height = '$height', 
    weight = '$weight', 
    marital_status = '$marital_status', 
    fb_account = '$fb_account', 
    email = '$email', 
    special_skills = '$special_skills', 
    language = '$language',
    date_of_rank = '$date_of_rank',
    rank_authority = '$rank_authority',
    military_schooling = '$military_schooling',
    school = '$school',
    school_date_graduated = '$school_date_graduated',
    awards = '$awards',
    awards_authority = '$awards_authority',
    date_awarded = '$date_awarded',
    relation = '$relation',
    dependents_name = '$name',
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
                          <a href="admin_rids.php" class="linked-navigation">Reservist List </a> / <a href="admin_rids_view.php?ID=<?php echo $user_id?>" class="linked-navigation"><?php echo $firstname . ' ' . $lastname?> </a> 
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