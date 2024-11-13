<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tin Tức</title>
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
                                    <h4 class="card-title"><?= $tinTuc['tieu_de'] ?></h4>
                                </div>
                                <div class="card-body">
                                    <p><strong>Ngày đăng: </strong><?= $tinTuc['ngay_dang'] ?></p>
                                    <p><strong>Trạng thái: </strong>
                                        <?= $tinTuc['trang_thai'] == 1 ? '<span class="badge bg-success">Hiển thị</span>' : '<span class="badge bg-danger">Không hiển thị</span>' ?>
                                    </p>
                                    <p><strong>Nội dung: </strong></p>
                                    <div>
                                        <?= $tinTuc['noi_dung'] ?>
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

    
    <?php require_once "views/layouts/libs_js.php"; ?>
</body>
</html>
