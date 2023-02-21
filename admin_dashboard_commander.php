<?php include 'counter/users_counter.php'?>
<?php include 'counter/users_pending_counter.php'?>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Active Reservist</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $reservist_counter ;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pending Reservist</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $p_reservist_counter ;?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>