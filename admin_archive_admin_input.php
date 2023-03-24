  <div class="col-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
      <div class="card-header">
        <h2>View List By</h2>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#school-contents" id="login-tab" data-bs-toggle="tab">Schools</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#rank-contents" id="rank-tab" data-bs-toggle="tab">Ranks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#company-contents" id="company-tab" data-bs-toggle="tab">Company</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="school-contents" class="tab-pane active">
            <!-- This line below -->
            <br>
            <?php include 'admin_archive_table_school.php' ?>
          </div>
          <div id="rank-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php 
            include 'admin_archive_table_ranks.php' 
            ?>
          </div>
          <div id="company-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php include 'admin_archive_table_company.php' ?>
          </div>
         </div>
      </div>
    </div>
  </div>