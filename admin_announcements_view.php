<?php
include 'system_checker.php';

$ann_id = $_GET['ID'];

if (isset($_POST['update'])) {
  $title   = $_POST['title'];
  $description   = $_POST['description'];
  $status        = $_POST['status'];
  $date_modified = date("Y-m-d");
  $time_modified = date("h:i:s");

  mysqli_query($conn, "update announcements set title = '$title', description = '$description', status = '$status', date_modified = '$date_modified', time_modified = '$time_modified' where ann_id = '$ann_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $title . ' updated!.")</script>';
  header('Refresh: 0; url=admin_announcements.php');
  // End of Else in Inactive if
}

$result       = mysqli_query($conn, "SELECT * FROM announcements WHERE ann_id='$ann_id'");
while ($res   = mysqli_fetch_array($result)) {
  $ann_id        = $res['ann_id'];
  $img           = $res['img'];
  $title         = $res['title'];
  $description   = $res['description'];
  $status        = $res['status'];
  $date_created  = $res['date_created'];
  $time_created  = $res['time_created'];
  $date_modified = $res['date_modified'];
  $time_modified = $res['time_modified'];
}

$sel_active   = "";
$sel_inactive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "inactive") {
  $sel_inactive = "selected";
}

if (isset($_POST['image_update'])) {
  $filename = $_FILES["uploadfile"]["name"];
if(empty($filename)){
  echo '<script type="text/javascript"> alert("Insert an image first!.")</script>';
} else {
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "img/announcement/" . $filename;
  $date_modified = date("Y-m-d h:i:s");
  $ann_id   = $_POST['ann_id'];

  // echo "<script>console.log('" . $email . "');</script>";
  // This line below is to update a specific faculty user
  mysqli_query($conn, "update announcements set img = '$filename' where ann_id = '$ann_id'") or die("Query Changing image is incorrect....");

  // removing image in folder
  if(!empty($user_img)){
    unlink('img/announcement/' . $user_img . '');
    echo "<script>console.log('Successfully removed " . $user_img . "');</script>";
  }

  if (move_uploaded_file($tempname, $folder)) {
    echo "<script>console.log('Image uploaded successfully!');</script>";
  } else {
    echo "<script>console.log(' Failed to upload image!!');</script>";
  }
  echo '<script type="text/javascript"> alert("' . $title. '`s image updated!.")</script>';
  header('Refresh: 0; url=admin_announcements_view.php?ID=' . $ann_id. '');

}
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'announce';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_announcements.php" class="linked-navigation">Announcement List</a> /
            <?php echo $title ?></h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Announcement</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Image</strong></h6>
                      </div>
                      <div class="col-sm-6 text-center">
                          <img src="img/announcement/<?php echo $img ? $img: 'empty_user.png' ?>" alt="Admin" class="announce_image">
                      </div>
                      <div class="col-sm-4 text-center">
                        <form method="post" enctype="multipart/form-data">
                        <label>New Image</label>
                          <input class="form-control" type="file" name="uploadfile"/>
                          <input type="hidden" name="ann_id" value="<?php echo $ann_id?>">
                          <br>
                          <button type="submit" class="btn btn-outline-success" name="image_update">Update Image</button>
                        </div>
                        </form>
                      </div>
                    </div>

                  <div class="form-group ms-2 me-2">

                  <form method="post" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Title</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $title?>" placeholder="Enter Title">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Description</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $description ?>" placeholder="Enter Description ">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-2">
                        <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                      </div>
                      <div class="col-sm-10 text-secondary">
                        <select class="form-control" id="status" value="<?php echo $status ?>" name="status">
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
                          <?php echo $time_created ?>
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
                          <?php echo $time_modified ?>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_announcements.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" name="update" class="btn btn-md btn-outline-success" style="float:right">Update Info</button>
                      </div>
                    </div>
                  </form>
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

</body>

</html>