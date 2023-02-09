<?php
$dash_select     = '';
$blank_select     = '';
$profile_select     = '';

if ($nav_active == 'dashboard') {
    $dash_select = 'active';
}
if ($nav_active == 'blank') {
    $blank_select = 'active';
}
if ($nav_active == 'profile') {
    $profile_select = 'active';
}
?>
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

            <li class="sidebar-item <?php echo $profile_select ?>">
                <a class="sidebar-link" href="pages-profile.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $blank_select ?>">
                <a class="sidebar-link" href="pages-blank.php">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
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
                    <strong class="d-inline-block mb-2">Your Time</strong>
                    <div class="mb-3 text-sm">
                        Sample Time
                        <!-- Are you looking for more components? Check out our premium version. -->
                    </div>
                </div>
            </div>
    </div>
</nav>