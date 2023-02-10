<?php
include('include/connect.php');

session_start();
if (isset($_SESSION['armylogged'])) {
	header("location: index.php");
}
include 'include/user.php';

if (isset($_POST['submit_admin'])) {
	$email = $conn->real_escape_string($_POST['email']);
	$password = $conn->real_escape_string($_POST['password']);
	$res = json_decode(login($conn, $email, $password));
	if (sizeof($res) > 0) {

		$_SESSION['logged'] = true;
		$_SESSION['id'] = $res[0]->id;

		// include 'include/transaction_login.php';

		if ($res[0]->type === 'admin') {
			echo "<script type='text/javascript'>alert('Hello Admin');
            document.location='index.php' </script>";
		}
		// if ($res[0]->type === 'faculty') {
		// 	echo "<script type='text/javascript'>alert('Hello Faculty');
		//     document.location='faculty/index.php' </script>";
		// }
		// if ($res[0]->type === 'student') {
		// 	echo "<script type='text/javascript'>alert('Hello Student');
		//     document.location='student/index.php' </script>";
		// }
	} else {
		echo "<script type='text/javascript'>alert('Username or Password was incorrect.');
            document.location='pages-sign-in.php' </script>";
		// header("location: login.php");

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
                            <h1 class="h2">Welcome to,
                                <br>
                                <p style="font-weight: bold;">
                                    Army Reserved Command
                                    <br>
                                    Management Information System
                                    <br>
                                    with
                                    <br>
                                    Decision Support!
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
                                    <form>
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
                                            <a href="sign-up.php" class="success">Sign up!</a>
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