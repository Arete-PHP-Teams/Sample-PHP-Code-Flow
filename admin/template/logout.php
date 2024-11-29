<?php
   session_start();
   error_reporting(0);
   unset($_SESSION['AdminId']);
   unset($_SESSION['Username']);
   header("Location: index");
?>