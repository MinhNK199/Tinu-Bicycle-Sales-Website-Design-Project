<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Sua Nguoi Dung | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container">

                    <hr>
                    <div class="row">
                        <!-- left column -->
                        <form action="?act=sua-thong-tin-ca-nhan-quan-tri" method="post">
                            <input type="hidden" name="id" value="<?= $thongTin['id'] ?>">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="<?= $thongTin['avartar'] ?>" style="width: 200px;"
                                        class="avatar img-circle" alt="avatar"
                                        onerror="this.onerror=null;this.src='assets/images/users/avatar-1.jpg';"
                                        alt="Avatar" error>

                                    <h6><br>Họ tên: <?= $thongTin['ten_nguoi_dung'] ?></h6>
                                    <h6><br>Vai tro: <?= $thongTin['vai_tro']?></h6>
                                    <br>
                                    <!-- <input type="file" class="form-control"> -->
                                </div>
                            </div>

                            <!-- edit form column -->
                            <div class="col-md-9 personal-info">

                                <h3>Thong tin ca nhan</h3>


                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Ho ten:</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" type="text" name="ten_nguoi_dung"
                                            value="<?= $thongTin['ten_nguoi_dung']?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">SDT:</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" type="text" name="sdt"
                                            value="<?= $thongTin['sdt']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" type="text" name="email"
                                            value="<?= $thongTin['email']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Ngày Sinh:</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" type="date" name="ngay_sinh"
                                            value="<?= $thongTin['ngay_sinh']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Giới tính:</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" type="text" name="gioi_tinh"
                                            value="<?= $thongTin['gioi_tinh']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Địa chỉ:</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" type="text" name="dia_chi"
                                            value="<?= $thongTin['dia_chi']?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary" value="Save Changes">

                                    </div>
                                </div>
                        </form>
                        <hr>

                        <h3>Doi mat khau</h3>
                        <?php if(isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert"></a>
                            <i class="fa fa-check"></i>
                            <?= $_SESSION['success'] ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                        <?php } ?>

                        <!-- <?php if(isset($_SESSION['errors'])) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert"></a>
                                <i class="fa fa-exclamation-triangle"></i>
                                <?php foreach($_SESSION['errors'] as $error) { ?>
                                    <p><?= $error ?></p>
                                <?php } ?>
                            </div>
                            <?php unset($_SESSION['errors']); ?>
                        <?php } ?> -->
                        <form action="?act=sua-mat-khau-ca-nhan-quan-tri" method="post">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mat khau cu:</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="old_pass" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">May khau moi:</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="new_pass" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nhap lai mat khau moi</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="confirm_pass" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Save Changes">

                                </div><br>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
            <hr>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                        document.write(new Date().getFullYear())
                        </script> © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>