<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>

<body>
    <div id="layout-wrapper">
        <?php
        // Header và sidebar
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
                                    <h4 class="card-title">Chi Tiết Sản Phẩm: <?= htmlspecialchars($sanPhams['ten_sp']) ?></h4>
                                </div>
                                <div class="card-body">
                                    <p><strong>ID: </strong><?= htmlspecialchars($sanPhams['id']) ?></p>
                                    <p><strong>Mã Sản Phẩm: </strong><?= htmlspecialchars($sanPhams['ma_sp']) ?></p>
                                    <p><strong>Ảnh Sản Phẩm: </strong><br>

                                        <img src="<?= BASE_URL . $sanPhams['anh_sp'] ?>" style="width: 200px" alt=""
                                            onerror="this.onerror = null; this.src = 'https://d1hjkbq40fs2x4.cloudfront.net/2016-01-31/files/1045.jpg'">

                                    </p>
                                    <p><strong>Tên Sản Phẩm: </strong><?= htmlspecialchars($sanPhams['ten_sp']) ?></p>
                                    <p><strong>Giá Nhập: </strong><?= number_format($sanPhams['gia_nhap'], 0, ',', '.') ?> VND</p>
                                    <p><strong>Giá Bán: </strong><?= number_format($sanPhams['gia_ban'], 0, ',', '.') ?> VND</p>
                                    <p><strong>Giá Khuyến Mãi: </strong><?= number_format($sanPhams['gia_khuyen_mai'], 0, ',', '.') ?> VND</p>
                                    <p><strong>Số Lượng: </strong><?= htmlspecialchars($sanPhams['so_luong']) ?></p>
                                    <p><strong>Mô Tả: </strong><?= nl2br(htmlspecialchars($sanPhams['mo_ta'])) ?></p>
                                    <p><strong>Mô Tả Chi Tiết: </strong><?= nl2br(htmlspecialchars($sanPhams['mo_ta_chi_tiet'])) ?></p>
                                    <p><strong>ID Danh Mục: </strong><?= htmlspecialchars($sanPhams['danh_muc_id']) ?></p>
                                    <p><strong>Trạng thái: </strong>
                                        <?= $sanPhams['trang_thai'] == 1 ? '<span class="badge bg-success">Đang Bán</span>' : '<span class="badge bg-danger">Ngừng Bán</span>' ?>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-nowrap align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Người bình luận</th>
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
                                        <a target="_blank" href="<?= '?act=chi-tiet-khach-hang&nguoi_dung_id=' . $binhLuan['nguoi_dung_id']; ?>">
                                            <?= $binhLuan['ten_nguoi_dung'] ?>
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
                                                <input type="hidden" name="name_view" value="detail_sp">
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

    <?php require_once "views/layouts/libs_js.php"; ?>
</body>

</html>