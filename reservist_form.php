<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <h1 class="h3 mb-0 mt-2 text-center">PHILIPPINE ARMY</h1>
            <h1 class="h3 mb-3 text-center"><strong>RESERVIST INFORMATION DATA SHEET</strong></h1>
            <div class="card-header">
                <h5 class="card-title mb-0">RESERVIST PERSONNEL INFORMATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Rank
                                <br><strong><?php echo $rank ?></strong> 
                            </td>
                            <td colspan="3">Last Name
                                <br> <?php echo $lastname ?>
                            </td>
                            <td colspan="2">Firstname
                                <br> <?php echo $firstname ?>
                            </td>
                            <td colspan="3">Middle Name
                                <br><?php echo $middle_name ?>
                            </td>
                            <td colspan="2">AFPSN 
                                <br><?php echo $afpsn ?>
                            </td>
                            <td colspan="2">BrSVC 
                                <br><?php echo $brsvc ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">AFPOS / MOS
                                <br><?php echo $afpos_mos ?>
                            </td>
                            <td colspan="10">Source of Commission / Enlistment 
                                <br><?php echo $soc_enlistment ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Initial Rank 
                                <br><?php echo $initial_rank?>
                            </td>
                            <td colspan="2">Date of Comsn/Enlist 
                                <br><?php echo $date_of_comsn_enlist?>
                            </td>
                            <td colspan="2">Authority 
                                <br><?php echo $authority?>
                            </td>
                            <td colspan="4">Reservist Classification 
                                <br> <?php echo strtoupper($status)?> 
                            </td>
                            <td colspan="3">Mobilization Center
                                <br><?php echo $mobilization_center?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Designation 
                                <br><?php echo $designation?>
                            </td>
                            <td colspan="2">Squad / Team / Section
                                <br><?php echo $squad?>
                            </td>
                            <td>Platoon
                                <br><?php echo $platoon ?>
                            </td>
                            <td colspan="2">Company 
                                <br> High <?php echo $company ?>
                            </td>
                            <td colspan="5">Battalion / Brigade / Division
                                <br><?php echo $battalion?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Size of Combat Shoes
                                <br><?php echo $size_cs?>
                            </td>
                            <td>Size of Cap (cm)
                                <br><?php echo $size_cap?>
                            </td>
                            <td colspan="8">Size of BDA
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
                            <td colspan="2">Present Occupation
                                <br><?php echo $p_o ?>
                            </td>
                            <td colspan="3">Company Name & Address
                                <br><?php echo $company_name_address?>
                            </td>
                            <td colspan="2">Office Tel Nr
                                <br><?php echo $tel_no ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Home Address: Street/Barangay
                                <br><?php echo $home_address?>
                            </td>
                            <td colspan="2">Town/Town/City/Province/Zip Code
                                <br><?php echo $town ?>
                            </td>
                            <td colspan="2">Res. Tel. Nr
                                <br><?php echo $res_tel_no ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">Mobile Tel Nr
                                <br><?php echo $mobile_number ?>
                            </td>
                            <td colspan="1">Birthdate
                                <br><?php echo $birth_date?>
                            </td>
                            <td colspan="2">Birth Place (Municipality, Province)
                                <br><?php echo $birth_place?>
                            </td>
                            <td colspan="1">Age
                                <br><?php echo $age?>
                            </td>
                            <td colspan="1">Religion
                                <br><?php echo $religion?>
                            </td>
                            <td colspan="1">Blood Type
                                <br><?php echo $blood_type?>
                            </td>
                        </tr>
                        <tr>
                            <td>T.I.N.
                                <br><?php echo $tin ?>
                            </td>
                            <td>SSS Nr.
                                <br><?php echo $sss ?>
                            </td>
                            <td>PHILHEALTH Nr. 
                                <br><?php echo $philhealth?>
                            </td>
                            <td>Height: cm
                                <br><?php echo $height ?>
                            </td>
                            <td>Weight: kgs
                                <br><?php echo $weight ?>
                            </td>
                            <td>Marital Status
                                <br><?php echo $marital_status?>
                            </td>
                            <td>Sex
                                <br><?php echo $sex ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">FB Account:
                                <br><?php echo $fb_account?>
                            </td>
                            <td colspan="4">Email Address:
                                <br><?php echo $email ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Special Skills: 
                                <br><?php echo $special_skills ?>
                            </td>
                            <td colspan="4">Language/Dialect Spoken: 
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
                            <td>Rank
                                <br>1.
                                <br><?php echo $promo_rank?>
                            </td>
                            <td>Date of Rank
                                <br><?php echo $date_of_rank ?>

                            </td>
                            <td colspan="2">Authority
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
                            <td>Military Schooling
                                <br>1.
                                <br><?php echo $military_schooling?>
                            </td>
                            <td colspan="2">School

                                <br><?php echo $school ?>
                            </td>
                            <td>Date Graduated
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
                            <td>Awards/Decoration 
                                <br><?php echo $awards ?>

                            </td>
                            <td colspan="2">Authority
                                <br><?php echo $awards_authority?>

                            </td>
                            <td>Date Awarded
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
                            <td>Relation <br>1.
                                <br><?php echo $relation ?>
                            </td>
                            <td>Name

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
                            <td>Course <br>1.
                                <br><?php echo $course ?>
                            </td>
                            <td colspan="2">School
                                <br><?php echo $course_school ?>

                            </td>
                            <td>Date Graduated
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
                            <td>Unit <br>1.
                                <br><?php echo $unit_cad ?>
                        </td>
                            <td colspan="2">Purpose / Authority
                                <br><?php echo $unit_authority ?>

                            </td>
                            <td>Date Start
                                <br><?php echo $unit_date_started ?>

                            </td>
                            <td>Date End
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
                            <td>Unit
                                <br><?php echo $unit_assignment ?>

                            </td>
                            <td colspan="2">Authority
                                <br><?php echo $assign_authority ?>

                            </td>
                            <td>Date From
                                <br><?php echo $assign_date_from ?>

                            </td>
                            <td>Date To
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
                            <td>Position <br>1.
                                <br><?php echo $position ?>
                        </td>
                            <td colspan="2">Authority
                                <br><?php echo $pos_authority ?>

                            </td>
                            <td>Date From
                                <br><?php echo $pos_date_from ?>

                            </td>
                            <td>Date To
                                <br><?php echo $pos_date_to ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Tenth field -->

            </div>
        </div>
    </div>
</div>