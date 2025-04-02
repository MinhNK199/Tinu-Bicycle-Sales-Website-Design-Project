<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Nguoi dung | NN Shop</title>
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
                                <h4 class="mb-sm-0">Quản lý người dùng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Người dùng</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Danh sách người dùng</h4>
                                    
                                    <!-- <form action="env.php" method="GET">
                                    <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                                    <button type="submit">Tìm kiếm</button>
                                    </form> -->
                                    

                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Ten Nguoi Dung</th>    
                                                        <th scope="col">AVATAR</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">SDT</th>
                                                        <th scope="col">Vai Tro</th>
                                                        <th scope="col">Trang Thai</th>
                                                        <th scope="col">Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody><?php foreach ($khachHangs as $index => $khachHang) : ?>
                                                    <tr>
                                                        <td class="fw-medium"><?= $index + 1 ?></td>
                                                        <td><?= $khachHang['ten_nguoi_dung'] ?></td>
                                                        <td><img src="<?php echo $khachHang['avartar']; ?>" class="rounded-circle avatar-xs" alt="Image Description"></td>
                                                        <td><?= $khachHang['email'] ?></td>
                                                        <td><?= $khachHang['sdt'] ?></td>
                                                        <td>
                                                        <?php 
                                                                if($khachHang['vai_tro'] == 1){?>
                                                                    <span class="badge bg-success">admin</span></td>
                                                              <?php  
                                                              }else{?>
                                                                    <span class="badge bg-danger">nguoi dung</span></td>
                                                            <?php  
                                                            }
                                                            ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php 
                                                                if($khachHang['trang_thai'] == 1){?>
                                                                    <span class="badge bg-success">Hoạt Động</span></td>
                                                              <?php  
                                                              }else{?>
                                                                    <span class="badge bg-danger">Không Hoạt Động</span></td>
                                                            <?php  
                                                            }
                                                            ?>                   
                                                        <td>

                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href="?act=chi-tiet-khach-hang&nguoi_dung_id=<?= $khachHang['id'] ?>" class="link-primary"><i class="ri-dashboard-2-line"></i></a>
                                                                    
                                                                        <a href="?act=form-sua-khach-hang&nguoi_dung_id=<?= $khachHang['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                        <a href="<?='?act=resset-password&nguoi_dung_id='. $khachHang['id'] ?>"
                                                                        onclick="return confirm('ban co muon resset mat khau khong ?')">
                                                                        <i class="ri-rotate-lock-line"></i></a>
                                                                    </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div><!-- end card-body -->
                            </div><!-- end card -->

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