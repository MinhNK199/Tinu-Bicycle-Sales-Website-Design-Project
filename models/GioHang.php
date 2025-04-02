<?php

class GioHang
{
    private $conn;
    private $error = "";
    // Kết nối CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getGioHangFromUser($id)
    {
        try {
            $sql = "SELECT * FROM gio_hangs WHERE nguoi_dung_id = :nguoi_dung_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':nguoi_dung_id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng FETCH_ASSOC để trả về mảng kết hợp
        } catch (PDOException $e) {
            error_log("Lỗi getGioHangFromUser: " . $e->getMessage());
            return false;
        }
    }

    public function getDetailGioHang($id)
    {
        try {
            $sql = "SELECT chi_tiet_gio_hangs.*, san_phams.ten_sp, san_phams.anh_sp, san_phams.gia_ban, san_phams.gia_khuyen_mai, san_phams.so_luong as so_luong_san_pham
            FROM chi_tiet_gio_hangs 
            JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id 
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Sử dụng FETCH_ASSOC
        } catch (PDOException $e) {
            error_log("Lỗi getDetailGioHang: " . $e->getMessage());
            return false;
        }
    }

    public function addGioHang($id)
    {
        try {
            $sql = "INSERT INTO gio_hangs(nguoi_dung_id) VALUES (:id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $this->conn->lastInsertId(); // Lấy ID vừa thêm vào
        } catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    }
    public function getTongTienGioHang($gio_hang_id, $discount = 0)
    {
        try {
            // Lấy thông tin chi tiết giỏ hàng
            $chiTietGioHang = $this->getDetailGioHang($gio_hang_id);
            $tongTien = 0;

            // Tính tổng tiền sản phẩm
            foreach ($chiTietGioHang as $sanPham) {
                $giaSanPham = $sanPham['gia_khuyen_mai'] ?? $sanPham['gia_ban']; // Nếu có khuyến mãi thì dùng giá khuyến mãi
                $tongTien += $giaSanPham * $sanPham['so_luong']; // Tổng tiền sản phẩm = giá * số lượng
            }

            // Áp dụng giảm giá trước khi thêm phí vận chuyển
            $tongTienSauKhuyenMai = $tongTien * (1 - $discount); // Áp dụng giảm giá theo tỷ lệ

            // Thêm phí vận chuyển
            $phiVanChuyen = 50000; // Có thể thay đổi nếu phí vận chuyển khác nhau tùy vào đơn hàng
            $tongThanhToan = $tongTienSauKhuyenMai + $phiVanChuyen;

            return $tongThanhToan;
        } catch (PDOException $e) {
            error_log("Lỗi tính tổng tiền giỏ hàng: " . $e->getMessage());
            return false;
        }
    }


    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = "UPDATE chi_tiet_gio_hangs 
                SET so_luong = :so_luong 
                WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':so_luong' => $so_luong,
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi updateSoLuong: " . $e->getMessage());
            return false;
        }
    }


    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = "INSERT INTO chi_tiet_gio_hangs(gio_hang_id, san_pham_id, so_luong) VALUES (:gio_hang_id, :san_pham_id, :so_luong)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gio_hang_id, ':san_pham_id' => $san_pham_id, ':so_luong' => $so_luong]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi addDetailGioHang: " . $e->getMessage());
            return false;
        }
    }

    public function deleteGioHang($id)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return true;
        } catch (PDOException $e) {
            error_log("Lỗi khi xóa sản phẩm khỏi giỏ hàng: " . $e->getMessage());
            return false;
        }
    }

    public function clearDetailGioHang($gio_hang_id)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gio_hang_id]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi addDetailGioHang: " . $e->getMessage());
            return false;
        }
    }

    public function clearGioHang($nguoi_dung_id)
    {
        try {
            $sql = "DELETE FROM gio_hangs WHERE nguoi_dung_id = :nguoi_dung_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':nguoi_dung_id' => $nguoi_dung_id]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi addDetailGioHang: " . $e->getMessage());
            return false;
        }
    }
}
