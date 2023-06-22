
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2>Announcements</h2>
                <table id="archive_announcements" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date Modified</th>
                            <th>Status</th>
                            <th id="action-print"><span class="float-end me-5">Action</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'counter/announcements_counter.php';
                        //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                        if ($archive_announcements_counter > 0) {
                            $result = mysqli_query($conn, "select ann_id, title, status, date_modified, time_modified from announcements WHERE status = 'archive' ORDER BY date_modified") or die("Query for announcements Archive....");
                            while (list($ann_id, $title, $status, $date_modified, $time_modified) = mysqli_fetch_array($result)) {
                            $time_formatted   = date("g:i A ", strtotime($time_modified));
                                echo "
                                <tr>	
                                    <td scope='row'>$title</td>
                                    <td>$date_modified $time_formatted</td>
                                    <td>$status</td>
                                    <td id='action-print'>
                                    <a href=\"archive/announcements/announcements_delete.php?ID=$ann_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-sm float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/announcements/announcements_active.php?ID=$ann_id\" onClick=\"return confirm('Are you sure you want this Announcement return to active?')\" class='btn btn-outline-primary btn-sm float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";
                            }
                        } else {
                            echo " <tr>	<td></td> <td></td> <td class='text-center'>No Active Announcement</td> <td></td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>