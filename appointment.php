<?php
include 'include/connect.php';
if (isset($_POST['submit'])) {
  $app_date     = $_POST['app_date'];
  $app_time     = $_POST['app_time'];
  $commander_id = $_POST['commander_id'];
  $name         = $_POST['name'];
  $email        = $_POST['email'];
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
    $query = "INSERT INTO appointments VALUES('','','$commander_id','$name','$email','$subject','$text','$status','$app_date','$app_time','$date','$time','$date','$time')";
    mysqli_query($conn, $query);

    echo '<script type="text/javascript"> alert("Hi ' . $name . '! We Set your appointment, please wait for the approval!.")</script>';
    header('Refresh: 0; url=appointment.php');
  // }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ARMY</title>
    <link rel="shortcut icon" href="img/icons/army_icon.png" />

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/"> -->

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
  <?php include 'bulletin_header.php'?>

<main>
  <div class="container mt-5">
  <h1 class="mb-4 text-center">Make your appointment</h1>
            <form method="post" class="contact-form" style="width: 50%; margin: 0 auto;" autocomplete="off" >
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
              <div class="form-group">
                <label for="exampleInputEmail1">Command Commander</label>
                  <select class="form-control" id="commander_id" name="commander_id">
                      <?php
                      $result = mysqli_query($conn, "select id, firstname, lastname, rank from army_users where type = 'commander' &&user_status='active'") or die("Query School List is inncorrect........");
                      while (list($id, $fname, $lname, $rank) = mysqli_fetch_array($result)) {
                        echo "<option value='$id'>$rank $fname $lname</option>";
                      }
                      ?>
                  </select>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
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
                <button type="submit" class="btn btn-success contact-submit" name="submit">Set Appointment</button>
              </div>
            </form>  
  </div>

<br>
<br>
<br>
<br>
<br>
<br>

  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"> 
      <a href="#">
      <img src="img/icons/top.png" style="heigth: 3rem; width:3rem;" alt="Sunset Over the City"/>
      </a>
    </p>
    <!-- <button id="myBtn"><a href="#top" style="color: white">Top</a></button> -->
    <p>&copy; ARMY &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
