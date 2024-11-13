<?php

class DanhMuc{
    public $conn;

    //ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //danh sach danh muc
    public function getAll(){
        try{
            $sql = "SELECT * FROM danh_mucs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // public function searchDanhMuc($searchQuery) {
    //     $sql = "SELECT * FROM danh_muc WHERE ten_danh_muc LIKE ? OR id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $searchQuery = "%{$searchQuery}%";
    //     $stmt->bind_param("si", $searchQuery, $searchQuery); // "si" cho chuỗi và số nguyên
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }

    // tim kiem

    public function search($kyw){
        try{
            $sql = "SELECT * FROM danh_mucs WHERE ten_danh_muc LIKE :kyw";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':kyw', $kyw);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
   



    //them du lieu vao CSDL
    public function postData($ten_danh_muc, $trang_thai){
        try{
            
            $sql = "INSERT INTO `danh_mucs` (`ten_danh_muc`, `trang_thai`) VALUES (:ten_danh_muc, :trang_thai)";

            $stmt = $this->conn->prepare($sql);

            //gan gia tri vao cac tham so
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function deleteData($id){
        try{
            $sql = "DELETE FROM danh_mucs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);   

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //lay thong tin chi tiet

    public function getDetailData($id){
        try{
            $sql = "SELECT * FROM danh_mucs WHERE id = :id";    

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();    

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();  
        }
    }
    
    //sua du lieu vao CSDL
    public function updateData($id, $ten_danh_muc, $trang_thai){
        try{
            $sql = "UPDATE `danh_mucs` SET ten_danh_muc = :ten_danh_muc, trang_thai = :trang_thai WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            //gan gia tri vao cac tham so
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    
    
    //huy ket noi CSDL
    public function __destruct(){
        $this->conn = null;
    }
}