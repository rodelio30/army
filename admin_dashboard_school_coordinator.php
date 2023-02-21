<?php include 'counter/school_coordinator_counter.php'?>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Students</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $students_counter ;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Courses</h5>
                                </div>
                            </div>
                            <h1 class="mt-3 mb-1"><?php echo $courses_counter ;?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>