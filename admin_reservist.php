<?php 

$result_get_id = mysqli_query($conn, "SELECT * FROM reservists WHERE army_id=$army_id");
// $result_get_id = mysqli_query($conn, "SELECT * FROM reservists WHERE afpsn ='$afpsn'");
while ($res   = mysqli_fetch_array($result_get_id)) {
  $user_id = $res['reservist_id'];
}
include 'admin_rids_query.php';
?>
<main class="content">
  <div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-9">
          <h1 class="h3 mb-3" id="action-print"><strong>Dashboard</strong> 
            <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
          </h1>
        </div>
        <div class="col-md-3">
            <a <?php echo "href=\"admin_rids_edit.php?ID=" . $user_id ."\"" ?> style="float: right" id="action-print" class="btn btn-outline-primary">&nbsp Edit Info</a>
        </div>
    </div>
  <?php 
  include 'reservist_form.php';
  ?>
  </div>
</main>