    <?php

    class KhuyenMai
    {
        public $conn;

        //ket noi CSDL
        public function __construct()
        {
            $this->conn = connectDB();
        }

        //them du lieu vao CSDL khuyenmai
        public function getActivePromoCodes()
        {
            try {
                $currentDate = date('Y-m-d');
                $sql = "
            SELECT
                id, 
                ten_khuyen_mai, 
                ma_khuyen_mai, 
                ngay_ket_thuc,
                gia_tri,
                trang_thai 
            FROM 
                khuyen_mais 
            WHERE 
                (trang_thai = 1 ) 
                AND ngay_ket_thuc >= :currentDate
        ";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':currentDate', $currentDate);
                $stmt->execute();

                // Trả về mảng chứa dữ liệu
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Lỗi getActivePromoCodes: " . $e->getMessage());
                return [];
            }
        }
        public function getPromoCodeById($promoId)
        {
            try {
                $sql = "
            SELECT 
                id,
                ten_khuyen_mai, 
                ma_khuyen_mai, 
                ngay_ket_thuc, 
                gia_tri, 
                trang_thai 
            FROM 
                khuyen_mais 
            WHERE 
                id = :promoId
                AND trang_thai = 1 
                AND ngay_ket_thuc >= :currentDate
        ";

                $currentDate = date('Y-m-d');
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':promoId', $promoId, PDO::PARAM_INT);
                $stmt->bindParam(':currentDate', $currentDate);
                $stmt->execute();

                // Trả về dữ liệu của khuyến mãi
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Lỗi getPromoCodeById: " . $e->getMessage());
                return null;
            }
        }


        // public function getPromoByCode($promoCode)
        // {
        //     // Sử dụng SQL để lấy thông tin mã khuyến mãi theo mã code
        //     $sql = "SELECT * FROM khuyen_mais WHERE ma_khuyen_mai = :promoCode AND ngay_ket_thuc >= NOW()";

        //     // Thực thi truy vấn
        //     $stmt = $this->conn->prepare($sql);
        //     $stmt->bindParam(':promoCode', $promoCode);
        //     $stmt->execute();

        //     // Kiểm tra xem có kết quả không
        //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //     return $result ? $result : null;
        // }

        //huy ket noi CSDL
        public function __destruct()
        {
            $this->conn = null;
        }
    }
