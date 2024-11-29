<?php
   session_start();
   error_reporting(0);
   include "connection.php";
   date_default_timezone_set('Asia/Kolkata');
   if(empty($_SESSION["AdminId"])){
      header("Location:login");
   }
   
$id = $_GET['id'];
$query = mysqli_query($db, "UPDATE `users` SET `DeletedStatus` ='1' where ID  ='$id'");
if ($query) {
     echo "<script>alert('Record successfully deleted.');window.location.href='account-created';</script>";
} else {
     echo "<script>alert('Record not deleted.');
           window.location.href='account-created';</script>";
}
?>