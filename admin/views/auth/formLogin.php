<!doctype html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:32:04 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Đăng nhập | Tinu - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="?act=/" class="d-block">
                                                    <h1 class="text-white">TINU SHOP</h1>
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <?php if(isset($_SESSION['errors'])){?>
                                                <p class="text-danger"><?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?></p>
                                            <?php }else{ ?>
                                                    <p class="text-muted">Tiếp tục đăng nhập vào Tinu.</p></p>
                                            <?php }?>
                                            
                                        </div>

                                        <div class="mt-4">
                                            <form action="?act=check-login-admin" method="POST">

                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Tên đăng nhập</label>
                                                    <input type="email" class="form-control" id="username" placeholder="Enter username" name="email">
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="auth-pass-reset-cover.html" class="text-muted">Quên mật khẩu?</a>
                                                    </div>
                                                    <label class="form-label" for="password-input">Mật khẩu</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input" name="mat_khau"> 
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="submit" ></button>
                                                    </div>
                                                </div>

                                               

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Đăng nhập</button>
                                                </div>

                                                

                                            </form>
                                        </div>

                                        <!-- <div class="mt-5 text-center">
                                            <p class="mb-0">Không có tài khoản ? <a href="auth-signup-cover.html" class="fw-semibold text-primary text-decoration-underline"> Tạo tài khoản</a> </p>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer galaxy-border-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>document.write(new Date().getFullYear())</script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- password-addon init -->
    <script src="assets/js/pages/password-addon.init.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:32:04 GMT -->
</html>