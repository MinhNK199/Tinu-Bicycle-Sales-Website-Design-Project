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

                        <div class="card h-100">
                            <div class="row">

                                <div class="col-4">
                                    <img src="<?php echo $khachHangs['avartar']; ?>" with="400px" height="400px" alt="Image Description">
                                </div>
                                <div class="col-8">
                                    <br>
                                    <div class="container">
                                        <table class="table table-bordered">
                                            <tbody style="font-size: large;">
                                                <tr>
                                                    <th>Họ tên:</th>
                                                    <td><?= $khachHangs['ten_nguoi_dung'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th>Ngay sinh:</th>
                                                    <td><?= $khachHangs['ngay_sinh'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td><?= $khachHangs['email'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th>SDT:</th>
                                                    <td><?= $khachHangs['sdt'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th>Gioi tinh:</th>
                                                    <td><?= $khachHangs['gioi_tinh'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th>Dia Chi:</th>
                                                    <td><?= $khachHangs['dia_chi'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th>Trang Thai:</th>
                                                    <td><?= $khachHangs['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <hr>
                                    <br>
                                    <h2>Thông tin mua hàng</h2>
                                    <div>
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Ma Don Hang</th>
                                                    <th scope="col">Ten Nguoi Nhan</th>
                                                    <th scope="col">So Dien Thoai</th>
                                                    <th scope="col">Ngay Dat</th>
                                                    <th scope="col">Tong Tien</th>
                                                    <th scope="col">Trang Thai</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($donHangs as $index => $donHang): ?>

                                                    <tr>
                                                        <td class="fw-medium"><?= $index + 1 ?></td>

                                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                                        <td><?= $donHang['ngay_dat'] ?></td>
                                                        <td><?= $donHang['tong_tien'] ?></td>
                                                        <td><?= $donHang['ten_trang_thai'] ?></td>
                                                        <td>
                                                            <div class="hstack gap-3 flex-wrap">
                                                                <a href="<?= '?act=chi-tiet-don-hang&don_hang_id=' . $donHang['id'] ?>" class="link-success fs-15"><i class="ri-eye-fill"></i></a>
                                                                <a href="<?= '?act=form-sua-don-hang&don_hang_id=' . $donHang['id'] ?>" class="link-success fs-15"><i class="ri-pencil-fill"></i></a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                    <br>
                                    <h2>Thông tin Bình Luận</h2>
                                    <div>
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">San Pham</th>
                                                    <th scope="col">Noi dung</th>

                                                    <th scope="col">Ngay Binh Luan</th>

                                                    <th scope="col">Trang Thai</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($binhLuans as $index => $binhLuan): ?>

                                                    <tr>
                                                        <td class="fw-medium"><?= $index + 1 ?></td>

                                                        <td>
                                                            <a target="_blank" href="<?= '?act=show-san-pham&san_pham_id=' . $binhLuan['san_pham_id']; ?>">
                                                                <?= $binhLuan['ten_sp'] ?>
                                                            </a>
                                                        </td>
                                                        <td><?= $binhLuan['noi_dung'] ?></td>
                                                        <td><?= $binhLuan['ngay_bl'] ?></td>
                                                        <td><?php
                                                            if ($binhLuan['trang_thai'] == 1) { ?>
                                                                <span class="badge bg-success">Hiển Thị</span>
                                                            <?php } else { ?>
                                                                <span class="badge bg-danger">Bị Ẩn</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <div class="hstack gap-3 flex-wrap">

                                                                <form action="?act=update-binh-luan" method="POST">
                                                                    <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                                    <input type="hidden" name="name_view" value="detail_khach">
                                                                    <input type="hidden" name="nguoi_dung_id" value="<?= $binhLuan['nguoi_dung_id'] ?>">
                                                                    <button onclick="return confirm('Bạn có muốn thay đổi trạng thái bình luận này không?')" class="btn btn-danger">
                                                                        <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ Ẩn' ?>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>

                            </div>

                        </div>

                    </div> <!-- end .h-100-->

                    <!-- end col -->
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