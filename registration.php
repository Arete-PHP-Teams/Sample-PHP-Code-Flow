﻿<?php
error_reporting(0);
// ini_set('display_errors',1);

include 'inc/dbcon.php';
include 'inc/csrf_token.php';
include 'inc/function.php';
$admin_login_id = $_SESSION["admin_login_id"];
if (empty($admin_login_id)) {
    header('Location: index');
}
$UsrCheck = mysqli_query($db, "SELECT * FROM `applicationregistration` WHERE DeletedStatus='0' AND FinalStatus='1' AND UserID='$admin_login_id'");
$NumRows = mysqli_num_rows($UsrCheck);
if($NumRows == 1){
    header("Location:preview");
}
$FetchRec = mysqli_query($db, "SELECT * FROM `applicationregistration` WHERE DeletedStatus='0' AND FinalStatus='0' AND UserID='$admin_login_id'");
$NumRows1 = mysqli_num_rows($FetchRec);
$read = mysqli_fetch_assoc($FetchRec);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>ICAI Awards Nomination Form</title>
    <meta name="description" content="">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <!-- Open Graph Meta -->
    <meta property="og:title" content="">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Codebase framework -->
    
    <link rel="stylesheet" id="css-main" href="./css/codebase.min.css">
    <link rel="stylesheet" id="css-main" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>
        #main-container {
            background-color: #ace4ac2e;
        }
        .hidden {
            display: none;
        }
        .info-button {
            position: relative;
            display: inline-block;
        }
        .info-button .info-tooltip {
            visibility: hidden;
            width: 120px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            bottom: 125%;
            /* Position the tooltip above the button */
            left: 50%;
            margin-left: -60px;
            /* Center the tooltip */
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 1;
        }
        .info-button:hover .info-tooltip {
            visibility: visible;
            opacity: 1;
        }
        #saveButtons {
            display: none;
        }
        .info-tooltip p {
            margin: 0px !important;
        }
    </style>
</head>
<body>
    <!-- Page Container -->
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <nav id="sidebar" style="background-color: #08aed1  !important">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header justify-content-lg-center">
                    <!-- Options -->
                    <div>
                        <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->
                <!-- Sidebar Scrolling -->
                <?php include 'inc/navbar.php'; ?>
                <!-- END Sidebar Scrolling -->
            </div>
            <!-- Sidebar Content -->
        </nav> <!-- END Sidebar -->
        <!-- Header -->
        <?php include 'inc/header.php'; ?>
        <!-- END Header -->
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="content">
                <div class="row">
                    <!------- table -------->
                    <div class="card p-4 shadow mb-4">
                        <div class="tab-content">
                            <div class="tab-pane fade active show ul-design">
                                <div class="row">
                                    <!-- <div class="col-md-3">
                                        <div class="text-center">
                                            <img src="./img/icai-75-logo.jpg" alt="">
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <center>
                                            <h1 class="h4 fw-bold mt-2 mb-3">ICAI 40 Under 40 - CA Business Leaders Awards</h1>
                                            <!-- <h1 class="h3 fw-bold mt-3 mb-4">CA BUSINESS LEADERS AWARD NOMINATION FORM -->
                                            </h1>
                                        </center>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="text-center">
                                            <img src="./img/glopac-logo.jpg" alt="">
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <form class="js-validation-signin" method="POST" enctype="multipart/form-data"
                                autocomplete="off">
                                <input type="hidden" name="_token" value="<?php echo $token; ?>" id="csrf_token"
                                    class="form-control">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mtitle-1">
                                            Personal Details
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <select name="NominationType" id="NominationType" class="form-control" required>
                                                <option value="">Please Select</option>
                                                <option <?php if($read['NominationType'] === 'Self-Nomination') {echo 'selected';}  ?> value="Self-Nomination">Self-Nomination</option>
                                                <option <?php if($read['NominationType'] === 'A senior member nominate a deserving member') {echo 'selected';}  ?> value="A senior member nominate a deserving member">A senior
                                                    member nominate a deserving member</option>
                                                <option
                                                    <?php if($read['NominationType'] === 'An independent search committee nominating a deserving member') {echo 'selected';}  ?> value="An independent search committee nominating a deserving member">
                                                    An independent search committee nominating a deserving member
                                                </option>
                                            </select>
                                            <label class="form-label" for="NominationType">Type of Nomination <small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <select class="form-control" name="organization" id="organization" required>
                                                <option value="">Select organization</option>
                                                <option value="inIndia">In
                                                    India
                                                </option>
                                                <option value="outsideIndia">Outside India</option>
                                                <option value="notListed">Not Listed</option>
                                            </select>
                                            <label class="form-label" for="organization">Please Select <small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="PersonName" name="PersonName"
                                                placeholder="" value="<?php echo $read ['PersonName']; ?>" required>
                                            <label class="form-label" for="PersonName">Name of the Nominee <small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="ICAIMembershipNo" name="ICAIMembershipNo" placeholder="" value="<?php echo $read ['ICAIMembershipNo']; ?>" required>
                                            <label class="form-label" for="ICAIMembershipNo">ICAI Membership No.
                                                <small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="email" class="form-control" id="EmailID" name="EmailID"
                                                placeholder="" value="<?php echo $_SESSION["admin_email"]; ?>" required
                                            readonly
                                            <?php if($_SESSION["admin_email"]) {?> style="background: #dddddd;"
                                            <?php } ?>>
                                            <label class="form-label" for="EmailID">Email <small
                                                    class="text-danger">*</small></label>
                                            <p id="emailError" style="color: red; display: none;">Please enter a valid
                                                email address.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="email" class="form-control" id="AltEmail" name="AltEmail"
                                                value="<?php echo $read['AltEmail']; ?>" placeholder="">
                                            <label class="form-label" for="AltEmail">Alternative Email </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="tel" class="form-control" id="MobileNo" name="MobileNo"
                                                value="<?php echo $read['MobileNo']; ?>" placeholder="" required maxlength="10">
                                            <p id="phoneError" style="color: red; display: none;">Please enter a valid
                                                10-digit mobile number.</p>
                                            <label class="form-label" for="MobileNo">Mobile No <small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="AltMobile" value="<?php echo $read['AltMobile']; ?>"
                                                name="AltMobile" placeholder="" maxlength="10">
                                            <label class="form-label" for="AltMobile">Alternate Mobile No.</label>
                                            <p id="phoneError1" style="color: red; display: none;">Please enter a valid
                                                10-digit mobile number.</p>
                                        </div>
                                    </div>

                            <style>
                                .clndr-icon {
                                position: absolute;
                                right: 30px;
                                top: 16px;
                            }
                            </style>
                            <div class="col-md-6">
                                    <div class="input-group form-floating date mb-4 datepickerr">
                                            <input type="text" class="form-control" id="birthdate" name="BirthDate" placeholder="" required onchange="validateDateOfBirth()"    
                                               min="10/01/1984" max="01/01/2099"  value="<?php echo $read['BirthDate']; ?>" required>
                                                    <label class="form-label" for="birthdate">Date of Birth <small
                                                            class="text-danger">*</small></label>
                                                    <p id="dateError" style="color: red; display: none;">You must be less than
                                                        40 years old.</p>
                                                     <span class="input-group-append">
                                                <span class="clndr-icon">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                              </span>
                                            </div>
                            </div>

                                            <!-- <div class="col-md-6">
                                                <div class="form-floating mb-4">
                                                    <input type="date" class="form-control" id="birthdate" name="BirthDate"
                                                        placeholder="" required onchange="validateDateOfBirth()"
                                                        min="1984-10-01" max="2099-12-31" value="<?php echo $read['BirthDate']; ?>">
                                                    <label class="form-label" for="birthdate">Date of Birth <small
                                                            class="text-danger">*</small></label>
                                                    <p id="dateError" style="color: red; display: none;">You must be less than
                                                        40 years old.</p>
                                                </div>
                                            </div> -->
                                    

                                    <!-- <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="date" class="form-control" id="birthdate" name="BirthDate"
                                                placeholder="" required onchange="validateDateOfBirth()"
                                                min="1984-10-01" max="2099-12-31" value="<?php echo $read['BirthDate']; ?>">
                                            <label class="form-label" for="birthdate">Date of Birth <small
                                                    class="text-danger">*</small></label>
                                            <p id="dateError" style="color: red; display: none;">You must be less than
                                                40 years old.</p>
                                        </div>
                                    </div> -->

                                    <div class=<?php if(empty($read['DoBProofe'])) {echo "col-md-6";} else {echo "col-md-5";} ?>>
                                        <div class="form-floating file-m mb-4">
                                            <div class="intro-1">
                                                <div class="info-button">
                                                    <i class="fas fa-info-circle"></i>
                                                    <div class="info-tooltip" style="background: #38377d;">
                                                        <p style="font-size: 13px;">Kindly upload one document PAN card,
                                                            Birth Certificate, Passport, or Driver's license</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="file"  accept=".pdf"  class="form-control" id="DoBProofe" name="DoBProofe"
                                                accept=".pdf" <?php if(empty($read['DoBProofe'])) { echo "required"; } ?> >
                                            <label class="form-label" for="DoBProofe">Proof of Birth<small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <?php if(!empty($read['DoBProofe'])){ ?>
                                    <div class="col-md-1">
                                        <label for=""></label>
                                        <a href="storage/BirthProof/<?php echo $read['DoBProofe'] ;?>" target="_blank" rel="noopener noreferrer"><img src="img/download.png" alt="doc" width="60%"></a>
                                    </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <textarea class="form-control" id="NomineePresentAddress"
                                                    name="NomineePresentAddress" placeholder=""
                                                    style="height: 66px;"><?php echo $read['NomineePresentAddress']; ?></textarea>
                                                <label class="form-label" for="NomineePresentAddress">Present Address of
                                                    the Nominee</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="sameAddressCheck" <?php if(($read['NomineePresentAddress'] === $read['NomineePermanentAddress']) AND (!empty($read['NomineePresentAddress']) AND !empty($read['NomineePermanentAddress'])) ) { echo "checked"; } ?> >
                                                <label class="form-check-label" for="sameAddressCheck">
                                                    <small> Same as Present Address</small>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-4">
                                                <textarea class="form-control" id="NomineePermanentAddress"
                                                    name="NomineePermanentAddress" placeholder=""
                                                    style="height: 66px;"><?php echo $read['NomineePermanentAddress']; ?></textarea>
                                                <label class="form-label" for="NomineePermanentAddress">Permanent
                                                    Address of the Nominee</label>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.getElementById('sameAddressCheck').addEventListener('change', function () {
                                            const presentAddress = document.getElementById('NomineePresentAddress').value;
                                            const permanentAddressField = document.getElementById('NomineePermanentAddress');
                                            if (this.checked) {
                                                permanentAddressField.value = presentAddress;
                                                permanentAddressField.setAttribute('readonly', true);
                                            } else {
                                                permanentAddressField.value = '';
                                                permanentAddressField.removeAttribute('readonly');
                                            }
                                        });
                                    </script>
                                    <!-- <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="NomineePresentAddress"
                                                name="NomineePresentAddress" placeholder="">
                                            <label class="form-label" for="NomineePresentAddress">Present Address of the
                                                Nominee</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="NomineePermanentAddress"
                                                value="" name="NomineePermanentAddress" placeholder="">
                                            <label class="form-label" for="NomineePermanentAddress">Permanent Address of
                                                the Nominee</label>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" name="registered_office_address"
                                                id="registered_office_address" required></textarea>
                                            <label class="form-label" for="">Registered Office Address <small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-floating mb-4">
                                            <select name="CertificatePractice" id="level-selectsss" class="form-control"
                                                required>
                                                <option value="">Select</option>
                                                <option <?php if($read['CertificatePractice'] === 'Yes') { echo "selected"; } ?> value="Yes">Yes</option>
                                                <option <?php if($read['CertificatePractice'] === 'No') { echo "selected"; } ?> value="No">No</option>
                                                <option <?php if($read['CertificatePractice'] === 'Part Time') { echo "selected"; } ?> value="Part Time">Part Time</option>
                                            </select>
                                            <label class="form-label" for="level-selectsss">Certificate of Practice
                                                (COP)?
                                                <small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating mb-4">
                                            <select name="DisciplinaryCase" id="DisciplinaryCase" class="form-control"
                                                required>
                                                <option value="">Select</option>
                                                <option <?php if($read['DisciplinaryCase'] === 'Yes') { echo "selected"; } ?> value="Yes">Yes</option>
                                                <option <?php if($read['DisciplinaryCase'] === 'No') { echo "selected"; } ?> value="No">No</option>
                                            </select>
                                            <label class="form-label" for="DisciplinaryCase">Whether any disciplinary
                                                case
                                                or proceeding pending against nominee <small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mtitle-1">
                                            Work Details
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="CompanyName" value="<?php echo $read['CompanyName']; ?>"
                                                name="WorkCompanyName" placeholder="" required>
                                            <label class="form-label" for="CompanyName">Company Name <small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <select name="WorkDesignation" id="level-select" class="form-control"
                                                required>
                                                <option value="">Select</option>
                                                <option <?php if($read['Designation'] === 'Chairperson'){echo "selected";} ?> value="Chairperson">Chairperson</option>
                                                <option <?php if($read['Designation'] === 'CEO'){echo "selected";} ?> value="CEO">CEO</option>
                                                <option <?php if($read['Designation'] === 'MD'){echo "selected";} ?> value="MD">MD</option>
                                                <option <?php if($read['Designation'] === 'President'){echo "selected";} ?> value="President">President</option>
                                            </select>
                                            <label class="form-label" for="level-select">Designation<small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="number" class="form-control" id="AvrageBusinessTurnover3Year"
                                                value="<?php echo $read['AvrageBusinessTurnover3Year']; ?>" name="AvrageBusinessTurnover3Year" placeholder="" required>
                                            <label class="form-label" for="AvrageBusinessTurnover3Year">Average Business
                                                Turnover of last 3 Years
                                                <small class="text-danger">* ( in crore )</small></label>
                                        </div>
                                    </div>
                                    <div class=<?php if(empty($read['ThreeYearCompanyAudit'])) {echo "col-md-6";} else {echo "col-md-5";} ?>>
                                        <div class="form-floating file-m mb-4">
                                            <input type="file"  accept=".pdf"  class="form-control" id="3YearCompanyAudit" name="3YearCompanyAudit" placeholder="" <?php if(empty($read['ThreeYearCompanyAudit'])) { echo "required"; } ?>>
                                            <label class="form-label" for="3YearCompanyAudit">3 Years company’s audited
                                                financial
                                                statements <small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <?php if(!empty($read['ThreeYearCompanyAudit'])){ ?>
                                    <div class="col-md-1">
                                        <label for=""></label>
                                        <a href="storage/3YearCompanyAudit/<?php echo $read['ThreeYearCompanyAudit'] ;?>" target="_blank" rel="noopener noreferrer"><img src="img/download.png" alt="doc" width="60%"></a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="ExperienceCurrentCompany"
                                                value="<?php echo $read['ExperienceCurrentCompany']; ?>" name="ExperienceCurrentCompany" placeholder="" readonly
                                                step="0.01" style="background: #dddddd;">
                                            <label class="form-label" for="ExperienceCurrentCompany">Experience in
                                                Current company <small class="text-danger">* </small></label>
                                        </div>
                                    </div>
                                    <div class=<?php if(empty($read['AppointmentLetter'])) {echo "col-md-6";} else {echo "col-md-5";} ?>>
                                        <div class="form-floating file-m mb-4">
                                            <input type="file"  accept=".pdf"  class="form-control" id="AppointmentLetter" value=""
                                                name="AppointmentLetter" placeholder="" <?php if(empty($read['AppointmentLetter'])) {echo "required";} else {echo "";} ?>>
                                            <label class="form-label" for="AppointmentLetter">Appointment Letter <small
                                                    class="text-danger">*</small>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if(!empty($read['AppointmentLetter'])){ ?>
                                    <div class="col-md-1">
                                        <label for=""></label>
                                        <a href="storage/AppointmentLetter/<?php echo $read['AppointmentLetter'] ;?>" target="_blank" rel="noopener noreferrer"><img src="img/download.png" alt="doc" width="60%"></a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <div class="border p-3 mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" id="TotalExperience" name="TotalExperience" placeholder="" value="<?php echo $read['TotalExperience']; ?>" readonly
                                                            style="background: #dddddd;">
                                                        <label class="form-label" for="TotalExperience">Total Experience
                                                            <small class="text-danger">* (Minimum 7 years of
                                                                experience)</small></label>
                                                        <!-- <p class="text-danger" id="expererror" style="display: none;">
                                                            Minimum 7 years of experience is required</p> -->
                                                    </div>
                                                </div>
                                                <div class=<?php if(empty($read['OverallExperience'])) {echo "col-md-6";} else {echo "col-md-5";} ?>>
                                                    <div class="form-floating file-m mb-4">
                                                        <div class="intro-1">
                                                            <div class="info-button">
                                                                <i class="fas fa-info-circle"></i>
                                                                <div class="info-tooltip" style="background: #38377d;">
                                                                    <p style="font-size: 13px;">Provide last all
                                                                        experience letter into pdf format!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="file"  accept=".pdf"  class="form-control" id="OverallExperience"
                                                            name="OverallExperience" placeholder="" <?php if(empty($read['OverallExperience'])) { echo "required"; } ?>>
                                                        <label class="form-label" for="OverallExperience">Overall
                                                            Experience Letter<small
                                                                class="text-danger">*</small></label>
                                                    </div>
                                                </div>
                                                <?php if(!empty($read['OverallExperience'])){ ?>
                                                <div class="col-md-1">
                                                    <label for=""></label>
                                                    <a href="storage/OverallExperience/<?php echo $read['OverallExperience'] ;?>" target="_blank" rel="noopener noreferrer"><img src="img/download.png" alt="doc" width="60%"></a>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php 
                                                $TotalExpQuery = mysqli_query($db, "SELECT * FROM `totalexperience` WHERE DeletedStatus='0' AND UserID='$admin_login_id'");
                                                $ExpNums = mysqli_num_rows($TotalExpQuery);
                                                $count = 1;
                                                if($ExpNums > 0) {
                                                    while($read1 = mysqli_fetch_assoc($TotalExpQuery)){
                                                        $ApplicationID = $read['ID'];
                                            ?>
                                            <div class="row" id="row-<?php echo $count; ?>">
                                                <input type="hidden" name="ReceordID[]" value="<?php echo $read1['ID']; ?>" class="form-control">
                                                <input type="hidden" name="ApplicationID[]" value="<?php echo $ApplicationID; ?>" class="form-control">
                                                <div class="col-md-2">
                                                    <div class="input-group form-floating date mb-4 datepickerr">
                                                        <input type="text" class="form-control" id="fromdate"
                                                            name="FromDate[]" placeholder=""
                                                            onchange="updateExperience()" required min="1900-01-01"
                                                            max="2099-12-31" value="<?php echo $read1['FromDate']; ?>">
                                                        <label class="form-label" for="fromdate">From <small
                                                                class="text-danger">*</small></label>
                                                                  <span class="input-group-append">
                                                <span class="clndr-icon">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                              </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group form-floating date mb-4 datepickerr">
                                                        <input type="text" class="form-control" id="toDate" 
                                                            name="ToDate[]" placeholder="" onchange="updateExperience()"
                                                            required min="1900-01-01" max="2099-12-31" value="<?php echo $read1['ToDate']; ?>">
                                                        <label class="form-label" for="toDate">To <small
                                                                class="text-danger">*</small></label>
                                                                 <span class="input-group-append">
                                                <span class="clndr-icon">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                              </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" id="duration" name="Duration[]" placeholder="" value="<?php echo $read1['Duration']; ?>">
                                                        <label class="form-label" for="duration">Duration <small
                                                                class="text-danger">*</small></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" id="CompaniesName"
                                                            name="CompaniesNames[]" placeholder="" required value="<?php echo $read1['CompaniesNames']; ?>">
                                                        <label class="form-label" for="CompaniesName">Company Name
                                                            <small class="text-danger">*</small></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" id="designations"
                                                            name="Designations[]" placeholder="" required value="<?php echo $read1['Designations']; ?>">
                                                        <label class="form-label" for="designations">Designation <small
                                                                class="text-danger">*</small></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 text-end">
                                                    <div class="form-floating mb-4">
                                                        <?php if($count == 1) {?>
                                                        <button type="button" id="saveButton" name="save" class="btn btn-lg btn-alt-success fw-semibold" onclick="addRow()">+</button>
                                                        <?php } else { ?>
                                                        <button type="button" id="saveButton-2" name="save" class="btn btn-lg btn-alt-danger fw-semibold" onclick="sendDeleteAjax('<?php echo $read1['ID']; ?>'); removeRow('row-<?php echo $count; ?>');">-</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php if($count == 1) {?>
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Yes"
                                                            name="WorkingHere[]" id="WorkingHere" required <?php if($read1['WorkingHere'] === 'Yes') { echo "checked"; } ?>>
                                                        <label class="form-check-label" for="WorkingHere">
                                                            Currently I'm Working here.
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php $count++; } } else { ?>
                                            <div class="row" id="row-1">
                                                <div class="col-md-2">
                                                    <div class="input-group form-floating date mb-4 datepickerr">
                                                        <input type="text" class="form-control" id="fromdate"
                                                            name="FromDate[]" placeholder="" 
                                                            onchange="updateExperience()" required min="1900-01-01"
                                                            max="2099-12-31" >
                                                        <label class="form-label" for="fromdate">From <small
                                                                class="text-danger">*</small></label>
                                                                 <span class="input-group-append">
                                                <span class="clndr-icon">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                              </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group form-floating date mb-4 datepickerr">
                                                        <input type="text" class="form-control" id="toDate"
                                                            name="ToDate[]" placeholder="" onchange="updateExperience()"
                                                            required min="1900-01-01" max="2099-12-31" >
                                                        <label class="form-label" for="toDate">To <small
                                                                class="text-danger">*</small></label>
                                                                 <span class="input-group-append">
                                                <span class="clndr-icon">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                              </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" id="duration"
                                                            name="Duration[]" placeholder="" >
                                                        <label class="form-label" for="duration">Duration <small
                                                                class="text-danger">*</small></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" id="CompaniesName"
                                                            name="CompaniesNames[]" placeholder="" required >
                                                        <label class="form-label" for="CompaniesName">Company Name
                                                            <small class="text-danger">*</small></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control" id="designations"
                                                            name="Designations[]" placeholder="" required >
                                                        <label class="form-label" for="designations">Designation <small
                                                                class="text-danger">*</small></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 text-end">
                                                    <div class="form-floating mb-4">
                                                        <?php if($count == 1) {?>
                                                        <button type="button" id="saveButton" name="save" class="btn btn-lg btn-alt-success fw-semibold" onclick="addRow()">+</button>
                                                        <?php } else { ?>
                                                        <button type="button" id="saveButton-2" name="save" class="btn btn-lg btn-alt-danger fw-semibold" onclick="removeRow('row-<?php echo $count; ?>')">-</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <?php if($count == 1) {?>
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Yes"
                                                            name="WorkingHere[]" id="WorkingHere" required <?php if($read1['WorkingHere'] === 'Yes') { echo "checked"; } ?>>
                                                        <label class="form-check-label" for="WorkingHere">
                                                            Currently I'm Working here.
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php } ?>
                                            <hr>
                                            <div id="content"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mtitle-1">
                                            Evaluation Parameters
                                        </div>
                                    </div>
                                    <p class="mb-2">Describe one effective project undertaken by you with the
                                        below-mentioned details.</p>
                                    <div class=<?php if(empty($read['ProjectDetails'])) {echo "col-md-12";} else {echo "col-md-11";} ?>>
                                        <div class="form-floating file-m mb-4">
                                            <div class="intro-1">
                                                <div class="info-button">
                                                    <i class="fas fa-info-circle"></i>
                                                    <div class="info-tooltip" style="background:#38377d;">
                                                        <p style="font-size: 13px;">Upload Project
                                                            Details into pdf format!</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="file"  accept=".pdf"  class="form-control" id="ProjectDetails"
                                                name="ProjectDetails" placeholder="" <?php if(empty($read['ProjectDetails'])) { echo "required"; } ?>>
                                            <label class="form-label" for="ProjectDetails">Upload Project
                                                Details<small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <?php if(!empty($read['ProjectDetails'])){ ?>
                                    <div class="col-md-1">
                                        <label for=""></label>
                                        <a href="storage/ProjectDetails/<?php echo $read['ProjectDetails'] ;?>" target="_blank" rel="noopener noreferrer"><img src="img/download.png" alt="doc" width="60%"></a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="ProjectObjectiveSpecification"
                                                value="<?php echo $read['ProjectObjectiveSpecification']; ?>" name="ProjectObjectiveSpecification"
                                                placeholder="ProjectObjectiveSpecification" required>
                                            <label class="form-label" for="">Specification of the Project Objectives
                                                <small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="InnovativeMethodologyApplied"
                                                value="<?php echo $read['InnovativeMethodologyApplied']; ?>" name="InnovativeMethodologyApplied" placeholder="" required>
                                            <label class="form-label" for="InnovativeMethodologyApplied">Innovative
                                                methodology applied in its
                                                execution & implementation<small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="NewDigitalTechnologies" value="<?php echo $read['NewDigitalTechnologies']; ?>"
                                                name="NewDigitalTechnologies" placeholder="" required>
                                            <label class="form-label" for="NewDigitalTechnologies">New digital
                                                technologies put to use<small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="FeasibilityofThePlanProject"
                                                value="<?php echo $read['FeasibilityofThePlanProject']; ?>" name="FeasibilityofThePlanProject" placeholder="" required>
                                            <label class="form-label" for="FeasibilityofThePlanProject">Feasibility of
                                                the plan or project
                                                competency and relevance <small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control"
                                                id="RiskInolvementMitigationStrategyDevised" value="<?php echo $read['RiskInolvementMitigationStrategyDevised']; ?>"
                                                name="RiskInolvementMitigationStrategyDevised" placeholder="" required>
                                            <label class="form-label" for="RiskInolvementMitigationStrategyDevised">Risk
                                                involvement and mitigation strategy
                                                devised<small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="ValueAdditionCreateStakeholder"
                                                value="<?php echo $read['ValueAdditionCreateStakeholder']; ?>" name="ValueAdditionCreateStakeholder" placeholder="" required>
                                            <label class="form-label" for="ValueAdditionCreateStakeholder">Value
                                                addition created for stakeholders and
                                                contribution to sustainability and reporting thereof<small
                                                    class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control"
                                                id="ProjectExecutioneffectivenessterms" value="<?php echo $read['ProjectExecutioneffectivenessterms']; ?>"
                                                name="ProjectExecutioneffectivenessterms" placeholder="" required>
                                            <label class="form-label" for="ProjectExecutioneffectivenessterms">Project
                                                execution effectiveness in terms of
                                                cost and timelines<small class="text-danger">*</small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mtitle-1">
                                            Other Details
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="AchievementsAnyPersonAward"
                                                value="<?php echo $read['AchievementsAnyPersonAward']; ?>" name="AchievementsAnyPersonAward" placeholder="">
                                            <label class="form-label" for="AchievementsAnyPersonAward">Achievements or
                                                any person award (if
                                                any)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="SpeciyYourSocietyContribution"
                                                value="<?php echo $read['SpeciyYourSocietyContribution']; ?>" name="SpeciyYourSocietyContribution" placeholder="">
                                            <label class="form-label" for="SpeciyYourSocietyContribution">Please specify
                                                your contribution to society
                                                (if any) </label>
                                        </div>
                                    </div>
                                    <div class=<?php if(empty($read['PPTAvailable'])) {echo "col-md-12";} else {echo "col-md-11";} ?>>
                                        <div class="form-floating file-m mb-4">
                                            <div class="intro-1">
                                                <div class="info-button">
                                                    <i class="fa-solid fa-file-arrow-down"
                                                        onclick="downloadFile('storage/Sample.pptx')"
                                                        style="cursor: pointer;"></i>
                                                    <div class="info-tooltip"
                                                        style="background:#38377d; padding-bottom:2px; transform: translateX(-50%);">
                                                        <p style="font-size: 13px;">Sample PPT</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="file" class="form-control" id="PPTAvailable"
                                                name="PPTAvailable" accept=".pptx" placeholder="" <?php if(empty($read['PPTAvailable'])) { echo "required"; } ?>>
                                            <label class="form-label" for="PPTAvailable">PPT  <small
                                                    class="text-danger">*</small></label></label>
                                        </div>
                                    </div>                                   
                                    <?php if(!empty($read['PPTAvailable'])){ ?>
                                    <div class="col-md-1">
                                        <a href="storage/PPTAvailable/<?php echo $read['PPTAvailable'] ;?>" target="_blank" rel="noopener noreferrer"><img src="img/ppt.png" alt="doc" width="100%"></a>
                                    </div>
                                    <?php } ?>
                                    <!-- <button type="button" class="btn btn-primary float-end" onclick="downloadFile('storage/Sample.pptx')">Download Format File</button> -->
                                    <script>
                                        function downloadFile(filePath) {
                                            var link = document.createElement('a');
                                            link.href = filePath;
                                            link.download = filePath.split('/').pop();
                                            document.body.appendChild(link);
                                            link.click();
                                            document.body.removeChild(link);
                                        }
                                    </script>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered mt-4">
                                            <tr>
                                                <td>
                                                    <strong>Declaration</strong>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Yes"
                                                            name="declarations" id="declarations" <?php if($read['Declarations']  == 'Yes') {echo 'Checked';} ?> required>
                                                        <label class="form-check-label" for="declarations">
                                                            <!-- All details are verified by the nominee. -->
                                                            I hereby declare that all information provided above is true
                                                            and accurate to the best of my knowledge. I understand that
                                                            any false statements or omissions may result in consequences
                                                            as deemed appropriate.
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <?php if($NumRows1 == 0) {?>
                                    <button type="submit" id="saveButtons" name="saveForm" class="btn btn-lg btn-alt-success fw-semibold" disabled style="display: block;">Save</button>
                                    <?php } if($NumRows1 > 0) {?>
                                    <button type="submit" id="saveButtons" name="SubmitForm" class="btn btn-lg btn-alt-success fw-semibold" style="display: block;">Update</button>
                                    <?php } ?>
                                </div>
                            </form>
                            <?php
                            // Save New Record Into The Database 
                                if(isset($_POST['saveForm'])){
                                 
                                    $NominationType = mysqli_real_escape_string($db, $_POST['NominationType']);
                                    $PersonName = mysqli_real_escape_string($db, $_POST['PersonName']);
                                    $ICAIMembershipNo = mysqli_real_escape_string($db, $_POST['ICAIMembershipNo']);
                                    $EmailID = mysqli_real_escape_string($db, $_POST['EmailID']);
                                    $AltEmail = mysqli_real_escape_string($db, $_POST['AltEmail']);
                                    $MobileNo = mysqli_real_escape_string($db, $_POST['MobileNo']);
                                    $AltMobile = mysqli_real_escape_string($db, $_POST['AltMobile']);
                                    $BirthDate = mysqli_real_escape_string($db, $_POST['BirthDate']);
                                    // Birth Proof Upload
                                 
                                    if ($_FILES["DoBProofe"]["name"] != '') {
                                        $DoBProofe1 = time() . "-" . rand(1000, 9999) . "." . pathinfo($_FILES['DoBProofe']['name'], PATHINFO_EXTENSION);
                                        if (strtolower(end(explode(".", $DoBProofe1))) == "pdf") {
                                            if (move_uploaded_file($_FILES["DoBProofe"]["tmp_name"], "storage/BirthProof/" . $DoBProofe1)) {
                                                $DoBProofe = $DoBProofe1;
                                            } else {
                                                $DoBProofe = '';
                                            }
                                        } else {
                                            $DoBProofe = '';
                                        }
                                    }
                                    $NomineePresentAddress = mysqli_real_escape_string($db, $_POST['NomineePresentAddress']);
                                    $NomineePermanentAddress = mysqli_real_escape_string($db, $_POST['NomineePermanentAddress']);
                                    $CertificatePractice = mysqli_real_escape_string($db, $_POST['CertificatePractice']);
                                    $DisciplinaryCase = mysqli_real_escape_string($db, $_POST['DisciplinaryCase']);
                                    $WorkCompanyName = mysqli_real_escape_string($db, $_POST['WorkCompanyName']);
                                    $WorkDesignation = mysqli_real_escape_string($db, $_POST['WorkDesignation']);
                                    $AvrageBusinessTurnover3Year = mysqli_real_escape_string($db, $_POST['AvrageBusinessTurnover3Year']);
                                    // 3 Year Audit Report Upload
                                    if ($_FILES["3YearCompanyAudit"]["name"] != '') {
                                        $threeYearCompanyAudit1 = time() . "-" . rand(1000, 9999) . "." . pathinfo($_FILES['3YearCompanyAudit']['name'], PATHINFO_EXTENSION);
                                        if (strtolower(end(explode(".", $threeYearCompanyAudit1))) == "pdf") {
                                            if (move_uploaded_file($_FILES["3YearCompanyAudit"]["tmp_name"], "storage/3YearCompanyAudit/" . $threeYearCompanyAudit1)) {
                                                $threeYearCompanyAudit = $threeYearCompanyAudit1;
                                            } else {
                                                $threeYearCompanyAudit = '';
                                            }
                                        } else {
                                            $threeYearCompanyAudit = '';
                                        }
                                    }
                                    $ExperienceCurrentCompany = mysqli_real_escape_string($db, $_POST['ExperienceCurrentCompany']);
                                    // Appointment Letter Upload
                                    if ($_FILES["AppointmentLetter"]["name"] != '') {
                                        $AppointmentLetter1 = time() . "-" . rand(1000, 9999) . "." . pathinfo($_FILES['AppointmentLetter']['name'], PATHINFO_EXTENSION);
                                        if (strtolower(end(explode(".", $AppointmentLetter1))) == "pdf") {
                                            if (move_uploaded_file($_FILES["AppointmentLetter"]["tmp_name"], "storage/AppointmentLetter/" . $AppointmentLetter1)) {
                                                $AppointmentLetter = $AppointmentLetter1;
                                            } else {
                                                $AppointmentLetter = '';
                                            }
                                        } else {
                                            $AppointmentLetter = '';
                                        }
                                    }
                                    $TotalExperience = mysqli_real_escape_string($db, $_POST['TotalExperience']);
                                    // Over All Experience Letter Upload
                                    if ($_FILES["OverallExperience"]["name"] != '') {
                                        $OverallExperience1 = time() . "-" . rand(1000, 9999) . "." . pathinfo($_FILES['OverallExperience']['name'], PATHINFO_EXTENSION);
                                        if (strtolower(end(explode(".", $OverallExperience1))) == "pdf") {
                                            if (move_uploaded_file($_FILES["OverallExperience"]["tmp_name"], "storage/OverallExperience/" . $OverallExperience1)) {
                                                $OverallExperience = $OverallExperience1;
                                            } else {
                                                $OverallExperience = '';
                                            }
                                        } else {
                                            $OverallExperience = '';
                                        }
                                    }
                                    // Project Details Letter Upload
                                    if ($_FILES["ProjectDetails"]["name"] != '') {
                                        $ProjectDetails1 = time() . "-" . rand(1000, 9999) . "." . pathinfo($_FILES['ProjectDetails']['name'], PATHINFO_EXTENSION);
                                        if (strtolower(end(explode(".", $ProjectDetails1))) == "pdf") {
                                            if (move_uploaded_file($_FILES["ProjectDetails"]["tmp_name"], "storage/ProjectDetails/" . $ProjectDetails1)) {
                                                $ProjectDetails = $ProjectDetails1;
                                            } else {
                                                $ProjectDetails = '';
                                            }
                                        } else {
                                            $ProjectDetails = '';
                                        }
                                    }
                                    $ProjectObjectiveSpecification = mysqli_real_escape_string($db, $_POST['ProjectObjectiveSpecification']);
                                    $InnovativeMethodologyApplied = mysqli_real_escape_string($db, $_POST['InnovativeMethodologyApplied']);
                                    $NewDigitalTechnologies = mysqli_real_escape_string($db, $_POST['NewDigitalTechnologies']);
                                    $FeasibilityofThePlanProject = mysqli_real_escape_string($db, $_POST['FeasibilityofThePlanProject']);
                                    $RiskInolvementMitigationStrategyDevised = mysqli_real_escape_string($db, $_POST['RiskInolvementMitigationStrategyDevised']);
                                    $ValueAdditionCreateStakeholder = mysqli_real_escape_string($db, $_POST['ValueAdditionCreateStakeholder']);
                                    $ProjectExecutioneffectivenessterms = mysqli_real_escape_string($db, $_POST['ProjectExecutioneffectivenessterms']);
                                    $AchievementsAnyPersonAward = mysqli_real_escape_string($db, $_POST['AchievementsAnyPersonAward']);
                                    $SpeciyYourSocietyContribution = mysqli_real_escape_string($db, $_POST['SpeciyYourSocietyContribution']);
                                    // Any PPT Upload
                                    if ($_FILES["PPTAvailable"]["name"] != '') {
                                        $PPTAvailable1 = time() . "-" . rand(1000, 9999) . "." . pathinfo($_FILES['PPTAvailable']['name'], PATHINFO_EXTENSION);
                                        if (strtolower(end(explode(".", $PPTAvailable1))) == "pptx") {
                                            if (move_uploaded_file($_FILES["PPTAvailable"]["tmp_name"], "storage/PPTAvailable/" . $PPTAvailable1)) {
                                                $PPTAvailable = $PPTAvailable1;
                                            } else {
                                                $PPTAvailable = '';
                                            }
                                        } else {
                                            $PPTAvailable = '';
                                        }
                                    }
                                    $declarations = mysqli_real_escape_string($db, $_POST['declarations']);
                                    $FromDate = implode(',',$_POST['FromDate']);
                                    $ToDate = implode(',',$_POST['ToDate']);
                                    $Duration = implode(',',$_POST['Duration']);
                                    $CompaniesNames = implode(',',$_POST['CompaniesNames']);
                                    $Designations = implode(',',$_POST['Designations']);
                                    $WorkingHere = implode(',',$_POST['WorkingHere']);
                                    $RegistrationQuery = mysqli_query($db, "INSERT INTO `applicationregistration`(`ID`, `UserID`, `RegistrationNo`, `NominationType`, `PersonName`, `ICAIMembershipNo`, `EmailID`, `AltEmail`, `MobileNo`, `AltMobile`, `BirthDate`, `DoBProofe`, `NomineePresentAddress`, `NomineePermanentAddress`, `CertificatePractice`, `DisciplinaryCase`, `CompanyName`, `Designation`, `AvrageBusinessTurnover3Year`, `ThreeYearCompanyAudit`, `ExperienceCurrentCompany`, `AppointmentLetter`, `TotalExperience`, `OverallExperience`, `ProjectDetails`, `ProjectObjectiveSpecification`, `InnovativeMethodologyApplied`, `NewDigitalTechnologies`, `FeasibilityofThePlanProject`, `RiskInolvementMitigationStrategyDevised`, `ValueAdditionCreateStakeholder`, `ProjectExecutioneffectivenessterms`, `AchievementsAnyPersonAward`, `SpeciyYourSocietyContribution`, `PPTAvailable`, `Declarations`, `FinalStatus`, `DeletedStatus`, `Created_At`) VALUES (NULL,'$admin_login_id',NULL,'$NominationType','$PersonName','$ICAIMembershipNo','$EmailID','$AltEmail','$MobileNo','$AltMobile','$BirthDate','$DoBProofe','$NomineePresentAddress','$NomineePermanentAddress','$CertificatePractice','$DisciplinaryCase','$WorkCompanyName','$WorkDesignation','$AvrageBusinessTurnover3Year','$threeYearCompanyAudit','$ExperienceCurrentCompany','$AppointmentLetter','$TotalExperience','$OverallExperience', '$ProjectDetails','$ProjectObjectiveSpecification','$InnovativeMethodologyApplied','$NewDigitalTechnologies','$FeasibilityofThePlanProject','$RiskInolvementMitigationStrategyDevised','$ValueAdditionCreateStakeholder','$ProjectExecutioneffectivenessterms','$AchievementsAnyPersonAward','$SpeciyYourSocietyContribution','$PPTAvailable','$declarations','0','0',current_timestamp())");
                                    if($RegistrationQuery){
                                        $latest_id = mysqli_insert_id($db);
                                        $Registration_number = date('Y') . date('m') . str_pad($latest_id, 4, '0', STR_PAD_LEFT);
                                        $update_registration_no = mysqli_query($db, "UPDATE `applicationregistration` SET `RegistrationNo`='$Registration_number' WHERE ID='$latest_id'");
                                        $fromDateArray = explode(',', $FromDate);
                                        $toDateArray = explode(',', $ToDate);
                                        $durationArray = explode(',', $Duration);
                                        $companiesNamesArray = explode(',', $CompaniesNames);
                                        $designationsArray = explode(',', $Designations);
                                        $workinghereArray = explode(',', $WorkingHere);
                                        foreach ($fromDateArray as $index => $fromDateValue) { 
                                            $toDateValue = mysqli_real_escape_string($db, $toDateArray[$index]);
                                            $durationValue = mysqli_real_escape_string($db, $durationArray[$index]);
                                            $companyNameValue = mysqli_real_escape_string($db, $companiesNamesArray[$index]);
                                            $designationValue = mysqli_real_escape_string($db, $designationsArray[$index]);
                                            $workinghereValue = mysqli_real_escape_string($db, $workinghereArray[$index]);
                                            $ExperienceQuery = mysqli_query($db, "INSERT INTO `totalexperience`(`ID`, `UserID`, `ApplicationRegisterID`, `WorkingHere`, `FromDate`, `ToDate`, `Duration`, `CompaniesNames`, `Designations`, `DeletedStatus`, `Created_At`) VALUES (NULL,'$admin_login_id','$latest_id','$workinghereValue','$fromDateValue','$toDateValue','$durationValue','$companyNameValue','$designationValue','0',current_timestamp())");
                                        }
                                        echo "<script>alert('Record Saved Successfully.')</script>";
                                        echo "<script>window.location.href = 'preview'</script>";
                                    } else {
                                        echo "<script>alert('Record Not Saved, Please Try Again.')</script>";
                                    }
                                }

                            // Update Exisint Records Into The Database
                            if (isset($_POST['SubmitForm'])) {
                                
                                $NominationType = mysqli_real_escape_string($db, $_POST['NominationType']);
                                $PersonName = mysqli_real_escape_string($db, $_POST['PersonName']);
                                $ICAIMembershipNo = mysqli_real_escape_string($db, $_POST['ICAIMembershipNo']);
                                $EmailID = mysqli_real_escape_string($db, $_POST['EmailID']);
                                $AltEmail = mysqli_real_escape_string($db, $_POST['AltEmail']);
                                $MobileNo = mysqli_real_escape_string($db, $_POST['MobileNo']);
                                $AltMobile = mysqli_real_escape_string($db, $_POST['AltMobile']);
                                $BirthDate = mysqli_real_escape_string($db, $_POST['BirthDate']);
                                // Birth Proof Upload
                                if ($_FILES["DoBProofe"]["name"] != '') {
                                    $DoBProofe = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["DoBProofe"]["name"];
                                    if (sizeof(explode('.', $_FILES["DoBProofe"]["name"])) == 2) {
                                        move_uploaded_file($_FILES["DoBProofe"]["tmp_name"], "storage/BirthProof/" . $DoBProofe);
                                        $query = "UPDATE `applicationregistration` SET `DoBProofe`=? WHERE `ID`=?";
                                        $stmt = mysqli_prepare($db, $query);
                                        mysqli_stmt_bind_param($stmt, "si", $DoBProofe, $read['ID']);
                                        $result = mysqli_stmt_execute($stmt);
                                    }
                                }
                                $NomineePresentAddress = mysqli_real_escape_string($db, $_POST['NomineePresentAddress']);
                                $NomineePermanentAddress = mysqli_real_escape_string($db, $_POST['NomineePermanentAddress']);
                                $CertificatePractice = mysqli_real_escape_string($db, $_POST['CertificatePractice']);
                                $DisciplinaryCase = mysqli_real_escape_string($db, $_POST['DisciplinaryCase']);
                                $WorkCompanyName = mysqli_real_escape_string($db, $_POST['WorkCompanyName']);
                                $WorkDesignation = mysqli_real_escape_string($db, $_POST['WorkDesignation']);
                                $AvrageBusinessTurnover3Year = mysqli_real_escape_string($db, $_POST['AvrageBusinessTurnover3Year']);
                                // 3 Year Audit Report Update
                                if ($_FILES["3YearCompanyAudit"]["name"] != '') {
                                    $threeYearCompanyAudit = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["3YearCompanyAudit"]["name"];
                                    if (sizeof(explode('.', $_FILES["3YearCompanyAudit"]["name"])) == 2) {
                                        move_uploaded_file($_FILES["3YearCompanyAudit"]["tmp_name"], "storage/3YearCompanyAudit/" . $threeYearCompanyAudit);
                                        $query = "UPDATE `applicationregistration` SET `ThreeYearCompanyAudit`=? WHERE `ID`=?";
                                        $stmt = mysqli_prepare($db, $query);
                                        mysqli_stmt_bind_param($stmt, "si", $threeYearCompanyAudit, $read['ID']);
                                        $result = mysqli_stmt_execute($stmt);
                                    }
                                }
                                $ExperienceCurrentCompany = mysqli_real_escape_string($db, $_POST['ExperienceCurrentCompany']);
                                // Appointment Letter Update
                                if ($_FILES["AppointmentLetter"]["name"] != '') {
                                    $AppointmentLetter = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["AppointmentLetter"]["name"];
                                    if (sizeof(explode('.', $_FILES["AppointmentLetter"]["name"])) == 2) {
                                        move_uploaded_file($_FILES["AppointmentLetter"]["tmp_name"], "storage/AppointmentLetter/" . $AppointmentLetter);
                                        $query = "UPDATE `applicationregistration` SET `AppointmentLetter`=? WHERE `ID`=?";
                                        $stmt = mysqli_prepare($db, $query);
                                        mysqli_stmt_bind_param($stmt, "si", $AppointmentLetter, $read['ID']);
                                        $result = mysqli_stmt_execute($stmt);
                                    }
                                }
                                $TotalExperience = mysqli_real_escape_string($db, $_POST['TotalExperience']);
                                // Over All Experience Letter Update
                                if ($_FILES["OverallExperience"]["name"] != '') {
                                    $OverallExperience = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["OverallExperience"]["name"];
                                    if (sizeof(explode('.', $_FILES["OverallExperience"]["name"])) == 2) {
                                        move_uploaded_file($_FILES["OverallExperience"]["tmp_name"], "storage/OverallExperience/" . $OverallExperience);
                                        $query = "UPDATE `applicationregistration` SET `OverallExperience`=? WHERE `ID`=?";
                                        $stmt = mysqli_prepare($db, $query);
                                        mysqli_stmt_bind_param($stmt, "si", $OverallExperience, $read['ID']);
                                        $result = mysqli_stmt_execute($stmt);
                                    }
                                }
                                // Project Details Update
                                if ($_FILES["ProjectDetails"]["name"] != '') {
                                    $ProjectDetails = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["ProjectDetails"]["name"];
                                    if (sizeof(explode('.', $_FILES["ProjectDetails"]["name"])) == 2) {
                                        move_uploaded_file($_FILES["ProjectDetails"]["tmp_name"], "storage/ProjectDetails/" . $ProjectDetails);
                                        $query = "UPDATE `applicationregistration` SET  `ProjectDetails`=? WHERE `ID`=?";
                                        $stmt = mysqli_prepare($db, $query);
                                        mysqli_stmt_bind_param($stmt, "si", $ProjectDetails, $read['ID']);
                                        $result = mysqli_stmt_execute($stmt);
                                    }
                                }
                                $ProjectObjectiveSpecification = mysqli_real_escape_string($db, $_POST['ProjectObjectiveSpecification']);
                                $InnovativeMethodologyApplied = mysqli_real_escape_string($db, $_POST['InnovativeMethodologyApplied']);
                                $NewDigitalTechnologies = mysqli_real_escape_string($db, $_POST['NewDigitalTechnologies']);
                                $FeasibilityofThePlanProject = mysqli_real_escape_string($db, $_POST['FeasibilityofThePlanProject']);
                                $RiskInolvementMitigationStrategyDevised = mysqli_real_escape_string($db, $_POST['RiskInolvementMitigationStrategyDevised']);
                                $ValueAdditionCreateStakeholder = mysqli_real_escape_string($db, $_POST['ValueAdditionCreateStakeholder']);
                                $ProjectExecutioneffectivenessterms = mysqli_real_escape_string($db, $_POST['ProjectExecutioneffectivenessterms']);
                                $AchievementsAnyPersonAward = mysqli_real_escape_string($db, $_POST['AchievementsAnyPersonAward']);
                                $SpeciyYourSocietyContribution = mysqli_real_escape_string($db, $_POST['SpeciyYourSocietyContribution']);
                                // Any PPT Update
                                if ($_FILES["PPTAvailable"]["name"] != '') {
                                    $PPTAvailable = time() . "-" . rand(1000, 9999) . "-DOC-" . $_FILES["PPTAvailable"]["name"];
                                    if (sizeof(explode('.', $_FILES["PPTAvailable"]["name"])) == 2) {
                                        move_uploaded_file($_FILES["PPTAvailable"]["tmp_name"], "storage/PPTAvailable/" . $PPTAvailable);
                                        $query = "UPDATE `applicationregistration` SET `PPTAvailable`=? WHERE `ID`=?";
                                        $stmt = mysqli_prepare($db, $query);
                                        mysqli_stmt_bind_param($stmt, "si", $PPTAvailable, $read['ID']);
                                        $result = mysqli_stmt_execute($stmt);
                                    }
                                }
                                $declarations = mysqli_real_escape_string($db, $_POST['declarations']);
                                // Update the main application registration record
                                $update_registration_query = mysqli_query($db, "UPDATE `applicationregistration` SET `NominationType` = '$NominationType', `PersonName` = '$PersonName', `ICAIMembershipNo` = '$ICAIMembershipNo', `EmailID` = '$EmailID', `AltEmail` = '$AltEmail', `MobileNo` = '$MobileNo', `AltMobile` = '$AltMobile', `BirthDate` = '$BirthDate', `NomineePresentAddress` = '$NomineePresentAddress', `NomineePermanentAddress` = '$NomineePermanentAddress', `CertificatePractice` = '$CertificatePractice', `DisciplinaryCase` = '$DisciplinaryCase', `CompanyName` = '$WorkCompanyName', `Designation` = '$WorkDesignation', `AvrageBusinessTurnover3Year` = '$AvrageBusinessTurnover3Year', `ExperienceCurrentCompany` = '$ExperienceCurrentCompany', `TotalExperience` = '$TotalExperience', `ProjectObjectiveSpecification` = '$ProjectObjectiveSpecification', `InnovativeMethodologyApplied` = '$InnovativeMethodologyApplied', `NewDigitalTechnologies` = '$NewDigitalTechnologies', `FeasibilityofThePlanProject` = '$FeasibilityofThePlanProject', `RiskInolvementMitigationStrategyDevised` = '$RiskInolvementMitigationStrategyDevised', `ValueAdditionCreateStakeholder` = '$ValueAdditionCreateStakeholder', `ProjectExecutioneffectivenessterms` = '$ProjectExecutioneffectivenessterms', `AchievementsAnyPersonAward` = '$AchievementsAnyPersonAward', `SpeciyYourSocietyContribution` = '$SpeciyYourSocietyContribution',  `Declarations` = '$declarations', `FinalStatus` = '0' WHERE `ID` = '". $read['ID'] ."' AND `UserID` = '$admin_login_id'");
                                // Extract POST data
                                $fromDateArray = $_POST['FromDate'];
                                $toDateArray = $_POST['ToDate'];
                                $durationArray = $_POST['Duration'];
                                $companiesNamesArray = $_POST['CompaniesNames'];
                                $designationsArray = $_POST['Designations'];
                                $workinghereArray = $_POST['WorkingHere'];
                                $RecordIDArray = $_POST['ReceordID']; // Corrected variable name
                                $ApplicationIDArray = $_POST['ApplicationID']; // Corrected variable name
                                $count = count($fromDateArray); // Count the number of FromDate entries

                                for ($index = 0; $index < $count; $index++) {
                                    // Escaping values
                                    $fromDateValue = mysqli_real_escape_string($db, $fromDateArray[$index]);
                                    $toDateValue = mysqli_real_escape_string($db, $toDateArray[$index]);
                                    $durationValue = mysqli_real_escape_string($db, $durationArray[$index]);
                                    $companyNameValue = mysqli_real_escape_string($db, $companiesNamesArray[$index]);
                                    $designationValue = mysqli_real_escape_string($db, $designationsArray[$index]);
                                    $workinghereValue = mysqli_real_escape_string($db, $workinghereArray[$index]);
                                    $RecordIDValue = mysqli_real_escape_string($db, $RecordIDArray[$index]); // Corrected variable name
                                    $ApplicationIDValue = mysqli_real_escape_string($db, $ApplicationIDArray[$index]); // Corrected variable name
                                    
                                    // Check if the record exists
                                   $checkQuery = "SELECT COUNT(*) as count FROM `totalexperience` WHERE `UserID` = '$admin_login_id' AND `ID` = '$RecordIDValue'";
                                //    exit();
                                    $result = mysqli_query($db, $checkQuery);
                                    $row = mysqli_fetch_assoc($result);
                                    
                                    if ($row['count'] > 0) {
                                        // Record exists, perform update
                                        $query = "UPDATE `totalexperience` SET 
                                                    `WorkingHere` = '$workinghereValue',
                                                    `FromDate` = '$fromDateValue',
                                                    `ToDate` = '$toDateValue',
                                                    `Duration` = '$durationValue',
                                                    `CompaniesNames` = '$companyNameValue',
                                                    `Designations` = '$designationValue'
                                                WHERE `UserID` = '$admin_login_id' AND `ID` = '$RecordIDValue'";
                                    } else {
                                        // Record does not exist, perform insert
                                        // $query = "INSERT INTO `totalexperience` (`UserID`, `ID`, `WorkingHere`, `FromDate`, `ToDate`, `Duration`, `CompaniesNames`, `Designations`) VALUES ('$admin_login_id', '$ApplicationIDValue', '$workinghereValue', '$fromDateValue', '$toDateValue', '$durationValue', '$companyNameValue', '$designationValue')";
                                        $query = "INSERT INTO `totalexperience` 
                                            (`UserID`, `ID`, `WorkingHere`, `FromDate`, `ToDate`, `Duration`, `CompaniesNames`, `Designations`) 
                                        VALUES 
                                            ('$admin_login_id', '$ApplicationIDValue', '$workinghereValue', '$fromDateValue', '$toDateValue', '$durationValue', '$companyNameValue', '$designationValue')
                                        ON DUPLICATE KEY UPDATE 
                                            `WorkingHere` = VALUES(`WorkingHere`),
                                            `FromDate` = VALUES(`FromDate`),
                                            `ToDate` = VALUES(`ToDate`),
                                            `Duration` = VALUES(`Duration`),
                                            `CompaniesNames` = VALUES(`CompaniesNames`),
                                            `Designations` = VALUES(`Designations`)";

                                    }
                                    
                                    // Execute the query
                                    $ExperienceQuery = mysqli_query($db, $query);
                                    
                                    // Check for errors
                                    if (!$ExperienceQuery) {
                                        echo "Error executing query: " . mysqli_error($db);
                                    }
                                }


                                if($update_registration_query){
                                    echo "<script>alert('Your Details has been Updated Successfully')</script>";
                                    echo "<script>window.location.href='preview'</script>";
                                } else {
                                    echo "<script>alert('Your details could not be updated. Please try again.')</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!------- table end ---->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
        <!-- Footer -->
        <footer id="page-footer">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Design & Developed by <a class="fw-semibold" href="https://www.aretesoftwares.com/"
                            target="_blank">Aretesoftwares.com</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <span class="fw-semibold">Copyright ©2024 ICAI, All Rights Reserved.</span> &copy; <span
                            data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <div id="customModal"
        style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; border: 1px solid #ccc; padding: 20px; z-index: 1000;">
        <h5>Error</h5>
        <p>You are not eligible for this award.</p>
        <button type="button" class="btn btn-lg btn-alt-danger fw-semibold" id="closeModalButton">Cancel</button>
    </div>
    <!-- Overlay -->
    <div id="overlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 999;">
    </div>
    <div id="customModal-1"
        style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; border: 1px solid #ccc; padding: 20px; z-index: 1000;">
        <h5>Error</h5>
        <p>Only nominee having no disciplinary case or proceeding pending is eligible.</p>
        <button type="button" class="btn btn-lg btn-alt-danger fw-semibold" id="closeModalButton-1">Cancel</button>
    </div>
    <!-- Overlay -->
    <div id="overlay-1"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 999;">
    </div>
    <!-- END Page Container -->
    <!-- <link rel="stylesheet" href="assets/vendor/libs/dropzone/dropzone.css" /> -->
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="./js/codebase.app.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="./js/plugins/chart.js/chart.umd.js"></script>
    <!-- Page JS Code -->
    <!-- <script src="./js/pages/be_pages_dashboard.min.js"></script> -->
    

    <script src="./js/validate.js"></script>
    <script>
        // window.addEventListener('beforeunload', function (e) {
        //     // Custom message for the confirmation dialog (not all browsers display this)
        //     var confirmationMessage = 'Are you sure you want to leave this page?';

        //     // Standard way to set the confirmation message
        //     e.returnValue = confirmationMessage;

        //     // For old browsers
        //     return confirmationMessage;
        // });

    </script>
    <script>
        document.getElementById('toDate').addEventListener('blur', function () {
            var fromDate = document.getElementById('fromdate').value;
            var TotalExperience = document.getElementById('TotalExperience');
            var duration = document.getElementById('duration');
            var toDate = this.value;
            if (toDate && fromDate && toDate < fromDate) {
                alert('Please ensure that the "To" date is not before the "From" date.');
                this.value = ''; // Optionally, clear the ToDate field
                TotalExperience.value = '';
                duration.value = '';
            }
        });
    </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    
    // AJAX function
    function sendDeleteAjax(id) {
        $.ajax({
            
            url: 'delete_records', // Make sure to include the correct PHP file
            type: 'POST',
            data: {
                id: id // Send the `id` to the server
            },
            success: function(response) {
                // Log the response for debugging
                // console.log(response);
                // Optionally, parse the JSON response
                try {
                    var jsonResponse = JSON.parse(response);
                    // console.log(jsonResponse.message);
                    // You can also perform other actions based on the response
                    if (jsonResponse.status === 'success') {
                        // alert('Record deleted: ' + jsonResponse.message);
                    } else {
                        // alert('Error: ' + jsonResponse.message);
                    }
                } catch (e) {
                    // console.error('Error parsing JSON response:', e);
                }
            },
            error: function(xhr, status, error) {
                // console.error('Error deleting record with ID ' + id + ':', error);
            }
        });
    }
    </script>

<script>
    $(function(){
  $('.datepickerr').datepicker({ dateFormat: 'yyyy-mm-dd'});
 
});

// Disable right-click context menu
document.addEventListener('contextmenu', function(event) {
    event.preventDefault();
});

// Disable specific key combinations
document.addEventListener('keydown', function(event) {
    // Disable F12 (Open Developer Tools)
    if (event.keyCode === 123) {
        event.preventDefault();
    }
    
    // Disable CTRL + SHIFT + I (Open Developer Tools)
    if (event.ctrlKey && event.shiftKey && event.keyCode === 73) {
        event.preventDefault();
    }

    // Disable CTRL + SHIFT + J (Open Console)
    if (event.ctrlKey && event.shiftKey && event.keyCode === 74) {
        event.preventDefault();
    }

    // Disable CTRL + U (View Source)
    if (event.ctrlKey && event.keyCode === 85) {
        event.preventDefault();
    }

    // Disable CTRL + SHIFT + C (Inspect Element)
    if (event.ctrlKey && event.shiftKey && event.keyCode === 67) {
        event.preventDefault();
    }
});

</script>




</body>
</html>