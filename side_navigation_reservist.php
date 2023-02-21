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
                RIDS Info 
            </li>

            <li class="sidebar-item <?php echo $rids_select ?>">
                <a class="sidebar-link" href="admin_rids_view.php?ID=<?php echo $id ?>">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">My Reservist</span>
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