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
                <a class="sidebar-link" href="admin_rids.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Reservist</span>
                </a>
            </li>

            <div class="sidebar-cta">
                <div class="sidebar-cta-content">
                    <strong class="d-inline-block mb-2">Your Time</strong>
                    <div class="mb-3 text-sm">
                        Sample Time
                        <!-- Are you looking for more components? Check out our premium version. -->
                    </div>
                </div>
            </div>
    </div>
</nav>