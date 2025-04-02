<?php

class DashboardController {

    public $modelNguoiDung;
    public $modelDonHang;
    public $modelDashBoard;

    public function __construct() {
        $this->modelNguoiDung = new NguoiDung();
        $this->modelDonHang = new DonHang();
        $this->modelDashBoard = new DashBoard();
    }

    public function index() {
        
        // Lấy dữ liệu thống kê
        $thongKeData = $this->modelDashBoard->getThongKe();
    
        // Lấy 5 sản phẩm mới nhất
        $loadSanPham_5 = $this->modelDashBoard->loadSanPham_5();
    
        // Lấy 5 đơn hàng mới nhất
        $loadDonHang_5 = $this->modelDashBoard->loadDonHang_5();
    
        // Lấy doanh thu theo ngày
        $doanhThuTheoNgay = $this->modelDashBoard->getDoanhThuTheoNgay();
        // var_dump($doanhThuTheoNgay);
        // die();
        // Gán giá trị từ kết quả
        
        
        $tongDoanhThu = $thongKeData['tongDoanhThu'] ?? 0;
        
        $tongSanPham = $thongKeData['slsanPham'] ?? 0;
        $soLuongKhachHang = $thongKeData['slKhachHang'] ?? 0;
        $soLuongDonHang = $thongKeData['soluong'] ?? 0;
        
        // Truyền dữ liệu vào view
        require_once "./views/dashboard.php";
    }

}
