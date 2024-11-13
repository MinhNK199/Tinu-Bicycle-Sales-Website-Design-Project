<?php

class BanNer
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sách banner
    public function getAll(){
        try {
            
            $sql= 'SELECT * FROM banners';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOException $e){
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    //thêm dữ liệu mới vafp csdl
    public function postData($tieu_de, $filePath, $trang_thai) {
        try {
            $sql = 'INSERT INTO banners (tieu_de, hinh_anh, trang_thai) VALUES (:tieu_de, :hinh_anh, :trang_thai)';
    
            $stmt = $this->conn->prepare($sql);
    
            // Gán giá trị vào các tham số
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':hinh_anh', $filePath); // Sửa $hinh_anh thành $filePath
            $stmt->bindParam(':trang_thai', $trang_thai);
            
            $stmt->execute();
    
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
        //lấy thông tin chi tiết
        public function getDetailData($id){
            try {
                
                $sql= 'SELECT * FROM banners WHERE id = :id';
    
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                // var_dump($id);die;

                $stmt->execute();
    
                return $stmt->fetch();
            } catch (PDOException $e){
                echo 'lỗi: ' . $e->getMessage();
            }
        }

         //cập nhật dữ liệu mới vafp csdl
    public function updateData($id,$tieu_de,$hinh_anh,$trang_thai){
        try {
           
            $sql= 'UPDATE banners SET tieu_de = :tieu_de, hinh_anh = :hinh_anh, trang_thai = :trang_thai WHERE id=:id';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':trang_thai', $trang_thai);
            // var_dump($tieu_de);die;
            return $stmt->execute();

            // return true;
        } catch (PDOException $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
//xóa dự liệu trong csdl
        public function deleteData($id){
            try {
                
                $sql= 'DELETE FROM banners WHERE id = :id';
    
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);

                $stmt->execute();
    
                return true;
            } catch (PDOException $e){
                echo 'lỗi: ' . $e->getMessage();
            }
        }

    //Hủy kết nối csdl
    
    public function __destruct()
    {
        $this->conn = null;
    }
}