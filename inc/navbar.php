<div class="js-sidebar-scroll">
    <!-- Side User -->
    <div class="content-side content-side-user px-0 py-0" style="background-color: #08aed1 !important">
        <!-- Visible only in mini mode -->
        <div class="smini-visible-block animated fadeIn px-3">
            <img class="img-avatar img-avatar32" src="./img/login-logo.png" alt="">
        </div>
        <!-- END Visible only in mini mode -->

        <!-- Visible only in normal mode -->
        <div class="smini-hidden text-center mx-auto">
            <a class="img-link" href="#">
                <img class="img-avatar" src="./img/login-logo.png" alt="">
            </a>
            <ul class="list-inline mt-3 mb-0">
                <li class="list-inline-item">
                    <p class="link-fx text-dual fs-sm fw-semibold text-uppercase">
                        <?php echo $_SESSION["admin_name"]; ?>
                    </p>
                </li>
                <li class="list-inline-item">
                    <a class="link-fx text-dual" href="logout">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
            <div>
                <p class="mb-0 text-dual fs-sm">Last Login</p>
                <p class="text-dual"><?php echo empty($_SESSION["admin_last_login"]) ? date('Y-m-d H:i:s') : $_SESSION["admin_last_login"]; ?></p>
            </div>
            <!-- 
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <p class="link-fx text-dual fs-sm fw-semibold text-uppercase">Last Login</p>
                </li>
                <li class="list-inline-item">
                    <p class="link-fx text-dual"><?php echo $_SESSION["admin_last_login"]; ?></p>
                </li>
            </ul> -->
        </div>
        <!-- END Visible only in normal mode -->
    </div>
    <!-- END Side User -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <!-- <li class="nav-main-item">
                <a class="nav-main-link" href="#">
                    <i class="nav-main-link-icon fa fa-house-user"></i>
                    <span class="nav-main-link-name">Categories Description</span>
                </a>
            </li> -->
            <li class="nav-main-item">
                <a class="nav-main-link" href="guidelines">
                    <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                    <span class="nav-main-link-name">Guidelines</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="registration">
                    <i class="nav-main-link-icon fa fa-edit"></i>
                    <span class="nav-main-link-name">Nomination Form</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</div>