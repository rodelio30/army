<?php
include 'system_checker.php';
if($isSchool || $isCommander || $isReservist){
  header("Location: index.php");
}

$company_id = $_GET['ID'];

$result       = mysqli_query($conn, "SELECT * FROM company WHERE company_id='$company_id'");
while ($res   = mysqli_fetch_array($result)) {
  $company_id       = $res['company_id'];
  $company_name      = $res['company_name'];
  $status         = $res['status'];
  $date_created   = $res['date_created'];
  $time_created   = $res['time_created'];
  $date_modified  = $res['date_modified'];
  $time_modified  = $res['time_modified'];
}
  $time_c_formatted   = date("G:i A ", strtotime($time_created));
  $time_m_formatted   = date("G:i A ", strtotime($time_modified));
if (isset($_POST['update'])) {
  $company_name   = $_POST['company_name'];
  $status         = $_POST['status'];
  $date_modified  = date("Y-m-d");
  $time_modified  = date("h:i:s");

  mysqli_query($conn, "update company set company_name = '$company_name', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where company_id = '$company_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $company_name . ' updated!.")</script>';
  header('Refresh: 0; url=admin_company.php');
  // End of Else in Inactive if
}


$sel_active   = "";
$sel_inactive = "";
if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "inactive") {
  $sel_inactive = "selected";
}
$disabled = '';
if($isStaff){
  $disabled = 'disabled';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'company';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3" id="action-print"><a href="admin_company.php" class="linked-navigation">Company List</a> /
            <?php echo $company_name ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card" id="action-print">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Company</h5>
                </div>
                <div class="card-body">
                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Company Name</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name ?>" placeholder="Enter company Name" <?php echo $disabled?>>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="status" value="<?php echo $status ?>" name="status" <?php echo $disabled?>>
                          <option value="active" <?php echo $sel_active ?>>Active</option>
                          <option value="inactive" <?php echo $sel_inactive ?>>Inactive
                          </option>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Created</strong>
                        </h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <div class="flatpickr-weekwrapper">
                          <?php echo $date_created ?>
                          <?php echo $time_c_formatted ?>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Date Modified</strong>
                        </h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <div class="flatpickr-weekwrapper">
                          <?php echo $date_modified ?>
                          <?php echo $time_m_formatted ?>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_company.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <?php if(!$isStaff){?>
                          <button type="submit" name="update" class="btn btn-md btn-outline-success" style="float:right">Update</button>
                        <?php }?>
                      </div>
                    </div>
                  </form>
                    </div>
                    </div>
              <div class="card">
                <div class="card-header" id="action-print">
                  <h5 class="card-title mb-0" id="action-print">Area of Responsibility</h5>
                </div>
                <div class="card-body">
                <?php include 'print_header.php'?>
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="h3 mb-3"> <strong><?php echo $company_name?></strong> 
                                <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                            </h1>
                        </div>
                        <div class="col-md-3">
                            <?php if($isSadmin || $isAdmin) {
                            ?>
                            <a <?php echo "href=\"admin_aor_add.php?com_name=$company_name\"" ?> style="float: right" id="action-print" class="btn btn-outline-success"><span data-feather="user-plus"></span>&nbsp Add new AoR</a>
                            <?php }
                            ?>


                        </div>
                    </div>
                <?php include 'company_aor.php'?>
                <?php include 'print_footer.php'?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>

      <?php include 'system_controller/footer.php' ?>
    </div>
  </div>

  <script src="js/app.js"></script>
    <!-- This line below is the jquery for the datatables -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTable.min.js"></script>

</body>

</html>