<?php
require 'include/connect.php';
if(empty($_SESSION["check_afpsn"])){
  header("Location: sign-in.php");
}
$afpsn = $_SESSION["check_afpsn"];
if(isset($_POST["submit"])){
  $password        = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
	// Checking if password confirmation match
	if($password == $confirmpassword){
  mysqli_query($conn, "update army_users set password = '$password' where afpsn = '$afpsn'") or die("Query 4 is incorrect....");
		echo "<script type='text/javascript'>alert('Change Password Succesful!'); document.location='sign-in.php' </script>";
	}
	else{
		echo
		"<script> alert('Password Does Not Match'); </script>";
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
							<h1 class="h2"><strong> Update Your Password!!</strong></h2>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post" autocomplete="off">
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
													<a href="include/sign-out.php" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
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