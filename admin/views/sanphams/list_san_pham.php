<?
session_start()
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Danh Sach San Pham | NN Shop</title>
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
                                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Quản lý Sản Phẩm </li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách Sản Phẩm</h4>
                                        <a href="?act=form-add-san-pham" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> Them san pham</a>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>

                                                            <th scope="col">Ma san pham</th>
                                                            <th scope="col">Anh san pham</th>
                                                            <th scope="col">Ten san pham</th>
                                                            
                                                            <th scope="col">Gia ban</th>
                                                            
                                                           
                                                            
                                                            <th scope="col">Tên Danh Muc</th>
                                                            <th scope="col">Trang Thai</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (is_array($sanPhams) && count($sanPhams) > 0): ?>
                                                            <?php foreach ($sanPhams as $index => $sanPham) : ?>
                                                                <tr>
                                                                    <td class="fw-medium"><?= $index + 1 ?></td>
                                                                    <td><?= $sanPham['ma_sp'] ?></td>
                                                                    <td>
                                                                        <img src="<?= BASE_URL . $sanPham['anh_sp'] ?>" style="width: 100px" alt=""
                                                                            onerror="this.onerror = null; this.src ='https://d1hjkbq40fs2x4.cloudfront.net/2016-01-31/files/1045.jpg'">

                                                                    </td>


                                                                    <td><?= $sanPham['ten_sp'] ?></td>
                                                                    
                                                                    <td><?= $sanPham['gia_ban'] ?></td>
                                                                    
                                                                   
                                                                    
                                                                    <td><?= $sanPham['ten_danh_muc'] ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($sanPham['trang_thai'] == 1) { ?>
                                                                            <span class="badge bg-success">Đang Bán</span>
                                                                        <?php } else { ?>
                                                                            <span class="badge bg-danger">Ngừng Bán</span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="hstack gap-3 flex-wrap">
                                                                            <a href="?act=show-san-pham&san_pham_id=<?= $sanPham['id'] ?>" class="link-success fs-15">
                                                                                <i class="ri-eye-2-line"></i>
                                                                            </a>

                                                                            <a href="?act=form-edit-san-pham&san_pham_id=<?= $sanPham['id'] ?>" class="link-success fs-15">
                                                                                <i class="ri-edit-2-line"></i>
                                                                            </a>

                                                                            <form action="?act=xoa-san-pham" method="POST" onsubmit="return confirm('Bạn có muốn xóa không?')">
                                                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                                                <button type="submit" class="link-danger fs-15" style="border: none; background: none;">
                                                                                    <i class="ri-delete-bin-line"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="12">Không có sản phẩm nào để hiển thị.</td>
                                                            </tr>
                                                        <?php endif; ?>

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