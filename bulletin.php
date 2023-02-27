<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body style="background-color: white;">
    <div class="wrapper">

        <div class="main">
            <?php include 'bulletin_navigation.php' ?>
            <?php include 'bulletin_carousel.php'?>
    <div class="container marketing">
    <div class="card">
        <div class="card-header">
            <h1><strong>Latest Announcement</strong> </h1>
        <!-- <h1 class="mb-4">Latest Announcement</h1> -->
        </div>
        <div class="card-body">
                <!-- START THE ANNOUNCEMENTS -->
            <?php
            $conn = mysqli_connect("localhost", "root", "");
            if (!$conn) {
                $ConnErr = "Not Connected to the Server";
            }
            if (!mysqli_select_db($conn, 'army')) {
                $SelcErr = "Database Not Selected";
            }
                $result = mysqli_query($conn, "select img, title, description from announcements WHERE status != 'archive' ORDER BY date_modified") or die("Query for latest reservist....");
                while (list($img, $title, $description) = mysqli_fetch_array($result)) {
                    echo "
                    <div class='row featurette'>
                    <div class='col-md-7 order-md-2'>
                        <h2 class='featurette-heading'>$title</h2>
                        <p class='lead'>$description</p>
                    </div>
                    <div class='col-md-5 order-md-1'>
                        <svg class='bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto' width='500' height='500' xmlns='img/announce/$img' role='img' aria-label='Placeholder: 500x500' preserveAspectRatio='xMidYMid slice' focusable='false'><title>Placeholder</title><rect width='100%' height='100%' fill='#eee'/><text x='50%' y='50%' fill='#aaa' dy='.3em'>500x500</text></svg>

                    </div>
                    </div>
                    <br>

                    <hr class='featurette-divider'>
                ";
                }
            ?>
                <!-- /END THE FEATURETTES -->

                    </div><!-- /.container -->
                </div>
            </div>
        </div>
    </div>
            <?php include 'bulletin_footer.php' ?>
    
    <script src="js/app.js"></script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>