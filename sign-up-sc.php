
<?php
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $rank            = $_POST["rank"];
  $school_name     = $_POST["school_name"];
  $school_address  = $_POST["school_address"];
  $firstname       = $_POST["firstname"];
  $lastname        = $_POST["lastname"];
  $username        = $_POST["username"];
  $email           = $_POST["email"];
  $password        = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
	$user_type       = "school_coordinator";
	$status          = "pending";  
	$user_status     = "inactive";  
	$date            = date("Y-m-d");
  $time            = date("H:i:s");;

	// Checkng if duplicate email
  $duplicate = mysqli_query($conn, "SELECT * FROM registration_sc WHERE username = '$username' OR  email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
		// Checking if password confirmation match
    if($password == $confirmpassword){
      $query = "INSERT INTO registration_sc VALUES('','$firstname','$lastname','$username','$email','$password','$school_name','$school_address','$rank','$user_type','$status','$user_status','$date', '$time')";
      mysqli_query($conn, $query);

			echo "<script type='text/javascript'>alert('Registration Successful, Please wait for the approval'); document.location='sign-in.php' </script>";
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
							<h1 class="h2">Get started School Coordinator!</h1>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post" autocomplete="off">
										<div class="mb-2">
											<label class="form-label">School Name <span class="input_required">*</span> </label>
											<select class="form-control" id="school_name" name="school_name">
                        <option value="None" select>None</option>
                        <option value="School Name 1">School Name 1</option>
                        <option value="School Name 2" >School Name 2</option>
                      </select>
										</div>
										<div class="mb-2">
											<label class="form-label">School Address <span class="input_required">*</span> </label>
											<input class="form-control form-control-lg" type="text" name="school_address" placeholder="Enter your School Address" autofocus required />
										</div>
										<div class="mb-2">
											<label class="form-label">Rank</label>
											<select class="form-control" id="rank" name="rank">
                        <option value="None" select>None</option>
                        <option value="Rank 1">Rank 1</option>
                        <option value="Rank 2" >Rank 2</option>
                      </select>
										</div>
										<hr>
										<div class="row">
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">First Name <span class="input_required">*</span></label>
													<input class="form-control form-control-lg" type="text" name="firstname" placeholder="Enter your First Name" required />
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">Last Name <span class="input_required">*</span></label>
													<input class="form-control form-control-lg" type="text" name="lastname" placeholder="Enter your Last Name" required />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">Username <span class="input_required">*</span> </label>
													<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your Username" required />
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">Email <span class="input_required">*</span></label>
													<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required />
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">Password <span class="input_required">*</span></label>
													<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" required />
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">Confirm Password <span class="input_required">*</span></label>
													<input class="form-control form-control-lg" type="password" name="confirmpassword" placeholder="Enter password" required />
												</div>
											</div>
										</div>
										<div class="text-center mt-3">
                      <div class="row">
												<div class="col-6">
													<a href="sign-choices.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
												</div>
												<div class="col-6">
													<button type="submit" name="submit" class="btn btn-md btn-outline-success" style="float:right">Submit</button>
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