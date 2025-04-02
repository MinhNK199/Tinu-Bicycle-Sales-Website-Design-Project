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
                    <li>Chi tiết Đơn Hàng</li>
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
            <div class="col-md-7 col-xs-7 col-sm-7">
                <div class="table-responsive">
                    <table class="table-content" border="1">
                        <thead>
                            <tr>
                                <th colspan="5">Thông tin sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phâm</th>
                                <th>Đơn giá</th>
                                <th>Số Lượng </th>
                                <th>Thành Tiền</th>
                            </tr>
                            <?php foreach ($chiTietDonHang as $item): ?>
                                <tr>
                                    <td><img src="<?= $item['anh_sp'] ?>" alt="" width="100" /></td>
                                    <td><?= $item['ten_sp'] ?></td>
                                    <td><?= number_format($item['don_gia']) ?> VNĐ</td>
                                    <td><?= $item['so_luong'] ?></td>
                                    <td><?= number_format($item['thanh_tien']) ?> VNĐ</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> <br>
                    <?php
                    if ($donHang['trang_thai_don_hang_id'] == 6) {
                    ?>
                        <a href="<?= '?act=nhan-don-hang&id=' . $donHang['id'] ?>" class="btn btn-success">
                            Đã nhận hàng
                        </a>
                    <?php
                    } else {
                        echo "";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-5 col-xs-5 col-sm-5">
                <div class="table-responsive">
                    <table class="table-content" border="1">
                        <thead>
                            <tr>
                                <th colspan="2">Thông tin sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td><?= $donHang['ma_don_hang'] ?></td>
                            </tr>
                            <tr>
                                <td>Người nhận</td>
                                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $donHang['email_nguoi_nhan'] ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ người nhận </td>
                                <td><?= $donHang['ngay_dat'] ?></td>
                            </tr>
                            <tr>
                                <td>Ghi chú</td>
                                <td><?= $donHang['ghi_chu'] ?></td>
                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td><?= number_format($donHang['tong_tien']) ?> VNĐ</td>
                            </tr>
                            <tr>
                                <td>Phương thức thanh toán</td>
                                <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                            </tr>
                            <tr>
                                <td>Trạng thái đơn hàng</td>
                                <td><?= $trangThaiDonHang[$donHang['trang_thai_don_hang_id']] ?></td>
                            </tr>

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