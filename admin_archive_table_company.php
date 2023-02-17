<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="archive_company" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>company</th>
                            <th>Date Modified</th>
                            <th>Status</th>
                            <th>Action</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'counter/company_counter.php';
                        if ($archive_company_counter > 0) {
                            $result_company = mysqli_query($conn, "select company_id,  company_name, status, date_modified from company WHERE status = 'archive' ORDER BY date_modified") or die("Query for latest reservist....");
                            while (list($company_id, $company_name, $status, $date_modified) = mysqli_fetch_array($result_company)) {
                                echo "
                                <tr>	
                                    <td scope='row'>$company_name</td>
                                    <td>$date_modified</td>
                                    <td>$status</td>
                                    <td id='action-print'>
                                    <a href=\"archive/company/company_delete.php?ID=$company_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-sm float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/company/company_active.php?ID=$company_id\" onClick=\"return confirm('Are you sure you want this Event be active again?')\" class='btn btn-outline-primary btn-sm float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";
                            }
                        } else {
                            echo " <tr><td></td> <td class='text-center'>No Active company</td> <td></td> <td></td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>