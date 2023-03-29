<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
        <h2>Archive Reservist List</h2>
              <table id="reservist" class="table table-hover my-0" style="width:100%">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>User Status</th>
                          <th id='action-print'><span class="float-end">Action</span> </th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      include 'counter/users_counter.php';

                      if ($users_counter > 0) {
                          $result = mysqli_query($conn, "select reservist_id, firstname, lastname, user_status, date_modified, time_modified from reservists WHERE user_status='archive' ORDER BY date_modified") or die("Query for latest reservist....");
                          while (list($reservist_id, $firstname, $lastname, $user_status, $date, $time) = mysqli_fetch_array($result)) {
                              echo "
                          <tr>	
                              <td>$firstname $lastname</td>
                              <td>$user_status</td>
                                <td id='action-print'>
                                <a href=\"archive/reservist/reservist_delete.php?ID=$reservist_id\" onClick=\"return confirm('Are you sure you want to Delete this Reservist permanent?')\" class='btn btn-outline-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                <a href=\"archive/reservist/reservist_active.php?ID=$reservist_id\" onClick=\"return confirm('Are you sure you want this Reservist return to active again?')\" class='btn btn-outline-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                </td>
                          </tr>
                      ";
                          }
                      } else {
                          echo " <tr>
                                <td></td>
                                <td class='text-center'>No Registered User </td>
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