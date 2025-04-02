<?php

class SanPham
{
    private $conn;

    // Kết nối CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách sản phẩm cùng danh mục
    public function getAll()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy danh sách sản phẩm: " . $e->getMessage());
            return [];
        }
    }

    // Thêm sản phẩm
    public function postData($ma_sp, $anh_sp, $ten_sp, $gia_nhap, $gia_ban, $gia_khuyen_mai, $so_luong, $mo_ta, $mo_ta_chi_tiet, $danh_muc_id, $trang_thai)
    {
        try {
            $sql = "INSERT INTO `san_phams` (`ma_sp`, `anh_sp`, `ten_sp`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `so_luong`, `mo_ta`, `mo_ta_chi_tiet`, `danh_muc_id`, `trang_thai`)
                    VALUES (:ma_sp, :anh_sp, :ten_sp, :gia_nhap, :gia_ban, :gia_khuyen_mai, :so_luong, :mo_ta, :mo_ta_chi_tiet, :danh_muc_id, :trang_thai)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ma_sp' => $ma_sp,
                ':anh_sp' => $anh_sp,
                ':ten_sp' => $ten_sp,
                ':gia_nhap' => $gia_nhap,
                ':gia_ban' => $gia_ban,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':mo_ta' => $mo_ta,
                ':mo_ta_chi_tiet' => $mo_ta_chi_tiet,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai
            ]);

            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("Lỗi khi thêm sản phẩm: " . $e->getMessage());
            return false;
        }
    }

    // Thêm album ảnh sản phẩm
    public function insertAlbumAnhSanPham($san_pham_id, $hinh_anh)
    {
        try {
            $sql = "INSERT INTO `hinh_anh_san_phams` (`san_pham_id`, `hinh_anh`) VALUES (:san_pham_id, :hinh_anh)";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':hinh_anh' => $hinh_anh
            ]);

            return true;
        } catch (PDOException $e) {
            error_log("Lỗi khi thêm album ảnh sản phẩm: " . $e->getMessage());
            return false;
        }
    }

    // Cập nhật sản phẩm
    public function updateData($san_pham_id, $ma_sp, $anh_sp, $ten_sp, $gia_nhap, $gia_ban, $gia_khuyen_mai, $so_luong, $mo_ta, $mo_ta_chi_tiet, $danh_muc_id, $trang_thai)
    {
        try {
            $sql = "UPDATE `san_phams` SET 
            ma_sp = :ma_sp,
            anh_sp = :anh_sp,
            ten_sp = :ten_sp,
            gia_nhap = :gia_nhap,
            gia_ban = :gia_ban,
            gia_khuyen_mai = :gia_khuyen_mai,
            so_luong = :so_luong,
            mo_ta = :mo_ta,
            mo_ta_chi_tiet = :mo_ta_chi_tiet,
            danh_muc_id = :danh_muc_id,
            trang_thai = :trang_thai
        WHERE id = :id";


            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $san_pham_id,
                ':ma_sp' => $ma_sp,
                ':anh_sp' => $anh_sp,
                ':ten_sp' => $ten_sp,
                ':gia_nhap' => $gia_nhap,
                ':gia_ban' => $gia_ban,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':mo_ta' => $mo_ta,
                ':mo_ta_chi_tiet' => $mo_ta_chi_tiet,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai
            ]);

            return true;
        } catch (PDOException $e) {
            error_log("Lỗi khi cập nhật sản phẩm: " . $e->getMessage());
            return false;
        }
    }

    // Lấy chi tiết sản phẩm
    public function getDetailData($id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy chi tiết sản phẩm: " . $e->getMessage());
            return false;
        }
    }
    public function getDetailImage($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams                           
                    WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy hình ảnh sản phẩm: " . $e->getMessage());
            return false;
        }
    }


    // Xóa sản phẩm
    public function deleteData($id)
    {
        try {
            $sql = "DELETE FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return true;
        } catch (PDOException $e) {
            error_log("Lỗi khi xóa sản phẩm: " . $e->getMessage());
            return false;
        }
    }

    public function getCommentFromCustomer($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_sp 
                    FROM binh_luans
                    INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                    WHERE binh_luans.nguoi_dung_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy danh sách bình luận: " . $e->getMessage());
            return [];
        }
    }
    public function getCommentFromProduct($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, nguoi_dungs.ten_nguoi_dung 
                    FROM binh_luans
                    INNER JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id
                    WHERE binh_luans.san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy danh sách bình luận: " . $e->getMessage());
            return [];
        }
    }
    public function getDetailBinhLuan($id)
    {
        try {
            $sql = "SELECT * FROM binh_luans                           
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy bình luận : " . $e->getMessage());
            return false;
        }
    }
    public function updateTrangThaiBinhLuan($id, $trang_thai)
    {
        try {
            $sql = "UPDATE binh_luans                           
                    SET trang_thai = :trang_thai
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            // var_dump($sql);
            // die;
            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id,
            ]);

            return true;
        } catch (PDOException $e) {
            error_log("Lỗi khi update Trạng thái bình luận: " . $e->getMessage());
            return false;
        }
    }
    // Hủy kết nối
    public function __destruct()
    {
        $this->conn = null;
    }
}
