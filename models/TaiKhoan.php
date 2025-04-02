<?php 

class TaiKhoan
{
    public $conn;

    //ket noi CSDL
    public function __construct() {
        $this->conn = connectDB();
    }

    //huy ket noi CSDL
    public function __destruct(){
        $this->conn = null;
    }
    public function getDetailData($id){
        try{
            $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";

            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([
                ':id' => $id
            ]);
            return $stmt -> fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function resetPassword($id, $mat_khau){
        try {
            $sql = "UPDATE nguoi_dungs SET mat_khau = :mat_khau WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Loi' . $e->getMessage();
           return false;
        }
    }
    public function checkLogin($email, $mat_khau){
        try{
            $sql = 'SELECT * FROM nguoi_dungs WHERE email = :email';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([':email' => $email]);
            $user = $stmt -> fetch();
                    if($user && password_verify($mat_khau, $user['mat_khau'])){
                        if($user['vai_tro'] == 0){
                            if($user['trang_thai'] == 1){
                                return $user['email'];
                            }else{
                                return "Tài khoản bị cấm";
                            }
                        }else{
                            return "Tài khoản không có quyền đăng nhập";
                        }
                    }else{
                        return "Sai tài khoản hoặc mật sai";
                    }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM `nguoi_dungs` WHERE `email` = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetchColumn() > 0; // Trả về true nếu email đã tồn tại
    }

    public function postClient($ten_nguoi_dung, $email, $mat_khau, $vai_tro, $trang_thai) {
        try {
            $sql = "INSERT INTO `nguoi_dungs` (`ten_nguoi_dung`, `email`, `mat_khau`, `vai_tro`, `trang_thai`) VALUES (:ten_nguoi_dung, :email, :mat_khau, :vai_tro , :trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getUserIdByEmail($email)
    {
        try {
            $sql = "SELECT id FROM nguoi_dungs WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy ID người dùng: " . $e->getMessage());
            return false;
        }
    }

    public function getTaiKhoanFormEmail($email) {
        try {
            $sql = "SELECT * FROM nguoi_dungs WHERE email = :email"; //Sử dụng * để chọn tất cả các cột
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $thongTin = $stmt->fetch(PDO::FETCH_ASSOC); //Lấy dữ liệu dưới dạng mảng kết hợp
            return $thongTin; //Trả về dữ liệu đã lấy
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy dữ liệu người dùng: " . $e->getMessage()); //Ghi nhật ký lỗi để gỡ lỗi
            return null; //Trả về null để chỉ ra lỗi
        }
    }
    public function getTaiKhoanFromEmail($email)
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function isSDTExists($sdt, $currentUserId) {
        try {
            $sql = "SELECT COUNT(*) FROM nguoi_dungs WHERE sdt = :sdt AND id != :currentUserId";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':sdt', $sdt);
            $stmt->bindParam(':currentUserId', $currentUserId);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            
            return $count > 0; // Trả về true nếu số điện thoại tồn tại
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
     public function updateCaNhan($id, $ten_nguoi_dung, $email, $sdt, $ngay_sinh, $gioi_tinh, $dia_chi, $avatarPath) {
        try {
            $sql = "UPDATE nguoi_dungs SET ten_nguoi_dung = :ten_nguoi_dung, email = :email, sdt = :sdt, 
                ngay_sinh = :ngay_sinh, gioi_tinh = :gioi_tinh, dia_chi = :dia_chi, avartar = :avartar WHERE id = :id";
    
            $stmt = $this->conn->prepare($sql);
    
            // Liên kết các tham số
            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sdt', $sdt);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':avartar', $avatarPath); // Liên kết đường dẫn hình ảnh
            $stmt->bindParam(':id', $id);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }



}       