<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';


// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/LienHe.php';
require_once './models/TinTuc.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';
require_once './models/KhuyenMai.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                             => (new HomeController())->home(),




    'shop.php'                      => (new HomeController())->shop(),
    "detail_san_pham"               => (new HomeController())->detaiSanPham(),
    "postBinhLuan"                  => (new HomeController())->postBinhLuan(),

    "them-gio-hang"                 => (new HomeController())->addGioHang(),
    'xoa-gio-hang'                  => (new HomeController())->destroyGioHang(),
    'gio-hang'                      => (new HomeController())->gioHang(),
    'cap-nhat-gio-hang'             => (new HomeController())->updateGioHang(),
    'thanh-toan'                    => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan'              => (new HomeController())->postThanhToan(),

    'lich-su-mua-hang'              => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-don-hang'            => (new HomeController())->chiTietMuaHang(),
    'huy-don-hang'                  => (new HomeController())->huyDonHang(),
    'nhan-don-hang'                  => (new HomeController())->nhanDonHang(),


    'sreach'                        => (new HomeController())->search(),
    'sreach2'                       => (new HomeController())->search2(),

    'loc'                           => (new HomeController())->Rangskik(),
    'loc2'                          => (new HomeController())->Rangskik2(),
    'loc3'                          => (new HomeController())->Rangskik3(),
    // Lien he
    'lien-hes'                      => (new HomeController())->contact(),
    'them-lien-he'                  => (new HomeController())->addContact(),

    // tin tuc
    'tin-tucs'                      => (new HomeController())->new(),
    'chi-tiet-tin-tuc'              => (new HomeController())->detail(),

    // Đăng nhập
    'login'                         => (new HomeController())->formLogin(),
    'check-login'                   => (new HomeController())->postLogin(),

    'logout'                        => (new HomeController())->logout(),

    'register-client'               => (new HomeController())->formRegister(),
    'register'                      => (new HomeController())->postRegister(),

    'form-thong-tin-ca-nhan'        => (new HomeController())->formThongTinCaNhan(),
    'sua-thong-tin-ca-nhan'         => (new HomeController())->editThongTinCaNhan(),
    'sua-mat-khau-ca-nhan'          => (new HomeController())->editmatkhauCaNhan(),
};
