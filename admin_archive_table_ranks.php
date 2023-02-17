<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="archive_rank" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Date Modified</th>
                            <th>Status</th>
                            <th>Action</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'counter/ranks_counter.php';
                        if ($archive_ranks_counter > 0) {
                            $result_ranks = mysqli_query($conn, "select rank_id, ranked, rank_name, status, date_modified from ranks WHERE status = 'archive' ORDER BY date_modified") or die("Query for latest reservist....");
                            while (list($rank_id, $ranked, $rank_name, $status, $date_modified) = mysqli_fetch_array($result_ranks)) {
                                echo "
                                <tr>	
                                    <td scope='row'>$rank_name</td>
                                    <td>$date_modified</td>
                                    <td>$status</td>
                                    <td id='action-print'>
                                    <a href=\"archive/ranks/ranks_delete.php?ID=$rank_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-sm float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/ranks/ranks_active.php?ID=$rank_id\" onClick=\"return confirm('Are you sure you want this Event be active again?')\" class='btn btn-outline-primary btn-sm float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";
                            }
                        } else {
                            echo " <tr>	 <td></td><td></td>  <td>No Active rank</td> <td></td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>