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
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">STT</th>
                                                        <th scope="col">Ten Nguoi Dung</th>
                                                        <th scope="col">email</th>
                                                        <th scope="col">sdt</th>
                                                        <th scope="col">dia chi</th>
                                                        <!-- <th scope="col">mat khau</th> -->
                                                        <th scope="col">ngay sinh</th>
                                                        <th scope="col">gioi tinh</th>
                                                      
                                                        <th scope="col">AVATAR</th>
                                                        <th scope="col">Vai Tro</th>
                                                        <th scope="col">Trang Thai</th>
                                                        
                                                    </tr>
                                                </thead>
                                                    <tr>
                                                        <td class="fw-medium"> 1</td>
                                                        <td><?= $nguoiDungs['ten_nguoi_dung'] ?></td>
                                                        <td><?= $nguoiDungs['email'] ?></td>
                                                        <td><?= $nguoiDungs['sdt'] ?></td>
                                                        <td><?= $nguoiDungs['dia_chi'] ?></td>
                                                        
                                                        <td><?= $nguoiDungs['ngay_sinh'] ?></td>
                                                        <td><?= $nguoiDungs['gioi_tinh'] ?></td>
                                                        
                                                        <td><img src="<?php echo $nguoiDungs['avartar']; ?>" width="60px" height="50px" alt="Image Description"></td>
                                                        
                                                        <td>
                                                        <?php 
                                                                if($nguoiDungs['vai_tro'] == 1){?>
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
                                                                if($nguoiDungs['trang_thai'] == 1){?>
                                                                    <span class="badge bg-success">Hien Thi</span></td>
                                                              <?php  
                                                              }else{?>
                                                                    <span class="badge bg-danger">Khong Hien Thi</span></td>
                                                            <?php  
                                                            }
                                                            ?>                   
                                                            
                                                        <td>
                                                            
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        
                                                                    
                                                                        <a href="?act=form-sua-nguoi-dung&nguoi_dung_id=<?= $nguoiDungs['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                        <!-- <form action="?act=xoa-nguoi-dung" method="POST"
                                                                        onsubmit = "return confirm('ban co muon xoa khong?')">

                                                                       <input type="hidden" name="nguoi_dung_id" value="">
                                                                        <button type="submit" class="link-danger fs-15" style = "border: none; background: none;">
                                                                            <i class="ri-delete-bin-line"></i></button>
                                                                        </form> -->
                                                                    </div>
                                                        </td>
                                                    </tr>
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