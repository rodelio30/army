  <div class="col-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
      <div class="card-header">
        <h2>Trainings and Seminars</h2>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#seminar-contents" id="seminar-tab" data-bs-toggle="tab">Seminars</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#training-contents" id="training-tab" data-bs-toggle="tab">Trainings</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="seminar-contents" class="tab-pane active">
            <?php include 'admin_archive_table_seminars.php';?>
          </div>
          <div id="training-contents" class="tab-pane">
            <?php include 'admin_archive_table_trainings.php';?>
         </div>
         </div>
      </div>
    </div>
  </div>