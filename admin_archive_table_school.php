<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="archive_school" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Acronym</th>
                            <th>Name</th>
                            <th>Date Modified</th>
                            <th>Status</th>
                            <th id="action-print"><span class="float-end">Action</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'counter/schools_counter.php';
                        //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                        if ($archive_schools_counter > 0) {
                            $result = mysqli_query($conn, "select school_id, school_name, acronym, status, date_modified, time_modified from schools WHERE status = 'archive' ORDER BY date_modified") or die("Query for latest reservist....");
                            while (list($school_id, $school_name, $acronym, $status, $date_modified, $time_modified) = mysqli_fetch_array($result)) {
                            $time_formatted   = date("g:i A ", strtotime($time_modified));
                                echo "
                                <tr>	
                                    <td scope='row'>$acronym</td>
                                    <td scope='row'>$school_name</td>
                                    <td>$date_modified $time_formatted</td>
                                    <td>$status</td>
                                    <td id='action-print'>
                                    <a href=\"archive/schools/schools_delete.php?ID=$school_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-sm float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/schools/schools_active.php?ID=$school_id\" onClick=\"return confirm('Are you sure you want this Event be active again?')\" class='btn btn-outline-primary btn-sm float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";
                            }
                        } else {
                            echo " <tr>	
                            <td></td> 
                            <td></td> 
                            <td class='text-center'>No Active School</td> 
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