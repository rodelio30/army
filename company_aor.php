<table id="example" class="table table-hover" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>Place</th>
            <th>Status</th>
            <?php if($isSadmin) {
            ?>
            <th id="action-print"><span class="float-end me-5">Action</span> </th>
            <?php }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'counter/company_aor_counter.php';

        if ($company_aor_counter > 0) {
            $result = mysqli_query($conn, "select aor_id, company_id, place, status from aor WHERE status = 'active' && company_id = '$company_id' ORDER BY place") or die("Query for Training Attendance Error....");
            while (list($aor_id, $company_id, $place, $status) = mysqli_fetch_array($result)) {

                // Get the company name
                // $result_company       = mysqli_query($conn, "SELECT * FROM company WHERE company_id = '$company_id'");
                // while ($res      = mysqli_fetch_array($result_company)) {
                //   $company_name = $res['company_name'];
                // }

                if($isSadmin){
                    echo "
                        <tr>	
                            <td>$place</td>
                            <td>$status</td>
                            <td id='action-print'><a href=\"archive/aor/aor_archive.php?id=$aor_id\" onclick=\"return confirm('are you sure you want this aor move to archive?')\" class='btn btn-outline-warning btn-md float-end ms-2'><span><span data-feather='package'></span>&nbsp archive</a></td>
                        </tr>
                        "; 
                }else {
                    echo "
                        <tr>	
                            <td>$place</td>
                            <td>$status</td>
                        </tr>
                        "; 
                }
                }
        }
          else {
                if($isSadmin){ 
                    echo " <tr>	<td></td><td>No Data for Area of Responsibility</td>	<td></td></tr>";
                }
                else {
                    echo " <tr>	<td></td><td>No Data for Area of Responsibility</td></tr>";
                }
        }
        ?>
    </tbody>
</table>