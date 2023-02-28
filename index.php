<?php
include 'system_checker.php';
include 'counter/users_counter.php';
// require 'include/connect.php';
// if(!empty($_SESSION["id"])){
//   $id = $_SESSION["id"];
//   $result = mysqli_query($conn, "SELECT * FROM army_users WHERE id = $id");
//   $row = mysqli_fetch_assoc($result);
// //   echo $row["firstname"];
// }
// else{
//   header("Location: sign-in.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
        $nav_active = 'dashboard';
        include 'side_navigation.php'
        ?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <?php 
                if($isSadmin || $isAdmin){
                    include 'admin_user_registration_dashboard.php';
                } else if($isStaff){
                    include 'admin_dashboard_staff.php';
                } else if($isSchool){
                    include 'admin_school_coordinator.php';
                } else if($isCommander) {
                    include 'admin_commander.php';
                } else if($isReservist) {
                    include 'admin_reservist.php';
                }
            ?>

            <?php include 'system_controller/footer.php' ?>
        </div>
    </div>

    <script src="js/app.js"></script>

    <!-- This line below is the jquery for the datatables -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTable.min.js"></script>

</body>

</html>