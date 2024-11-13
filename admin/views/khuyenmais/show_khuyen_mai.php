<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Khuyến Mãi</title>
    <!-- Giữ nguyên các thư viện CSS mà bạn đã thêm vào trước đó -->
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>
<body>
    <div id="layout-wrapper">
        <?php
        // Nếu bạn có header và sidebar đã được thiết lập sẵn, giữ lại để đảm bảo giao diện đồng nhất
        require_once "views/layouts/header.php";
        require_once "views/layouts/siderbar.php";
        ?>
        
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Chi Tiết Khuyến Mãi: <?= htmlspecialchars($khuyenMai['ten_khuyen_mai']) ?></h4>
                                </div>
                                <div class="card-body">
                                    <p><strong>ID: </strong><?= htmlspecialchars($khuyenMai['id']) ?></p>
                                    <p><strong>Mã khuyến mãi: </strong><?= htmlspecialchars($khuyenMai['ma_khuyen_mai']) ?></p>
                                    <p><strong>Giá trị: </strong><?= number_format($khuyenMai['gia_tri'], 0, ',', '.') ?> %</p>
                                    <p><strong>Ngày bắt đầu: </strong><?= date('d-m-Y', strtotime($khuyenMai['ngay_bat_dau'])) ?></p>
                                    <p><strong>Ngày kết thúc: </strong><?= date('d-m-Y', strtotime($khuyenMai['ngay_ket_thuc'])) ?></p>
                                    <p><strong> Mô tả: </strong><?= nl2br(htmlspecialchars($khuyenMai['mo_ta'])) ?></p>                                                                                   
                                    <p><strong>Trạng thái: </strong>
                                        <?php 
                                        // Trạng thái hiển thị của khuyến mãi
                                        if ($khuyenMai['trang_thai'] == 1) {
                                            echo '<span class="badge bg-success">Đang diễn ra</span>';
                                        } elseif ($khuyenMai['trang_thai'] == 0) {
                                            echo '<span class="badge bg-danger">Đã hết hạn</span>';
                                        } elseif ($khuyenMai['trang_thai'] == 2) {
                                            echo '<span class="badge bg-warning">Sắp diễn ra</span>';
                                        } else {
                                            echo '<span class="badge bg-secondary">Chưa xác định</span>';
                                        }
                                        ?>
                                    </p>
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

    <?php require_once "views/layouts/libs_js.php"; ?>
</body>
</html>
