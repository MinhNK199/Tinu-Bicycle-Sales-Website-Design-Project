<?php require_once 'layouts/header.php' ?>
<?php require_once 'layouts/menu.php' ?>

<!--header end-->
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="index.html">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Giỏ Hàng</li>
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
            <div class="col-md-10 col-xs-10 col-sm-10">
                <div class="table-responsive">

                    <form action="?act=cap-nhat-gio-hang" method="post" onsubmit="return checkQuantity()">
                        <table class="table-content">
                            <thead>
                                <tr>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên Sản phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody id="cart-items">
                                <?php
                                $tongGioHang = 0;
                                foreach ($chiTietGioHang as $key => $sanphams):
                                ?>
                                    <tr>
                                        <td class="cart-product">
                                            <a href="?act=detail_san_pham&san_pham_id=<?= $sanphams['san_pham_id'] ?>"><img src="<?= $sanphams['anh_sp'] ?>" alt="" style="width: 100px;"></a>
                                        </td>
                                        <td class="cart-name">
                                            <h3><a href="?act=detail_san_pham&san_pham_id=<?= $sanphams['san_pham_id'] ?>"><?= $sanphams['ten_sp'] ?></a></h3>
                                        </td>
                                        <td>
                                            <div class="cart-quantity">
                                                <div class="product-quantity">
                                                    <input type="number" value="<?= $sanphams['so_luong'] ?>"
                                                        name="so_luong[<?= $sanphams['san_pham_id'] ?>]"
                                                        class="cart-plus-minus-box large-input"
                                                        data-id="<?= $sanphams['san_pham_id'] ?>"
                                                        data-price="<?= $sanphams['gia_khuyen_mai'] ?? $sanphams['gia_ban'] ?>"
                                                        min="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price-cart">
                                            <?= number_format($sanphams['gia_khuyen_mai'] ?? $sanphams['gia_ban']) . 'đ' ?>
                                        </td>
                                        <td class="total-cart-price">
                                            <span class="amount" data-id="<?= $sanphams['id'] ?>">
                                                <?php
                                                $tongTien = ($sanphams['gia_khuyen_mai'] ?? $sanphams['gia_ban']) * $sanphams['so_luong'];
                                                $tongGioHang += $tongTien;
                                                echo number_format($tongTien) . 'đ';
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                        <!-- Phần chọn mã khuyến mãi -->
                        <div class="promo-code-section">
                            <label for="promoCode">Chọn mã khuyến mãi:</label>
                            <select name="promo_code_id" id="promoCodeID">
                                <option value="">Chọn mã khuyến mãi</option>
                                <option value="">Không sử dụng mã khuyến mãi</option> <!-- Thêm lựa chọn này -->
                                <?php foreach ($promoCodes as $promoCode): ?>
                                    <option value="<?= $promoCode['id'] ?>"><?= $promoCode['ten_khuyen_mai'] ?> - Giảm <?= $promoCode['gia_tri'] ?>%</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
                    </form>

                </div>

            </div>
            <div class="col-md-2 col-xs-12 col-sm-3">
                <table>
                    <thead>
                        <th>Thao tác</th>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($chiTietGioHang as $key => $sanphams):
                        ?>

                            <tr>
                                <td class="cart-remove" style="padding: 55px;">
                                    <form action="?act=xoa-gio-hang" method="POST"
                                        onsubmit="return confirm('Bạn có muốn xóa không?')">
                                        <input type="hidden" name="id" value="<?= $sanphams['id'] ?>">
                                        <button type="submit" class="link-danger fs-15"
                                            style="border: none; background: none;">
                                            <i class="ri-delete-bin-line">Xóa</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?php
                if (empty($chiTietGioHang)) {
                    echo "Giỏ hàng trống";
                } else {
                ?>
                    <div class="cart_total cart-pdi">
                        <h4>Tổng đơn hàng</h4>
                        <div class="cart-inner">
                            <ul>
                                <li>Tổng tiền sản phẩm
                                    <span id="total-products">
                                        <?= number_format($tongGioHang, 0, '.', ',') . 'đ' ?>
                                    </span>
                                </li>
                                <li>Phí Vận Chuyển
                                    <span>50.000đ</span>
                                </li>
                                <?php if (isset($discount) && $discount > 0) { ?>
                                    <li>Khuyến mãi
                                        <span id="discount">
                                            -<?= number_format($tongGioHang * $discount, 0, '.', ',') . 'đ' ?>
                                        </span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <p>Tổng thanh toán
                            <span id="total-payment">
                                <?= number_format($tongGioHang - $tongGioHang * $discount + 50000, 0, '.', ',') . 'đ' ?>
                            </span>
                        </p>
                        <div class="proceed-out">
                            <?php if ($sanphams['so_luong_san_pham'] == 0) { ?>
                                <a href="?act=shop.php" class="btn btn-primary">Hết hàng</a>
                            <?php } else { ?>
                                <a href="?act=thanh-toan" class="btn btn-primary">Tiến hành đặt hàng</a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
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