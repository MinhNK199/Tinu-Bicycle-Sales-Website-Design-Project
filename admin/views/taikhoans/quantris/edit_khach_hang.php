<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


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
                <div class="container-fluid">
                     <!-- start page title -->
                     <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Sửa người dùng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Người Dùng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Sửa Thống Tin Khách Hàng: <?= $khachHangs['ten_nguoi_dung'] ?></h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="?act=sua-khach-hang" method="POST">
                                            <input type="hidden" name="id" value="<?= $khachHangs['id'] ?>">
                                            <div class="row">
                                            <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Ho Ten</label>
                                                        <input type="text" class="form-control" disabled placeholder="Nhap ten " name="ten_nguoi_dung" value="<?= $khachHangs['ten_nguoi_dung'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ten_nguoi_dung']) ? $_SESSION['errors']['ten_nguoi_dung'] : ''?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Email</label>
                                                        <input type="text" class="form-control" disabled placeholder="Nhap email " name="email" value="<?= $khachHangs['email'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : ''?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">SDT</label>
                                                        <input type="text" class="form-control" disabled placeholder="Nhap sdt " name="sdt" value ="<?= $khachHangs['sdt'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['sdt']) ? $_SESSION['errors']['sdt'] : ''?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Ngay sinh</label>
                                                        <input type="date" class="form-control" disabled placeholder="Nhap ngay_sinh " name="ngay_sinh" value ="<?= $khachHangs['ngay_sinh'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ngay_sinh']) ? $_SESSION['errors']['ngay_sinh'] : ''?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Dia Chi</label>
                                                        <input type="text" class="form-control" disabled placeholder="Nhap dia_chi " name="dia_chi" value ="<?= $khachHangs['dia_chi'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : ''?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">Gioi tinh</label>
                                                        <input type="text" class="form-control" disabled placeholder="Nhap gioi_tinh " name="gioi_tinh" value ="<?= $khachHangs['gioi_tinh'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['gioi_tinh']) ? $_SESSION['errors']['gioi_tinh'] : ''?>
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">

                                                        <label for="ForminputState" class="form-label">Vai Tro</label>
                                                        <select id="ForminputState" class="form-select" name="vai_tro" value="<?= $khachHangs['vai_tro'] ?>">
                                                            <option selected disabled>Chon vai tro</option>
                                                            <option value="1" <?= $khachHangs['vai_tro'] == 1 ?'selected':'' ?>>admin</option>
                                                            <option value="0" <?= $khachHangs['vai_tro'] == 0 ?'selected':'' ?>>User</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Trang Thai</label>
                                                        <select id="ForminputState" class="form-select" name="trang_thai" value="<?= $nguoiDung['trang_thai'] ?>">
                                                            <option selected disabled>Chon Trang Thai</option>
                                                            <option value="1" <?= $khachHangs['trang_thai'] == 1 ?'selected':'' ?>> Hoạt Động</option> 
                                                            <option value="2" <?= $khachHangs['trang_thai'] == 2 ?'selected':'' ?>>Không Hoạt Động</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-left">
                                                        <button type="submit" class="btn btn-primary">sua nguoi dung</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
                    </div>

                </div>
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
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>