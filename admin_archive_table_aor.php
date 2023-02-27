
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="archive_aor" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Place</th>
                            <th id="action-print"><span class="float-end me-5">Action</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'counter/aor_counter.php';
                        //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                        if ($archive_aor_counter > 0) {
                            $result = mysqli_query($conn, "select aor_id, company_name, place from aor WHERE status = 'archive'") or die("Query for aor Archive....");
                            while (list($aor_id, $company_name, $place) = mysqli_fetch_array($result)) {
                                echo "
                                <tr>	
                                    <td scope='row'>$company_name</td>
                                    <td scope='row'>$place</td>
                                    <td id='action-print'>
                                    <a href=\"archive/aor/aor_delete.php?ID=$aor_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/aor/aor_active.php?ID=$aor_id\" onClick=\"return confirm('Are you sure you want this Area of Responsibility return to active?')\" class='btn btn-outline-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";
                            }
                        } else {
                            echo " <tr>	<td></td><td class='text-center'>No Active Area of Responsibility</td> <td></td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>