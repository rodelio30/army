  <div class="col-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
      <div class="card-header">
        <h2>Student and Courses</h2>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#student-contents" id="student-tab" data-bs-toggle="tab">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#course-contents" id="course-tab" data-bs-toggle="tab">Courses</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="student-contents" class="tab-pane active">
            <?php include 'admin_archive_table_students.php';?>
          </div>
          <div id="course-contents" class="tab-pane">
            <br>
          </div>
         </div>
      </div>
    </div>
  </div>