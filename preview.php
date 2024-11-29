<?php
error_reporting(0);
include 'inc/dbcon.php';
include 'inc/csrf_token.php';
include 'inc/function.php';
include 'mail_functions.php';
$admin_login_id = $_SESSION["admin_login_id"];
if (empty($admin_login_id)) {
    header('Location: index');
}
$RegistrationForm = mysqli_query($db, "SELECT * FROM `applicationregistration` WHERE DeletedStatus='0' AND UserID='$admin_login_id'");
$read = mysqli_fetch_assoc($RegistrationForm);

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
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <!-- <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png"> -->
    <!-- END Icons -->
    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="./css/codebase.min.css">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
    <style>
        #main-container {
            background-color: #ace4ac2e;
        }

        .hidden {
            display: none;
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
                    <!-- Zero Configuration  Starts-->
                    <div class="card p-4 shadow mb-4" id="sectionToPrint">
                        <div class="tab-content">
                            <div class="tab-pane fade active show ul-design">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><img src="../../assets/img/icai-75-logo.jpg" alt=""></td>
                                            <td class="text-center">
                                                <h1 class="h4 fw-bold mt-2 mb-3 mb-4">ICAI 40 Under 40 - CA Business Leaders Awards</h1>
                                                <!-- <h1 class="h3 fw-bold mt-3 mb-4">CA BUSINESS LEADERS AWARD NOMINATION FORM</h1> -->
                                            </td>
                                            <td> <img src="../../assets/img/glopac-logo.jpg" alt=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade active show ul-design">
                                <h1 class="h3 fw-bold mt-3 mb-4">Preview
                                <?php if($read['FinalStatus'] == '0'  ) {?>
                                <a href="registration" id="Edit" class="float-end btn btn-lg btn-alt-info fw-semibold ms-2 print">Edit</a>
                                <?php } ?>
                                <button id="printButton" onclick="printbtn()" class="float-end btn btn-lg btn-alt-success fw-semibold ms-2 print">Print</button>
                                </h1>
                            </div>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Registration No.</th>
                                        <th>Nominee Type</th>
                                        <th>Nominee Name</th>
                                        <th>ICAI Membership No</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $read['RegistrationNo']; ?></td>
                                        <td><?php echo $read['NominationType']; ?></td>
                                        <td><?php echo $read['PersonName']; ?></td>
                                        <td><?php echo $read['ICAIMembershipNo']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $read['EmailID'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alternate Email</th>
                                        <td><?php echo $read['AltEmail'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mobile No</th>
                                        <td><?php echo $read['MobileNo'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alternate Mobile No</th>
                                        <td><?php echo $read['AltMobile'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth </th>
                                    <td><?php echo date('Y-m-d', strtotime($read['BirthDate'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Proof of Birth</th>
                                        <td><a target="_blank" href="storage/BirthProof/<?php echo $read['DoBProofe']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
                                    </tr>
                                    <tr>
                                        <th>Present Address of the Nominee</th>
                                        <td><?php echo $read['NomineePresentAddress']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Permanent Address of the Nominee</th>
                                        <td><?php echo $read['NomineePermanentAddress']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Certificate of Practice (COP)?</th>
                                        <td><?php echo $read['CertificatePractice']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Whether any disciplinary case or proceeding pending against nominee</th>
                                        <td><?php echo $read['DisciplinaryCase']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Company Name</th>
                                        <td><?php echo $read['CompanyName']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td><?php echo $read['Designation']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Average Business Turnover of last 3 Years <small class="text-danger">(in crore)</small></th>
                                        <td><?php echo $read['AvrageBusinessTurnover3Year']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>3 Years company's audited financial statements</th>
                                        <td><a target="_blank" href="storage/3YearCompanyAudit/<?php echo $read['ThreeYearCompanyAudit']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
                                    </tr>
                                    <tr>
                                        <th>Experience in Current Company </th>
                                        <td><?php echo $read['ExperienceCurrentCompany']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Appointment Letter</th>
                                        <td><a target="_blank" href="storage/AppointmentLetter/<?php echo $read['AppointmentLetter']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
                                    </tr>
                                    <tr>
                                        <th>Total Experience</th>
                                        <td><?php echo $read['TotalExperience']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Overall Experience Letter's</th>
                                        <td><a target="_blank" href="storage/OverallExperience/<?php echo $read['OverallExperience']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Duration</th>
                                        <th>Company Name</th>
                                        <th>Designation</th>
                                        <th>Currently Working</th>
                                    </tr>
                                    <?php 
                                        // $TotalExp = mysqli_query($db, "SELECT * FROM `totalexperience` WHERE DeletedStatus='0' AND UserID='$admin_login_id' AND ApplicationRegisterID='". $read['ID'] ."'");
                                        $TotalExp = mysqli_query($db, "SELECT * FROM `totalexperience` WHERE DeletedStatus='0' AND UserID='$admin_login_id'");
                                        $count = 1;
                                        while($fetch = mysqli_fetch_assoc($TotalExp)){
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($fetch['FromDate'])); ?></td>

                                        
                                        <td><?php echo date('Y-m-d', strtotime($fetch['ToDate'])); ?></td>
                                        <td>
    <?php
    $duration = $fetch['Duration'];

    // Check if the duration is already formatted
    if (strpos($duration, 'Years') === false && strpos($duration, 'Months') === false && strpos($duration, 'Days') === false) {
        // Replace Y, M, D with full words if not already formatted
        $formattedDuration = str_replace(
            ['Y', 'M', 'D'],
            [' Years ', ' Months ', ' Days'],
            $duration
        );
    } else {
        // If already formatted, use the existing duration
        $formattedDuration = $duration;
    }

    echo $formattedDuration;
    ?>
</td>

                                        <td><?php echo $fetch['CompaniesNames'] ?></td>
                                        <td><?php echo $fetch['Designations'] ?></td>
                                        <td><?php echo $fetch['WorkingHere'] ?></td>
                                    </tr>
                                    <?php $count++; } ?>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Project Details.</th>
                                        <td><a target="_blank" href="storage/ProjectDetails/<?php echo $read['ProjectDetails']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
                                    </tr>
                                    <tr>
                                        <th>Specification of the Project Objectives.</th>
                                        <td><?php echo $read['ProjectObjectiveSpecification']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Innovative methodology applied in its execution & implementation.</th>
                                        <td><?php echo $read['InnovativeMethodologyApplied']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>New digital technologies put to use.</th>
                                        <td><?php echo $read['NewDigitalTechnologies']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Feasibility of the plan or project competency and relevance.</th>
                                        <td><?php echo $read['FeasibilityofThePlanProject']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Risk involvement and mitigation strategy devised.</th>
                                        <td><?php echo $read['RiskInolvementMitigationStrategyDevised']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Value addition created for stakeholders and contribution to sustainability
                                            and reporting thereof.</th>
                                        <td><?php echo $read['ValueAdditionCreateStakeholder']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Project execution effectiveness in terms of cost and timelines.</th>
                                        <td><?php echo $read['ProjectExecutioneffectivenessterms']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>Achievements or any person award (if any).</th>
                                        <td><?php echo $read['AchievementsAnyPersonAward']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <th>Please specify your contribution to society (if any)</th>
                                        <td><?php echo $read['SpeciyYourSocietyContribution']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <th>PPT (if any)</th>
                                        <td>
                                            <a target="_blank" href="storage/PPTAvailable/<?php echo $read['PPTAvailable']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="declarationsCheckbox" <?php if($read['Declarations'] == 'Yes') { echo "Checked"; } ?> disabled="" readonly="">
                                            </div>
                                        </th>
                                        <td>
                                            <strong>Declaration</strong> I hereby declare that all information provided above is true and accurate to the best of my knowledge. I understand that any false statements or omissions may result in consequences as deemed appropriate.
                                     
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="mb-2">Declaration
                                            </h6>
                                            <!-- <strong> Tata Chemicals Limited </strong> -->
                                            I hereby declare that I have read all guidelines
                                            carefully and declare that all the
                                            information(s) given above and in the enclosures is/are true and correct
                                            to the best of my
                                            knowledge and belief. I also declare that, my present organization
                                            has complied with all applicable laws, enactments, orders,
                                            rules, regulations and other
                                            statutory requirements of the Central, State and local &amp; statutory
                                            authorities concerning the
                                            business and affairs of the organization. If at any time, any of the
                                            above information is found to
                                            be incorrect. My application would be cancelled from the nomination
                                            process.

                                               </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <strong><?php echo $read['PersonName']; ?> </strong>
                                            </div>
                                            <div>Name of Nominee</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php if($read['FinalStatus'] == '0'  ) {?>
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-4 text-start">
                                        <button type="submit" name="FinalSubmitApplication" class="btn btn-lg btn-alt-success fw-semibold ms-2 print">Submit Application</button>
                                    </div>
                                </div>
                            </form>
                            <?php } if(isset($_POST['FinalSubmitApplication'])){
                                    $FinalSubmit = mysqli_query($db, "UPDATE `applicationregistration` SET `FinalStatus`='1' WHERE `ID`='". $read['ID'] ."'");
                                    if ($FinalSubmit == TRUE) {
                                        // Registration Mail Sent Function Call
                                        Registration($read['EmailID'],$read['RegistrationNo']);
                                        echo "<script>alert('Congratulations! Your application has been successfully submitted.')</script>";
                                        echo "<script>window.location.href = 'preview'</script>";
                                    } else {
                                        echo "<script>alert('There was an error submitting your application. Please try again.')</script>";
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>
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
    <!-- END Page Container -->
    <!-- <link rel="stylesheet" href="assets/vendor/libs/dropzone/dropzone.css" /> -->
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="./js/codebase.app.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="./js/plugins/chart.js/chart.umd.js"></script>
    <!-- Page JS Code -->
    <!-- <script src="./js/pages/be_pages_dashboard.min.js"></script> -->
    <script src="./js/validate.js"></script>
</body>

</html>