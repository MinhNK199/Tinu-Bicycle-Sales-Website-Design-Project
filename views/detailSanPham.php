<?php require_once 'layouts/header.php' ?>
<?php require_once 'layouts/menu.php' ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
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
        margin-top: 20px;
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
                    <li><a href="home.php">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li><a href="shop.php">Sản Phấm</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Chi Tiết Sản Phẩm</li>
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

                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($listSanPhamCungDanhMuc as $sp): ?>
                            <div class="col-12" style="margin-bottom: 20px;">
                                <div class="single-product text-center">

                                    <div class="single-product-inner">
                                        <div class="product-img">
                                            <a href="?act=detail_san_pham&san_pham_id=<?= $sp['id'] ?>" class="link-success fs-15">
                                                <img src="<?= $sp['anh_sp'] ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="product-details">
                                            <h3><a href="?act=detail_san_pham&san_pham_id=<?= $sp['id'] ?>" class="link-success fs-15"><?= $sp['ten_sp'] ?></a></h3>
                                            <div class="price-box">
                                                <div class="old-price"><span><?= number_format($sp['gia_ban'], 0, ',', '.') ?> VND</span></div><br>
                                                <div class="new-price"><span><?= number_format($sp['gia_khuyen_mai'], 0, ',', '.') ?> VND</span></div>
                                            </div>
                                        </div>
                                        <div class="product-hover">
                                            <ul>
                                                <li><a href="?act=detail_san_pham&san_pham_id=<?= $sp['id'] ?>" class="get-detail">Xem Chi Tiết</a></li>
                                                <li><a title="Add to Wishlist" href="#" class="add-to-cart"><i class="fa fa-check-square-o"></i></a></li>
                                                <li><a title="Add to compare" href="#" class="add-to-cart"><i class="fa fa-signal"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">

                <div class="row">


                    <!-- Form chọn kiểu sắp xếp -->


                    <div class="sigle-product-area">
                        <div class="row">
                            <div class="col-md-7 col-sm-6 col-xs-12">
                                <div class="single-product-tab">

                                    <div class="zoomWrapper">
                                        <div id="img-1" class="zoomWrapper single-zoom">
                                            <img id="zoom1" src="<?= BASE_URL . $sanphams['anh_sp'] ?>" data-zoom-image="<?= BASE_URL . $sanphams['anh_sp'] ?>" alt="big-1" style="width: 500px"
                                                onerror="this.onerror = null; this.src ='https://api.xedap.vn/products/JEEP/ps-06-grey.jpg'">

                                        </div>
                                        <!-- <div class="single-zoom-thumb">
                                            <?php
                                            foreach ($listHinhAnh as $key => $listanhsp):
                                            ?>

                                                <img src="<?= BASE_URL . $listanhsp['hinh_anh'] ?>" style="width: 100px" alt=""
                                                    onerror="this.onerror = null; this.src ='https://d1hjkbq40fs2x4.cloudfront.net/2016-01-31/files/1045.jpg'">


                                            <?php endforeach ?>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <div class="single-product-detels">
                                    <h5>Thuộc danh mục : <a href=""></a><?= $sanphams['ten_danh_muc'] ?></h2>
                                        <h4 class="single-product-title"><?= $sanphams['ten_sp'] ?></h4>
                                        <div class="single-price-box">
                                            <div class="new-price"><span>
                                                    <p>Giá khuyến mãi: <?= number_format($sanphams['gia_khuyen_mai'], 0, ',', '.') ?> VND</p>
                                                </span></div>
                                            <div class="old-price"><span>
                                                    <p>Giá gốc: <?= number_format($sanphams['gia_ban'], 0, ',', '.') ?> VND</p>
                                                </span></div>

                                        </div>

                                </div>
                                <div class="availability">
                                    <i class="fa fa-check-circle"></i>
                                    <span id="stock-count">
                                        <?php if ($sanphams['so_luong'] > 0) {
                                            echo $sanphams['so_luong'] . ' Sản phẩm còn liệu trong kho';
                                        } else {
                                            echo "Hết hàng";
                                        } ?>
                                    </span>
                                </div>
                                <br>
                                <?php

                                if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
                                    <div class="error-messages" style="color: red; margin-bottom: 20px;">
                                        <ul>
                                            <?php foreach ($_SESSION['errors'] as $error): ?>
                                                <li><?= htmlspecialchars($error) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php
                                    // Xóa lỗi sau khi hiển thị
                                    unset($_SESSION['errors']);
                                endif;
                                ?>
                                <form action="<?= '?act=them-gio-hang' ?>" method="POST" onsubmit="return checkQuantity()">
                                    <div class="quantity">
                                        <input type="hidden" name="san_pham_id" value="<?= $sanphams['id'] ?>">
                                        <input type="hidden" id="max_quantity" value="<?= $sanphams['so_luong'] ?>">
                                        <input type="hidden" name="so_luong_san_pham">
                                        <input type="number" name="so_luong" id="quantity" value="1" min="1" max="<?= $sanphams['so_luong'] ?>">
                                        <span class="single-product-btn">
                                            <?php if ($sanphams['so_luong'] > 0) { ?>
                                                <button type="submit" class="btn btn-primary">Add to cart</button>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-primary" disabled>Add to cart</button>
                                            <?php
                                            } ?>
                                        </span>
                                    </div>
                                </form>

                                <script>
                                    function checkQuantity() {
                                        var maxQuantity = <?= $sanphams['so_luong'] ?>;
                                        var quantityInput = document.getElementById("quantity").value;

                                        if (quantityInput > maxQuantity) {
                                            alert("Số lượng sản phẩm bạn đặt không được vượt quá số lượng còn lại trong kho.");
                                            return false; // Ngăn chặn việc gửi form
                                        }

                                        if (quantityInput < 1) {
                                            alert("Số lượng sản phẩm không được nhỏ hơn 1.");
                                            return false; // Ngăn chặn việc gửi form
                                        }

                                        return true; // Cho phép gửi form
                                    }
                                </script>

                                <div class="product-det-tab">
                                    <!-- Nav tabs stat-->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Mô tả</a></li>

                                        <li role="presentation"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">Chi Tiết</a></li>
                                    </ul>
                                    <!-- Nav tabs end-->
                                    <!-- Tab panes start -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="cont-pd tab-pane active" id="description"><?= $sanphams['mo_ta'] ?></div>
                                        <div role="tabpanel" class="cont-pd tab-pane" id="review">

                                        </div>
                                        <div role="tabpanel" class="cont-pd tab-pane" id="more-info"><?= $sanphams['mo_ta_chi_tiet'] ?></div>
                                    </div>
                                    <!-- Tab panes end -->
                                </div>
                                <div class="socil-media">
                                    <h5>Contact with us:</h5>
                                    <a href=""><img src="https://store-images.s-microsoft.com/image/apps.30645.9007199266245907.cb06f1f9-9154-408e-b4ef-d19f2325893b.ac3b465e-4384-42a8-9142-901c0405e1bc" alt="" style="width: 50px"></a>
                                    <img src="https://freepnglogo.com/images/all_img/1691832581twitter-x-icon-png.png" alt="" style="width: 50px">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Gmail_icon_%282020%29.svg/2560px-Gmail_icon_%282020%29.svg.png" alt="" style="width: 50px">
                                    <img src="https://stc-zaloprofile.zdn.vn/pc/v1/images/zalo_sharelogo.png" alt="" style="width: 50px">


                                </div>

                                <div role="tabpanel" class="cont-pd tab-pane" id="review">
                                    <div class="comment-list">
                                        <h4>Bình luận :</h4>
                                        <?php if (!empty($binhluans)): ?>
                                            <?php foreach ($binhluans as $binhluan): ?>
                                                <div class="comment-item border rounded mb-3 p-3">
                                                    <div class="d-flex align-items-center mb-2">

                                                        <div>
                                                            <strong class="d-block"><?= htmlspecialchars($binhluan['ten_nguoi_dung']) ?></strong>
                                                            <small class="text-muted"><?= date('d/m/Y', strtotime($binhluan['ngay_bl'])) ?></small>
                                                        </div>
                                                    </div>
                                                    <p><?= htmlspecialchars($binhluan['noi_dung']) ?></p>
                                                    <div class="d-flex justify-content-end mt-2">
                                                        <button class="btn btn-sm btn-outline-primary me-2" onclick="likeComment(<?= $binhluan['id'] ?>)">
                                                            <img src="https://png.pngtree.com/element_our/sm/20180626/sm_5b321ca743d4a.jpg" alt="Like" class="me-1" width="20" height="20"> Like
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirmReport()">
                                                            <img src="https://png.pngtree.com/png-clipart/20190614/original/pngtree-vector-ban-icon-png-image_3767410.jpg" alt="Báo cáo" class="me-1" width="20" height="20"> Báo cáo
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <p>Chưa có bình luận nào. Hãy là người đầu tiên!</p>
                                        <?php endif ?>
                                    </div>
                                </div>

                                <script>
                                    function confirmReport() {
                                        if (confirm("Bạn có chắc chắn muốn báo cáo bình luận này không?")) {
                                            alert("Báo cáo thành công, hệ thống sẽ ghi nhận lại phản hồi của bạn");
                                            return true;
                                        }
                                        return false;
                                    }

                                    function likeComment(commentId) {
                                        let likeCountSpan = document.getElementById(`like-count-${commentId}`);
                                        let likeCount = parseInt(likeCountSpan.textContent);
                                        likeCount += 1;
                                        likeCountSpan.textContent = likeCount;
                                        sessionStorage.setItem(`like-count-${commentId}`, likeCount);
                                        updateTotalLikes();
                                    }

                                    function updateTotalLikes() {
                                        let totalLikes = 0;
                                        let comments = document.querySelectorAll('.comment-item');
                                        comments.forEach(comment => {
                                            let commentId = comment.dataset.commentId;
                                            let savedLikeCount = sessionStorage.getItem(`like-count-${commentId}`);
                                            if (savedLikeCount) {
                                                totalLikes += parseInt(savedLikeCount);
                                            }
                                        });
                                        document.getElementById('total-likes').textContent = totalLikes;
                                    }
                                    document.addEventListener('DOMContentLoaded', (event) => {
                                        let comments = document.querySelectorAll('.comment-item');
                                        comments.forEach(comment => {
                                            let commentId = comment.dataset.commentId;
                                            let likeCountSpan = document.getElementById(`like-count-${commentId}`);
                                            let savedLikeCount = sessionStorage.getItem(`like-count-${commentId}`);
                                            if (savedLikeCount) {
                                                likeCountSpan.textContent = savedLikeCount;
                                            }
                                        });
                                        updateTotalLikes();
                                    });
                                </script>
                                <?php if (isset($_SESSION['user_client'])): ?>
                                    <form action="?act=postBinhLuan" method="POST">
                                        <input type="hidden" name="san_pham_id" value="<?php echo $sanphams['id']; ?>">
                                        <input type="hidden" name="nguoi_dung_id" value="<?php echo $sanphams['id']; ?>">
                                        <textarea name="noi_dung" rows="4" class="form-control" placeholder="Nhập bình luận của bạn..." required></textarea>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                                    </form>

                                <?php else: ?>
                                    <p>
                                        Bạn chưa đăng nhập.
                                        <a href="?act=login&redirect=<?= urlencode($_SERVER['REQUEST_URI']) ?>">Đăng nhập</a> để bình luận.
                                    </p>
                                <?php endif ?>
                            </div>

                        </div>

                    </div>
                    <!--sigle-product-area-->
                </div>
            </div>
        </div>
    </div>
    <!--shop-area end-->
</div>
<?php require_once 'layouts/footer.php' ?>