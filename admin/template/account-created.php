<?php 
 session_start();
 error_reporting(0);
 include "connection.php";
 date_default_timezone_set('Asia/Kolkata');
 if(empty($_SESSION["AdminId"])){
    header("Location:index");
 }
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
        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
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
                <h5>Account Created</h5>
              </div>

            </div>
          </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
              <div class="card">



                <div class="card-body">
                  <div class="table-responsive table-bordered">

                    <table class="display" id="basic-1">
                      <thead>
                        <tr>
                          <th>Sr.no</th>
                          <th>Name</th>
                          <th>User&nbsp;ID</th>
                          <th>Pasword</th>
                          <th>Mobile&nbsp;No.</th>
                          <!-- <th>Date of Incorporation</th> -->
                          <th>Registration&nbsp;Date</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $account = mysqli_query($db,"SELECT * FROM `users` WHERE DeletedStatus ='0' ORDER BY ID DESC");
                          $count = 1;
                          while($read = mysqli_fetch_assoc($account))
                          {
                        ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $read['AdminName']; ?></td>
                          <td><?php echo $read['EmailID']; ?></td>
                          <td><?php echo $read['Password']; ?></td>
                          <td><?php echo $read['MobileNo']; ?></td>
                          <!-- <td><?php if(!empty($read['DateofIncorporation'])) { echo date("d-M-Y", strtotime($read['DateofIncorporation'])); } else { echo "N/A"; } ?></td> -->
                          <td><?php echo date("d-M-Y", strtotime($read['CreatedAt'])); ?></td>
                          <td>
                            <ul class="action">
                              <li class="delete"><a href="delete_users?id=<?php echo $read['ID']; ?>" onclick="return confirm('Are you sure want to delete this record ?')"><i class="icon-trash"></i></a></li>
                            </ul>
                          </td>
                        </tr>
                        <?php $count = $count+1; }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Zero Configuration  Ends-->

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
  <!-- <script src="../assets/js/theme-customizer/customizer.js"></script> -->
</body>

</html>