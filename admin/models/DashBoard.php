<?php

class DashBoard {

    public $conn;

    public function __construct() {
        $this->conn = connectDB(); // Kết nối đến cơ sở dữ liệu
    }

    public function getThongKe() {
        try {
            // Cập nhật truy vấn để chỉ lấy doanh thu của đơn hàng có trang_thai_don_hang_id = 8
            $sql = "SELECT COUNT(don_hangs.id) AS soluong, SUM(don_hangs.tong_tien) AS tongtien 
                    FROM don_hangs 
                    WHERE don_hangs.trang_thai_don_hang_id = 8"; // Điều kiện lọc theo trạng thái
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Lấy trạng thái đơn hàng
            $sql = "SELECT trang_thai_don_hang_id FROM don_hangs GROUP BY trang_thai_don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result['trang_thai_don_hang_id'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Đếm số lượng khách hàng
            $khachHangSql = "SELECT COUNT(*) AS slkhachHang FROM nguoi_dungs";
            $stmtKhachHang = $this->conn->prepare($khachHangSql);
            $stmtKhachHang->execute();
            $slKhachHang = $stmtKhachHang->fetch(PDO::FETCH_ASSOC)['slkhachHang'];
    
            // Đếm số lượng sản phẩm
            $sanPhamSql = "SELECT COUNT(*) AS slsanPham FROM san_phams";
            $stmtSanPham = $this->conn->prepare($sanPhamSql);
            $stmtSanPham->execute();
            $result['slsanPham'] = $stmtSanPham->fetch(PDO::FETCH_ASSOC)['slsanPham'];
    
            return [
                'tongDoanhThu' => $result['tongtien'] ?? 0,
                'soluong' => $result['soluong'] ?? 0,
                'slKhachHang' => $slKhachHang,
                'slsanPham' => $result['slsanPham'] ?? 0,
                'trang_thai_don_hang_id' => $result['trang_thai_don_hang_id']
            ];
    
        } catch (Exception $e) {
            echo "Database query failed: " . $e->getMessage();
            return [];
        }
    }

    // Thêm phương thức loadSanPham_5 để lấy 5 sản phẩm mới nhất
    public function loadSanPham_5() {
        try {
            $sql = "SELECT * FROM san_phams ORDER BY id DESC LIMIT 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Database query failed: " . $e->getMessage();
            return [];
        }
    }
    
    // Thêm phương thức loadDonHang_5 để lấy 5 đơn hàng mới nhất
    public function loadDonHang_5() {
        try {
            $sql = "SELECT * FROM don_hangs ORDER BY id DESC LIMIT 5"; // Hoặc thay 'id' bằng trường phù hợp
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Database query failed: " . $e->getMessage();
            return [];
        }
    }
    public function getDoanhThuTheoNgay() {
        try {
            // Thay 'ngay_dat' bằng tên cột chứa ngày của bạn
            $sql = "SELECT DATE(ngay_dat) AS `date`, SUM(tong_tien) AS total FROM don_hangs GROUP BY DATE(ngay_dat) ORDER BY DATE(ngay_dat)";
    
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Database query failed: " . $e->getMessage();
            return [];
        }
    }
}
