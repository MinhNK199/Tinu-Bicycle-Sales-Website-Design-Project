<?php

class LienHe{
    public $conn;

    //ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //danh sach lien he
    public function getAll(){
        try{
            $sql = "SELECT * FROM lien_hes";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //them du lieu vao CSDL
    public function postData($email, $ngay_tao, $trang_thai, ){
        try{
            
            $sql = "INSERT INTO `lien_hes` (`email`,`ngay_tao`,`trang_thai`) VALUES (:email, :ngay_tao, :trang_thai)";

            $stmt = $this->conn->prepare($sql);

            //gan gia tri vao cac tham so
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function deleteData($id){
        try{
            $sql = "DELETE FROM lien_hes WHERE id = :id";

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