<?php 
    session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/NguoiDungController.php';
require_once 'controllers/TrangThaiDonHang.php';
require_once 'controllers/SanPhamConTroller.php';
require_once 'controllers/KhuyenMaiController.php';
require_once 'controllers/BanNerController.php';
require_once 'controllers/TrangThaiDonHang.php';
// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/LienHe.php';
require_once 'models/TinTuc.php';
require_once 'models/NguoiDung.php';
require_once 'models/TrangThaiDonHang.php';
require_once 'models/SanPham.php';
require_once 'models/KhuyenMai.php';
require_once 'models/BanNer.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                 => (new DashboardController())->index(),

    // quan ly danh muc san pham

    'danh-mucs'                 => (new DanhMucController())->index(),
    'form-add-danh-muc'         => (new DanhMucController())->create(),
    'them-danh-muc'             => (new DanhMucController())->store(),
    'form-sua-danh-muc'         => (new DanhMucController())->edit(),
    'sua-danh-muc'              => (new DanhMucController())->update(),
    'xoa-danh-muc'              => (new DanhMucController())->destroy(),
    'search-danh-muc'           => (new DanhMucController())->search(),


    // quan ly lien he

    'lien-hes'                  => (new LienHeController())->index(),
    'xoa-lien-he'               => (new LienHeController())->destroy(),
    'chi-tiet-lien-he'          => (new LienHeController())->details(),

     // quan ly tin tuc

     'tin-tucs'                 => (new TinTucController())->index(),
     'form-add-tin-tuc'         => (new TinTucController())->create(),
     'them-tin-tuc'             => (new TinTucController())->store(),
     'form-edit-tin-tuc'         => (new TinTucController())->edit(),
     'sua-tin-tuc'              => (new TinTucController())->update(),
     'xoa-tin-tuc'              => (new TinTucController())->destroy(),
     'show-tin-tuc'              => (new TinTucController())->show(),

     // quan ly nguoi dung
     'nguoi-dungs'               => (new NguoiDungController())->index(),
    'form-add-nguoi-dung'       => (new NguoiDungController())->create(),
    'xoa-nguoi-dung'            => (new NguoiDungController())->destroy(),
    'sua-nguoi-dung'              => (new NguoiDungController())->update(),
    'form-sua-nguoi-dung'         => (new NguoiDungController())->edit(),
    'chi-tiet-nguoi-dung'          => (new NguoiDungController())->details(),

    // trang thai don hang
    'trang-thai-don-hangs'      => (new TrangThaiDonHangController())->index(),

    // quan ly san pham

    'san-phams'                 => (new SanPhamConTroller())->index(),
    'form-add-san-pham'         => (new SanPhamConTroller())->create(),
    'them-san-pham'             => (new SanPhamConTroller())->store(),
    'form-sua-san-pham'         => (new SanPhamConTroller())->edit(),
    'sua-san-pham'              => (new SanPhamConTroller())->update(),
    'xoa-san-pham'              => (new SanPhamConTroller())->destroy(),


    // quản lý khuyễn mãi 

    'khuyen-mais'                 => (new KhuyenMaiController())->index(),
    'form-add-khuyen-mai'         => (new KhuyenMaiController())->create(),
    'them-khuyen-mai'             => (new KhuyenMaiController())->store(),
    'form-edit-khuyen-mai'           => (new KhuyenMaiController())->edit(),
    'sua-khuyen-mai'              => (new KhuyenMaiController())->update(),
    'xoa-khuyen-mai'              => (new KhuyenMaiController())->destroy(),
    'show-khuyen-mai'              => (new KhuyenMaiController())->show(),

    //quản lý banner
    'banners'              => (new BanNerController())->index_banner(),
    'form-them-banner'    => (new BanNerController())->create_banner(),
    'them-banner'          => (new BanNerController())->store_banner(),
    'form-sua-banner'      => (new BanNerController())->edit_banner(),
    'sua-banner'           => (new BanNerController())->update_banner(),
    'xoa-banner'           => (new BanNerController())->destroy_banner(),

    // trang thai don hang
    'trang-thai-don-hangs'      => (new TrangThaiDonHangController())->index(),
};