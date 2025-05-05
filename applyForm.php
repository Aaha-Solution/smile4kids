<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['lan']) && $_GET['course']) {
    $_SESSION['classid'] = $_GET['lan'];
    $_SESSION['courseName'] = $_GET['courseName'];
    $_SESSION['courseId'] = $_GET['course'];
    $_SESSION['courseId'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- datapicker -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- css link -->
    <link rel="stylesheet" href="applyformstyle/style.css">
    <title>Smile 4 kids </title>
</head>
<style>
    .box_shad {
        background-color: rgb(255, 255, 255);
        box-shadow: black 2px 2px 10px 1px;
        border: none;
        background-position: center;
        background-size: cover;
        overflow-x: hidden;
    }

    .comple-term-select-con input,
    .childCategory input {
        display: none;
    }

    .comple-term-select-con label,
    .childCategory label {
        background-color: #d0f1f5;
        border-radius: 15px;
        padding: 5px;
        font-size: 15px;
    }

    .comple-term-select-con input:checked+label,
    .childCategory input:checked+label {
        background-color: #0d5a63;
        color: white;
        transition: .5s;
    }

    .form_error span {
        color: #D83D5A;
    }

    .form_error input {
        border: 1px solid #D83D5A;
    }

    /*Styling in case no errors on form*/
    .form_success span {
        color: green;
    }

    .form_success input {
        border: 1px solid green;
    }

    #error_msg {
        color: red;
        text-align: left;
        margin: 10px auto;
    }

    .loading {
        background-color: rgb(13, 98, 99, .4);
        z-index: 1000;
        min-height: 100vh;
        width: 100%;
    }

    .loading img {
        border-radius: 50%;
        max-width: 50%;
    }
</style>

<body>
    <div class="position-fixed loading d-none justify-content-center align-items-center">
        <img src="./assets/load1.gif" class="user-select-none">
    </div>
    <div class="form_bg_container">
        <div class="container-fluid form_container pt-5">
            <div class="card box_shad p-3 d-flex position-relative justify-content-center">
                <form class="needs-validation" id="formdata" autocomplete="on" novalidate name="applyForm" method="POST" action="formAction.php">
                    <!-- Student Details -->
                    <input type="hidden" id="" name="classid" value=<?php print_r($_SESSION['classid']); ?>>
                    <div class="form_tab form_tab_active">
                        <div class="h3 fw-bold mb-3"><?php echo $_SESSION['classid'] . "/" . $_GET['courseName'] ?></div>
                        <div class="h4 fw-bold">Student Details</div>
                        <div class="row g-3">
                            <div class="col-md">
                                <label for="FirstName" class="form-label h5 fw-bold" name="fName">First name</label>
                                <input type="text" name="fname" class="form-control shadow-none" placeholder="Enter First Name" id="FirstName" pattern="\S(.*\S)? ||[a-zA-Z]+" required>
                                <small class="invalid-feedback">
                                    please enter correct firstname
                                </small>
                            </div>
                            <div class="col-md ">
                                <label for="SurName" class="form-label h5 fw-bold" name="Surname">Surname</label>
                                <input type="text" name="surname" class="form-control shadow-none" id="SurName" placeholder="Enter Surname" pattern="\S(.*\S)? ||[a-zA-Z]+" required>
                                <small class="invalid-feedback">
                                    please enter correct surname.
                                </small>
                            </div>
                        </div>
<?php if($_SESSION['classid'] != 'Spanish'){ ?>
                        <div class="row mt-3">
                            <div class="col">
                                <label class="form-label h5 fw-bold">Are you</label> <br>
                                <div class="d-flex flex-wrap">
                                    <div><input type="radio" id="newStu" name="users_type" class="studentType" value="NewStudent" checked>
                                        <label for="newStu" class="form-label user-select-none me-2 cursorPointer fw-bold fs-5">New student</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="existing" name="users_type" class="studentType" value="ExistingStudent">
                                        <label for="existing" class="form-label user-select-none me-2 cursorPointer fw-bold fs-5">Existing student</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="selectTrems">
                            <!-- exiting student term  select container -->
                        </div>
                        <?php } else { ?>
                        <div class="row mt-3 d-none">
                            <div class="col">
                                <label class="form-label h5 fw-bold">Are you</label> <br>
                                <div class="d-flex flex-wrap">
                                    <div><input type="radio" id="newStu" name="users_type" class="studentType" value="NewStudent" checked>
                                        <label for="newStu" class="form-label user-select-none me-2 cursorPointer fw-bold fs-5">New student</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="existing" name="users_type" class="studentType" value="ExistingStudent">
                                        <label for="existing" class="form-label user-select-none me-2 cursorPointer fw-bold fs-5">Existing student</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="DOB">
                            <!-- student dob select container -->
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="dateOfBirth" class="form-label h5 fw-bold" name="Date of Birth">Date of
                                        Birth</label>
                                    <input type="text" name="dob" class="form-control datepicker shadow-none" id="dateOfBirth" pattern="^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$" aria-describedby="inputGroupPrepend" autocomplete="off" required>
                                    <small class="invalid-feedback">
                                        please pick your date of birth.
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php if ($_SESSION['courseId'] != 'Adults') { ?>
                            <div class="form-label h5 fw-bold mt-3">Select Child Category </div>
                            <div class="d-flex flex-wrap childCategory">
                                <div class="pe-3">
                                    <input class="radio" type="radio" name="price" id="firstChild" value="First Child" checked required>
                                    <label class="user-select-none fw-bold px-2 form-label" for="firstChild">
                                        First Child
                                    </label>
                                </div>
                                <div class="pe-3">
                                    <input class="radio" type="radio" name="price" id="secondChild" value="Second Child" required>
                                    <label class="user-select-none fw-bold px-2 form-label" for="secondChild">
                                        Second Child
                                    </label>
                                </div>
                                <?php if ($_SESSION['courseId'] == 'Teen') { ?>
                                <div class="pe-3">
                                    <input class="radio" type="radio" name="price" id="dofe" value="DofE">
                                    <label class="user-select-none fw-bold px-2 form-label" for="dofe">
                                        D OF E
                                    </label>
                                </div>
                                <?php } ?>
                            </div>
                            <hr>
                        <?php } else if ($_SESSION['courseId'] = 'Adults') { ?>
                            <div class="form-label h5 fw-bold mt-3">Select Child Category </div>
                            <div class="d-flex flex-wrap childCategory">
                                <div class="pe-3">
                                    <input class="radio" type="radio" name="price" id="adult" value="Adult" checked>
                                    <label class="user-select-none fw-bold px-2 form-label" for="adult">
                                        Adult
                                    </label>
                                </div>
                                <div class="pe-3">
                                    <input class="radio" type="radio" name="price" id="dofe" value="DofE">
                                    <label class="user-select-none fw-bold px-2 form-label" for="dofe">
                                        D OF E
                                    </label>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>
                        <div class="row mt-3">
                            <div class="col">
                                <label class="form-label h5 fw-bold">Gender</label> <br>
                                <input type="radio" id="male" name="gender" value="male" checked>
                                <label for="male" class="form-label user-select-none me-2 cursorPointer fw-bold fs-5">Male</label>

                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female" class="form-label user-select-none me-2 cursorPointer fw-bold fs-5">Female</label>
                            </div>
                        </div>


                        <div class="mt-3 nextPrevBtn">
                            <button class="btn btn-primary shadow-none nextButton1" type="button">Next</button>
                        </div>

                    </div>

                    <!-- 1st Parent's Details -->
                    <div class="form_tab">
                        <div class="h3 fw-bold mb-3"><?php echo $_SESSION['classid'] . "/" . $_GET['courseName']; ?></div>
                        <?php if ($_SESSION['courseId'] != 'Adults') { ?>
                            <div class="h3 fw-bold">Parent Details</div>
                            <div class="row g-3">
                                <div class="col-md">
                                    <label for="parentFirstName" class="form-label h5 fw-bold">First name</label>
                                    <input type="text" name="parentfirstname" class="form-control shadow-none" placeholder="Enter First Name" id="parentFirstName" pattern="\S(.*\S)? ||[a-zA-Z]+" required>
                                    <small class="invalid-feedback">
                                        please enter correct firstname.
                                    </small>
                                </div>
                                <div class="col-md">
                                    <label for="parentSurName" class="form-label h5 fw-bold">Surname</label>
                                    <input type="text" name="parentsurname" class="form-control shadow-none" id="parentSurName" pattern="\S(.*\S)? ||[a-zA-Z]+" placeholder="Enter Surname" required>
                                    <small class="invalid-feedback">
                                        please enter correct surname.
                                    </small>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="parentAdderss" class="h5 fw-bold">Address</label>
                                <textarea class="form-control shadow-none" name="address" id="parentAdderss" rows="3" placeholder="Enter your recent Address" minlength = "12" pattern=".*\S+.*" required></textarea>
                                <small class="invalid-feedback">
                                    please enter your recent address.
                                </small>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="Email" class="form-label h5 fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control shadow-none" id="email" placeholder="Enter Email" pattern="\S(.*\S)?" required>
                                <small class="invalid-feedback">
                                    please enter correct email.
                                </small>
                                <span class="fs-6"></span>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col">
                                <label for="phoneNumber" class="form-label h5 fw-bold">Phone Number</label>
                                <input type="text" name="phone" class="form-control shadow-none" minlength="10" maxlength="11" pattern="^(?:\d{11}|\d{10})$" id="phoneNumber" placeholder="Enter phone Number" required>
                                <small class="invalid-feedback">
                                    please enter your phone number.
                                </small>
                            </div>
                        </div>
                        <div class="mt-3 nextPrevBtn justify-content-between ">
                            <button class="btn btn-primary shadow-none priviousbtn1" type="button">Previous</button>
                            <button class="btn btn-primary shadow-none nextButton2" type="button">Next</button>
                        </div>
                    </div>

                    <!-- Data Protection & Terms and Conditions -->
                    <div class="form_tab">
                        <div class="h3 fw-bold">
                            Data Protection & Terms and Conditions
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">I hereby consent to protect all the course materials and intellectual properties obtained
                                or
                                acquired by my child as a result of subscribing the course/s under Smile 4 Kids Ltd.
                            </p>
                            <input type="checkbox" id="termsAndCondition1" checked name="dataprotectioncondition1" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition1" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">I shall not in case reproduce and /or distribute, allow reproduction and /or distribution
                                of
                                any such course material by any third party including but not limited to any of my
                                family
                                members for commercial or non-commercial purpose. Course materials are being provided to
                                my
                                child who had subscribed the course with Smile 4 Kids ltd and shall at all times be used
                                solely by my child only.
                            </p>
                            <input type="checkbox" id="termsAndCondition2" checked name="dataprotectioncondition2" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition2" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">I understand that selling, commercial copying, hiring or lending of course materials are
                                strictly prohibited. I consent to indemnify Smile 4 Kids ltd for any losses or damages
                                resulting out of my failure to protect the course materials as mentioned above with my
                                best
                                endeavours.
                            </p>
                            <input type="checkbox" id="termsAndCondition3" checked name="dataprotectioncondition3" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition3" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">I will endeavour to speak <?php echo $_SESSION['classid']; ?> to my child as part of their homework.</p>
                            <input type="checkbox" id="termsAndCondition4" checked name="dataprotectioncondition4" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition4" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">Smile 4 Kids will presume that the parents/other party has read and consented to all the
                                terms and clauses in the agreement and NDA should they prefer not to return a signed
                                copy of
                                such documents and the student attends a class. </p>
                            <input type="checkbox" id="termsAndCondition5" checked name="dataprotectioncondition5" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition5" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">I undertake that my child is under parental/guardian supervision, at all times, during
                                the
                                length of the class. I agree not to hold Smile 4 Kids responsible, for being unable to
                                supervise my child individually. </p>
                            <input type="checkbox" id="termsAndCondition6" checked name="dataprotectioncondition6" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition6" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mt-3 nextPrevBtn justify-content-between">
                            <button class="btn btn-primary shadow-none priviousbtn2" type="button">Previous</button>
                            <button class="btn btn-primary shadow-none nextButton3" type="button">Next</button>
                        </div>

                    </div>
                    <!-- Data Protection & Terms and Conditions -->
                    <div class="form_tab">
                        <div class="h3 fw-bold">
                            Data Protection & Terms and Conditions
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">I undertake that my child is under parental/guardian supervision, at all times, during
                                the
                                length of the class. I agree not to hold Smile 4 Kids responsible, for being unable to
                                supervise my child individually.
                            </p>
                            <input type="checkbox" id="termsAndCondition7" checked name="dataprotectioncondition7" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition7" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">By enrolling my child onto a SMILE 4 KIDS course, I agree that I have read and will be
                                bound
                                by all the terms and conditions and policies, on the SMILE 4 kids website. </p>
                            <input type="checkbox" id="termsAndCondition8" checked name="dataprotectioncondition8" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition8" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">I understand that termly fees once paid are non-refundable.</p>
                            <input type="checkbox" id="termsAndCondition9" checked name="dataprotectioncondition9" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition9" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">I consent to occasional classes being recorded for staff training purposes only. I accept
                                that I will have the right to decline or permit use of any footage of my child, when
                                asked,
                                (for use on SMILE 4 KIDS website or social media), prior to use. </p>
                            <input type="radio" id="yes" value="yes" checked class="cursorPointer" name="yesorno" required><label for="yes" class="ps-2 user-select-none cursorPointer fw-bold fs-5">Yes</label> <br>
                            <input type="radio" id="no" value="no" class="cursorPointer" name="yesorno" required><label for="no" class="ps-2 user-select-none cursorPointer fw-bold fs-5">No</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>


                        <div class="mt-3 nextPrevBtn justify-content-between">
                            <button class="btn btn-primary shadow-none priviousbtn3" type="button">Previous</button>
                            <button class="btn btn-primary shadow-none nextButton4" type="button">Next</button>
                        </div>
                    </div>


                    <!-- Data Protection & Terms and Conditions -->
                    <div class="form_tab last_tab">
                        <div class="h3 fw-bold">
                            Data Protection & Terms and Conditions
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">I agree to reading all policies on SMILE 4 kids website including Health/safety,
                                Safeguarding, Online Safety T’s and C’s and Privacy Policy.
                            </p>
                            <input type="checkbox" id="termsAndCondition10" checked name="dataprotectioncondition10" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition10" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">I accept that no refund or partial refund will be given if a student leaves, part term.
                            </p>
                            <input type="checkbox" id="termsAndCondition11" checked name="dataprotectioncondition11" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition11" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">I accept that any missed classes cannot be replaced/accommodated, on alternative dates.
                            </p>
                            <input type="checkbox" id="termsAndCondition12" checked name="dataprotectioncondition12" value="yes" class="cursorPointer checkBoxSize" required><label for="termsAndCondition12" class="ps-2 user-select-none cursorPointer fw-bold fs-5">I Agree</label>
                            <small class="invalid-feedback">
                                please accept the terms and conditions.
                            </small>
                        </div>
                        <div class="mt-3 nextPrevBtn justify-content-between">
                            <button class="btn btn-primary shadow-none priviousbtn4" type="button">Previous</button>
                            <button class="btn btn-primary shadow-none applyBtn" type="submit" id="checkout" name="submit">Apply</button>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        const completeTermsDiv =
            `
        <div>
        <hr>
        <div class="row mt-3">
            <label class="form-label h5 fw-bold">What terms have you bought already ?</label> <br>
            <div class="col comple-term-select-con">
                <input type="checkbox" id="term1" name="existing_users_term[]" value="Term 1" checked>
                <label for="term1" class="form-label user-select-none px-2 fw-bold">Term 1</label>
                <input type="checkbox" id="term2" name="existing_users_term[]" value="Term 2">
                <label for="term2" class="form-label user-select-none px-2 fw-bold">Term 2</label>
                <input type="checkbox" id="term3" name="existing_users_term[]" value="Term 3">
                <label for="term3" class="form-label user-select-none px-2 fw-bold">Term 3</label>
                <input type="checkbox" id="term4" name="existing_users_term[]" value="Term 4">
                <label for="term4" class="form-label user-select-none px-2 fw-bold">Term 4</label>
                <input type="checkbox" id="term5" name="existing_users_term[]" value="Term 5">
                <label for="term5" class="form-label user-select-none px-2 fw-bold">Term 5</label>
                <input type="checkbox" id="term6" name="existing_users_term[]" value="Term 6">
                <label for="term6" class="form-label user-select-none px-2 fw-bold">Term 6</label>
                <input type="checkbox" id="term7" name="existing_users_term[]" value="Term 7">
                <label for="term7" class="form-label user-select-none px-2 fw-bold">Term 7</label>
                <input type="checkbox" id="term8" name="existing_users_term[]" value="Term 8">
                <label for="term8" class="form-label user-select-none px-2 fw-bold">Term 8</label>
                <input type="checkbox" id="term9" name="existing_users_term[]" value="Term 9">
                <label for="term9" class="form-label user-select-none px-2 fw-bold">Term 9</label>
                <input type="checkbox" id="term10" name="existing_users_term[]" value="Term 10">
                <label for="term10" class="form-label user-select-none px-2 fw-bold">Term 10</label>
                <input type="checkbox" id="term11" name="existing_users_term[]" value="Term 11">
                <label for="term11" class="form-label user-select-none px-2 fw-bold">Term 11</label>
                <input type="checkbox" id="term12" name="existing_users_term[]" value="Term 12">
                <label for="term12" class="form-label user-select-none px-2 fw-bold">Term 12</label>
            </div>
        </div> 
        </div>       
    `
        const termcontainer = document.querySelector('.selectTrems');
        const DOBcontainer = document.querySelector('.DOB');

        const studentType = document.getElementsByClassName('studentType');
        for (let i = 0; i < studentType.length; i++) {

            document.addEventListener('change', oldNewStudent)

            function oldNewStudent(e) {
                if (e.target.value == "ExistingStudent") {
                    termcontainer.innerHTML = completeTermsDiv;
                } else if (e.target.value == "NewStudent") {
                    termcontainer.innerHTML = null;
                }
            }
        }
        var studentAge = "<?php echo $_GET['course']; ?>";

        $("input[name='users_type']").click(function() {
            var datePicker = $('.datepicker');
            if ($("input[name='users_type']:checked").val() === "ExistingStudent") {
                datePicker.datepicker('destroy');
                datePicker.datepicker({
                    format: 'mm/dd/yyyy',
                    endDate: '-0m',
                    autoclose: true
                });
                console.log('old studentsss');
            } else {
                console.log("hi");
                datePicker.datepicker('destroy');
                newOldStudentValidate()
            }
        });
        newOldStudentValidate()

        function newOldStudentValidate() {
            switch (studentAge) {
                case "Teen":
                    $('.datepicker').datepicker({
                        format: 'mm/dd/yyyy',
                        autoclose: true,
                        startDate: '-19y',
                        endDate: '-10y'
                    });
                    break;
                case "Junior":
                    $('.datepicker').datepicker({
                        format: 'mm/dd/yyyy',
                        autoclose: true,
                        startDate: '-10y',
                        endDate: '-6y'
                    });
                    break;
                case "PrePrep":
                    $('.datepicker').datepicker({
                        format: 'mm/dd/yyyy',
                        autoclose: true,
                        startDate: '-6y',
                        endDate: '-4y'
                    });
                    break;
                case "Adults":
                    $('.datepicker').datepicker({
                        format: 'mm/dd/yyyy',
                        autoclose: true,
                        // startDate: '-10y',
                        endDate: '-19y'
                    });
                    break;
            }

        }

         $('document').ready(function() {
            var emailState = false;
            $('#email').blur(function() {
                var userEmail = $(this).val();
                if (userEmail == '') {
                    emailState = false;
                    return;
                }
                $.ajax({
                    method: "POST",
                    url: "formAction.php",
                    data: {
                        userEmail: userEmail
                    },
                    success: function(response) {
                        // alert(response);
                        if (response == 'Email Exist') {
                            emailState = false;
                            $('#email').val("");
                            $('#email').parent().removeClass();
                            $('#email').parent().addClass("form_error");
                            $('#email').siblings("span").text('Sorry... Email already exist try another one');
                        } else if (response == 'Available') {
                            emailState = true;
                            $('#email').parent().removeClass();
                            $('#email').parent().addClass("form_success");
                            $('#email').siblings("span").text('');
                        }
                    }
                });
            });
        });
        const last_tab=document.querySelector('.last_tab');
        const submitBtn = document.getElementById('checkout');
        var formsval = document.querySelectorAll(".needs-validation");
        last_tab.addEventListener('change', ()=>{
            for (let i = 0; i < formsval.length; i++) {
                if (!formsval[i].checkValidity()) {
                    submitBtn.disabled=true;
                } else {
                    submitBtn.disabled=false;
                }
                
            }
        })
        const loadinGif = document.querySelector('.loading');
        submitBtn.addEventListener('click', () => {
            loadinGif.classList.replace('d-none', 'd-flex')
        })
    </script>
    <script src="applyformscript/formval.js"></script>
</body>

</html>