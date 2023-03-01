<?php
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit_forgot"])){
  $afpsn = $_POST["afpsn"];

  if(empty($afpsn)){
    echo
    "<script> alert('Please insert your AFPSN'); </script>";
  } else{
  $result = mysqli_query($conn, "SELECT * FROM army_users WHERE afpsn = '$afpsn'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    $_SESSION["check_afpsn"] = $afpsn;
    //   header("Location: index.php");
      header("Location: forgot_password.php");
  }
  else{
    echo "<script> alert('Your AFPSN is not Registered'); </script>";
  }

  }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <?php include 'bulletin_navigation.php' ?>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row mt-4">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center">
                            <h1>Forgot Password</h1>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <!-- <img src="img/avatars/army_logo.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" /> -->
                                    </div>
                                    <br>
                                    <form method="post" autocomplete="off">
                                        <div class="mb-3">
                                            <label class="form-label">Insert Your AFPSN</label>
                                            <input class="form-control form-control-lg" type="afpsn" name="afpsn"
                                                placeholder="Enter your AFPSN" autofocus />
                                        </div>
                                        <div class="text-center mt-4">
                                            <div class="row">
                                                <div class="col-4">
                                            <a href="sign-in.php" class="mt-2 btn btn-md btn-outline-warning mt-1 float-start">Cancel</a>
                                                </div>
                                                <div class="col-4"></div>
                                                <div class="col-4">
                                            <button type="submit" name="submit_forgot" class="btn btn-md btn-outline-success float-end">Verify</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

</body>

</html>