<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Them Tin Tuc | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
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
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý Khuyến Mãi</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Khuyến Mãi</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Khuyến Mãi</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=them-khuyen-mai" method="POST" onsubmit="return setStatus()">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="citynameInput" class="form-label">Tên Khuyến Mãi</label>
                                                            <input type="text" class="form-control" placeholder="Nhap tên khuyến mãi" name="ten_khuyen_mai">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['ten_khuyen_mai']) ? $_SESSION['errors']['ten_khuyen_mai'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Mã Khuyến Mãi</label>
                                                            <input type="text" class="form-control" placeholder="Nhap ma khuyen mai" name="ma_khuyen_mai">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['ma_khuyen_mai']) ? $_SESSION['errors']['ma_khuyen_mai'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Giá Trị (%)</label>
                                                            <input type="text" class="form-control" placeholder="Nhap gia tri" name="gia_tri">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['gia_tri']) ? $_SESSION['errors']['gia_tri'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputDate" class="form-label">Ngày Bắt Đầu</label>
                                                            <input type="date" id="ngay_bat_dau" class="form-control" name="ngay_bat_dau">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['ngay_bat_dau']) ? $_SESSION['errors']['ngay_bat_dau'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputDate" class="form-label">Ngày Kết Thúc</label>
                                                            <input type="date" id="ngay_ket_thuc" class="form-control" name="ngay_ket_thuc">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['ngay_ket_thuc']) ? $_SESSION['errors']['ngay_ket_thuc'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Mô tả</label>
                                                            <input type="text" class="form-control" placeholder="Nhap mo ta" name="mo_ta">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <!-- Thay đổi thành input ẩn -->
                                                            <input type="hidden" id="trang_thai" name="trang_thai">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="text-left">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
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
    </div>

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

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
    <?php require_once "views/layouts/libs_js.php"; ?>

    <script>
       function setStatus() {
    const ngayBatDau = new Date(document.getElementById('ngay_bat_dau').value);
    const ngayKetThuc = new Date(document.getElementById('ngay_ket_thuc').value);
    const today = new Date();
    today.setHours(0, 0, 0, 0);  // Đặt lại giờ cho đúng với ngày hiện tại

    let trangThai;

    if (ngayKetThuc < today) {
        trangThai = "0"; // Đã hết hạn
    } else if (ngayBatDau > today) {
        trangThai = "2"; // Sắp diễn ra
    } else if (ngayBatDau <= today && ngayKetThuc >= today) {
        trangThai = "1"; // Đang diễn ra
    }

    // Cập nhật giá trị trạng thái vào select
    document.getElementById("trang_thai").value = trangThai;
    return true;
}

    </script>

</body>

</html>
