<?php
  session_start();
  error_reporting(0);
  include 'inc/dbcon.php';
  include 'inc/function.php';
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
    <title>Nomination Form Forgot Password</title>
    <meta name="description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <!-- <link rel="shortcut icon" href="assets/media/favicons/favicon.png"> -->
    <!-- <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png"> -->
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
  <body>
    <!-- Page Container -->
    <div id="page-container" class="main-content-boxed" style="background-image: url('./img/photo34@2x.jpg'); background-position: center;
    background-size: cover; background-repeat: no-repeat;">
      <!-- Main Container -->
      <main id="main-container" class="">
        <!-- Page Content -->
        <div class="bg-image">
          <div class="row mx-0">
             <div class="col-md-6 col-xl-6 align-items-center bg-body-extra-light" style="margin: 4% auto; border-radius:10px;">
              <div class="position-relative">
                <!-- Header -->
                <div class="px-4 py-2 mb-1">
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
                  <!--<span class="fs-6 text-body-color ">Women & Young Members Excellence Committee</span>-->
                  <!-- <h1 class="h3 fw-bold mt-4 mb-2">Create New Account</h1> -->
                  <!-- <h1 class="h3 fw-bold mt-2 mb-3">CA Business Leaders Award Nomination Form</h1> -->

              <h1 class="h4 fw-bold mt-2 mb-3">ICAI 40 Under 40 - CA Business Leaders Awards</h1>

                  </div>
                  <h2 class="h5 fw-medium text-muted mt-4 mb-0">Forgot Password</h2>
                </div>
                <!-- END Header -->
                <!-- Reminder Form -->
                <form class="js-validation-reminder px-4" method="POST" autocomplete="off">
                  <input type="hidden" name="forgototp" id="otp" class="form-control" value="<?php echo rand(100000, 999999);  ?>">
                  <!-- Email Id input -->
                  <div class="form-floating mb-4">
                      <input type="email" class="form-control" name="name" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter your email" <?php echo empty($_SESSION['email']) ? 'required' : ''; ?> <?php echo !empty($_SESSION['email']) ? 'disabled' : ''; ?>>
                      <label class="form-label" for="name">Email Id</label>
                  </div>
                 
                  <!-- OTP input -->
                  <div class="form-floating mb-4" style="<?php echo !empty($_SESSION['email']) ? 'display:block;' : 'display:none;'; ?>">
                      <input type="text" class="form-control" maxlength="6" name="otp" placeholder="Enter OTP" pattern="[0-9]{6}" title="Please enter a 6-digit number" <?php echo !empty($_SESSION['email']) ? 'required' : ''; ?>>
                      <label class="form-label" for="otp">Enter OTP</label>
                  </div>

                  <!-- New Password input -->
                  <div class="form-floating mb-4 position-relative" style="<?php echo !empty($_SESSION['email']) ? 'display:block;' : 'display:none;'; ?>">
                      <input type="password" class="form-control" name="new_password" id="new_password"  placeholder="New Password" <?php echo !empty($_SESSION['email']) ? 'required' : ''; ?>>
                      <label class="form-label" for="new_password">Enter New Password</label>
                      <button type="button" class="btn btn-outline-secondary position-absolute top-50 end-0 translate-middle-y" id="togglePassword" style="border: none;height: 55px;width: 45px;">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                      </button>
                  </div>

                  <!-- Confirm New Password input -->
                  <div class="form-floating mb-4 position-relative" style="<?php echo !empty($_SESSION['email']) ? 'display:block;' : 'display:none;'; ?>">
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" <?php echo !empty($_SESSION['email']) ? 'required' : ''; ?> onchange="if(this.value !== document.querySelector('[name=new_password]').value) { alert('Confirm Passwords do not match with new password!'); this.value = ''; }">
                      <label class="form-label" for="confirm_password">Enter New Confirm Password</label>
                      <button type="button" class="btn btn-outline-secondary position-absolute top-50 end-0 translate-middle-y" id="togglePassword1" style="border: none;height: 55px;width: 45px;">
                        <i class="bi bi-eye" id="toggleIcon1"></i>
                      </button>
                  </div>
                  
                  <!-- Buttons -->
                  <div class="mb-4">
                    
                      <button type="submit" name="Forgot" class="btn btn-lg btn-alt-primary fw-semibold" style="<?php echo empty($_SESSION['email']) ? 'display:inline-block;' : 'display:none;'; ?>">Reset Password</button>
                      <button type="submit" name="SubmitOTP" class="btn btn-lg btn-alt-success fw-semibold" style="<?php echo !empty($_SESSION['email']) ? 'display:inline-block;' : 'display:none;'; ?>">Submit</button>   
                      <a class="btn btn-lg btn-default fw-semibold border" href="index">
                              <i class="fa fa-arrow-left opacity-50 me-1"></i> Login
                          </a>
                                         
                  
                  </div>
              </form>
              <form  method="post"  >
                <button type="submit" name="Clear" class="btn btn-lg btn-alt-danger fw-semibold" style="<?php echo !empty($_SESSION['email']) ? 'display:block;' : 'display:none;'; ?>  position: absolute; right: 25px; bottom: 0px;">Clear</button>                      
              </form>

<style>
  .clear-btn {
    position: absolute;
    bottom: 8.4%;
    z-index: 9999;
    left: 25%;
  }
</style>

              <?php
              if (isset($_POST['Forgot'])) {
                $email = mysqli_real_escape_string($db, $_POST['name']);
                $otp = mysqli_real_escape_string($db, $_POST['otp']);
                $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
                $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
            
                $FetchUser = mysqli_query($db, "SELECT * FROM `users` WHERE DeletedStatus='0' AND EmailID='$email'");
                $numrows = mysqli_num_rows($FetchUser);
            
                if ($numrows === 1) {
                    $read = mysqli_fetch_assoc($FetchUser);
                    $_SESSION['email'] = $read['EmailID'];
                    $_SESSION['fotgotOTP'] = $_POST['forgototp']; // Note: This should be generated and sent via email
                    ForgotPassword($_SESSION['email'], $_SESSION['fotgotOTP']);
            
                    // Redirect to avoid re-submission
                    echo '<div class="alert alert-success mt-3">OTP send successfully to your Email id. Redirecting to OTP login....</div>';
                    echo "<script>setTimeout(function(){window.location.href = 'forgot-password';}, 5000);</script>";

                   
            
                } else {
                    echo '<div class="alert alert-danger mt-3">Record Not Found</div>';
                }
            }
            
            if (isset($_POST['SubmitOTP'])) {
                $email = $_SESSION['email'];
                $otp = mysqli_real_escape_string($db, $_POST['otp']);
                $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
                $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
            
                if ($_SESSION['fotgotOTP'] === $otp) {
                    if ($new_password === $confirm_password) {
                        // $hashed_password = md5($new_password); // Hash the new password
                        $hashed_password = $new_password; // Hash the new password
                        $UpdatePassword = mysqli_query($db, "UPDATE `users` SET `Password`='$hashed_password' WHERE `EmailID`='$email'");
            
                        if ($UpdatePassword) {
                            echo '<div class="alert alert-success mt-3">Password Changed Successfully, Please Login Again</div>';
                            session_destroy();
                            echo '<script>setTimeout(function() {window.location.href = "index";}, 3000);</script>';
                        } else {
                            echo '<div class="alert alert-danger mt-3">Password was not changed, please try again</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger mt-3">Passwords do not match</div>';
                    }
                } else {
                  echo '<div class="alert alert-danger mt-3">Incorrect OTP</div>';
                }
            }


              if(isset($_POST['Clear']))
              {
                session_destroy();
                echo "<script>window.location='index'</script>";

              }
              ?>

                <!-- END Reminder Form -->
              </div>
            </div>
          </div>
        </div>
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
            <!-- <p class="m-2">
                          The last date of submitting the nomination form is DD-MM-YYYY. Forms to be filled online
                          only
                      </p> -->
  <p class="m-2 blinking fw-bold text-center" autofocus style="font-size: inherit;margin-top: -45px !important;">
        The last date of submitting the nomination form is DD-MM-YYYY. Forms to be filled online
        only
    </p>



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
    <script src="./js/pages/op_auth_reminder.min.js"></script>
    <script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#new_password');
  const toggleIcon = document.querySelector('#toggleIcon');

  togglePassword.addEventListener('click', function () {
    // Toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // Toggle the eye / eye-slash icon
    toggleIcon.classList.toggle('bi-eye');
    toggleIcon.classList.toggle('bi-eye-slash');
  });

  const togglePassword1 = document.querySelector('#togglePassword1');
  const confirm_password = document.querySelector('#confirm_password');
  const toggleIcon1 = document.querySelector('#toggleIcon1');

  togglePassword1.addEventListener('click', function () {
    // Toggle the type attribute
    const type = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
    confirm_password.setAttribute('type', type);
    
    // Toggle the eye / eye-slash icon
    toggleIcon1.classList.toggle('bi-eye');
    toggleIcon1.classList.toggle('bi-eye-slash');
  });
</script>
  </body>
</html>