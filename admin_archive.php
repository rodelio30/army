<?php
include 'system_checker.php';
if(!$isSadmin){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'archive';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <?php include 'admin_archive_table_users.php'; ?>
                    <?php include 'admin_archive_table_registered_users.php'; ?>
                    <?php include 'admin_archive_table_reservist.php'; ?>
                    <?php include 'admin_archive_admin_input.php'; ?>
                    <?php include 'admin_archive_trainings_seminars.php'; ?>
                    <?php include 'admin_archive_announcements.php'; ?>
                    <?php include 'admin_archive_appointments.php'; ?>
                    <?php include 'admin_archive_aor.php'; ?>
                </div>
            </main>

            <?php include 'system_controller/footer.php' ?>
        </div>
    </div>

    <script src="js/app.js"></script>

    <!-- This line below is the jquery for the datatables -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTable.min.js"></script>
</body>

</html>