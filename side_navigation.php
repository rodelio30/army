<?php
$dash_select      = '';
$users_select      = '';
$blank_select     = '';
$profile_select   = '';
$reservist_select = '';
$admin_select     = '';
$staff_select     = '';
$commander_select = '';
$school_select    = '';

if ($nav_active == 'dashboard') {
    $dash_select = 'active';
}
if ($nav_active == 'users') {
    $users_select = 'active';
}
if ($nav_active == 'blank') {
    $blank_select = 'active';
}
if ($nav_active == 'profile') {
    $profile_select = 'active';
}
if ($nav_active == 'reservist') {
    $reservist_select = 'active';
}
if ($nav_active == 'admin') {
    $admin_select = 'active';
}
if ($nav_active == 'staff') {
    $staff_select = 'active';
}
if ($nav_active == 'commander') {
    $commander_select = 'active';
}
if ($nav_active == 'school') {
    $school_select = 'active';
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
            
            <hr>
            <li class="sidebar-header">
               List of all Users 
            </li>

            <li class="sidebar-item <?php echo $users_select ?>">
                <a class="sidebar-link" href="admin_users.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">User</span>
                </a>
            </li>

            <hr>
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
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">School Coordinator</span>
                </a>
            </li>
            
            <li class="sidebar-item <?php echo $commander_select ?>">
                <a class="sidebar-link" href="admin_reg_commander.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Commander</span>
                </a>
            </li>

            <hr>

            <li class="sidebar-header">
               School Registration List 
            </li>
            
            <li class="sidebar-item <?php echo $schools_select ?>">
                <a class="sidebar-link" href="admin_schools.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Schools</span>
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