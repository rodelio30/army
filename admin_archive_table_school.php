<div class="row">
    <div class="col-6">
        <h1 class="h3 mb-3">Archive List for School Registered</h1>
    </div>
    <div class="col-6">
        <button onclick="window.print();" class="btn btn-outline-secondary float-end" id="print-btn"><span data-feather="printer"></span> Print</button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Acronym</th>
                            <th>Name</th>
                            <th>Date Modified</th>
                            <th>Status</th>
                            <th id="action-print"><span class="float-end me-5">Action</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'counter/schools_counter.php';
                        //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                        if ($archive_schools_counter > 0) {
                            $result = mysqli_query($conn, "select school_id, school_name, acronym, status, date_modified from schools WHERE status = 'archive' ORDER BY date_modified") or die("Query for latest reservist....");
                            while (list($school_id, $school_name, $acronym, $status, $date_modified) = mysqli_fetch_array($result)) {
                                echo "
                                <tr>	
                                    <td scope='row'>$acronym</td>
                                    <td scope='row'>$school_name</td>
                                    <td>$date_modified</td>
                                    <td>$status</td>
                                    <td id='action-print'>
                                    <a href=\"archive/schools/schools_delete.php?ID=$school_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/schools/schools_active.php?ID=$school_id\" onClick=\"return confirm('Are you sure you want this Event be active again?')\" class='btn btn-outline-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";
                            }
                        } else {
                            echo " <tr>	<td></td> <td></td> <td colspan='2' class='text-center'>No Active School</td> <td></td> <td></td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>