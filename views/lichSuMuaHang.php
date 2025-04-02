<?php require_once 'layouts/header.php' ?>
<?php require_once 'layouts/menu.php' ?>

<!--header end-->
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="?act=/">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Lịch Sử Mua Hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs-area end -->

<!--cart-page-area start-->
<div class="cart-page-area page-bg page-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="table-responsive">
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert"></a>
                            <i class="fa fa-check"></i>
                            <?= $_SESSION['success'] ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php } elseif (isset($_SESSION['errors'])) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert"></a>
                            <i class="fa fa-exclamation-triangle"></i>
                            <?php
                            // Loop through each error and display it
                            foreach ($_SESSION['errors'] as $error) {
                                echo '<div>' . htmlspecialchars($error) . '</div>'; // Sanitize output
                            }
                            ?>
                        </div>
                        <?php unset($_SESSION['errors']); ?>
                    <?php } ?>
                    <table class="table-content">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày Đặt</th>
                                <th>Tổng tiền</th>
                                <th>Phường Thức Thanh Toán</th>
                                <th>Trạng Thái Đơn Hàng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donHang as $donHang): ?>
                                <tr>
                                    <td><?= $donHang['ma_don_hang'] ?></td>
                                    <td><?= $donHang['ngay_dat'] ?></td>
                                    <td><?= number_format($donHang['tong_tien']) ?></td>
                                    <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                    <td><?= $trangThaiDonHang[$donHang['trang_thai_don_hang_id']] ?></td>
                                    <td style="width: 200px;">
                                        <a href="<?= '?act=chi-tiet-don-hang&id=' . $donHang['id'] ?>" class="btn btn-success">
                                            Chi tiết
                                        </a>

                                        <?php if ($donHang['trang_thai_don_hang_id'] == 3) { ?>

                                            <a href="<?= '?act=huy-don-hang&id=' . $donHang['id'] ?>" class="btn btn-danger"
                                                onclick="return confirm('Xác Nhận Hủy Đơn Hàng')">
                                                Hủy
                                            </a>
                                        <?php } elseif ($donHang['trang_thai_don_hang_id'] == 6) { ?>
                                            <a href="<?= '?act=nhan-don-hang&id=' . $donHang['id'] ?>" class="btn btn-success">
                                                Đã nhận hàng
                                            </a>
                                        <?php  }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!--cart-page-area end-->

<!--footer start-->
<?php require_once 'layouts/footer.php' ?>

<!-- Thêm đoạn JavaScript -->
<script>
    document.querySelectorAll('.cart-plus-minus-box').forEach(input => {
        input.addEventListener('input', function(event) {
            const qtyInput = event.target;
            let quantity = parseInt(qtyInput.value);

            // Giới hạn số lượng không nhỏ hơn 1
            if (quantity < 1) {
                quantity = 1;
                qtyInput.value = quantity;
            }

            const id = qtyInput.getAttribute('data-id');
            const price = parseFloat(qtyInput.getAttribute('data-price'));

            // Cập nhật tổng tiền cho sản phẩm
            const totalElement = document.querySelector(`.total-cart-price .amount[data-id='${id}']`);
            const total = quantity * price;
            totalElement.textContent = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(total);

            // Cập nhật tổng giỏ hàng
            updateTotalCart();

            // Vô hiệu hóa nút giảm khi số lượng là 1
            const minusButton = qtyInput.closest('.cart-plus-minus').querySelector('.deco');
            if (quantity === 1) {
                minusButton.classList.add('disabled');
            } else {
                minusButton.classList.remove('disabled');
            }
        });
    });

    function updateTotalCart() {
        const cartItems = document.querySelectorAll('.total-cart-price .amount');
        let totalCart = 0;

        cartItems.forEach(item => {
            totalCart += parseInt(item.textContent.replace(/\D/g, ''));
        });

        document.getElementById('total-products').textContent = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(totalCart);
        document.getElementById('total-payment').textContent = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(totalCart + 50000);
    }
</script>

<!-- Thêm CSS để làm phần nhập to ra -->
<style>
    .large-input {
        width: 80px;
        height: 40px;
        font-size: 18px;
        text-align: center;
    }

    .disabled {
        pointer-events: none;
        opacity: 0.5;
    }
</style>