<?php
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $rank_id            = $_POST["rank_id"];
  $afpsn           = $_POST["afpsn"];
  $company_id         = $_POST["company_id"];
  $firstname       = $_POST["firstname"];
  $lastname        = $_POST["lastname"];
  $username        = $_POST["username"];
  $email           = $_POST["email"];
  $password        = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
	$user_type       = "commander";
	$status          = "pending";  
	$user_status     = "inactive";  
	$date            = date("Y-m-d");
  $time            = date("H:i:s");;

	// Checkng if duplicate afpsn for all users
  $duplicate_afpsn = mysqli_query($conn, "SELECT * FROM army_users WHERE afpsn = '$afpsn'");
  if(mysqli_num_rows($duplicate_afpsn) > 0){
    echo "<script> alert('AFPSN Has Already Taken'); </script>";
		header("Location: sign-up-commander.php");
  }
	// Checkng if duplicate email, username and afpsn in registration
  $duplicate = mysqli_query($conn, "SELECT * FROM registration_user WHERE username = '$username' OR  email = '$email' OR afpsn = '$afpsn'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
		// Checking if password confirmation match
    if($password == $confirmpassword){
			$hash_pass = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO registration_user VALUES('','$firstname','$lastname','$username','$email','$hash_pass','$user_type','$rank_id','$company_id','$afpsn','','$status', '$user_status', '$date', '$time')";
			if(mysqli_query($conn, $query)) {
          // this line below is to get the id of the user who register to the system 
          $result_get_id = mysqli_query($conn, "SELECT * FROM registration_user WHERE username ='$username' && afpsn = '$afpsn'");
          // $result_get_id = mysqli_query($conn, "SELECT * FROM reservists WHERE afpsn ='$afpsn'");
          while ($res   = mysqli_fetch_array($result_get_id)) {
            $reg_id = $res['reg_id'];
          }
					$check_agree = $_SESSION["agree"];
          // Inserting user agreement data 
            mysqli_query($conn, "INSERT INTO agreement VALUES('','$reg_id','$check_agree','$time','$date')")  or die("Query Reservist Table is incorrect.....");

			echo "<script type='text/javascript'>alert('Registration Successful, Please wait for the approval'); document.location='sign-in.php' </script>";
			}
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
    <?php include 'bulletin_navigation.php' ?>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2"><strong>Sign Up for Company Commander</strong> </h1>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post" autocomplete="off">
										<div class="mb-3">
										<label class="form-label">Rank Classification <span class="input_required">*</span>
											</label>
											<select class="form-control" id="rank_id" name="rank_id">
													<option value="0">None</option>
												<?php
													$result = mysqli_query($conn, "select rank_id, rank_name from ranks where status='active'") or die("Query School List is inncorrect........");
													while (list($rank_id, $rank_name) = mysqli_fetch_array($result)) {
														echo "<option value='$rank_id'>$rank_name</option>";
													}
												?>
											</select>
										</div>
										<div class="row">
											<div class="col-6">
										<div class="mb-3">
											<label class="form-label">AFPSN <span class="input_required">*</span> </label>
											<input class="form-control form-control-lg" type="text" name="afpsn" placeholder="Enter your AFPSN" autofocus required />
										</div>
											</div>
											<div class="col-6">
										<div class="mb-3">
											<label class="form-label">Company <span class="input_required">*</span>
													</label>
													<select class="form-control" id="company_id" name="company_id">
														<option value="0">None</option>
														<?php
															$result = mysqli_query($conn, "select company_id, company_name from company where status='active'") or die("Query School List is inncorrect........");
															while (list($company_id, $company_name) = mysqli_fetch_array($result)) {
																echo "<option value='$company_id'>$company_name</option>";
															}
														?>
													</select>
										</div>
											</div>
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
													<input class="form-control form-control-lg" type="password" id="main_password" name="password" placeholder="Enter password" required />
												<input type="checkbox" onclick="myFunction()"> Show Password
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label class="form-label">Confirm Password  <span class="input_required">*</span></label>
													<input class="form-control form-control-lg" type="password" id="confirm_password" name="confirmpassword" placeholder="Enter password" required />
													<input type="checkbox" onclick="myConfirm()"> Show Password
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
	<script src="js/pw.js"></script>

</body>

</html>