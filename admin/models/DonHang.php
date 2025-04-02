<?php

class DonHang {
    public $conn;

    //ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //danh sach danh muc
    public function getAll(){
        try{
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
                    FROM don_hangs
                    JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id 
                    ORDER BY don_hangs.id DESC";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang(){
        try{
            $sql = "SELECT * FROM trang_thai_don_hangs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getDetailData($id){
        try{
            $sql = "SELECT don_hangs.*, 
                    trang_thai_don_hangs.ten_trang_thai, 
                    nguoi_dungs.ten_nguoi_dung, 
                    nguoi_dungs.email, 
                    nguoi_dungs.sdt,
                    phuong_thuc_thanh_toans.ten_phuong_thuc
                    FROM don_hangs
                    JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
                    JOIN nguoi_dungs ON don_hangs.nguoi_dung_id = nguoi_dungs.id
                    JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id

                    WHERE don_hangs.id = :id";    

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();    

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();  
        }
    }

    public function getDonHangChiTiet($id){
        try{
            $sql = "SELECT chi_tiet_don_hangs.*, san_phams.ten_sp
                    FROM chi_tiet_don_hangs 
                    JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    WHERE chi_tiet_don_hangs.don_hang_id = :id";    

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();    

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();  
        }
    }

    

    // tim kiem

    // public function search($kyw){
    //     try{
    //         $sql = "SELECT * FROM danh_mucs WHERE ten_danh_muc LIKE :kyw";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindParam(':kyw', $kyw);

    //         $stmt->execute();

    //         return $stmt->fetchAll();
    //     } catch (PDOException $e) {
    //         echo "Connection failed: " . $e->getMessage();
    //     }
    // }
   



    

    

    // //lay thong tin chi tiet

    
    
    //sua du lieu vao CSDL
    public function updateData($ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $trang_thai_don_hang_id, $don_hang_id){
        try{
            $sql = "UPDATE don_hangs SET 
                    ten_nguoi_nhan = :ten_nguoi_nhan,
                    sdt_nguoi_nhan = :sdt_nguoi_nhan,
                    email_nguoi_nhan = :email_nguoi_nhan,
                    dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
                    trang_thai_don_hang_id = :trang_thai_don_hang_id
                    WHERE id = :don_hang_id";

            $stmt = $this->conn->prepare($sql);

            //gan gia tri vao cac tham so
            $stmt->bindParam(':ten_nguoi_nhan', $ten_nguoi_nhan);
            $stmt->bindParam(':sdt_nguoi_nhan', $sdt_nguoi_nhan);
            $stmt->bindParam(':email_nguoi_nhan', $email_nguoi_nhan);
            $stmt->bindParam(':dia_chi_nguoi_nhan', $dia_chi_nguoi_nhan);
            $stmt->bindParam(':trang_thai_don_hang_id', $trang_thai_don_hang_id);
            $stmt->bindParam(':don_hang_id', $don_hang_id);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // public function deleteData($id){
    //     try{
    //         $sql = "DELETE FROM danh_mucs WHERE id = :id";

    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->bindParam(':id', $id);   

    //         $stmt->execute();

    //         return true;
    //     } catch (PDOException $e) {
    //         echo "Connection failed: " . $e->getMessage();
    //     }
    // }
    
    
    // //huy ket noi CSDL
    // public function __destruct(){
    //     $this->conn = null;
    // }
    public function getDonHangByKhachHang($id){
        try{
            $sql = 'SELECT  don_hangs.*,trang_thai_don_hangs.ten_trang_thai FROM don_hangs
            JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
            WHERE don_hangs.nguoi_dung_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();  
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
}