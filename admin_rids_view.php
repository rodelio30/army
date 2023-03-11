<?php 
include 'system_checker.php';

$user_id = $_GET['ID'];
include 'admin_rids_query.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <div class="wrapper">
        <?php
		$nav_active = 'rids';
		include 'side_navigation.php'
		?>

        <div class="main">
            <?php include 'top_right_navigation.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-9">
                        <h1 class="h3 mb-3 header-dash" id="action-print">
                          <?php if(!$isReservist) {
                            ?>
                          <a href="admin_rids.php" class="linked-navigation">Reservist List </a> / 
                          <?php echo $firstname .' '. $lastname ?>
                            <?php
                          } ?>
                            <button onclick="window.print();" class="btn btn-outline-primary" id="print-btn"><span data-feather="printer"></span> Print</button>
                        </h1>
                        </div>
                        <div class="col-md-3">
                            <?php if(!$isStaff) {?>
                            <a <?php echo "href=\"admin_rids_edit.php?ID=" . $user_id ."\"" ?> style="float: right" id="action-print" class="btn btn-outline-primary">&nbsp Edit Info</a>
                                <?php } ?>
                        </div>
                    </div>

                    <?php include 'reservist_form.php'?>
                </div>
            </main>

            <?php include 'system_controller/footer.php' ?>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>