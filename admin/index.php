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
require_once 'controllers/DonHangController.php';
// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/LienHe.php';
require_once 'models/TinTuc.php';
require_once 'models/NguoiDung.php';
require_once 'models/TrangThaiDonHang.php';
require_once 'models/SanPham.php';
require_once 'models/KhuyenMai.php';
require_once 'models/BanNer.php';
require_once 'models/DonHang.php';
require_once 'models/DashBoard.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin();
}

match ($act) {
    // Dashboards-Trang chủ
    '/'                         => (new DashboardController())->index(),
    
        

    

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
    'sua-lien-he'               => (new LienHeController())->update(),
    'form-sua-lien-he'          => (new LienHeController())->edit(),


     // quan ly tin tuc

     'tin-tucs'                 => (new TinTucController())->index(),
     'form-add-tin-tuc'         => (new TinTucController())->create(),
     'them-tin-tuc'             => (new TinTucController())->store(),
     'form-edit-tin-tuc'        => (new TinTucController())->edit(),
     'sua-tin-tuc'              => (new TinTucController())->update(),
     'xoa-tin-tuc'              => (new TinTucController())->destroy(),
     'show-tin-tuc'             => (new TinTucController())->show(),

     // quan ly admin
    'nguoi-dungs'               => (new NguoiDungController())->index(),
    'form-add-nguoi-dung'       => (new NguoiDungController())->create(),
    'them-nguoi-dung'           => (new NguoiDungController())->store(),
    'xoa-nguoi-dung'            => (new NguoiDungController())->destroy(),
    'sua-nguoi-dung'            => (new NguoiDungController())->update(),
    'form-sua-nguoi-dung'       => (new NguoiDungController())->edit(),
    'chi-tiet-nguoi-dung'       => (new NguoiDungController())->details(),

    //resset password

    'resset-password'          => (new NguoiDungController())->ressetPassword(),

    //quan ly khach hang
    'khach-hangs'               => (new NguoiDungController())->listKhachHang(),
    'form-sua-khach-hang'       => (new NguoiDungController())->editKhachHang(),
    'sua-khach-hang'            => (new NguoiDungController())->updateKhachHang(),
    'chi-tiet-khach-hang'       => (new NguoiDungController())->detailsKhachHang(),

    //quan lý tài khoản cá nhân
    'form-sua-thong-tin-ca-nhan-quan-tri'     => (new NguoiDungController())->formEditCaNhanQuanTri(),
    'sua-thong-tin-ca-nhan-quan-tri'          => (new NguoiDungController())->postEditCaNhanQuanTri(),
    
    'sua-mat-khau-ca-nhan-quan-tri'          => (new NguoiDungController())->postEditMatKhauCaNhan(),
    // trang thai don hang
    'trang-thai-don-hangs'      => (new TrangThaiDonHangController())->index(),

    // quản lý khuyễn mãi 

    'khuyen-mais'                 => (new KhuyenMaiController())->index(),
    'form-add-khuyen-mai'         => (new KhuyenMaiController())->create(),
    'them-khuyen-mai'             => (new KhuyenMaiController())->store(),
    'form-edit-khuyen-mai'        => (new KhuyenMaiController())->edit(),
    'sua-khuyen-mai'              => (new KhuyenMaiController())->update(),
    'xoa-khuyen-mai'              => (new KhuyenMaiController())->destroy(),
    'show-khuyen-mai'             => (new KhuyenMaiController())->show(),

    //quản lý banner
    'banners'              => (new BanNerController())->index_banner(),
    'form-them-banner'     => (new BanNerController())->create_banner(),
    'them-banner'          => (new BanNerController())->store_banner(),
    'form-sua-banner'      => (new BanNerController())->edit_banner(),
    'sua-banner'           => (new BanNerController())->update_banner(),
    'xoa-banner'           => (new BanNerController())->destroy_banner(),

    // trang thai don hang
    'trang-thai-don-hangs'      => (new TrangThaiDonHangController())->index(),

    // quản lý don hang
    'don-hangs'              => (new DonHangController())->index(),
    'form-sua-don-hang'      => (new DonHangController())->edit(),
    'sua-don-hang'           => (new DonHangController())->update(),
    // 'xoa-don-hang'           => (new DonHangController())->destroy(),
    'chi-tiet-don-hang'      => (new DonHangController())->details(),

    // quan ly san pham

    'san-phams'                 => (new SanPhamController())->index(),
    'form-add-san-pham'         => (new SanPhamController())->create(),
    'them-san-pham'             => (new SanPhamController())->store(),
    'form-edit-san-pham'        => (new SanPhamController())->edit(),
    'sua-san-pham'              => (new SanPhamController())->update(),
    'xoa-san-pham'              => (new SanPhamController())->destroy(),
    'show-san-pham'             => (new SanPhamController())->show(),

    //quan ly binh luan
    'update-binh-luan'          => (new SanPhamController())->updateTrangThaiBinhLuan1(),

    //login

    'login-admin'               => (new NguoiDungController())->formLogin(),
    'check-login-admin'         => (new NguoiDungController())->login(),

    'logout-admin'                    => (new NguoiDungController())->logout(),


    
};