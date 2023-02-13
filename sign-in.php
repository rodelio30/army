<?php
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit_admin"])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  if(empty($email)){
    echo
    "<script> alert('Please insert your Email'); </script>";
  }
  elseif (empty($password)){
    echo
    "<script> alert('Please insert your Password'); </script>";
  }
  else{
  $result = mysqli_query($conn, "SELECT * FROM army_users WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
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
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center">
                            <h1 class="h2">                                <p style="font-weight: bold;">
                                    Army Reserved Command
                                    <br>
                                    Management Information System
                                    <br>
                                    with Decision Support
                                </p>
                            </h1>
                            <!-- <p class="lead">
								Sign in to your account to continue
							</p> -->
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="img/avatars/army_logo.png" alt="Charles Hall"
                                            class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <br>
                                    <form method="post" autocomplete="off">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                placeholder="Enter your email" autofocus />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Enter your password" />
                                            <!-- <small>
												<a href="index.html">Forgot password?</a>
											</small> -->
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" name="submit_admin"
                                                class="btn btn-md btn-success">Sign in</button>
                                            <br>
                                            <br>
                                            <div>
                                                <label class="form-check">
                                                    <span class="form-check-label">
                                                        Create an Account?
                                                    </span>
                                                </label>
                                            </div>
                                            <a href="sign-up.php" class="btn btn-md btn-primary">Sign up!</a>
                                            <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
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