<?php

class DonHang
{
    private $conn;
    private $error = "";
    // Kết nối CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }
    

    public function addDonHang($nguoi_dung_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat,$trang_thai_don_hang_id, $ma_don_hang, $trang_thai_thanh_toan)
    {
        try {
            $sql = "INSERT INTO don_hangs (
                nguoi_dung_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan,
                ghi_chu, tong_tien, phuong_thuc_thanh_toan_id, ngay_dat, trang_thai_don_hang_id,
                ma_don_hang, trang_thai_thanh_toan
            ) VALUES (
                :nguoi_dung_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan,
                :ghi_chu, :tong_tien, :phuong_thuc_thanh_toan_id, :ngay_dat, :trang_thai_don_hang_id,
                :ma_don_hang, :trang_thai_thanh_toan
            )";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':nguoi_dung_id' => $nguoi_dung_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':tong_tien' => $tong_tien,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':ngay_dat' => $ngay_dat,
                ':trang_thai_don_hang_id' => $trang_thai_don_hang_id,
                ':ma_don_hang' => $ma_don_hang
                ,':trang_thai_thanh_toan' => $trang_thai_thanh_toan
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    }

    public function addChiTietDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien)  {
        try {
            $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien) VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $don_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':don_gia' => $don_gia,
                ':so_luong' => $so_luong,
                ':thanh_tien' => $thanh_tien
            ]);
            return true;
        }catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    }

    public function getDonHangFromUser($nguoi_dung_id) { 
        try {
            $sql = "SELECT * FROM don_hangs WHERE nguoi_dung_id = :nguoi_dung_id ORDER BY id DESC";    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':nguoi_dung_id' => $nguoi_dung_id
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    
}


    public function getTrangThaiDonHang() { 
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false; 
        }
    
    } 
    public function getPhuongThucThanhToan() { 
        try {
            $sql = "SELECT * FROM phuong_thuc_thanh_toans";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    
    }
 
    public function getDonHangById($don_hang_id) { 
        try {
            $sql = "SELECT * FROM don_hangs WHERE id = :id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute( [
                ':id' => $don_hang_id   
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    
    }
    public function getChiTietDonHang($don_hang_id) {
        try {
            $sql = "SELECT san_pham_id, so_luong FROM chi_tiet_don_hangs WHERE don_hang_id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $don_hang_id
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi lấy chi tiết đơn hàng: " . $e->getMessage());
            return false;
        }
    }

    public function getChiTietDonHangByDonHangId($don_hang_id) { 
        try {
            $sql = "SELECT
                    chi_tiet_don_hangs.*,
                    san_phams.ten_sp,
                    san_phams.anh_sp
                FROM chi_tiet_don_hangs
                JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute( [
                ':don_hang_id' => $don_hang_id   
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    
    }
        
    
    public function updateTrangThaiDonHang($don_hang_id, $trang_thai_don_hang_id) {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_don_hang_id = :trang_thai_don_hang_id WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute( [
                ':trang_thai_don_hang_id' => $trang_thai_don_hang_id,
                ':id' => $don_hang_id 
            ]);
            return true;
        }catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    
    }
    
    public function deleteDonHang($don_hang_id) {
        try {
            $sql = "DELETE FROM don_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute( [
                ':id' => $don_hang_id 
            ]);
            return true;
        }catch (PDOException $e) {
            error_log("Lỗi addGioHang: " . $e->getMessage());
            return false;
        }
    }
    
} 


