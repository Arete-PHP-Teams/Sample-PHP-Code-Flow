<?php
   session_start();
   error_reporting(0);
   include "connection.php";

   date_default_timezone_set('Asia/Kolkata');
   if(empty($_SESSION["AdminId"])){
      header("Location:index");
   }
   $fetchrecord = mysqli_query($db, "SELECT * FROM `applicationregistration` WHERE DeletedStatus='0' AND ID='". $_GET['id'] ."'");
   $read = mysqli_fetch_assoc($fetchrecord);

   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/img/login-logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/img/login-logo.png" type="image/x-icon">
    <title>ICAI Awards Nomination Form Admin</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/datatables.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"> <span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php include('header.php'); ?>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include('navbar.php'); ?>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12">
                                <h5>Submitted Application</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid" >
                    <div class="row" id="content">
                        <!-- Zero Configuration  Starts-->
                        <div class="card p-4 shadow mb-4" id="sectionToPrint">
                            <div class="tab-content">
                                <div class="tab-pane fade active show ul-design">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <!-- <td><img src="../../assets/img/icai-75-logo.jpg" alt=""></td> -->
                                                <td class="text-center">
                                                    <!-- <h1 class="h3 fw-bold mt-3 mb-4">CA BUSINESS LEADERS AWARD NOMINATION FORM</h1> -->
                                                    <h1 class="h3 fw-bold mt-3 mb-4">ICAI 40 Under 40 - CA Business Leaders Awards</h1>

                                                </td>
                                                <!-- <td> <img src="../../assets/img/glopac-logo.jpg" alt=""></td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="tab-pane fade active show ul-design">
                                    <h1 class="h3 fw-bold mt-3 mb-4">Preview
                                    <button id="printButton" onclick="printbtn()" class="float-end btn btn-lg btn-alt-success fw-semibold ms-2 print">Print</button>
                                    </h1>
                                    <!-- <a name="" id="" class="btn btn-primary d-none" href="#" role="button">kjj</a> -->

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
                                        <th>Date of Birth</th>
                                        <td><?php echo date('d-M-Y', strtotime($read['BirthDate'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Proof of Birth</th>
                                        <td><a target="_blank" href="../../storage/BirthProof/<?php echo $read['DoBProofe']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
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
                                        <td><a target="_blank" href="../../storage/3YearCompanyAudit/<?php echo $read['ThreeYearCompanyAudit']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
                                    </tr>
                                    <tr>
                                        <th>Experience in Current Company </th>
                                        <td><?php echo $read['ExperienceCurrentCompany']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Appointment Letter</th>
                                        <td><a target="_blank" href="../../storage/AppointmentLetter/<?php echo $read['AppointmentLetter']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
                                    </tr>
                                    <tr>
                                        <th>Total Experience</th>
                                        <td><?php echo $read['TotalExperience']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Overall Experience Letter's</th>
                                        <td><a target="_blank" href="../../storage/OverallExperience/<?php echo $read['OverallExperience']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
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
                                //    echo "SELECT * FROM `totalexperience` WHERE DeletedStatus='0'  AND ApplicationRegisterID='". $read['ID'] ."'";
                                       // $TotalExp = mysqli_query($db, "SELECT * FROM `totalexperience` WHERE DeletedStatus='0' AND UserID='$admin_login_id' AND ApplicationRegisterID='". $read['ID'] ."'");
                                $TotalExp = mysqli_query($db, "SELECT * FROM `totalexperience` WHERE DeletedStatus='0'  AND UserID='". $read['UserID'] ."'");
 
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
                                        <td><a target="_blank" href="../../storage/ProjectDetails/<?php echo $read['ProjectDetails']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a></td>
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
                                            <a target="_blank" href="../../storage/PPTAvailable/<?php echo $read['PPTAvailable']; ?>" class="btn btn-info" target="_blank" rel="noopener noreferrer">View</a>
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
                                            <strong>Declaration</strong>  I hereby declare that all information provided above is true and accurate to the best of my knowledge. I understand that any false statements or omissions may result in consequences as deemed appropriate.
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
                                <form method="post">
                                    <div class="mb-4">
                                        <input type="hidden" name="user_id" value="1" class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright text-start">
                        <p class="mb-0">Copyright ©2024 ICAI, All Rights Reserved. © 2024 </p>
                    </div>
                    <div class="col-md-6 footer-copyright text-end">
                        <p class="mb-0">Design & Developed by Aretesoftwares.com</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <!-- latest jquery-->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/sidebar-menu.js"></script>
    <script src="../assets/js/sidebar-pin.js"></script>
    <script src="../assets/js/slick/slick.min.js"></script>
    <script src="../assets/js/slick/slick.js"></script>
    <script src="../assets/js/header-slick.js"></script>
    <script src="../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script>
        
function printbtn() {
    const printbtn = document.getElementById('printButton');

    // Hide the button
    printbtn.style.display = 'none';

    // Trigger print after a small delay
    setTimeout(function () {
        window.print();
        // Show the button again after printing
        setTimeout(function () {
            printbtn.style.display = '';
        }, 100); // 0.1 seconds delay to show the button again
    }, 100); // 0.1 seconds delay before printing
}

    </script>

    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML; // save original page html to variable
            var printcontent = document.querySelector(el).innerHTML; // save content to be printed to variable
            document.body.innerHTML = printcontent; // display only content to be printed in document body
            window.print(); // print commands
            document.body.innerHTML = restorepage; // restore original page content
        }

        document.querySelector('.print').addEventListener('click', function () { // bind event to print button
            printContent('#sectionToPrint'); // initial print function on selector for content to be printed
        });

        // Add an event listener for the 'afterprint' event
        window.addEventListener('afterprint', function () {
            // Reload the page
            location.reload();
        });

    </script>
    
    <!-- <script src="../assets/js/theme-customizer/customizer.js"></script> -->
     <?php 
     
   
   
   class PDFExporter
   {
       private $personName;
       public function __construct($personName)
       {
           $this->personName = htmlspecialchars($personName, ENT_QUOTES, 'UTF-8');
           $this->outputScript();
       }
       private function outputScript()
       {
           echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js'></script>";
           echo "<script>
               function exportToPDF() {
              
             
                   const element = document.getElementById('content');
                   const exportButton = document.getElementById('DownloadPdf');
                
                   html2pdf()
                       .set({ filename: '" . $this->personName . "-document.pdf' })
                       .from(element)
                       .save()
                       .finally(() => {
                           exportButton.style.display = 'none';
                       });
               }
               // Add the event listener
               document.getElementById('DownloadPdf').addEventListener('click', exportToPDF);
           </script>";
       }
   }
    $personName = $read['PersonName']; 
    $pdfExporter = new PDFExporter($personName);
     ?>
</body>

</html>