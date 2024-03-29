<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php" style="background-color:#0D370A;">
            <span class="align-middle">ARMY</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item <?php echo $dash_select ?>">
                <a class="sidebar-link" href="index.php">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Documents 
            </li>
            
            <li class="sidebar-item <?php echo $docu_select ?>">
                <a class="sidebar-link" href="documents.php">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Documents</span>
                </a>
            </li>

            <li class="sidebar-header">
                RIDS Info 
            </li>
            
            <li class="sidebar-item <?php echo $rotc_select ?>">
                <a class="sidebar-link" href="admin_rg.php">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Reservist</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $rids_select ?>">
                <a class="sidebar-link" href="admin_rids.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">RIDS</span>
                </a>
            </li>
            
            
            <li class="sidebar-header">
               Trainings and Seminars 
            </li>

            <li class="sidebar-item <?php echo $training_select ?>">
                <a class="sidebar-link" href="admin_trainings.php">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Trainings</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $seminar_select ?>">
                <a class="sidebar-link" href="admin_seminars.php">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Seminars</span>
                </a>
            </li>




            <hr>

            <li class="sidebar-item <?php echo $aor_select ?>">
                <a class="sidebar-link" href="admin_aor.php">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Area of Responsibility</span>
                </a>
            </li>
            
            <hr>
            <div class="sidebar-cta">
                <div class="sidebar-cta-content">
                    <div id="oras" class="clock-position ms-4 mb-2">
                    <div id="clock">
                        <div id="dates"></div>
                        <div id="current-time"></div>
                    </div>
                    </div>
                    <script src="js/time_script.js"></script>
                </div>
            </div>
    </div>
</nav>