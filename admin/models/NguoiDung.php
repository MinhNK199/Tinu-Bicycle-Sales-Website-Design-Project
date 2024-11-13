<?php

class NguoiDung{
    public $conn;

    //ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //danh sach danh muc
    public function getAll(){
        try{
            $sql = "SELECT * FROM nguoi_dungs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //them du lieu vao CSDL
    // public function postData($ten_nguoi_dung, $email, $sdt, $dia_chi, $mat_khau, $ngay_sinh, $gioi_tinh, $avatar, $vai_tro, $trang_thai){
    //     try{
            
    //         $sql = "INSERT INTO `nguoi_dungs` (`ten_nguoi_dung`, `email`, `sdt`, `dia_chi`, `mat_khau`, `ngay_sinh`, `gioi_tinh`, `avatar`, `trang_thai`) VALUES (:ten_nguoi_dung, :email, :sdt, :dia_chi, :mat_khau, :ngay_sinh, :gioi_tinh, :avatar, :trang_thai)";

    //         $stmt = $this->conn->prepare($sql);

    //         //gan gia tri vao cac tham so
    //         $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
    //         $stmt->bindParam(':email', $email);
    //         $stmt->bindParam(':sdt', $sdt);
    //         $stmt->bindParam(':dia_chi', $dia_chi);
    //         $stmt->bindParam(':mat_khau', $mat_khau);
    //         $stmt->bindParam(':ngay_sinh', $ngay_sinh);
    //         $stmt->bindParam(':gioi_tinh', $gioi_tinh);
    //         $stmt->bindParam(':avatar', $avatar);
    //         $stmt->bindParam(':vai_tro', $vai_tro);
    //         $stmt->bindParam(':trang_thai', $trang_thai);

    //         $stmt->execute();

    //         return $stmt->rowCount();
    //     } catch (PDOException $e) {
    //         echo "Connection failed: " . $e->getMessage();
    //     }
    // }

    public function deleteData($id){
        try{
            $sql = "DELETE FROM nguoi_dungs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);   

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getDetailData($id){
        try{
            $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";

            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':id' => $id
            ]);
            return $stmt -> fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function updatedata($id, $vai_tro,$trang_thai){
        try {
            $sql = "UPDATE nguoi_dungs SET vai_tro = :vai_tro, trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->bindParam(':id', $id);
            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Loi' . $e->getMessage();
           return false;
        }
    }
    
    //huy ket noi CSDL
    public function __destruct(){
        $this->conn = null;
    }
}