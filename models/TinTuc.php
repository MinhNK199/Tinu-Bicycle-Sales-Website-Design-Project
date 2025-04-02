<?php 

class TinTuc {
    public $conn;

    //ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    //danh sach tin tuc
    public function getAll(){
        try{
            $sql = "SELECT * FROM tin_tucs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
     // Trong modelTinTuc
     public function getNewsById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tin_tucs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getDetailData($id) {
        try {
            $sql = "SELECT * FROM tin_tucs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Gán ID cho tham số
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về mảng dữ liệu của tin tức
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    //huy ket noi CSDL
    public function __destruct(){
        $this->conn = null;
    }
    
}