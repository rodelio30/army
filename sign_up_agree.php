<?php
require 'include/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit_agree"])){
      $check = !isset($_POST['check'])? "off" : $_POST['check'];
    //   $check = $_POST["check"];
    if($check === 'on') {
      $_SESSION["agree"] = true;
      header("Location: sign-choices.php");
    //   echo "<script>console.log(' high: " . $check . ", I have checked the agreements ". $_SESSION["agree"]."');</script>";
    }
    else {
       echo "<script>console.log(' low: " . $check . "');</script>";
       echo "<script> alert('You need to agree on terms and conditions first!'); </script>";
    }
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
                               <strong> Terms and Conditions Agreement </strong>
                            </h1>
                            <!-- <p class="lead">
								Sign in to your account to continue
							</p> -->
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4 agree">
                                    <div class="mb-4">
                                        <h5><strong>Privacy and consent wording</strong></h5>
                                        <p> All online forms, surverys and questionaires require a privacy and consent section people must agree to before they can submit your form. Copy the consent template below and edit it for your form. </p>
                                         <p> If you need to add an additional clause eg 'agree to be contacted by email in future and asked to take part in an online survey', or other change to the wording contact IRM staff for advice.  </p>
                                        <h5><strong>Consent template </strong> </h5>
                                        <p> "By submitting this form, I consent to having my information used to manage my data. The information will only be accessed by necessary university staff. I understand my data will be held securely and will not be distributed to third parties. I have a right to change or access my information. I understand that when this information is no longer required for this purpose, official university procedure will be followed to dispose of my data." </p>
                                        <ul>
                                            <li>
                                                Access to the management information system is restricted to authorized personnel only. Unauthorized access to the system is strictly prohibited.
                                            </li>
                                            <li>
                                                Users of the system must comply with all applicable laws, regulations, and policies related to the use of information technology and the protection of classified information.
                                            </li>
                                            <li>
                                                Users must not disclose any information obtained through the system to unauthorized individuals or entities.
                                            </li>
                                            <li>
                                                All data entered into the system must be accurate and complete. Users are responsible for verifying the accuracy of the data they enter and correcting any errors.
                                            </li>
                                            <li>
                                                The system is provided "as is" and without warranty of any kind. The army is not liable for any damages resulting from the use of the system, including but not limited to loss of data.
                                            </li>
                                            <li>
                                                Users of the system must report any security incidents, including suspected or actual breaches, to the appropriate authorities immediately.
                                            </li>
                                            <li>
                                                The army reserves the right to monitor and audit the use of the system to ensure compliance with these terms and conditions and to detect any unauthorized access or use.
                                            </li>
                                            <li>
                                                Any violation of these terms and conditions may result in disciplinary action, up to and including termination of employment or criminal prosecution.
                                            </li>
                                            <li>
                                                These terms and conditions may be updated from time to time at the discretion of the army. Users will be notified of any changes and must accept the updated terms and conditions before continuing to use the system.
                                            </li>
                                            <li>
                                               The use of the system implies acceptance of these terms and conditions. 
                                            </li>
                                        </ul>
                                        <form method="post">
                                            <input class="form-check-input" type="checkbox" name="check">
                                                I am agree on terms and conditions. 
                                            </label>
                                            <button type="submit" name="submit_agree" class="btn btn-md btn-outline-success mt-4" style="float: right">Submit</button>
                                        </form>
                                    </div>
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