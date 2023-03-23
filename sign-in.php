<?php
// include 'decrypt_function.php';
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit_admin"])){
//   $email = $_POST["email"];
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];

  if(empty($usernameemail)){
    echo
    "<script> alert('Please insert your Email or Username'); </script>";
  }
  elseif (empty($password)){
    echo
    "<script> alert('Please insert your Password'); </script>";
  }
  else{
  $result = mysqli_query($conn, "SELECT * FROM army_users WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    // if($password == $row['password']){
    // if(password_verify($password, $row['password']) || $password == $row['password']){
    if(password_verify($password, $row['password'])){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
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
            <div class="row mt-2">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center">
                            <h1 class="h2">                                       
                                <strong>
                                    Army Reserved Command
                                    <br>
                                    Management Information System
                                    <br>
                                    with Decision Support
                                </strong>
                            </h2>
                            <!-- <p class="lead">
								Sign in to your account to continue
							</p> -->
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
                                            <label class="form-label">Email or Username</label>
                                            <input class="form-control form-control-lg" type="text" name="usernameemail"
                                                placeholder="Enter your Email or Username" autofocus />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Enter your password" />
                                            <!-- <small>
												<a href="index.html">Forgot password?</a>
											</small> -->
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" name="submit_admin"
                                                class="btn btn-md btn-outline-success">Sign in</button>
                                            <div>
                                                <label class="form-check mt-3">
                                                    <span class="form-check-label">
                                                        Forgot Password?  <a href="forgot_check.php" class="linked-navigation">click me!</a>
                                                    </span>
                                                </label>
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