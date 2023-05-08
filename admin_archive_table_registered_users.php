<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
        <h2>Archive Disapproved Users List</h2>
              <table id="archive_disapproved" class="table table-hover my-0" style="width:100%">
                  <thead>
                      <tr>
                          <th>Username</th>
                          <th>Type</th>
                          <th>Status</th>
                          <th>Date Modified</th>
                          <th id='action-print'><span class="float-end">Action</span> </th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      include 'counter/register_users_counter.php';

                      if ($register_users_counter > 0) {
                          $result = mysqli_query($conn, "select reg_id, username, user_type, status, user_status, date, time from registration_user WHERE status='disapproved' ORDER BY date") or die("Query for latest reservist....");
                          while (list($register_id, $username, $user_type, $status, $user_status, $date, $time) = mysqli_fetch_array($result)) {
                            $time_formatted   = date("g:i A ", strtotime($time));
                              echo "
                          <tr>	
                              <td>$username</td>
                              <td>$user_type</td>
                              <td><span class='badge bg-warning' style='font-size: 12px;'>$status</span></td>
                              <td>$date $time_formatted</td>
                                    <td id='action-print'>
                                    <a href=\"archive/register_users/register_users_delete.php?ID=$register_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-sm float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/register_users/register_users_active.php?ID=$register_id\" onClick=\"return confirm('Are you sure you want this Event be active again?')\" class='btn btn-outline-primary btn-sm float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                          </tr>
                      ";
                          }
                      } else {
                          echo " <tr>
                                <td></td>
                                <td></td>
                                    <td class='text-center'>No Registered User </td>
                                <td></td>
                                <td></td>
                            </tr>";
                      }
                      ?>
                  </tbody>
              </table>

            </div>
        </div>
    </div>
</div>