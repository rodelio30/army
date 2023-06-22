<?php
include 'system_checker.php';
// if($isSchool || $isCommander || $isReservist){
//   header("Location: index.php");
// }
// un_public is username of the user who logged in


if (isset($_POST['submit'])) {


  $status = 'active';
  $date   = date("Y-m-d H:i:s");
   // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO documents (army_id, filename, filepath, status, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("ssssss", $army_id, $filename, $destination, $status, $date, $date);

    // Iterate over the uploaded files
    foreach ($_FILES['pdf_files']['tmp_name'] as $index => $tmpName) {
        // Check if the file was successfully uploaded
        if ($_FILES['pdf_files']['error'][$index] === UPLOAD_ERR_OK) {
            $filename = $_FILES['pdf_files']['name'][$index];
            $tmpFilePath = $_FILES['pdf_files']['tmp_name'][$index];

            // Verify if the file is a PDF
            $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if ($fileExtension !== 'pdf') {
               echo "<script>alert('You upload invalid file type. Only PDF files are allowed.');</script>";
               header('Refresh: 0.1; URL=documents_add.php');
               exit();
                // Invalid file type, handle the error as desired (e.g., display an error message)
                // continue;
            }

            // Move the file to the desired location (replace "upload_directory" with your own)
            $destination = 'uploads/' . $filename;
            move_uploaded_file($tmpFilePath, $destination);

            // Execute the statement
            $stmt->execute();
            header('Refresh: 0.1; URL=documents.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'document';
    include 'side_navigation.php'
    ?>

    <div class="main">
      <?php include 'top_right_navigation.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="documents.php" class="linked-navigation">Document List</a></h1>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header" style="margin-bottom: -2rem;">
                  <h5 class="card-title">Add new Documents</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label>File</label>
                      <input class="form-control" type="file" name="pdf_files[]" multiple/>
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