 <?php 
    include 'counter/reservist_sex_counter.php';
?>
<!-- First Layer -->
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-12 col-md-4 col-xxl-3 d-flex">
                    <div class="card flex-fill w-100">
                        <?php include 'admin_dashboard_stat_a.php'?>
                    </div>
                </div>
                <!-- <div class="col-xl-8 col-xxl-8">
                    <div class="card flex-fill w-100"> -->
                <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <?php include 'admin_dashboard_stat_d.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Second Layer -->
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-12 col-lg-7 col-xxl-8 d-flex">
                    <div class="card flex-fill">
                        <?php include 'admin_dashboard_stat_b.php'?>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-xxl-4 d-flex">
                    <div class="card flex-fill w-100">
                        <?php include 'admin_dashboard_stat_e.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Third Layer -->
<?php
if($isAdmin){
?>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                    <div class="card flex-fill">
                        <?php include 'admin_dashboard_stat_c.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>