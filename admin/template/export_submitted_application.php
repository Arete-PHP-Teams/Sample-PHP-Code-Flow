<?php
   session_start();
   error_reporting(0);
   include "connection.php";
   date_default_timezone_set('Asia/Kolkata');
   if(empty($_SESSION["AdminId"])){
      header("Location:index.php");
   }
   $query = mysqli_query($db, "SELECT * from applicationregistration where  DeletedStatus = '0'  AND FinalStatus='1' ORDER BY ID ASC");
   if(mysqli_num_rows($query) > 0)
   {
    $delimiter = ",";
    $filename = "Submitted_Application_Records" . date('Y-m-d') . ".csv";
    $f = fopen('php://memory', 'w');
    $fields = array('Registration Number', 'Nomination Type', 'Name', 'ICAI Membership No', 'Email', 'Alternative Email', 'Mobile No', 'Alternative Mobile No', 'DOB','Nominee Present Address', 'Nominee Permanent Address', 'Certificate Practice', 'Disciplinary Case', 'Company Name', 'Designation', 'AvrageBusinessTurnover3Year', 'Current Company Experience', 'Total Experience', 'Project Objective Specification', 'Innovative Methodology Applied', 'New Digital Technologies', 'Feasibility of The Plan Project', 'Risk Inolvement Mitigation Strategy Devised', 'Value Addition Create Stakeholder', 'Project Execution effectiveness terms', 'Achievements Any Person Award', 'Speciy Your Society Contribution');
    fputcsv($f, $fields, $delimiter);
    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['RegistrationNo'],$row['NominationType'],$row['PersonName'],$row['ICAIMembershipNo'],$row['EmailID'],$row['AltEmail'],$row['MobileNo'],$row['AltMobile'],$row['BirthDate'],$row['NomineePresentAddress'],$row['NomineePermanentAddress'],$row['CertificatePractice'],$row['DisciplinaryCase'],$row['CompanyName'],$row['Designation'],$row['AvrageBusinessTurnover3Year'],$row['ExperienceCurrentCompany'],$row['TotalExperience'],$row['ProjectObjectiveSpecification'],$row['InnovativeMethodologyApplied'],$row['NewDigitalTechnologies'],$row['FeasibilityofThePlanProject'],$row['RiskInolvementMitigationStrategyDevised'],$row['ValueAdditionCreateStakeholder'],$row['ProjectExecutioneffectivenessterms'],$row['AchievementsAnyPersonAward'],$row['SpeciyYourSocietyContribution']);
        fputcsv($f, $lineData, $delimiter);
    }
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    fpassthru($f);
   }else{
    header("Location: submitted-application.php");    
    }
    

   ?>