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
                            <td style="width: 15%">Rank
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
                            <td colspan="3">Last Name
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>" placeholder="Enter Lastname">
                            </td>
                            <td colspan="2">Firstname
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>" placeholder="Enter Firstname">
                            </td>
                            <td colspan="2">Middle Name
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name ?>" placeholder="Enter Middlename">
                            </td>
                            <td colspan="2">AFPSN 
                                <input type="text" class="form-control" id="afpsn" name="afpsn" value="<?php echo $afpsn ?>" placeholder="Enter AFPSN">
                            </td>
                            <td colspan="2">BrSVC 
                                <input type="text" class="form-control" id="brsvc" name="brsvc" value="<?php echo $brsvc ?>" placeholder="Enter BrSVC">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">AFPOS / MOS
                                <select class="form-control" id="apos" name="afpos">
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
                            <td>
                            </td>
                            <td colspan="8">Source of Commission / Enlistment 
                                <select class="form-control" id="soc_enlistment" name="soc_enlistment">
                                <option value="MNSA">MNSA</option>
                                <option value="ELECTED">ELECTED</option>
                                <option value="PRES APPOINTEE">PRES APPOINTEE</option>
                                <!-- <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option> -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Initial Rank 
                                <input type="text" class="form-control" id="initial_rank" name="intital_rank" value="<?php echo $initial_rank ?>" placeholder="Enter intital_rank">
                            </td>
                            <td colspan="2">Date of Comsn/Enlist 
                                <input type="text" class="form-control" id="date_of_comsc_enlist" name="date_of_comsc_enlist" value="<?php echo $date_of_comsn_enlist ?>" placeholder="Enter date_of_comsc_enlist">
                            </td>
                            <td colspan="3">Authority 
                                <input type="text" class="form-control" id="authority" name="authority" value="<?php echo $authority ?>" placeholder="Enter authority">
                                 </td>
                            <td colspan="3">Reservist Classification 
                                <input type="text" class="form-control" id="status" name="status" value="<?php echo $status ?>" placeholder="Enter Status">
                            </td>
                            <td>Mobilization Center
                                <input type="text" class="form-control" id="mobilization_center" name="mobilization_center" value="<?php echo $mobilization_center ?>" placeholder="Enter mobilization_center">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Designation </td>
                            <td colspan="2">Squad / Team / Section</td>
                            <td>Platoon</td>
                            <td>Company</td>
                            <td colspan="5">Battalion / Brigade / Division</td>
                        </tr>
                        <tr>
                            <td colspan="3">Size of Combat Shoes</td>
                            <td>Size of Cap (cm)</td>
                            <td colspan="7">Size of BDA</td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of First field -->
                <h5 class="card-title mb-0">PERSONAL INFORMATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="3">Present Occupation</td>
                            <td colspan="2">Company Name & Address</td>
                            <td colspan="2">Office Tel Nr</td>
                        </tr>
                        <tr>
                            <td colspan="3">Home Address: Street/Barangay</td>
                            <td colspan="2">Town/Town/City/Province/Zip Code</td>
                            <td colspan="2">Res. Tel. Nr</td>
                        </tr>
                        <tr>
                            <td colspan="1">Mobile Tel Nr</td>
                            <td colspan="1">Birthdate</td>
                            <td colspan="2">Birth Place (Municipality, Province)</td>
                            <td colspan="1">Age</td>
                            <td colspan="1">Religion</td>
                            <td colspan="1">Blood Type</td>
                        </tr>
                        <tr>
                            <td>T.I.N.</td>
                            <td>SSS Nr.</td>
                            <td>PHILHEALTH Nr.</td>
                            <td>Height: cm</td>
                            <td>Weight: kgs</td>
                            <td>Marital Status</td>
                            <td>Sex</td>
                        </tr>
                        <tr>
                            <td colspan="3">FB Account:</td>
                            <td colspan="4">Email Address:</td>
                        </tr>
                        <tr>
                            <td colspan="3">Special Skills:</td>
                            <td colspan="4">Language/Dialect Spoken:</td>
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
                            </td>
                            <td>Date of Rank</td>
                            <td colspan="2">Authority</td>
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
                            </td>
                            <td colspan="2">School</td>
                            <td>Date Graduated</td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Fourth field -->

                <h5 class="card-title mb-0">AWARDS AND DECORATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Awards/Decoration </td>
                            <td colspan="2">Authority</td>
                            <td>Date Awarded</td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Fifth field -->

                <h5 class="card-title mb-0">DEPENDENTS</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Relation <br>1.</td>
                            <td>Name</td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Sixth field -->

                <h5 class="card-title mb-0">HIGHEST EDUCATIONAL ATTAINMENT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Course <br>1.</td>
                            <td colspan="2">School</td>
                            <td>Date Graduated</td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Seventh field -->

                <h5 class="card-title mb-0">CAD/OJT/ADT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Unit <br>1.</td>
                            <td colspan="2">Purpose / Authority</td>
                            <td>Date Start</td>
                            <td>Date End</td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Eight field -->

                <h5 class="card-title mb-0">UNIT ASSIGNMENT</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Unit</td>
                            <td colspan="2">Authority</td>
                            <td>Date From</td>
                            <td>Date To</td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Nineth field -->

                <h5 class="card-title mb-0">DESIGNATION</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Position <br>1.</td>
                            <td colspan="2">Authority</td>
                            <td>Date From</td>
                            <td>Date To</td>
                        </tr>
                    </tbody>
                </table>
                <!-- End of Tenth field -->

            </div>
        </div>
    </div>
</div>