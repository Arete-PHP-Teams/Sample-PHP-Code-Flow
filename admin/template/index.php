<?php
session_start();
error_reporting(0);
include "connection.php";
date_default_timezone_set('Asia/Kolkata');
if (!empty($_SESSION["AdminId"])) {
  header("Location:submitted-application");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Plugins css start-->
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  <style>
.show-hide {
    cursor: pointer;
    display: inline-block;
    margin-left: 10px;
}

.show-hide .fa-eye, .show-hide .fa-eye-slash {
    color: #333; /* Adjust color as needed */
}


  </style>
</head>

<body>
  <!-- login page start-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-5"><img class="bg-img-cover bg-center" src="../assets/images/login/3.jpg" alt="looginpage">
      </div>
      <div class="col-xl-7 p-0">
        <div class="login-card login-dark">
          <div>
            <div class="login-main">
              <!-- <div class="text-center mb-3">
                <img src="../assets/img/login-logo.png" alt="">
              </div> -->
              <div class="px-4 py-2 mb-4">

                  <div class="link-fx fw-bold text-center">

                    <div class="text-center">

                      <img src="../../img/icai-75-logo.jpg" alt="">

                    </div>

                    <span class="fs-6 text-body-color">The Institute of Chartered Accountants of India</span> 
                    <p class="mb-0 fw-medium">(Set up by an Act of Parliament)</p>
                    <!-- <span class="fs-6 text-body-color ">CA BUSINESS LEADERS AWARD NOMINATION FORM</span>  -->
                    <span class="fs-6 text-body-color ">ICAI 40 Under 40 - CA Business Leaders Awards</span> 

                  </div>

                  <!-- <h1 class="h3 fw-bold mt-4 mb-2">Welcome Back!</h1> -->

                  

                </div>

              <h2 class="h5 fw-medium text-muted mb-0">Please sign in</h2>
              <form class="theme-form" action="" method="POST">
                <!-- <h4>Sign in to account</h4>
                <p>Enter your email & password to login</p> -->
                <div class="form-group">
                  <label class="col-form-label">User Id</label>
                  <input class="form-control" type="email" name="Username" required="" placeholder="Enter Username">
                </div>
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="Password" id="passwordInput"  required="" placeholder="Enter Password">
                    <div class="show-hide"><i id="togglePassword" class="fas fa-eye"></i></div></div>
                </div>
                <div class="form-group mb-0">
                  
                  <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                </div>
              </form>
              <?php
                 if (isset($_POST["Username"]) AND !empty($_POST["Username"]) AND isset($_POST["Password"]) AND !empty($_POST["Password"])) {
                  $Username = $_POST['Username'];
                  $Password = md5($_POST['Password']);
                  
                  $querychk = mysqli_query($db, "SELECT * from admin where Username='$Username' AND Password='$Password' AND DeletedStatus = '0'");
                  $querychknum = mysqli_num_rows($querychk);
                  if ($querychknum == 1) {
                    $row = mysqli_fetch_assoc($querychk);
                    $_SESSION["AdminId"] = $row['AdminId'];
                    $_SESSION["Username"] = $row['Username'];
                    echo "<script>window.location.href='submitted-application'</script>";
       
                }else{
                     echo "<script>alert('Wrong Account details.');
          
                              window.location.href='index';</script>";
                }
       
       
              }
              ?>
          </div>
        </div>
      </div>
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
  <!-- Sidebar jquery-->
  <script src="../assets/js/config.js"></script>
  <!-- Plugins JS start-->
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="../assets/js/script.js"></script>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('passwordInput');
            const togglePassword = document.getElementById('togglePassword');

            if (passwordInput && togglePassword) {
                togglePassword.addEventListener('click', function () {
                    // Toggle the type of the password input
                    const type = passwordInput.type === 'password' ? 'text' : 'password';
                    passwordInput.type = type;

                    // Toggle the eye icon
                    if (type === 'password') {
                        togglePassword.classList.remove('fa-eye-slash');
                        togglePassword.classList.add('fa-eye');
                    } else {
                        togglePassword.classList.remove('fa-eye');
                        togglePassword.classList.add('fa-eye-slash');
                    }
                });
            } else {
                console.error('Password input or toggle password icon not found.');
            }
        });

  </script>
  </div>
</body>

</html>