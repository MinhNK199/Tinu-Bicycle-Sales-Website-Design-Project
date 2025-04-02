<?php require_once 'layouts/header.php' ?>
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <div class="currency">
                        <ul>
                            <li>
                                <a href="#">$ USD <i class="fa fa-caret-down"></i></a>
                                <ul class="currency-menu">
                                    <li><a href="#">$ USD</a></li>
                                    <li><a href="#">€ EUR</a></li>
                                    <li><a href="#">£ PBP</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="language">
                        <ul>
                            <li>
                                <a href="#"><img src="assets/img/currency/c1.png" alt=""> English <i class="fa fa-caret-down"></i></a>
                                <ul class="language-menu">
                                    <li><a href="#"><img src="assets/img/currency/c1.png" alt=""> English</a></li>
                                    <li><a href="#"><img src="assets/img/currency/c2.png" alt=""> Arabic</a></li>
                                    <li><a href="#"><img src="assets/img/currency/c3.png" alt=""> French</a></li>
                                    <li><a href="#"><img src="assets/img/currency/c4.png" alt=""> German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="top-bar-menu">
                        <ul>
                            <li><a href="?act=/">My Account</a></li>
                            <li><a href="#"> Wish List (0)</a></li>
                            <li><a href="?act=/"> Shopping Cart</a></li>
                            <li><a href="?act=/"> Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-midle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="logo">
                        <a href="<?= BASE_URL ?>"><img src="assets/img/logo/hele.png" alt="" style="width: 100px;"></a>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm hidden-xs">
                    <div class="call-us">
                        <span><i class="fa fa-phone"></i></span> Call Us: +00965888546-32 <br>


                    </div>

                </div>
                <div class="col-md-3 col-sm-4  hidden-xs">
                    <div class="top-email">
                        <?php
                        if (empty($_SESSION['user_client'])) {
                            echo "";
                        } else { ?>
                            <span><i class="fa fa-user"></i></span>Wellcome <?= $_SESSION['user_client'] ?>!
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="header-middle-right">
                        <div class="login-account">
                            <?php
                            if (!empty($_SESSION['user_client'])) { ?>
                                <a href="?act=form-thong-tin-ca-nhan"><i class="fa fa-user"></i></a>
                            <?php } else { ?>
                                <a href="?act=login"><i class="fa fa-user"></i></a>
                            <?php }
                            ?>
                        </div>

                        <div class="mini-cart">
                            <?php
                            if (!empty($_SESSION['user_client'])) { ?>
                                <a href="?act=gio-hang" class="cart-icon"><i class="fa fa-shopping-bag"></i></a>
                            <?php } else { ?>
                                <a href="?act=login" class="cart-icon"><i class="fa fa-shopping-bag"></i></a>
                            <?php }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom sticky-header">
        <div class="header-bottom-inner">
            <div class="container">
                <div class="row">
                    <div class="mgeamenu-full-width">
                        <div class="col-md-9 col-sm-6 col-xs-3">
                            <div class="main-menu hidden-sm hidden-xs">
                                <nav>
                                    <ul>
                                        <li><a class="home" href="?act=/"><i class="fa fa-home"></i></a>

                                        </li>
                                        <li><a href="?act=/">Trang chủ</a></li>
                                        <li class="mega_parent"><a href="?act=shop.php">Sản phẩm</a>

                                        </li>

                                        <li><a href="?act=tin-tucs">Tin tức </a></li>
                                        <li class="mega_parent mega-item2"><a href="?act=lien-hes">Liên hệ</a>
                                            <?php
                                            if (!isset($_SESSION['user_client'])) {
                                                echo "<li><a href='?act=login'>Đăng Nhập</a></li>";
                                            } else {
                                                echo "<li><a href='?act=lich-su-mua-hang'>Đơn hàng</a></li>";
                                                echo "<li><a href='?act=logout'>Đăng xuất</a></li>";
                                            }
                                            ?>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-9">
                            <div class="search-area">
                                <div class="search-box-inner">
                                    <form action="?act=sreach2" method="POST">
                                        <input type="text" name="sreach2" placeholder="Search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
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
<!--header end-->
<style>
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .breadcrumbs-area {
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: #f8f9fa;
        /* Màu nền cho phần breadcrumb */
    }

    .marquee-container {
        width: 100%;
        overflow: hidden;
        background-color: aqua;
        /* Màu nền cho dòng chữ chạy */
        color: black;
        padding: 10px 0;
        margin-top: 0px;
        /* Khoảng cách giữa breadcrumb và dòng chữ chạy */
    }

    .marquee {
        display: inline-block;
        white-space: nowrap;
        animation: scroll 10s linear infinite;
        font-size: 20px;
        font-weight: bold;
    }

    @keyframes scroll {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(-100%);
        }
    }
</style>

<!-- Dòng chữ chạy dưới breadcrumb -->
<div class="marquee-container">
    <div class="marquee">
        Nhân dịp Black Friday, toàn bộ sản phẩm đều được giảm giá với mức giảm giá ngẫu nhiên. Chúc bạn mua sắm vui vẻ!
    </div>
</div>

<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="index.html">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li><a href="index.html">Sản Phẩm</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Xe Đạp</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs-area end -->
<!--shop-area start-->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="price-slider-box">

                </div>
                <div class="categoryies-option">
                    <form method="POST" action="?act=loc3" class="p-3 bg-light rounded">
                        <h4 class="mb-3">Danh Mục</h4>
                        <div class="form-group">
                            <label for="sapxep3" class="form-label">Chọn danh mục:</label>
                            <select name="sapxep3" id="sapxep3" class="form-control">
                                <option value="" selected>Tất cả </option>
                                <option value="asc3">Xe Đạp Địa Hình</option>
                                <option value="desc3">Xe Đạp Nam</option>
                                <option value="descc3">Xe Đạp Nữ</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Hiển Thị</button>
                    </form>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var select = document.getElementById('sapxep3');
                        var currentValue = '<?php echo isset($_POST["sapxep3"]) ? $_POST["sapxep3"] : ""; ?>';
                        select.value = currentValue;
                    });
                </script>

                <style>
                    .list-group-item {
                        margin-bottom: 50px;
                        position: relative;

                        /* Thêm khoảng cách giữa các mục */
                    }

                    .badge.bg-success {
                        background-color: #28a745 !important;
                        /* Đảm bảo màu xanh cho số ngày còn lại */
                        color: white;
                        /* Đặt màu chữ trắng để dễ đọc */
                    }

                    /* Đảm bảo phần trăm khuyến mãi nằm ở góc trên bên phải */
                    .badge-position {
                        position: absolute;
                        top: 0;
                        right: 0;
                        margin-top: 5px;
                        margin-right: 5px;
                        background-color: #007bff;
                        /* Nền xanh dương */
                        color: white;
                        /* Chữ đen */
                    }

                    .badge.bg-primary {
                        position: absolute;
                        top: 0;
                        left: 0;
                        margin-top: 10px;
                        margin-left: 10px;
                        font-weight: bold;
                        padding: 5px 10px;
                        font-size: 16px;
                    }

                    .badge.bg-primary.text-dark {
                        background-color: #007bff;
                        /* Xanh dương */
                        color: #000;
                        /* Chữ màu đen */
                    }

                    .ms-2.me-auto {
                        margin-top: 20px;
                    }
                </style>

                <ul class="list-group">
                    <?php if (!empty($promoCodes)): ?>
                        <?php foreach ($promoCodes as $code):
                            $tenKhuyenMai = $code['ten_khuyen_mai'] ?? 'Tên không xác định';
                            $maKhuyenMai = $code['ma_khuyen_mai'] ?? 'Không rõ';
                            $ngayKetThuc = $code['ngay_ket_thuc'] ?? null;
                            $giaTriKhuyenMai = $code['gia_tri'] ?? null; // Sử dụng trường gia_tri để lấy giá trị khuyến mãi

                            // Tính số ngày còn lại (chỉ khi ngày hết hạn tồn tại)
                            if ($ngayKetThuc) {
                                $daysRemaining = (new DateTime($ngayKetThuc))->diff(new DateTime())->days;
                                $isExpired = (new DateTime($ngayKetThuc)) < (new DateTime());
                            } else {
                                $daysRemaining = null;
                                $isExpired = true; // Mặc định coi là hết hạn
                            }
                        ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start position-relative">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Tên Mã Khuyến Mãi: <?= htmlspecialchars($tenKhuyenMai) ?></div>
                                    Mã: <span class="text-primary"><?= htmlspecialchars($maKhuyenMai) ?></span><br>
                                    Hạn dùng: <?= $ngayKetThuc ? htmlspecialchars($ngayKetThuc) : 'Không xác định' ?>
                                </div>

                                <!-- Hiển thị giá trị % khuyến mãi ở góc trên bên phải -->
                                <?php if ($giaTriKhuyenMai): ?>
                                    <div class="badge badge-position">
                                        <?= $giaTriKhuyenMai ?>%
                                    </div>
                                <?php endif; ?>

                                <!-- Hiển thị số ngày còn lại -->
                                <div class="badge bg-<?= $isExpired ? 'danger' : 'success'; ?> rounded-pill">
                                    <?= $isExpired ? 'Hết hạn' : ($daysRemaining . ' ngày còn lại') ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item text-muted">Không còn mã khuyến mãi khả dụng</li>
                    <?php endif; ?>
                </ul>


            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="shop-item-filter">
                    <div class="toolber-form left">

                        <form method="POST" action="?act=loc2">
                            <div class="filter-form">
                                <label for="sapxep2">Sắp xếp:</label>
                                <select name="sapxep2" id="sapxep2">
                                    <option value="desc2">thấp đến cao</option>
                                    <option value="asc2">cao đến thấp</option>

                                </select>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Sắp xếp</button>
                        </form>

                    </div>
                    <!--tab-list start-->

                    <!--tab-list end-->
                </div>
                <div class="row">




                    <?php
                    foreach ($sanpham as $sp):
                    ?>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="single-product text-center">

                                <div class="single-product-inner">
                                    <div class="product-img">
                                        <a href="?act=detail_san_pham&san_pham_id=<?= $sp['id'] ?>"
                                            class="link-success fs-15"><img src="<?= $sp['anh_sp'] ?>" alt=""></a>
                                    </div>
                                    <div class="product-details">
                                        <h3><a href="?act=detail_san_pham&san_pham_id=<?= $sp['id'] ?>"
                                                class="link-success fs-15"><?= $sp['ten_sp'] ?></a></h3>

                                        <div class="price-box">
                                            <div class="old-price"><span>
                                                    <p><?= number_format($sp['gia_ban'], 0, ',', '.') ?> VND</p>
                                                </span></div>
                                            <div class="new-price"><span>
                                                    <p><?= number_format($sp['gia_khuyen_mai'], 0, ',', '.') ?> VND</p>

                                                </span></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>


                </div>
            </div>
        </div>
    </div>
    <!--shop-area end-->
    <?php require_once 'layouts/footer.php' ?>