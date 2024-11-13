<?php

class TrangThaiDonHang{
    public $conn;

    //ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //danh sach trang thai don hang
    public function getAll(){
        try{
            $sql = "SELECT * FROM trang_thai_don_hangs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //them du lieu vao CSDL
    public function postData($ten_trang_thai){
        try{
            
            $sql = "INSERT INTO `trang_thai_don_hangs` (`ten_trang_thai`) VALUES (:ten_trang_thai)";

            $stmt = $this->conn->prepare($sql);

            //gan gia tri vao cac tham so
            $stmt->bindParam(':ten_trang_thai', $ten_trang_thai);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function deleteData($id){
        try{
            $sql = "DELETE FROM trang_thai_don_hangs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);   

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    //huy ket noi CSDL
    public function __destruct(){
        $this->conn = null;
    }
}