    <?php

    class TinTuc{
        public $conn;

        //ket noi CSDL
        public function __construct()
        {
            $this->conn = connectDB();
        }

        //danh sach danh muc
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

        //them du lieu vao CSDL
        public function postData($tieu_de, $noi_dung,$ngay_dang,$trang_thai){
            try{
                
                $sql = "INSERT INTO `tin_tucs` (`tieu_de`,`noi_dung`,`ngay_dang`,`trang_thai`) VALUES (:tieu_de,:noi_dung,:ngay_dang,:trang_thai)";

                $stmt = $this->conn->prepare($sql);

                //gan gia tri vao cac tham so
                $stmt->bindParam(':tieu_de', $tieu_de);
                $stmt->bindParam(':noi_dung', $noi_dung);
                $stmt->bindParam(':ngay_dang', $ngay_dang);
                $stmt->bindParam(':trang_thai', $trang_thai);

                $stmt->execute();

                return $stmt->rowCount();
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

            public function updateData($id, $tieu_de, $noi_dung, $ngay_dang, $trang_thai) {
        try {
            $sql = "UPDATE `tin_tucs` SET tieu_de = :tieu_de, noi_dung = :noi_dung, ngay_dang = :ngay_dang, trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            // Gán giá trị cho các tham số
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_dang', $ngay_dang);
            $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);

            $stmt->execute();
            
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
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

        public function deleteData($id){
            try{
                $sql = "DELETE FROM tin_tucs WHERE id = :id";

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