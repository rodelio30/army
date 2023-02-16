<?php
include 'system_checker.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../system_controller/header.php' ?>

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
                                <div class="card-body">
                                    <p>High this is level 2 user</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php include '../system_controller/footer.php' ?>
        </div>
    </div>

    <script src="../js/app.js"></script>


</body>

</html>