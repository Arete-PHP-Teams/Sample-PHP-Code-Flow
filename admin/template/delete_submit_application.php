<?php
session_start();
error_reporting(0); // Enable error reporting
// ini_set('display_errors', 1); // Display errors
include "connection.php";
date_default_timezone_set('Asia/Kolkata');

// Check if user is logged in
if (empty($_SESSION["AdminId"])) {
    header("Location: login.php");
}

$id = intval($_GET['id']); // Sanitize ID

// Update applicationregistration table
$query1 = "UPDATE `applicationregistration` SET `DeletedStatus` = '1' WHERE `ID` = $id";
$execution1 = mysqli_query($db, $query1);

if ($execution1) {
    // Fetch the user ID
    $query3 = "SELECT `UserID` FROM `applicationregistration` WHERE `ID` = $id AND `DeletedStatus` = '1'";
    $fetchUser = mysqli_query($db, $query3);
    $read = mysqli_fetch_assoc($fetchUser);

    if ($read) {
        $UserId = $read['UserID'];

        // Update totalexperience table
        $query2 = "UPDATE `totalexperience` SET `DeletedStatus` = '1' WHERE `UserID` = $UserId";
        $execution2 = mysqli_query($db, $query2);
    }

    echo "<script>alert('Record successfully deleted.');window.location.href='parital-application';</script>";
} else {
   echo "<script>alert('Record not deleted.');window.location.href='parital-application';</script>";
}
?>
