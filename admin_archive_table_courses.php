
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="archive_courses" class="table table-striped" style="width:100%">
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
                        include 'counter/courses_counter.php';
                        //   echo "<script>console.log('" . $reservist_counter . "');</script>";
                        if ($archive_courses_counter > 0) {
                            $result = mysqli_query($conn, "select course_id, course_name, status, date_modified from courses WHERE status = 'archive' ORDER BY date_modified") or die("Query for courses Archive....");
                            while (list($course_id, $course_name, $status, $date_modified) = mysqli_fetch_array($result)) {
                                echo "
                                <tr>	
                                    <td scope='row'>$course_name</td>
                                    <td>$date_modified</td>
                                    <td>$status</td>
                                    <td id='action-print'>
                                    <a href=\"archive/courses/courses_delete.php?ID=$course_id\" onClick=\"return confirm('Are you sure you want to Delete this Event permanent?')\" class='btn btn-outline-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
                                    <a href=\"archive/courses/courses_active.php?ID=$course_id\" onClick=\"return confirm('Are you sure you want this course return to active?')\" class='btn btn-outline-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
                                    </td>
                                </tr>
                            ";
                            }
                        } else {
                            echo " <tr>	<td></td> <td></td> <td class='text-center'>No Active course</td> <td></td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>