<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <h1 class="h3 mb-0 mt-2 text-center">PHILIPPINE ARMY</h1>
            <h1 class="h3 mb-3 text-center"><strong>RESERVIST INFORMATION DATA SHEET</strong></h1>
            <form method="post" autocomplete="off">
            <div class="card-header">
                <h5 class="card-title mb-0">RESERVIST PERSONNEL INFORMATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Rank
                        <select class="form-control" id="rank" name="rank">
                                <option value="none">None</option>
                            <?php
                            $result = mysqli_query($conn, "select ranked, rank_name from ranks where status='active'") or die("Query School List is inncorrect........");
                            while (list($ranked, $rank_name) = mysqli_fetch_array($result)) {
                                if($rank_name == $rank){
                                    echo "<option value='$rank_name' selected>$rank_name</option>";
                                }
                                else {
                                    echo "<option value='$rank_name'>$rank_name</option>";
                                }
                            }
                            ?>
                        </select>
                                <!-- <br><?php echo $rank ?> -->
                            </td>
                            <td class="font_small" colspan="3">Last Name
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>" placeholder="Enter Lastname">
                            </td>
                            <td class="font_small" colspan="2">Firstname
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>" placeholder="Enter Firstname">
                            </td>
                            <td class="font_small">Middle Name
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name ?>" placeholder="Enter Middlename">
                            </td>
                            <td class="font_small">Extension Name
                                <input type="text" class="form-control" id="extname" name="extname" value="<?php echo $extname ?>" placeholder="Enter Extension Name">
                            </td>
                            <td class="font_small" colspan="2">AFPSN 
                                <input type="text" class="form-control" id="afpsn" name="afpsn" value="<?php echo $afpsn ?>" placeholder="Enter AFPSN">
                            </td>
                            <td class="font_small" colspan="2">BrSVC 
                                <input type="text" class="form-control" id="brsvc" name="brsvc" value="<?php echo $brsvc ?>" placeholder="Enter BrSVC">
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small" colspan="4">AFPOS / MOS
                                <select class="form-control" id="afpos" name="afpos">
                                <option value="INF">INF</option>
                                <option value="CAV">CAV</option>
                                <option value="FA">FA</option>
                                <option value="SC">SC</option>
                                <option value="QMS">QMS</option>
                                <option value="MI">MI</option>
                                <option value="AGS">AGS</option>
                                <option value="FS">FS</option>
                                <option value="RES">RES</option>
                                <option value="GC">GSC</option>
                                <option value="MNSA">MNSA</option>
                                </select>
                            </td>
                            <td class="font_small" colspan="8">Source of Commission / Enlistment 
                                <select class="form-control" id="soc_enlistment" name="soc_enlistment">
                                <option value="MNSA">MNSA</option>
                                <option value="ELECTED">ELECTED</option>
                                <option value="PRES APPOINTEE">PRES APPOINTEE</option>
                                <option value="DEGREE HOLDER">DEGREE HOLDER</option>
                                <option value="MS-43">MS-43</option>
                                <option value="POTC">POTC</option>
                                <option value="CBT COMMISSION">CBT COMMISSION</option>
                                <option value="EX-AFP">EX-AFP</option>
                                <option value="ROTC">ROTC</option>
                                <option value="CMT">CMT</option>
                                <option value="BCMT">BCMT</option>
                                <option value="SBCMT">SBCMT</option>
                                <option value="CAA (CAFGU)">CAA (CAFGU)</option>
                                <option value="MOT (PAARU)">MOT (PAARU)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small" colspan="2">Initial Rank 
                                <input type="text" class="form-control" id="initial_rank" name="initial_rank" value="<?php echo $initial_rank ?>" placeholder="Enter initial_rank">
                            </td>
                            <td class="font_small" colspan="2">Date of Comsn/Enlist 
                                <input type="date" class="form-control" id="date_of_comsn_enlist" name="date_of_comsn_enlist" value="<?php echo $date_of_comsn_enlist ?>" placeholder="Enter Date of Comsn/Enlist">
                            </td>
                            <td class="font_small" colspan="3">Authority 
                                <input type="text" class="form-control" id="authority" name="authority" value="<?php echo $authority ?>" placeholder="Enter authority">
                                 </td>
                            <td class="font_small" colspan="3">Reservist Classification 
                                <input type="text" class="form-control" id="status" name="status" value="<?php echo $status ?>" placeholder="Enter Status">
                            </td>
                            <td class="font_small">Mobilization Center
                                <input type="text" class="form-control" id="mobilization_center" name="mobilization_center" value="<?php echo $mobilization_center ?>" placeholder="Enter mobilization_center">
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small" colspan="2">Designation 
                                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $designation ?>" placeholder="Enter designation">
                            </td>
                            <td class="font_small" colspan="2">Squad / Team / Section
                                <input type="text" class="form-control" id="squad" name="squad" value="<?php echo $squad ?>" placeholder="Enter squad">
                            </td>
                            <td class="font_small">Platoon
                                <input type="text" class="form-control" id="platoon" name="platoon" value="<?php echo $platoon ?>" placeholder="Enter platoon">
                            </td>
                            <td class="font_small">Company
                                <input type="text" class="form-control" id="company" name="company" value="<?php echo $company ?>" placeholder="Enter company">
                            </td>
                            <td class="font_small" colspan="5">Battalion / Brigade / Division
                                <input type="text" class="form-control" id="battalion" name="battalion" value="<?php echo $battalion ?>" placeholder="Enter battalion">
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small" colspan="3">Size of Combat Shoes
                                <input type="number" class="form-control" id="size_cs" name="size_cs" value="<?php echo $size_cs ?>" placeholder="Enter size_cs">
                            </td>
                            <td class="font_small">Size of Cap (cm)
                                <input type="number" class="form-control" id="size_cap" name="size_cap" value="<?php echo $size_cap ?>" placeholder="Enter size_cap">
                            </td>
                            <td class="font_small" colspan="7">Size of BDA
                                <input type="number" class="form-control" id="size_bda" name="size_bda" value="<?php echo $size_bda ?>" placeholder="Enter size_bda">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of First field -->
                <h5 class="card-title mb-0">PERSONAL INFORMATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small" colspan="3">Present Occupation
                                <input type="text" class="form-control" id="p_o" name="p_o" value="<?php echo $p_o ?>" placeholder="Enter Personal Occupation ">
                            </td>
                            <td class="font_small" colspan="2">Company Name & Address
                                <input type="text" class="form-control" id="company_name_address" name="company_name_address" value="<?php echo $company_name_address?>" placeholder="Enter Company Name and Address">
                            </td>
                            <td class="font_small" colspan="2">Office Tel Nr
                                <input type="number" class="form-control" id="tel_no" name="tel_no" value="<?php echo $tel_no?>" placeholder="Enter Office Telephone Number">
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small" colspan="3">Home Address: Street/Barangay 
                                <input type="text" class="form-control" id="home_address" name="home_address" value="<?php echo $home_address?>" placeholder="Enter Home Address: Street/Baranggay">
                            </td>
                            <td class="font_small" colspan="2">Town/Town/City/Province/Zip Code
                                <input type="text" class="form-control" id="town" name="town" value="<?php echo $town?>" placeholder="Enter Town Address">
                            </td>
                            <td class="font_small" colspan="2">Res. Tel. Nr
                                <input type="number" class="form-control" id="res_tel_no" name="res_tel_no" value="<?php echo $res_tel_no?>" placeholder="Enter Resident Telephone Number">
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small" colspan="2">Mobile Tel Nr
                                <input type="number" class="form-control" id="mobile_number" name="mobile_number" pattern="[0-9]{11}" value="<?php echo $mobile_number?>" placeholder="Enter Mobile Number">
                            </td>
                            <td class="font_small" colspan="1">Birthdate 
                                <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo $birth_date?>" placeholder="Enter Birthdate">
                            </td>
                            <td class="font_small" colspan="1">Birth Place (Municipality, Province)
                                <input type="text" class="form-control" id="birth_place" name="birth_place" value="<?php echo $birth_place?>" placeholder="Enter Birth PLace">
                            </td>
                            <td class="font_small" colspan="1">Age
                                <input type="number" class="form-control" id="age" name="age" value="<?php echo $age?>" placeholder="Enter Age" disabled>
                                <input type="hidden" class="form-control" id="age" name="age" value="<?php echo $age?>">
                            </td>
                            <td class="font_small" colspan="1">Religion
                                <input type="text" class="form-control" id="religion" name="religion" value="<?php echo $religion?>" placeholder="Enter Religion">
                            </td>
                            <td class="font_small" colspan="1">Blood Type
                                <input type="text" class="form-control" id="blood_type" name="blood_type" value="<?php echo $blood_type?>" placeholder="Enter Blood Type">
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small">T.I.N.
                                <input type="number" class="form-control" id="tin" name="tin" value="<?php echo $tin?>" placeholder="Enter T.I.N.">

                            </td>
                            <td class="font_small">SSS Nr.
                                <input type="number" class="form-control" id="sss" name="sss" value="<?php echo $sss?>" placeholder="Enter SSS Number">
                            </td>
                            <td class="font_small">PHILHEALTH Nr.
                                <input type="number" class="form-control" id="philhealth" name="philhealth" value="<?php echo $philhealth?>" placeholder="Enter Philhealth Number">
                            </td>
                            <td class="font_small">Height: cm
                                <input type="number" class="form-control" id="height" name="height" value="<?php echo $height?>" placeholder="Enter Height">
                            </td>
                            <td class="font_small">Weight: kgs
                                <input type="number" class="form-control" id="weight" name="weight" value="<?php echo $weight?>" placeholder="Enter Weight">
                            </td>
                            <td class="font_small">Marital Status
                                <input type="text" class="form-control" id="marital_status" name="marital_status" value="<?php echo $marital_status?>" placeholder="Enter Marital Status">
                            </td>
                            <td class="font_small">Sex
                                <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $sex?>" placeholder="Enter Sex">
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small" colspan="3">FB Account:
                                <input type="text" class="form-control" id="fb_account" name="fb_account" value="<?php echo $fb_account?>" placeholder="Enter FB: Account">
                            </td>
                            <td class="font_small" colspan="4">Email Address:
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>" placeholder="Enter Email Address">
                            </td>
                        </tr>
                        <tr>
                            <td class="font_small" colspan="3">Special Skills:
                                <input type="text" class="form-control" id="special_skills" name="special_skills" value="<?php echo $special_skills?>" placeholder="Enter Special Skills">
                            </td>
                            <td class="font_small" colspan="4">Language/Dialect Spoken:
                                <input type="text" class="form-control" id="language" name="language" value="<?php echo $language?>" placeholder="Enter Language">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Second field -->
                <h5 class="card-title mb-0">PROMOTION / DEMOTION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Rank
                                <br>1.
                                <input type="text" class="form-control" id="promo_rank" name="promo_rank" value="<?php echo $promo_rank?>" placeholder="Enter Rank">
                            </td>
                            <td class="font_small">Date of Rank
                                <input type="date" class="form-control" id="date_of_rank" name="date_of_rank" value="<?php echo $date_of_rank?>" placeholder="Enter Date of Rank">
                            </td>
                            <td class="font_small" colspan="2">Authority
                                <input type="text" class="form-control" id="rank_authority" name="rank_authority" value="<?php echo $rank_authority?>" placeholder="Enter Authority">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Third field -->

                <h5 class="card-title mb-0">MILITARY TRAINING/SEMINAR/SCHOOLING</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Military Schooling
                                <br>1.
                                <input type="text" class="form-control" id="military_schooling" name="military_schooling" value="<?php echo $military_schooling?>" placeholder="Enter Military Schooling">
                            </td>
                            <td class="font_small" colspan="2">School
                                <input type="text" class="form-control" id="school" name="school" value="<?php echo $school?>" placeholder="Enter School">
                            </td>
                            <td class="font_small">Date Graduated
                                <input type="date" class="form-control" id="school_date_graduated" name="school_date_graduated" value="<?php echo $school_date_graduated?>" placeholder="Enter Date Graduated">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Fourth field -->

                <h5 class="card-title mb-0">AWARDS AND DECORATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Awards/Decoration 
                                <input type="text" class="form-control" id="awards" name="awards" value="<?php echo $awards?>" placeholder="Enter Awards">
                            </td>
                            <td class="font_small" colspan="2">Authority
                                <input type="text" class="form-control" id="awards_authority" name="awards_authority" value="<?php echo $awards_authority?>" placeholder="Enter Authority">
                            </td>
                            <td class="font_small">Date Awarded
                                <input type="date" class="form-control" id="date_awarded" name="date_awarded" value="<?php echo $date_awarded?>" placeholder="Enter Date Awarded">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Fifth field -->

                <h5 class="card-title mb-0">DEPENDENTS</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Relation <br>1.
                                <input type="text" class="form-control" id="relation" name="relation" value="<?php echo $relation?>" placeholder="Enter Relation">
                        </td>
                            <td class="font_small">Name
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>" placeholder="Enter Name">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Sixth field -->

                <h5 class="card-title mb-0">HIGHEST EDUCATIONAL ATTAINMENT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Course <br>1.
                                <input type="text" class="form-control" id="course" name="course" value="<?php echo $course?>" placeholder="Enter Course">
                        </td>
                            <td class="font_small" colspan="2">School
                                <input type="text" class="form-control" id="course_school" name="course_school" value="<?php echo $course_school?>" placeholder="Enter School">
                            </td>
                            <td class="font_small">Date Graduated
                                <input type="date" class="form-control" id="course_date_graduated" name="course_date_graduated" value="<?php echo $course_date_graduated?>" placeholder="Enter Date Graduated">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Seventh field -->

                <h5 class="card-title mb-0">CAD/OJT/ADT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Unit <br>1.
                                <input type="text" class="form-control" id="unit_cad" name="unit_cad" value="<?php echo $unit_cad?>" placeholder="Enter Unit">
                        </td>
                            <td class="font_small" colspan="2">Purpose / Authority
                                <input type="text" class="form-control" id="unit_authority" name="unit_authority" value="<?php echo $unit_authority?>" placeholder="Enter Purpose / Authority">
                        </td>
                            <td class="font_small">Date Start
                                <input type="date" class="form-control" id="unit_date_started" name="unit_date_started" value="<?php echo $unit_date_started?>" placeholder="Enter Date Started">
                        </td>
                            <td class="font_small">Date End
                                <input type="date" class="form-control" id="unit_date_end" name="unit_date_end" value="<?php echo $unit_date_end?>" placeholder="Enter Date End">
                        </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Eight field -->

                <h5 class="card-title mb-0">UNIT ASSIGNMENT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Unit
                                <input type="text" class="form-control" id="unit_assignment" name="unit_assignment" value="<?php echo $unit_assignment?>" placeholder="Enter Unit">
                        </td>
                            <td class="font_small" colspan="2">Authority
                                <input type="text" class="form-control" id="assign_authority" name="assign_authority" value="<?php echo $assign_authority?>" placeholder="Enter Authority">
                        </td>
                            <td class="font_small">Date From
                                <input type="date" class="form-control" id="assign_date_from" name="assign_date_from" value="<?php echo $assign_date_from?>" placeholder="Enter Date From">
                        </td>
                            <td class="font_small">Date To
                                <input type="date" class="form-control" id="assign_date_to" name="assign_date_to" value="<?php echo $assign_date_to ?>" placeholder="Enter Date To">
                        </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Nineth field -->

                <h5 class="card-title mb-0">DESIGNATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="font_small">Position <br>1.
                                <input type="text" class="form-control" id="position" name="position" value="<?php echo $position?>" placeholder="Enter Position">
                        </td>
                            <td class="font_small" colspan="2">Authority
                                <input type="text" class="form-control" id="pos_authority" name="pos_authority" value="<?php echo $pos_authority?>" placeholder="Enter Authority">
                        </td>
                            <td class="font_small">Date From
                                <input type="date" class="form-control" id="pos_date_from" name="pos_date_from" value="<?php echo $pos_date_from?>" placeholder="Enter Date From">
                        </td>
                            <td class="font_small">Date To
                                <input type="date" class="form-control" id="pos_date_to" name="pos_date_to" value="<?php echo $pos_date_to?>" placeholder="Enter Date To">
                        </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Tenth field -->

                    <div class="row">
                      <div class="col-6">
                        <a href="admin_rids_view.php?ID=<?php echo $user_id?>" class="btn btn-md btn-outline-warning" style="float:left">Cancel</a>
                      </div>
                      <div class="col-6">
                        <button type="submit" name="rids_update" class="btn btn-md btn-outline-success m-2 mb-3" style="float:right">Update</button>
                      </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>