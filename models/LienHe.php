<?php 

class LienHe {
    public $conn;

    //ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    //them du lieu vao CSDL lienhe
    public function postLienHe($email, $noi_dung, $ngay_tao, $trang_thai){
        try{
            
            $sql = "INSERT INTO `lien_hes` (`email`,`noi_dung`,`ngay_tao`, `trang_thai`) VALUES (:email, :noi_dung, :ngay_tao, :trang_thai)";

            $stmt = $this->conn->prepare($sql);

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
    
    //huy ket noi CSDL
    public function __destruct(){
        $this->conn = null;
    }
    
}