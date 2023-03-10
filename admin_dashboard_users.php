<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <?php 
                if($isSadmin) {
                ?>
                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Admin</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $admin_counter ;?></h1>
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>
                <div class="col-sm-<?php echo $isSadmin ? 2: 3?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Staff</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $staff_counter ;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-<?php echo $isSadmin ? 2: 3?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Reservist</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $reservist_counter ;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">School Coordinator</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $school_counter ;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Company Commander</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $commander_counter ;?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>