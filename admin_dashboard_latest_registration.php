<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Latest User Registration</h5>
            </div>
                                <div class="card-body">
            <table id="example" class="table table-hover my-0" style="width:100%">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Rank</th>
                        <th>Date Modified</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include 'counter/registration_counter.php';
                    // Viewing User Registered 
                    if($registered_counter > 0) {
                        if($isSadmin){
                            $result = mysqli_query($conn, "select reg_id, username, user_type, rank_id, company_id, school_id, status, date, time from registration_user WHERE status='pending' ORDER BY date") or die("Query for latest reservist....");
                        }elseif ($isAdmin){
                            $result = mysqli_query($conn, "select reg_id, username, user_type, rank_id, company_id, school_id,  status, date, time from registration_user WHERE status='pending' && user_type != 'admin' && user_type != 'sadmin' ORDER BY date") or die("Query for latest reservist....");
                        }elseif ($isStaff){
                            $result = mysqli_query($conn, "select reg_id, username, user_type, rank_id, company_id, school_id,  status, date, time from registration_user WHERE status='pending' && user_type != 'admin' && user_type != 'sadmin' ORDER BY date") or die("Query for latest reservist....");
                        }
                    while (list($reg_id, $username, $user_type, $rank_id, $company_id, $school_id, $status, $date, $time) = mysqli_fetch_array($result)) {
                        include 'admin_query_getter.php';
                        if($user_type != 'school_coordinator'){
                            $user_view = 'admin_reg_'.$user_type.'_view.php';
                            echo "
                                <tr>	
                                    <td scope='row'><a href=\"$user_view?ID=$reg_id\" class='user-clicker'>$username</a></td>
                                    <td>$user_type</td>
                                    <td>$rank_name</td>
                                    <td>$date $time</td>
                                    <td><span class='badge bg-warning' style='font-size: 12px;'>$status</span></td>
                                </tr>
                            ";
                        } else {
                            $user_view = 'admin_reg_school_view.php';
                            echo "
                                <tr>	
                                    <td scope='row'><a href=\"$user_view?ID=$reg_id\" class='user-clicker'>$username</a></td>
                                    <td>$user_type</td>
                                    <td>$rank_name</td>
                                    <td>$date $time</td>
                                    <td><span class='badge bg-warning' style='font-size: 12px;'>$status</span></td>
                                </tr>
                            ";
                        }
                    }
                    }
                    else {
                        echo "
                            <tr>
                                <td></td>
                                <td></td>
                                <td class='text-center'>No Data for Registration</td>
                                <td></td>
                                <td></td>
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