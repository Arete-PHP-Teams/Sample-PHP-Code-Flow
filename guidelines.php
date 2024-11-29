<?php
error_reporting(0);
//ini_set('display_errors',1);

include 'inc/dbcon.php';
include 'inc/csrf_token.php';
include 'inc/function.php';
$admin_login_id = $_SESSION["admin_login_id"];
if (empty($admin_login_id)) {
    header('Location: index');
}
// $UsrCheck = mysqli_query($db, "SELECT * FROM `applicationregistration` WHERE DeletedStatus='0' AND FinalStatus='1' AND UserID='$admin_login_id'");
// $NumRows = mysqli_num_rows($UsrCheck);
// if($NumRows == 1){
//     header("Location:preview");
// }
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
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <nav id="sidebar" style="background-color: #08aed1 !important">
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
                                            <h1 class="h4 fw-bold mt-3 mb-1">Eligibility Criteria </h1>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mb-1">
                                        You can nominate yourself for '40 Under 40 - CA Business Leaders Awards' if you meet the below-mentioned eligibility criteria:
                                        </p>
                                        <ul>
                                            <li>Your minimum average business turnover in the last 3 years must be Rs. 2000 crores  </li>
                                            <li>You must possess at least 7 years of total experience and at least 3 years in the current organisation</li>
                                            <li>You should be born on or after 01/10/1984 i.e. you should be below 40 years of age</li>
                                            <li>Your current designation must be either of these - Chairman / MD / President / CEO</li>
                                            <li>You should not be holding a Certificate of Practice (COP) </li>
                                        </ul>
                                        <p><strong>Please note:</strong> Nominations are open only for members serving in the industry and business.</p>
                                        <h1 class="h4 fw-bold mt-3 mb-1">What are the evaluation parameters? </h1>
                                        <p class="mb-1">While making the nomination application, you have to describe one effective project undertaken by you with the below-mentioned details</p>
                                        <ul>
                                            <li>Specification of the project objectives  </li>
                                            <li>Innovative methodology applied in its execution and implementation  </li>
                                            <li>New digital technologies put to use</li>
                                            <li>Feasibility of the plan or project competency and relevance </li>
                                            <li>Risk involvement and mitigation strategy devised</li>
                                            <li>Value addition created for stakeholders and contribution to sustainability and reporting thereof</li>
                                            <li>Project execution effectiveness in terms of cost and timelines</li>
                                        </ul>
                                        <h1 class="h4 fw-bold mt-3 mb-1">Documents to submit with nomination application </h1>
                                        <p class="mb-1">While making the application, please submit the following documents:</p>
                                        <ul>
                                            <li>Last 3 years financial statements for turnover assessment</li>
                                            <li>Appointment letter for experience verification</li>
                                            <li>Supporting documents for verifying the information specified under the evaluation parameters </li>
                                            <li>PPT with the relevent information as per the sample <a href="storage/Sample.pptx" target="_blank" rel="noopener noreferrer">Download Here</a> </li>
                                            <li>Any other information as deemed necessary</li>
                                        </ul>
                                        <p class="mb-1">
                                        After all the applications have been received, a jury will carefully assess and finalise the list of most deserving 40 under 40 chartered accountants. Selected candidates would be invited for the ICAI Awards and Leadership Summit 2024. The CA Business Leaders Townhall gala event will be exclusively for the professionals engaged in various industries sharing useful insights on vital matters of the economy. 
                                        </p>
                                        <p class="mb-1">
                                        The ICAI Awards are being recognised as one of the most prestigious awards amongst the CA fraternity. Be a part of this grand event by nominating yourself.
                                        </p>
                                    </div>
                                </div>
                            </div>
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
    <!-- END Page Container -->
    <!-- <link rel="stylesheet" href="assets/vendor/libs/dropzone/dropzone.css" /> -->
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="./js/codebase.app.min.js"></script>




</body>
</html>