<?php
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
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
                            <h1 class="h2">                    
                               Registration 
                            </h1>
                            <!-- <p class="lead">
								Sign in to your account to continue
							</p> -->
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center mb-4">
                                        <img src="img/avatars/army_logo.png" alt="Charles Hall"
                                            class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                    <a href="sign-up-admin.php" class="btn btn-md btn-outline-success choices m-2" >Admin</a>
                                        </div>
                                        <div class="col">
                                    <a href="sign-up-staff.php" class="btn btn-md btn-outline-success choices m-2">Admin Staff</a>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                    <a href="sign-up-sc.php" class="btn btn-md btn-outline-success choices m-2">School Coordinator</a>
                                        </div>
                                        <div class="col">
                                    <a href="sign-up-commander.php" class="btn btn-md btn-outline-success choices m-2">Company Commander</a>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                    <a href="sign-up-reservist.php" class="btn btn-md btn-outline-success choices m-2">Reservist</a>
                                        </div>
                                        <div class="col">
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col">
                                    <a href="sign-in.php" class="btn btn-md btn-outline-warning ms-2 mt-4">Cancel</a>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
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