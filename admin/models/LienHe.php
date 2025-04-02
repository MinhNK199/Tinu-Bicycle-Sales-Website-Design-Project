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
    public function postData($email, $noi_dung, $ngay_tao, $trang_thai, ){
        try{
            
            $sql = "INSERT INTO `lien_hes` (`email`,`noi_dung`,`ngay_tao`,`trang_thai`) VALUES (:email, :noi_dung, :ngay_tao, :trang_thai)";

            $stmt = $this->conn->prepare($sql);

            //gan gia tri vao cac tham so
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
        // Trong modelLienHe
        public function getNewsById($id) {
            $stmt = $this->db->prepare("SELECT * FROM lien_hes WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

            public function updateData($id, $email, $noi_dung, $ngay_tao, $trang_thai) {
        try {
            $sql = "UPDATE `lien_hes` SET email = :email, noi_dung = :noi_dung, ngay_tao = :ngay_tao, trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            // Gán giá trị cho các tham số
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
            $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);

            $stmt->execute();
            
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getDetailData($id) {
        try {
            $sql = "SELECT * FROM lien_hes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Gán ID cho tham số
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về mảng dữ liệu của tin tức
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