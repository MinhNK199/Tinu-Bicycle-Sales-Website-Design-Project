    <?php

    class KhuyenMai{
        public $conn;

        //ket noi CSDL
        public function __construct()
        {
            $this->conn = connectDB();
        }

        //danh sach danh muc
        public function getAll(){
            try{
                $sql = "SELECT * FROM khuyen_mais";

                $stmt = $this->conn->prepare($sql);

                $stmt->execute();

                return $stmt->fetchAll();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        //them du lieu vao CSDL
        public function postData($ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai){
            try{
                
                $sql = "INSERT INTO `khuyen_mais` (`ten_khuyen_mai`,`ma_khuyen_mai`,`gia_tri`,`ngay_bat_dau`,`ngay_ket_thuc`,`mo_ta`,`trang_thai`) VALUES (:ten_khuyen_mai,:ma_khuyen_mai,:gia_tri,:ngay_bat_dau,:ngay_ket_thuc,:mo_ta,:trang_thai)";

                $stmt = $this->conn->prepare($sql);

                //gan gia tri vao cac tham so
                $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
                $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
                $stmt->bindParam(':gia_tri', $gia_tri);
                $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
                $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
                $stmt->bindParam(':mo_ta', $mo_ta);
                $stmt->bindParam(':trang_thai', $trang_thai);

                $stmt->execute();

                return $stmt->rowCount();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
            
                // Trong modelKhuyenMai
            public function getDiscountById($id) {
            $stmt = $this->db->prepare("SELECT * FROM khuyen_mais WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

            public function updateData($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai) {
            try {
                $sql = "UPDATE `khuyen_mais` SET ten_khuyen_mai = :ten_khuyen_mai, ma_khuyen_mai = :ma_khuyen_mai, gia_tri = :gia_tri, ngay_bat_dau = :ngay_bat_dau, ngay_ket_thuc = :ngay_ket_thuc, mo_ta = :mo_ta, trang_thai = :trang_thai WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                
                // Gán giá trị cho các tham số
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
                $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
                $stmt->bindParam(':gia_tri', $gia_tri);
                $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
                $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
                $stmt->bindParam(':mo_ta', $mo_ta);
                $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);

                $stmt->execute();
                
                return $stmt->rowCount();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function getDetailData($id) {
            try {
                $sql = "SELECT * FROM khuyen_mais WHERE id = :id";
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
                $sql = "DELETE FROM khuyen_mais WHERE id = :id";

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