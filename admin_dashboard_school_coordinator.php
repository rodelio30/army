<?php include 'counter/school_reserve_counter.php'?>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-4">
                    <a href="admin_rg.php" class="linked-navigation">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Totla Number of Graduates</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $own_school_counter ;?></h1>
                        </div>
                    </div></a>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Male</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $school_male ;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Female</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $school_female;?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>