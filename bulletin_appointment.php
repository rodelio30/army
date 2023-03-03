<?php
include 'include/connect.php';
if (isset($_POST['submit'])) {
  $app_date     = $_POST['app_date'];
  $app_time     = $_POST['app_time'];
  $name         = $_POST['name'];
  $email        = $_POST['email'];
  $cnumber      = $_POST['cnumber'];
  $subject      = $_POST['subject'];
  $text         = $_POST['message'];
  $status       = 'pending';
  $date         = date("Y-m-d");
  $time         = date("h:i:s");

  // $duplicate = mysqli_query($conn, "SELECT * FROM trainings WHERE training_name = '$training_name'");
  // if (mysqli_num_rows($duplicate) > 0) {
  //   echo
  //   "<script> alert('This Traning Has Already Taken'); </script>";
  // } else {
    // Checking if password confirmation match
    $query = "INSERT INTO appointments VALUES('','$name','$email','$cnumber','$subject','$text','$status','$app_date','$app_time','$date','$time','$date','$time')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("Hi ' . $name . '! We Set your appointment, please wait for the approval, will send you an update for text or email!.")</script>';
    header('Refresh: 0; url=bulletin_appointment.php');
  // }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header_main.php' ?>

<body>
    <?php include 'bulletin_navigation.php' ?>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row mt-4">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center">
                            <h1 class="h2">                                       
                                <strong>
                                    Make an Appointment
                                </strong>
                            </h2>
                            <!-- <p class="lead">
								Sign in to your account to continue
							</p> -->
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                <form method="post"  autocomplete="off" >
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                    <label>Appointment Date</label>
                                    <input type="date" name="app_date" class="form-control" id="app_date" placeholder="Your Name" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                    <label>Appointment Time</label>
                                    <input type="time" class="form-control" name="app_time" id="app_time" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <br>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Complete Name" required>
                                    <br>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <!-- <input type="text" name="cnumber" class="form-control" id="cnumber" placeholder="Your Contact Number" required> -->
                                      <input type="tel" id="cnumber" class="form-control"  name="cnumber" placeholder="000-0000-000" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Purpose of Appointment" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-success contact-submit" name="submit">Set Appointment</button>
                                </div>
                                </form>  
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

</body>

</html>