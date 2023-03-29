<?php
require 'include/connect.php';
if (!empty($_SESSION["id"])) {
	header("Location: index.php");
}
if (isset($_POST["submit"])) {
	$rank_id         = $_POST["rank_id"];
	$afpsn           = $_POST["afpsn"];
	$school_id       = $_POST["school_id"];
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

	if($afpsn != '') {
		// Checkng if duplicate afpsn for all users
		$duplicate_afpsn = mysqli_query($conn, "SELECT * FROM army_users WHERE afpsn = '$afpsn'");
		if(mysqli_num_rows($duplicate_afpsn) > 0){
			echo "<script> alert('AFPSN Has Already Taken'); </script>";
			header("Location: sign-up-sc.php");
		}
	}
	// Checkng if duplicate email, username and afpsn in registration
	if($afpsn != ''){
		$duplicate = mysqli_query($conn, "SELECT * FROM registration_user WHERE username = '$username' OR  email = '$email' OR afpsn = '$afpsn'");
	} else{
		$duplicate = mysqli_query($conn, "SELECT * FROM registration_user WHERE username = '$username' OR  email = '$email'");
	}
	if (mysqli_num_rows($duplicate) > 0) {
		echo "<script> alert('Username or Email Has Already Taken'); </script>";
	} else {
		// Checking if password confirmation match
		if ($password == $confirmpassword) {
			$hash_pass = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO registration_user VALUES('','$firstname','$lastname','$username','$email','$hash_pass','$user_type','$rank_id','','$afpsn','$school_id','$status','$user_status', '$date', '$time')";
			mysqli_query($conn, $query);
			echo "<script type='text/javascript'>alert('Registration Successful, Please wait for the approval'); document.location='sign-in.php' </script>";

		} else {
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
							<h1 class="h2"><strong>Sign Up for School Coordinator</strong> </h1>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post" autocomplete="off">
										<div class="mb-2">
											<label class="form-label">School Name <span class="input_required">*</span>
											</label>
											<select name="school_id" class="form-control">
													<option value="0">None</option>
												<?php
												$result = mysqli_query($conn, "select school_id, school_name, acronym from schools where status='active'") or die("Query School List is inncorrect........");
												while (list($school_id, $school_name,$acronym) = mysqli_fetch_array($result)) {
													echo "<option value='$school_id'>$school_name</option>";
												}
												?>
											</select>
										</div>
										
										<div class="mb-2">
											<label class="form-label">Rank Classification </label>
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
										<div class="mb-3">
											<label class="form-label">AFPSN</label>
											<input class="form-control form-control-lg" type="text" name="afpsn" placeholder="Enter your AFPSN"/>
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