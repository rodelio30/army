<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Latest User Registration</h5>
            </div>
            <table class="table table-hover my-0">
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
                    // Viewing User Registered 
                    $result = mysqli_query($conn, "select reg_id, username, user_type, rank, company, status, date, time from registration_user WHERE status='pending' ORDER BY date") or die("Query for latest reservist....");
                    while (list($reg_id, $username, $user_type, $rank, $company, $status, $date, $time) = mysqli_fetch_array($result)) {
                        $user_view = 'admin_reg_'.$user_type.'_view.php';
                        echo "
                            <tr>	
                                <td scope='row'><a href=\"$user_view?ID=$reg_id\" class='user-clicker'>$username</a></td>
                                <td>$user_type</td>
                                <td>$rank</td>
                                <td>$date $time</td>
                                <td><span class='badge bg-warning' style='font-size: 12px;'>$status</span></td>
                            </tr>
                        ";
                    }
                    // Viewing User Registered 
                    $result_sc = mysqli_query($conn, "select sc_id, username, user_type, rank, status, date, time from registration_sc WHERE status='pending' ORDER BY date") or die("Query for latest School Coordinator....");
                    while (list($sc_id, $username, $user_type, $rank, $status, $date, $time) = mysqli_fetch_array($result_sc)) {
                        echo "
                            <tr>	
                                <td scope='row'><a href=\"admin_reg_school_view.php?ID=$sc_id\" class='user-clicker'>$username</a></td>
                                <td>$user_type</td>
                                <td>$rank</td>
                                <td>$date $time</td>
                                <td><span class='badge bg-warning' style='font-size: 12px;'>$status</span></td>
                            </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>