<?php 
include 'counter/staff_reserve_counter.php';
include 'counter/appointments_counter.php';
include 'counter/announcements_counter.php';
include 'counter/trainings_counter.php';
include 'counter/seminars_counter.php';

$ts = 0;
$ts = $trainings_counter + $seminars_counter;
?>
<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Number of Reservist</strong> Dashboard</h1>
    <?php include "admin_dashboard_stat_adstaff.php"?>

    <h1 class="h3 mb-3"><strong>Analytic</strong> Dashboard</h1>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-3">
                    <a href="admin_rg.php" class="linked-navigation">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Reservist</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $reserve_counter ;?></h1>
                        </div>
                    </div>

                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="admin_trainings.php" class="linked-navigation">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Trainings and Seminars</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $ts ?></h1>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="admin_announcements.php" class="linked-navigation">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Announcements</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $announcements_counter?></h1>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="admin_appointments.php" class="linked-navigation">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Appointments</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $appointments_counter ?></h1>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
</main>