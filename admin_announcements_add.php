<?php
include 'system_checker.php';
if($isSchool || $isCommander || $isReservist){
  header("Location: index.php");
}
// un_public is username of the user who logged in

if (isset($_POST['submit'])) {
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "img/announcement/" . $filename;

  $title         = $_POST['title'];
  $description   = $_POST['description'];
  $status        = 'inactive';
  $date          = date("Y-m-d");
  $time          = date("h:i:s");

  $duplicate = mysqli_query($conn, "SELECT * FROM announcements WHERE title = '$title'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
    "<script> alert('This Traning Has Already Taken'); </script>";
  } else {
    // Checking if password confirmation match
    $query = "INSERT INTO announcements VALUES('','$filename','$title','$description','$status','$date','$time','$date','$time')";
    mysqli_query($conn, $query);
  
    if (move_uploaded_file($tempname, $folder)) {
      echo "<script>console.log('Image uploaded successfully!');</script>";
    } else {
      echo "<script>console.log(' Failed to upload image!!');</script>";
    }
    echo '<script type="text/javascript"> alert("' . $title . ' Added!.")</script>';
    header('Refresh: 0; url=admin_announcements.php');
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
          <h1 class="h3 mb-3"><a href="admin_announcements.php" class="linked-navigation">Announcement List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header" style="margin-bottom: -2rem;">
                  <h5 class="card-title">Add new Announcements</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label>Image</label>
                      <input class="form-control" type="file" name="uploadfile"/>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" required>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <a href="admin_announcements.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" class="btn btn-outline-success" name="submit" style="float: right">Add</button>
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