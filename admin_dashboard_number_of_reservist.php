  <?php 
    include 'counter/reservist_sex_counter.php';
  ?>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Male</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $male_counter ;?></h1>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Female</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $female_counter ;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Graph Sex for Reservist</h5>
                                </div>
                            </div>
                            <?php include 'admin_dashboard_chart.php';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>