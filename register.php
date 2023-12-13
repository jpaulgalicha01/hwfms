<?php
include 'includes/autoload.inc.php';
include 'includes/header.php';
?>
<main>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-5">
                <a href="index.php">
                    <img src="images/hwfms-logo.png" width="80" height="80" class="position-absolute top-0 start-50 translate-middle-x mt-5" style="z-index:1">
                </a>
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION['message'])){
                                ?>
                                    <div class="alert alert-<?= $_SESSION['message_color']?> alert-dismissible fade show mb-2 pb-2" role="alert">
                                      <p><?= $_SESSION['message']?></p>
                                    </div>
                                <?php
                                unset($_SESSION['message']);    
                            }
                        ?>
                        <form action="inputConfig.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="function" value="create_user">
                            <h5>Personal Information <span class="text-danger">*</span></h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="acc_lname" type="text" placeholder="Enter your first name" required />
                                        <label for="inputFirstName">Last name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="acc_fname" type="text" placeholder="Enter your first name" required />
                                        <label for="inputFirstName">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputLastName" name="acc_mname" type="text" placeholder="Enter your last name"  required />
                                        <label for="inputLastName">Middle name</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputBirthDate" name="acc_birth" type="date" placeholder="Enter your Birthdate" required />
                                        <label for="inputBirthDate">Birthdate</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputBirthplace" name="acc_birth_place" type="text" placeholder="Enter your birth place" required />
                                        <label for="inputBirthplace">Birth Place</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="selectMartialStatus" name="acc_martial_status" required>
                                            <option disabled selected value="">---Please Select</option>
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Divorce</option>
                                            <option>Widowed</option>
                                        </select>
                                        <label for="selectMartialStatus">Martial Status</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="acc_religion" class="form-control" id="inputReligion" placeholder="Enter your religion" required />
                                        <label for="inputReligion">Religion</label>
                                    </div>
                                </div>
                            </div>
                            <i class="fs-6"><u>Residence Address</u></i>
                            <div class="row mb-3 pt-2">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputStreet" name="acc_complete_add" type="text" placeholder="Enter your first name" required />
                                        <label for="inputStreet">House No. / Purok / Street</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select class="form-select" id="selectBrgy" name="acc_brgy" required />
                                            <option selected disabled value="">---Please Select---</option>
                                            <?php
                                                $fetch_brgy = new fetch();
                                                $res_fetch_brgy = $fetch_brgy->fetchBrgy();
                                                
                                                if($res_fetch_brgy->rowCount()){
                                                    while ($fetch_res = $res_fetch_brgy->fetch()) {
                                                        ?>
                                                            <option><?= $fetch_res['brgy_name']?></option>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                        <option disabled value="" selected>No Data Found</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <label for="selectBrgy">Barangay</label>
                                    </div>
                                </div>
                            </div>
                            <i class="fs-6"><u>Educational Attainment</u></i>
                            <div class="form-floating mb-3 pt-2">
                                <select class="form-select" id="selectEducationHighest" name="acc_education_highest" required>
                                    <option selected disabled value="">---Please Select---</option>
                                    <option>12th Grade or less</option>
                                    <option>Graduate high school or equivalent</option>
                                    <option>Some college, no degree</option>
                                    <option>Associate degree</option>
                                    <option>Bachelor's degree</option>
                                    <option>Post-graduate degree</option>
                                </select>
                                <label for="selectEducationHighest">Education (highest degree completed)</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEducation" type="text" name="acc_education" placeholder="Enter Highest Educational Attainment" required />
                                <label for="inputEducation">What is the name of latest school that you have completed?</label>
                            </div>

                            <i class="fs-6"><u>Occupation</u></i>
                            <div class="row  mb-3 pt-2">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="acc_eco_status" name="acc_eco_status" required>
                                            <option selected disabled value="">---Please Select---</option>
                                            <option>Employed</option>
                                            <option>Unemployed</option>
                                            <option>Others</option>
                                        </select>
                                        <label for="acc_eco_status">Economics Status</label>
                                    </div>
                                </div>
                                 
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="acc_eco_status_others" class="form-control" id="inputOccupation" placeholder="Enter your occputation" required/>
                                        <label for="inputOccupation"><small>If you not select others answer "N/A"</small></label>
                                    </div>
                                </div>
                            </div>

                            <i class="fs-6"><u>Contact Details</u></i>
                            <div class="row  mb-3 pt-2">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="acc_contact" class="form-control" id="inputContact" placeholder="Enter your contact number" required />
                                        <label for="inputContact">Contact Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="acc_email" id="inputEmail" type="email" placeholder="name@example.com" required />
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                </div>
                            </div>

                            <i class="fs-6"><u>Profile Image</u></i>
                            <div class="row mb-2 pt-2">
                                <div class="mb-md-0">
                                    <input type="file" name="acc_profile" class="form-control" accept=".png, .jpeg, .jpg">
                                </div>
                            </div>

                            <h5 class="pt-4">Login Creadentials <span class="text-danger">*</span></h5>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="acc_uname" id="inputUsername" type="text" placeholder="username" required />
                                <label for="inputUsername">Username</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="acc_pass" id="inputPassword" type="password" placeholder="Create a password" required />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" required />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <span id="message"></span>
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="showPassword" type="checkbox"/>
                                <label class="form-check-label" for="showPassword">Show Password</label>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block"  name="create_user" id="create_acc" disabled>Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="index.php" class="text-dark">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    // Confirm Pass
    $("#inputPassword, #inputPasswordConfirm").on('keyup', function () {
        if ($("#inputPassword").val() == "" && $("#inputPasswordConfirm").val() == "") {
            $("#message").html("").css('color', 'green');
        } else if ($("#inputPassword").val() === $("#inputPasswordConfirm").val()) {
            $("#message").html("");
            document.getElementById('create_acc').disabled = false;
        } else {
            $("#message").html("Password Not Match").css('color', 'red');
            document.getElementById('create_acc').disabled = true;
        }
    });
    function showPassword(){
        if(this.checked){
        // alert("check");
        document.getElementById('inputPassword').setAttribute('type','text');
        document.getElementById('inputPasswordConfirm').setAttribute('type','text');
        }
        else{
        // alert("ubcheck");
        document.getElementById('inputPassword').setAttribute('type','password');
        document.getElementById('inputPasswordConfirm').setAttribute('type','password');
        }
    }
    document.getElementById('showPassword').addEventListener('click' , showPassword);

</script>
<?php
include 'includes/footer.php';
?>
