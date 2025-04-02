<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Them San Pham | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- CSS -->
    <?php 
    session_start();
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
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý Sản Phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sản Phẩm</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Thêm Sản Phẩm</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=them-san-pham" method="POST" enctype="multipart/form-data" onsubmit="return setStatus()">
                                                <div class="row">
                                                     <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Mã Sản Phẩm</label>
                                                            <input type="text" class="form-control" placeholder="Nhap ma san pham" name="ma_sp">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['ma_sp']) ? $_SESSION['errors']['ma_sp'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label"> Album Ảnh Sản Phẩm</label>
                                                            <input type="file" class="form-control" placeholder="Chọn ảnh sản phẩm" name="img_array[]" multiple accept="image/*">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Ảnh Sản Phẩm</label>
                                                            <input type="file" class="form-control" placeholder="Chọn ảnh sản phẩm" name="anh_sp" accept="image/*">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['anh_sp']) ? $_SESSION['errors']['anh_sp'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="citynameInput" class="form-label">Tên Sản Phẩm</label>
                                                            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="ten_sp">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['ten_sp']) ? $_SESSION['errors']['ten_sp'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Giá Nhập</label>
                                                            <input type="text" class="form-control" placeholder="Nhập giá nhập" name="gia_nhap">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['gia_nhap']) ? $_SESSION['errors']['gia_nhap'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputDate" class="form-label">Giá Bán</label>
                                                            <input type="text" placeholder="Nhập giá bán" class="form-control" name="gia_ban">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['gia_ban']) ? $_SESSION['errors']['gia_ban'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputDate" class="form-label">Giá Khuyến Mãi</label>
                                                            <input type="text" placeholder="Nhập giá khuyến mãi" class="form-control" name="gia_khuyen_mai">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['gia_khuyen_mai']) ? $_SESSION['errors']['gia_khuyen_mai'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Số Lượng</label>
                                                            <input type="number" class="form-control" placeholder="Nhập số lượng" name="so_luong">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['so_luong']) ? $_SESSION['errors']['so_luong'] : '' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Mô Tả</label>
                                                            <textarea class="form-control" placeholder="Nhập mô tả" name="mo_ta"></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Mô Tả Chi Tiết</label>
                                                            <textarea class="form-control" placeholder="Nhập mô tả chi tiết" name="mo_ta_chi_tiet"></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="danh_muc_id">Danh Mục:</label>
                                                            <select name="danh_muc_id" id="danh_muc_id" >
                                                                <option value="">Chọn danh mục</option>
                                                                <?php
                                                                if(!empty($danhMucs)) {
                                                                    foreach ($danhMucs as $danhMuc): ?>                                                                    
                                                                        <option value="<?php echo $danhMuc['id']; ?>">
                                                                            <?php echo $danhMuc['ten_danh_muc']; ?> (ID: <?php echo $danhMuc['id']; ?>)
                                                                        </option>
                                                                    <?php endforeach; 
                                                                } else {
                                                                    echo '<option value="">Không có danh mục</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                    <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputStatus" class="form-label">Trạng thái Sản Phẩm</label>
                                                        <select id="ForminputStatus" class="form-select" name="trang_thai">
                                                            <option selected disabled>Chọn trạng thái</option>
                                                            <option value="1">Đang Bán</option>
                                                            <option value="2">Ngừng Bán</option>
                                                        </select>
                                                        
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- end col -->
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

    <?php 
    require_once "views/layouts/libs_js.php";
    unset($_SESSION['errors']);
    ?>
</body>

</html>
