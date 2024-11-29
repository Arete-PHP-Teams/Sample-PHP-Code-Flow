<?php
include 'inc/dbcon.php';
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
<style>
  .modal-content {
    background-color: #fff;
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
          <div class="col-md-6 col-xl-6 align-items-center bg-body-extra-light" style="margin: 5% auto; border-radius:10px;">
            <div class="">
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
                  <h1 class="h4 fw-bold mt-2 mb-3">ICAI 40 Under 40 - CA Business Leaders Awards</h1>
                  <!-- <h1 class="h4 fw-bold mt-2 mb-3">CA BUSINESS LEADERS AWARD NOMINATION FORM</h1> -->
                </div>
                <h2 class="h5 fw-medium text-muted mb-0">Please log in</h2>
              </div>
              <!-- END Header -->
              <!-- Sign In Form -->
              <form class="js-validation-signin px-4" method="POST" autocomplete="off">
                <div class="form-floating mb-4">
                  <input type="email" class="form-control" id="email" name="Email" placeholder="Enter your Email"
                    required="">
                  <label class="form-label" for="email">Email Address</label>
                </div>
                <!-- <div class="form-floating mb-4">
                  <input type="password" class="form-control" id="pswd" name="Password" placeholder="Enter your password" required="">
                  <label class="form-label" for="pswd">Password</label>
                </div> -->
                <div class="form-floating mb-4 position-relative">
                  <input type="password" class="form-control" id="pswd" name="Password" placeholder="Enter your password" required="">
                  <label class="form-label" for="pswd">Password</label>
                  <button type="button" class="btn btn-outline-secondary position-absolute top-50 end-0 translate-middle-y" id="togglePassword" style="border: none;/* background: none; */height: 55px;width: 45px;">
                    <i class="bi bi-eye" id="toggleIcon"></i>
                  </button>
                </div>

                <div class="mb-4">
                  <button type="submit" id="btn_login" class="btn btn-lg btn-alt-success fw-semibold">Login</button>
                  <a href="create-account" id="btn_login" class="btn btn-lg btn-alt-primary fw-semibold">Create Account</a>
                  <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block float-end" href="forgot-password">
                      Forgot Password
                    </a>

                  <!-- <p class="m-2">
                  The last date of submitting the nomination form is DD-MM-YYYY. Forms to be filled online
                  only
                  </p> -->
                  <!-- <label class="form-check-label mt-4 text-center" for="login-remember-me">Copyright &copy; 2023 ICAI,
                    All Rights Reserved. <span data-toggle="year-copy"></span></label> -->
                </div>
              </form>
              <?php
                  if (isset($_POST['Email']) && isset($_POST['Password']) && !empty($_POST['Email']) && !empty($_POST['Password'])) {
                    $Email = mysqli_real_escape_string($db, filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL));
                    $Password = mysqli_real_escape_string($db, filter_var(trim($_POST["Password"]), FILTER_SANITIZE_STRING));
                    // $Password = mysqli_real_escape_string($db, md5(filter_var(trim($_POST["Password"]), FILTER_SANITIZE_STRING))); // Use FILTER_SANITIZE_STRING for Password
                    $Deleted_Status = '0';
                    $CurrentDate = date("Y-m-d H:i:s");

                    // Prepare and execute the query using prepared statements
										$login = 'SELECT ID, AdminName, EmailID, Password, DeletedStatus, LastLogin FROM users WHERE EmailID = ? AND DeletedStatus = ?';
										$stmt = mysqli_prepare($db, $login);
										mysqli_stmt_bind_param($stmt, "si", $Email, $Deleted_Status);
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt);


                    if(mysqli_num_rows($result) > 0){
											$row = mysqli_fetch_array($result);
									
											// Check if the password matches
											if($row['Password'] == $Password){
												$_SESSION["admin_login_id"] = $row['ID'];
                        $_SESSION["admin_name"] = $row['AdminName'];
                        $_SESSION["admin_email"] = $row['EmailID'];
                        $_SESSION["admin_last_login"] = $row['LastLogin'];

									
												echo '<div class="alert alert-success mt-3" id="register_en">Login Success Redirecting......</div>';
												echo "<script>window.location.href='registration'</script>";
											} else {
												echo '<div class="alert alert-danger mt-3" id="register_en">Password is incorrect.</div>';
											}
										} else {
											echo '<div class="alert alert-danger mt-3" id="register_en">User Does Not Exist.</div>';
										}
                }
              ?>
            </div>
          </div>
        </div>
      </div>
      <style>
        .blinking {
            animation: blink-animation 1s steps(2, start) infinite;
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
  <p class="m-2 blinking fw-bold text-center"  style="font-size: inherit;margin-top: -45px !important;">
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
  <script src="./js/pages/op_auth_signin.min.js"></script>
  <script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#pswd');
  const toggleIcon = document.querySelector('#toggleIcon');

  togglePassword.addEventListener('click', function () {
    // Toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // Toggle the eye / eye-slash icon
    toggleIcon.classList.toggle('bi-eye');
    toggleIcon.classList.toggle('bi-eye-slash');
  });
</script>

</body>

</html>