<?php
error_reporting(0);
include 'inc/dbcon.php';
include 'inc/csrf_token.php';
include 'mail_functions.php';
if (!empty($_SESSION["admin_login_id"])) {
  header("Location: registration");
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Nomination Form</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="robots" content="">
  <!-- Open Graph Meta -->
  <meta property="og:title" content="">
  <meta property="og:site_name" content="Codebase">
  <meta property="og:description" content="">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

  <!-- END Icons -->
  <!-- Stylesheets -->
  <!-- Codebase framework -->
  <link rel="stylesheet" id="css-main" href="./css/codebase.min.css">
  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
  <!-- END Stylesheets -->
</head>
<style>
  .modal-content {
    background-color:#fff;
  }
</style>
<style>
        .blinking {
            animation: blink-animation 2.5s steps(2, start) infinite;
            color: white;
            /* Change the color if you want */
        }

        @keyframes blink-animation {
            from {
                visibility: visible;
            }

            to {
                visibility: hidden;
            }
        }
    </style>
<body>
<!--------------------->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="./img/Sustainability Reporting Awards-01.jpg" class="img-fluid" style="width:100%;">
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
<!---------------------->
  <!-- Page Container -->
  <div id="page-container" class="main-content-boxed" style="background-image: url('./img/photo34@2x.jpg'); background-position: center;
    background-size: cover; background-repeat: no-repeat;">
    <!-- Main Container -->
    <main id="main-container">
      <!-- Page Content -->
      <div class="bg-image">
        <div class="row mx-0">
          
          <div class="col-md-6 col-xl-6 align-items-center bg-body-extra-light" style="margin: 4% auto; border-radius:10px;">
            <div class="">
              <!-- Header -->
              <div class="px-4 py-2 mb-4">
                <div class="link-fx fw-bold text-center">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="text-center">
                        <img src="./img/icai-75-logo.jpg" alt="" class="img-fluid">
                      </div>
                    </div>
                </div>
                  <span class="fs-6 text-body-color">The Institute of Chartered Accountants of India</span>
                  <p class="mb-0 fw-medium">(Set up by an Act of Parliament)</p>
                  <!-- <h1 class="h4 fw-bold mt-2 mb-3">CA BUSINESS LEADERS AWARD NOMINATION FORM</h1> -->

            <h1 class="h4 fw-bold mt-2 mb-3">ICAI 40 Under 40 - CA Business Leaders Awards</h1>

                </div>
                <h2 class="h5 fw-medium text-muted mb-0">Create New Account</h2>
              </div>
              <!-- END Header -->
              <!-- Sign In Form -->
              <form class="js-validation-signin px-4" method="POST" autocomplete="off">
                <input type="hidden" name="_token" id="csrf_token" value="<?php echo $token; ?>" class="form-control">
                <div class="row">

                <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" id="PersonName" name="Name" placeholder="Nominee Name"
                    required="">
                  <label class="form-label" for="PersonName">Nominee Name <span class="text-danger">*</span></label>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email Address"
                    required="">
                  <label class="form-label" for="Email">Email Address <span class="text-danger">*</span></label>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-4 position-relative">
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter Password" required="">
                    <label class="form-label" for="Password">Password <span class="text-danger">*</span></label>
                    <button type="button" class="btn btn-outline-secondary position-absolute top-50 end-0 translate-middle-y" id="togglePassword" style="border: none; height: 55px; width: 45px;">
                      <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                  </div>
                </div>

                <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" id="MobileNo" name="MobileNo" placeholder="Mobile Number"
                    required="" maxlength="10">
                  <label class="form-label" for="MobileNo">Mobile Number <span class="text-danger">*</span></label>
                  <p id="phoneError" style="color: red; display: none;">Please enter a valid
                                                10-digit mobile number.</p>
                </div>
                </div>
                <!-- <div class="col-md-6">
                <div class="form-floating mb-4">
                  <input type="date" class="form-control" id="IncorporationDate" name="IncorporationDate" placeholder="Enter Date of Incorporation" min="1900-01-01" max="2099-12-31">
                  <label class="form-label" for="IncorporationDate">Date of Incorporation</label>
                </div>
                </div> -->
                </div>

                <div class="mb-4">
                  <button type="submit" id="btn_login" class="btn btn-lg btn-alt-success fw-semibold">Submit</button>
                  <a href="index" class="btn btn-lg btn-alt-primary fw-semibold">Login</a>
                  <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 float-end" href="forgot-password">
                      Forgot Password?
                    </a>
   

                 

                  <!-- <label class="form-check-label mt-4 text-center" for="login-remember-me">Copyright &copy; 2023 ICAI,
                    All Rights Reserved. <span data-toggle="year-copy"></span></label> -->
                </div>
              </form>
              <?php 
                if (isset($_POST['Name'], $_POST['Email'], $_POST['Password'], $_POST['MobileNo']) && empty($csrf_error)) {
                  $Name = mysqli_real_escape_string($db, $_POST['Name']);
                  $Email = mysqli_real_escape_string($db, $_POST['Email']);
                  $Password = mysqli_real_escape_string($db, $_POST['Password']);
                  $MobileNo = mysqli_real_escape_string($db, $_POST['MobileNo']);
                  $IncorporationDate = mysqli_real_escape_string($db, $_POST['IncorporationDate']);

                  $ValidateUserPhone = mysqli_query($db, "SELECT * FROM `users` WHERE MobileNo='$MobileNo' AND DeletedStatus='0'");
                  $num_rows1 = mysqli_num_rows($ValidateUserPhone);

                  $ValidateUser = mysqli_query($db, "SELECT * FROM `users` WHERE EmailID='$Email' AND DeletedStatus='0'");
                  $num_rows = mysqli_num_rows($ValidateUser);
                  if($num_rows === 0){              
                    if($num_rows1 === 0){
                      $RegisterQuery = mysqli_query($db, "INSERT INTO `users` (`ID`, `AdminName`, `EmailID`, `Password`, `MobileNo`, `DateofIncorporation`, `DeletedStatus`, `LastLogin`, `CreatedAt`) VALUES (NULL, '$Name', '$Email', '$Password', '$MobileNo', '$IncorporationDate', '0', NULL, current_timestamp())");
                
                      if ($RegisterQuery === TRUE) {
                        CreateAccount($Email,$Name);
                          // echo '<div class="alert alert-success mt-3" id="register_en"></div>';
                          echo "<script>alert('Account Created Successfully....')</script>";  
                          echo "<script>window.location.href='index'</script>";  
                      } else {
                          echo '<div class="alert alert-danger mt-3" id="register_en">Account not created yet. Please try again.</div>';
                          echo "<script>window.location.href='create-account'</script>";
                      }
                    } else {
                      echo '<div class="alert alert-danger mt-3" id="register_en">Mobile No is already exist.</div>';
                    }
                  } else {
                    echo '<div class="alert alert-danger mt-3" id="register_en">Email Address is already exist.</div>';
                  }
              
              } elseif (!empty($csrf_error)) {
                  echo '<div class="alert alert-danger mt-3" id="register_en">' . $csrf_error . '</div>';
              }
                           
              ?>
              <!-- END Sign In Form -->
            </div>
          </div>
        </div>
        <p class="m-2 blinking fw-bold text-center" autofocus style="font-size: inherit;margin-top: -45px !important;">
        The last date of submitting the nomination form is DD-MM-YYYY. Forms to be filled online
        only
    </p>
      </div>
      
      <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
  </div>
  <!-- END Page Container -->
  <!--
        Codebase JS
        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
  <script src="./js/codebase.app.min.js"></script>
  <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
  <script src="./js/lib/jquery.min.js"></script>
  <!-- Page JS Plugins -->
  <script src="./js/plugins/jquery-validation/jquery.validate.min.js"></script>
  <!-- Page JS Code -->
  <script src="./js/pages/op_auth_signin.min.js"></script>
  <script>
    document.getElementById('PersonName').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^a-zA-Z\s]/g, '');
});


    document.getElementById('MobileNo').addEventListener('input', function () {
    const mobileInput = document.getElementById('MobileNo');
    const phoneError = document.getElementById('phoneError');
    mobileInput.value = mobileInput.value.replace(/\D/g, '');
    if (mobileInput.value.length === 10) {
        phoneError.style.display = 'none';
        mobileInput.setCustomValidity('');
    } else {
        phoneError.style.display = 'block';
        mobileInput.setCustomValidity('Invalid phone number');
    }
});
  </script>
<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#Password');
  const toggleIcon = document.querySelector('#toggleIcon');

  togglePassword.addEventListener('click', function () {
    // Toggle the type attribute for showing or hiding the password
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // Toggle the icon between 'eye' and 'eye-slash'
    toggleIcon.classList.toggle('bi-eye');
    toggleIcon.classList.toggle('bi-eye-slash');
  });
</script>

</body>
</html>