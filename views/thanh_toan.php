<?php require_once 'layouts/header.php' ?>
<?php require_once 'layouts/menu.php' ?>


<div class="checkout-area page-bg">
    <div class="container">

        <form action="?act=xu-ly-thanh-toan" method="POST">
            <br>
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
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-details-area">
                        <h4 class="checkout-titel">Thông tin nguời nhận</h4>
                        <div class="billing-input">
                            <div class="input-field">
                                <div class="input-text"><input type="text" name="ten_nguoi_nhan" id="ten_nguoi_nhan"
                                        value="<?= $user['ten_nguoi_dung'] ?>" placeholder="Tên nguời nhận">
                                    <span
                                        class="text-danger"><?= !empty($_SESSION['errors']['ten_nguoi_nhan']) ? $_SESSION['errors']['ten_nguoi_nhan'] : '' ?></span>
                                </div>
                            </div>
                            <div class="input-field">
                                <div class="input-text"><input type="text" name="email_nguoi_nhan" id="email_nguoi_nhan"
                                        value="<?= $user['email'] ?>" placeholder="Email">
                                    <span
                                        class="text-danger"><?= !empty($_SESSION['errors']['email_nguoi_nhan']) ? $_SESSION['errors']['email_nguoi_nhan'] : '' ?></span>
                                </div>
                            </div>
                            <div class="input-field">
                                <div class="input-text"><input type="text" name="sdt_nguoi_nhan" id="sdt_nguoi_nhan"
                                        value="<?= $user['sdt'] ?>" placeholder="Số điện thoại nguời nhận">
                                    <span
                                        class="text-danger"><?= !empty($_SESSION['errors']['sdt_nguoi_nhan']) ? $_SESSION['errors']['sdt_nguoi_nhan'] : '' ?></span>
                                </div>
                            </div>
                            <div class="input-field">
                                <div class="input-text"><input type="text" name="dia_chi_nguoi_nhan"
                                        id="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>"
                                        placeholder="Địa chỉ nguời nhận">
                                    <span
                                        class="text-danger"><?= !empty($_SESSION['errors']['dia_chi_nguoi_nhan']) ? $_SESSION['errors']['dia_chi_nguoi_nhan'] : '' ?></span>
                                </div>
                            </div>
                            <div class="input-field">
                                <div class="input-text"><textarea name="ghi_chu" id="ghi_chu" placeholder="Ghi chú đơn hàng" cols="79" rows="5"></textarea></div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="your-order-area">
                        <h4 style="margin-bottom: 20px">THÔNG TIN SẢN PHẨM</h4>
                        <table border="1">
                            <thead>
                                <th>Sản phẩm</th>
                                <th>Số lượng </th>
                            </thead>
                            <tbody>
                                <?php
                                $tongGioHang = 0;
                                foreach ($chiTietGioHang as $key => $sanphams):
                                ?>
                                    <tr>
                                        <td class="cart-name">
                                            <h4>
                                                <a href="?act=detail_san_pham&san_pham_id=<?= $sanphams['san_pham_id'] ?>"><?= $sanphams['ten_sp'] ?></a>
                                            </h4>
                                        </td>
                                        <td>
                                            <h4><?= $sanphams['so_luong'] ?></h4>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <br>
                        <h4 style="margin-bottom: 20px">TỔNG TIỀN</h4>
                        <?php
                        $tongGioHang = 0;
                        foreach ($chiTietGioHang as $key => $sanphams):
                        ?>
                            <span class="amount">
                                <?php
                                $tongTien = 0;
                                if ($sanphams['gia_khuyen_mai']) {
                                    $tongTien = $sanphams['gia_khuyen_mai'] * $sanphams['so_luong'];
                                } else {
                                    $tongTien = $sanphams['gia_ban'] * $sanphams['so_luong'];
                                }
                                $tongGioHang += $tongTien;
                                ?>
                            </span>
                        <?php endforeach ?>
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
                        <li class="list-group-item d-flex justify-content-between">
                            <input type="hidden" name="tong_tien" value="<?= $tongGioHang - ($tongGioHang * $discount) + 50000 ?>">
                            <strong>TỔNG THANH TOÁN: </strong><br>
                            <strong id="total-payment">
                                <?= number_format($tongGioHang - ($tongGioHang * $discount) + 50000, 0, '.', ',') . 'đ' ?>
                            </strong>
                        </li>
                        <div class="payment-method">
                            <input type="radio" name="phuong_thuc_thanh_toan_id" value="1">Thanh toán khi nhận hàng
                            </input>

                            <div class="accordion-description">
                                <p>Khách hàng có thể nhận hàng sau khi đã xác nhận thành công(cần xác nhận đơn hàng)
                                </p>
                            </div>
                            <input type="radio" name="phuong_thuc_thanh_toan_id" value="2">Thanh toán online</input>

                            <div class="accordion-description">
                                <p>Khách hàng cần thanh toán online.</p>
                            </div>

                            <div class="payment-checkbox">
                                <input type="checkbox" required>
                                Xác nhận đặt hàng
                            </div>
                            <div class="place-order">
                                <button type="submit" class=" btn btn-primary">Tiến hành đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>


<!--footer start-->
<?php require_once 'layouts/footer.php' ?>
<style>
    .order-summary {
        border: 1px solid #ccc;
        padding: 20px;
        margin-top: 20px;
    }

    .list-group-item {
        padding: 10px 0;
    }

    .list-group-item strong {
        font-weight: bold;
    }

    .total-products,
    #total-payment {
        font-weight: bold;
        color: red;
        font-size: 30px;
        /*Adjust color as needed */
    }

    .text-danger {
        color: red;
    }

    .alert-danger {
        margin-bottom: 20px;
    }
</style>