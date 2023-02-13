<?php
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $firstname       = $_POST["firstname"];
  $lastname        = $_POST["lastname"];
  $email           = $_POST["email"];
  $password        = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
	$register_type   = $_POST["register_type"];
	$status          = "pending";  
	$date            = date("Y-m-d");
  $time            = date("H:i:s");;

	// Checkng if duplicate email
  $duplicate = mysqli_query($conn, "SELECT * FROM army_users WHERE email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Email Has Already Taken'); </script>";
  }
  else{
		// Checking if password confirmation match
    if($password == $confirmpassword){
      $query = "INSERT INTO registration_user VALUES('','$firstname','$lastname','$email','$password','$register_type','$status', '$date', '$time')";
      mysqli_query($conn, $query);
			      echo "<script type='text/javascript'>alert('Registration Successful, Please wait for the approval');
            document.location='sign-in.php' </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
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

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post" autocomplete="off">
										<div class="mb-3">
											<label class="form-label">First Name</label>
											<input class="form-control form-control-lg" type="text" name="firstname" placeholder="Enter your First Name" autofocus />
										</div>
										<div class="mb-3">
											<label class="form-label">Last Name</label>
											<input class="form-control form-control-lg" type="text" name="lastname" placeholder="Enter your Last Name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control form-control-lg" type="password" name="confirmpassword" placeholder="Enter password" />
										</div>
										<div class="mb-3">
											<label class="form-label">Type</label>
											<input class="form-control form-control-lg" type="text" name="register_type" placeholder="Enter your company name" />
										</div>
										<div class="text-center mt-3">
											<!-- <a href="sign-in.php" class="btn btn-lg btn-primary">Sign up</a> -->
											<button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
											<br>
											<br>
											<a href="sign-in.php" class="btn btn-md btn-warning">Cancel</a>
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