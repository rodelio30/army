<?php
// include 'system_checker.php';
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM army_users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
//   echo $row["firstname"];
}
else{
  header("Location: sign-in.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'dashboard';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Reservist</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="truck"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 class="mt-1 mb-3">2.382</h1>
                                                <div class="mb-0">
                                                    <span class="text-danger"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                                    <span class="text-muted">Since last week</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Visitors</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="users"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 class="mt-1 mb-3">14.212</h1>
                                                <div class="mb-0">
                                                    <span class="text-success"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                                    <span class="text-muted">Since last week</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Earnings</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="dollar-sign"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 class="mt-1 mb-3">$21.300</h1>
                                                <div class="mb-0">
                                                    <span class="text-success"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                                    <span class="text-muted">Since last week</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Orders</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                            <i class="align-middle" data-feather="shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 class="mt-1 mb-3">64</h1>
                                                <div class="mb-0">
                                                    <span class="text-danger"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                                    <span class="text-muted">Since last week</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">

                                    <h5 class="card-title mb-0">Latest Reservist</h5>
                                </div>
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th class="d-none d-xl-table-cell">Email</th>
                                            <th class="d-none d-xl-table-cell">Date Modified</th>
                                            <th>Status</th>
                                            <th class="d-none d-md-table-cell">Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $result = mysqli_query($conn, "select reg_id, firstname, lastname, email, status, type, date, time from registration_user WHERE status='pending' ORDER BY date") or die("Query for latest reservist....");
                                        while (list($reg_id, $firstname, $lastname, $email, $status, $type, $date, $time) = mysqli_fetch_array($result)) {
                                            echo "
                                                <tr>	
                                                    <td scope='row'>$firstname $lastname</a></td>
                                                    <td>$email</td>
                                                    <td>$date $time</td>
                                                    <td><span class='badge bg-warning'>$status</span></td>
                                                    <td>$type</td>
                                                </tr>
                                            ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php include 'system_controller/footer.php' ?>
        </div>
    </div>

    <script src="js/app.js"></script>


</body>

</html>