<div class="row">
    <div class="col-12">
        <div class="card" id="add-top">
            <div class="card-body">
            <?php include 'print_header.php'?>
            <h1 class="h3 mb-0 mt-2 text-center">PHILIPPINE ARMY</h1>
            <h1 class="h3 mb-3 text-center"><strong>RESERVIST INFORMATION DATA SHEET</strong></h1>
            <div class="card-header">
                <h5 class="card-title mb-0">RESERVIST PERSONNEL INFORMATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <span class="small">Rank</span> 
                                <br><strong><?php echo $rank ?></strong> 
                            </td>
                            <td colspan="3">
                                <span class="small">Last Name</span> 
                                <br> <?php echo $lastname ?>
                            </td>
                            <td colspan="2">
                                <span class="small">Firstname</span> 
                                <br> <?php echo $firstname ?>
                            </td>
                            <td colspan="3">
                                <span class="small">Middle Name</span> 
                                <br><?php echo $middle_name ?>
                            </td>
                            <td colspan="2"> 
                                <span class="small">AFPSN</span> 
                                <br><?php echo $afpsn ?>
                            </td>
                            <td colspan="2"> 
                                <span class="small">BrSVC</span> 
                                <br><?php echo $brsvc ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <span class="small">AFPOS / MOS</span> 
                                <br><?php echo $afpos_mos ?>
                            </td>
                            <td colspan="10"> 
                                <span class="small">Source of Commission / Enlistment</span> 
                                <br><?php echo $soc_enlistment ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> 
                                <span class="small">Initial Rank</span> 
                                <br><?php echo $initial_rank?>
                            </td>
                            <td colspan="2"> 
                                <span class="small">Date of Comsn/Enlist</span> 
                                <br><?php echo $date_of_comsn_enlist?>
                            </td>
                            <td colspan="2">
                                <span class="small">Authority</span> 
                                <br><?php echo $authority?>
                            </td>
                            <td colspan="4">
                                <span class="small">Reservist Classification</span> 
                                <br> <?php echo strtoupper($status)?> 
                            </td>
                            <td colspan="3">
                                <span class="small">Mobilization Center</span> 
                                <br><?php echo $mobilization_center?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <span class="small">Designation</span> 
                                <br><?php echo $designation?>
                            </td>
                            <td colspan="2">
                                <span class="small">Squad / Team / Section</span> 
                                <br><?php echo $squad?>
                            </td>
                            <td>
                                <span class="small">Platoon</span> 
                                <br><?php echo $platoon ?>
                            </td>
                            <td colspan="2">
                                <span class="small">Company </span> 
                                <br> <?php echo $company ?>
                            </td>
                            <td colspan="5">
                                <span class="small">Battalion / Brigade / Division</span> 
                                <br><?php echo $battalion?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <span class="small">Size of Combat Shoes</span> 
                                <br><?php echo $size_cs?>
                            </td>
                            <td>
                                <span class="small">Size of Cap (cm)</span> 
                                <br><?php echo $size_cap?>
                            </td>
                            <td colspan="8">
                                <span class="small">Size of BDA</span> 
                                <br><?php echo $size_bda?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of First field -->
                <h5 class="card-title mb-0">PERSONAL INFORMATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <span class="small">Present Occupation</span> 
                                <br><?php echo $p_o ?>
                            </td>
                            <td colspan="3">
                                <span class="small">Company Name & Address</span> 
                                <br><?php echo $company_name_address?>
                            </td>
                            <td colspan="2">
                                <span class="small">Office Tel Nr</span> 
                                <br><?php echo $tel_no ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <span class="small">Home Address: Street/Barangay</span> 
                                <br><?php echo $home_address?>
                            </td>
                            <td colspan="2">
                                <span class="small">Town/Town/City/Province/Zip Code
                                </span> 
                                <br><?php echo $town ?>
                            </td>
                            <td colspan="2">
                                <span class="small">Res. Tel. Nr
                                </span> 
                                <br><?php echo $res_tel_no ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <span class="small">Mobile Tel Nr
                                </span> 
                                <br><?php echo $mobile_number ?>
                            </td>
                            <td colspan="1">
                                <span class="small">Birthdate
                                </span> 
                                <br><?php echo $birth_date?>
                            </td>
                            <td colspan="2">
                                <span class="small">Birth Place (Municipality, Province)
                                </span> 
                                <br><?php echo $birth_place?>
                            </td>
                            <td colspan="1">
                                <span class="small">Age
                                </span> 
                                <br><?php echo $age?>
                            </td>
                            <td colspan="1">
                                <span class="small">Religion
                                </span> 
                                <br><?php echo $religion?>
                            </td>
                            <td colspan="1">
                                <span class="small">Blood Type
                                </span> 
                                <br><?php echo $blood_type?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="small">T.I.N.
                                </span> 
                                <br><?php echo $tin ?>
                            </td>
                            <td>
                                <span class="small">SSS Nr.
                                </span> 
                                <br><?php echo $sss ?>
                            </td>
                            <td>
                                <span class="small">PHILHEALTH Nr. 
                                </span> 
                                <br><?php echo $philhealth?>
                            </td>
                            <td>
                                <span class="small">Height: cm
                                </span> 
                                <br><?php echo $height ?>
                            </td>
                            <td>
                                <span class="small">Weight: kgs
                                </span> 
                                <br><?php echo $weight ?>
                            </td>
                            <td>
                                <span class="small">Marital Status
                                </span> 
                                <br><?php echo $marital_status?>
                            </td>
                            <td>
                                <span class="small">Sex
                                </span> 
                                <br><?php echo $sex ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <span class="small">FB Account:
                                </span> 
                                <br><?php echo $fb_account?>
                            </td>
                            <td colspan="4">
                                <span class="small">Email Address:
                                </span> 
                                <br><?php echo $email_user ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <span class="small">Special Skills: 
                                </span> 
                                <br><?php echo $special_skills ?>
                            </td>
                            <td colspan="4">
                                <span class="small">Language/Dialect Spoken: 
                                </span> 
                                <br><?php echo $language ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Second field -->
                <h5 class="card-title mb-0">PROMOTION / DEMOTION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <span class="small">Rank
                                </span> 
                                <br>1.
                                <br><?php echo $promo_rank?>
                            </td>
                            <td>
                                <span class="small">Date of Rank
                                </span> 
                                <br><?php echo $date_of_rank ?>

                            </td>
                            <td colspan="2">
                                <span class="small">Authority
                                </span> 
                                <br><?php echo $rank_authority ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Third field -->

                <h5 class="card-title mb-0">MILITARY TRAINING/SEMINAR/SCHOOLING</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <span class="small">Military Schooling
                                </span> 
                                <br>1.
                                <br><?php echo $military_schooling?>
                            </td>
                            <td colspan="2">
                                <span class="small">School
                                </span> 

                                <br><?php echo $school ?>
                            </td>
                            <td>
                                <span class="small">Date Graduated
                                </span> 
                                <br><?php echo $school_date_graduated?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Fourth field -->

                <h5 class="card-title mb-0">AWARDS AND DECORATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <span class="small">Awards/Decoration 
                                </span> 
                                <br><?php echo $awards ?>

                            </td>
                            <td colspan="2">
                                <span class="small">Authority
                                </span> 
                                <br><?php echo $awards_authority?>

                            </td>
                            <td>
                                <span class="small">Date Awarded
                                </span> 
                                <br><?php echo $date_awarded ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Fifth field -->

                <h5 class="card-title mb-0">DEPENDENTS</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td> 
                                <span class="small">Relation
                                </span> 
                                 <br>1.
                                <br><?php echo $relation ?>
                            </td>
                            <td>
                                <span class="small">Name
                                </span> 

                                <br><?php echo $name ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Sixth field -->

                <h5 class="card-title mb-0">HIGHEST EDUCATIONAL ATTAINMENT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <span class="small">Course 
                                </span> 
                                <br>1.
                                <br><?php echo $course ?>
                            </td>
                            <td colspan="2">
                                <span class="small">School
                                </span> 
                                <br><?php echo $course_school ?>

                            </td>
                            <td>
                                <span class="small">Date Graduated
                                </span> 
                                <br><?php echo $course_date_graduated ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Seventh field -->

                <h5 class="card-title mb-0">CAD/OJT/ADT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <span class="small">Unit 
                                </span> 
                                <br>1.
                                <br><?php echo $unit_cad ?>
                        </td>
                            <td colspan="2">
                                <span class="small">Purpose / Authority
                                </span> 
                                <br><?php echo $unit_authority ?>

                            </td>
                            <td>
                                <span class="small">Date Start
                                </span> 
                                <br><?php echo $unit_date_started ?>

                            </td>
                            <td>
                                <span class="small">Date End
                                </span> 
                                <br><?php echo $unit_date_end ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Eight field -->

                <h5 class="card-title mb-0">UNIT ASSIGNMENT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <span class="small">Unit
                                </span> 
                                <br><?php echo $unit_assignment ?>

                            </td>
                            <td colspan="2">
                                <span class="small">Authority
                                </span> 
                                <br><?php echo $assign_authority ?>

                            </td>
                            <td>
                                <span class="small">Date From
                                </span> 
                                <br><?php echo $assign_date_from ?>

                            </td>
                            <td>
                                <span class="small">Date To
                                </span> 
                                <br><?php echo $assign_date_to ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Nineth field -->

                <h5 class="card-title mb-0">DESIGNATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <span class="small">Position
                                </span> 
                                <br>1.
                                <br><?php echo $position ?>
                        </td>
                            <td colspan="2">
                                <span class="small">Authority
                                </span> 
                                <br><?php echo $pos_authority ?>

                            </td>
                            <td>
                                <span class="small">Date From
                                </span> 
                                <br><?php echo $pos_date_from ?>

                            </td>
                            <td>
                                <span class="small">Date To
                                </span> 
                                <br><?php echo $pos_date_to ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Tenth field -->

            </div>
            <?php include 'print_footer.php'?>
        </div>
    </div>
    </div>
</div>