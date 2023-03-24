<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
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

            <?php 
                if($isSadmin){
            ?>
            
            <li class="sidebar-header">
                List of all Users
            </li>

            <li class="sidebar-item <?php echo $users_select ?>">
                <a class="sidebar-link" href="admin_users.php">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
            </li>

            <li class="sidebar-header">
                User Registration List
            </li>

            <li class="sidebar-item <?php echo $admin_select ?>">
                <a class="sidebar-link" href="admin_reg_admin.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Admin</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $staff_select ?>">
                <a class="sidebar-link" href="admin_reg_staff.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Admin Staff</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $reservist_select ?>">
                <a class="sidebar-link" href="admin_reg_reservist.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Reservists</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $school_select ?>">
                <a class="sidebar-link" href="admin_reg_school.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">School
                        Coordinator</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $commander_select ?>">
                <a class="sidebar-link" href="admin_reg_commander.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Commander</span>
                </a>
            </li>
            
            <?php } ?>

            <li class="sidebar-header">
                Reservist
            </li>


            <li class="sidebar-item <?php echo $rotc_select ?>">
                <a class="sidebar-link" href="admin_rg.php">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Reservist</span>
                </a>
            </li>
            <li class="sidebar-item <?php echo $rids_select ?>">
                <a class="sidebar-link" href="admin_rids.php">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">RIDS</span>
                </a>
            </li>

            <!-- <li class="sidebar-item <?php echo $rids_select ?>">
                <a class="sidebar-link" href="admin_rids.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Reservist</span>
                </a>
            </li> -->

            <li class="sidebar-header">
                School / Rank / Company 
            </li>

            <li class="sidebar-item <?php echo $schools_select ?>">
                <a class="sidebar-link" href="admin_schools.php">
                    <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">School</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $rank_select ?>">
                <a class="sidebar-link" href="admin_ranks.php">
                    <i class="align-middle" data-feather="trending-up"></i> <span class="align-middle">Rank Classification</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $company_select ?>">
                <a class="sidebar-link" href="admin_company.php">
                    <i class="align-middle" data-feather="shield"></i> <span class="align-middle">Company</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $aor_select ?>">
                <a class="sidebar-link" href="admin_aor.php">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Area of Responsibility</span>
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

            <li class="sidebar-header">
               Announcements 
            </li>

            <li class="sidebar-item <?php echo $announce_select ?>">
                <a class="sidebar-link" href="admin_announcements.php">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Announcements</span>
                </a>
            </li>

            <li class="sidebar-header">
                Appointments 
            </li>

            <li class="sidebar-item <?php echo $appoint_select ?>">
                <a class="sidebar-link" href="admin_appointments.php">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Appointments</span>
                </a>
            </li>

            <!-- <li class="sidebar-header">
                        Tools & Components
                    </li> -->

            <!-- <li class="sidebar-item">
                        <a class="sidebar-link" href="ui-buttons.php">
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
                        </a>
                    </li> -->

            <div class="sidebar-cta">
                <div class="sidebar-cta-content">
                    <div id="oras" class="ms-2 mb-2">
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