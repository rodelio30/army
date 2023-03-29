<?php 
require 'system_checker.php';
if(isset($_POST["submit"])){
  $curr_pass        = $_POST["curr_pass"];
  $new_password     = $_POST["new_password"];
  $confirm_password = $_POST["confirm_password"];

  $result = mysqli_query($conn, "SELECT * FROM army_users WHERE army_id = $army_id ");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    // if($password == $row['password']){
    if(password_verify($curr_pass, $row['password'])){
        // Checkng if duplicate email
        if($new_password == $confirm_password){
            $hash_pass = password_hash($new_password, PASSWORD_DEFAULT);
            mysqli_query($conn, "update army_users set password = '$hash_pass' where army_id = '$army_id'") or die("Query 4 is incorrect....");

            echo "<script type='text/javascript'>alert('Password Change! You are automatically log out!'); document.location='include/sign-out.php' </script>";
        }
        else{
        echo
        "<script> alert('Password Does Not Match'); </script>";
        }
    }
    else{
    echo "<script> alert('Incorrect Current Password'); </script>";
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
        $nav_active = 'profile';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><a href="pages-profile.php?ID=<?php echo $army_id; ?>"class="linked-navigation">Profile </a> / Change Password</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- <div class="card-header">
                                    <h5 class="card-title mb-0">Empty card</h5>
                                </div> -->
                                <div class="card-body">
                                    <form method="post" autocomplete="off" style="width:30%">
                                        <div class="mb-3">
                                            <label class="form-label">Current Password</label>
                                            <input class="form-control form-control-lg" type="password" id="main_password"  name="curr_pass"
                                                placeholder="Enter your Email or Username" autofocus />
												<input type="checkbox" onclick="myFunction()"> Show Password
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input class="form-control form-control-lg" type="password" id="new_password"  name="new_password"
                                                placeholder="Enter your password" />
												<input type="checkbox" onclick="myNew()"> Show Password
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input class="form-control form-control-lg" type="password" id="confirm_password" name="confirm_password"
                                                placeholder="Enter your password" />
												<input type="checkbox" onclick="myConfirm()"> Show Password
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" name="submit"
                                                class="btn btn-md btn-outline-success">Submit</button>
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
	<script src="js/pw.js"></script>

</body>

</html>