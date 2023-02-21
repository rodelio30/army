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
                    <div class="row">
                        <div class="col-md-9">
                        <h1 class="h3 mb-3 header-dash">
                          <?php if(!$isReservist) {
                            ?>
                          <a href="admin_rids.php" class="linked-navigation">Reservist List </a> / 
                          <?php echo $username ?>
                            <?php
                          } ?>
                            <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                        </h1>
                        </div>
                        <div class="col-md-3">
                            <a <?php echo "href=\"admin_rids_edit.php?ID=" . $user_id ."\"" ?> style="float: right" id="action-print" class="btn btn-outline-primary">&nbsp Edit Info</a>
                        </div>
                    </div>

                    <?php include 'reservist_form.php'?>
                </div>
            </main>

            <?php include 'system_controller/footer.php' ?>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>