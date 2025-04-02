<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Chinh Sua San Pham | NN Shop</title>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Chỉnh sửa thông tin Sản Phẩm</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=sua-san-pham" method="POST" enctype="multipart/form-data">
                                                <?php
                                                if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                                                    echo '<div class="alert alert-danger">';
                                                    foreach ($_SESSION['errors'] as $field => $error) {
                                                        echo '<p>' . $error . '</p>';
                                                    }
                                                    echo '</div>';
                                                    unset($_SESSION['errors']);
                                                }
                                                ?>
                                                <input type="hidden" name="san_pham_id" value="<?= htmlspecialchars($sanPham['id']) ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="ma_sp" class="form-label">Mã Sản Phẩm</label>
                                                            <input type="text" class="form-control" placeholder="Nhập mã sản phẩm" name="ma_sp" value="<?= $sanPham['ma_sp'] ?>">
                                                            <span class="text-danger"><?= !empty($_SESSION['errors']['ma_sp']) ? $_SESSION['errors']['ma_sp'] : '' ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="current_img" class="form-label">Ảnh Sản Phẩm Hiện Tại :</label>

                                                            <img src="<?= BASE_URL . $sanPham['anh_sp'] ?>" style="width: 100px" alt=""
                                                                onerror="this.onerror = null; this.src = 'https://d1hjkbq40fs2x4.cloudfront.net/2016-01-31/files/1045.jpg'">
                                                            </td>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_img" class="form-label">Chọn Ảnh Sản Phẩm Mới</label>
                                                        <input type="file" class="form-control" name="anh_sp" multiple accept="image/*">

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ten_sp" class="form-label">Tên Sản Phẩm</label>
                                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="ten_sp" value="<?= $sanPham['ten_sp'] ?>">
                                                        <span class="text-danger"><?= !empty($_SESSION['errors']['ten_sp']) ? $_SESSION['errors']['ten_sp'] : '' ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gia_nhap" class="form-label">Giá Nhập</label>
                                                        <input type="text" class="form-control" placeholder="Nhập giá nhập" name="gia_nhap" value="<?= $sanPham['gia_nhap'] ?>">
                                                        <span class="text-danger"><?= !empty($_SESSION['errors']['gia_nhap']) ? $_SESSION['errors']['gia_nhap'] : '' ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gia_ban" class="form-label">Giá Bán</label>
                                                        <input type="text" class="form-control" placeholder="Nhập giá bán" name="gia_ban" value="<?= $sanPham['gia_ban'] ?>">
                                                        <span class="text-danger"><?= !empty($_SESSION['errors']['gia_ban']) ? $_SESSION['errors']['gia_ban'] : '' ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gia_khuyen_mai" class="form-label">Giá Khuyến Mãi</label>
                                                        <input type="text" class="form-control" placeholder="Nhập giá khuyến mãi" name="gia_khuyen_mai" value="<?= $sanPham['gia_khuyen_mai'] ?>">
                                                        <span class="text-danger"><?= !empty($_SESSION['errors']['gia_khuyen_mai']) ? $_SESSION['errors']['gia_khuyen_mai'] : '' ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="so_luong" class="form-label">Số Lượng</label>
                                                        <input type="number" class="form-control" placeholder="Nhập số lượng" name="so_luong" value="<?= $sanPham['so_luong'] ?>">
                                                        <span class="text-danger"><?= !empty($_SESSION['errors']['so_luong']) ? $_SESSION['errors']['so_luong'] : '' ?></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="mo_ta" class="form-label">Mô Tả</label>
                                                        <textarea class="form-control" placeholder="Nhập mô tả" name="mo_ta"><?= htmlspecialchars($sanPham['mo_ta']) ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="mo_ta_chi_tiet" class="form-label">Mô Tả Chi Tiết</label>
                                                        <textarea class="form-control" placeholder="Nhập mô tả chi tiết" name="mo_ta_chi_tiet"><?= htmlspecialchars($sanPham['mo_ta_chi_tiet']) ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="danh_muc_id">Danh Mục:</label>
                                                        <select name="danh_muc_id" id="danh_muc_id" class="form-select">
                                                            <option value="">Chọn danh mục</option>
                                                            <?php
                                                            if (!empty($danhMucs)) {
                                                                foreach ($danhMucs as $danhMuc): ?>
                                                                    <option value="<?= $danhMuc['id'] ?>" <?= ($danhMuc['id'] == $sanPham['danh_muc_id']) ? 'selected' : '' ?>>
                                                                        <?= $danhMuc['ten_danh_muc'] ?> (ID: <?= $danhMuc['id'] ?>)
                                                                    </option>
                                                            <?php endforeach;
                                                            } else {
                                                                echo '<option value="">Không có danh mục</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="trang_thai" class="form-label">Trạng Thái</label>
                                                        <select name="trang_thai" class="form-select">
                                                            <option value="1" <?= ($sanPham['trang_thai'] == 1) ? 'selected' : '' ?>>Còn Bán</option>
                                                            <option value="2" <?= ($sanPham['trang_thai'] == 2) ? 'selected' : '' ?>>Ngừng Bán</option>
                                                        </select>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary w-md">Cập nhật Sản Phẩm</button>
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
    </div>
    </div>
</body>

</html>