<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
        <h2>Archive Document List</h2>
              <table id="documents" class="table table-hover my-0" style="width:100%">
                  <thead>
                      <tr>
                          <th>Filename</th>
                          <th>Date Modified</th>
                          <th>Status</th>
                          <th id='action-print'><span class="float-end">Action</span> </th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      include 'counter/documents_counter.php';

                      if ($documents_counter > 0) {
                          $result = mysqli_query($conn, "select docu_id, filename, status, date_modified from documents WHERE status = 'archive' ORDER BY date_modified") or die("Query for archive document....");
                          while (list($docu_id, $filename, $status, $date_modified) = mysqli_fetch_array($result)) {
                              echo "
                          <tr>	
                            <td scope='row'>$filename</td>
                            <td>$date_modified</td>
                            <td>$status</td>
                            <td id='action-print'>
                            <a href=\"archive/documents/documents_delete.php?ID=$docu_id\" onClick=\"return confirm('Are you sure you want to Delete this File permanent?')\" class='btn btn-outline-danger btn-sm float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                            <a href=\"archive/documents/documents_active.php?ID=$docu_id\" onClick=\"return confirm('Are you sure you want this File be active again?')\" class='btn btn-outline-primary btn-sm float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                            </td>
                          </tr>
                      ";
                          }
                      } else {
                          echo " <tr>
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