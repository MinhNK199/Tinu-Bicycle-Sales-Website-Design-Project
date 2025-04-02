<?php

class NguoiDung{
    public $conn;

    //ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //danh sach danh muc
    public function getAll($vai_tro){
        try{
            $sql = "SELECT * FROM nguoi_dungs   w   WHERE vai_tro = :vai_tro";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':vai_tro' => $vai_tro]);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getOne(){
        try{
            $sql = "SELECT * FROM nguoi_dungs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //them du lieu vao CSDL
    public function postData($ten_nguoi_dung, $email, $mat_khau, $vai_tro){
        try{
            
            $sql = "INSERT INTO `nguoi_dungs` (`ten_nguoi_dung`, `email`, `mat_khau`, `vai_tro`) VALUES (:ten_nguoi_dung, :email, :mat_khau, :vai_tro)";

            $stmt = $this->conn->prepare($sql);

            //gan gia tri vao cac tham so
            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':vai_tro', $vai_tro);
            

            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function deleteData($id){
        try{
            $sql = "DELETE FROM nguoi_dungs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);   

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
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
    public function updatedata($id, $ten_nguoi_dung, $email, $sdt, $vai_tro, $trang_thai){
        try {
            $sql = "UPDATE nguoi_dungs SET ten_nguoi_dung = :ten_nguoi_dung, email = :email, sdt = :sdt, vai_tro = :vai_tro, trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sdt', $sdt);
            
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->bindParam(':id', $id);
            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Loi' . $e->getMessage();
           return false;
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
    
    public function updateKhachHang($id, $vai_tro, $trang_thai){
        try {
            $sql = "UPDATE nguoi_dungs SET vai_tro = :vai_tro, trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->bindParam(':id', $id);
            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Loi' . $e->getMessage();
           return false;
        }
    }

    //huy ket noi CSDL
    public function __destruct(){
        $this->conn = null;
    }

    public function checkLogin($email, $mat_khau){
        try{
            $sql = 'SELECT * FROM nguoi_dungs WHERE email = :email';
            $stmt = $this -> conn -> prepare($sql);
            $stmt -> execute([':email' => $email]);
            $user = $stmt -> fetch();
                    if($user && password_verify($mat_khau, $user['mat_khau'])){
                        if($user['vai_tro'] == 1){
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


     public function getTaiKhoanFormEmail($email){
        try{
            $sql = 'SELECT * FROM nguoi_dungs WHERE email = :email';
            $stmt = $this -> conn -> prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
     }

     public function updateCaNhan($id, $ten_nguoi_dung, $email, $sdt, $ngay_sinh, $gioi_tinh, $dia_chi){
        try {
            $sql = "UPDATE nguoi_dungs SET ten_nguoi_dung = :ten_nguoi_dung, email = :email, sdt = :sdt, ngay_sinh = :ngay_sinh, gioi_tinh = :gioi_tinh, dia_chi = :dia_chi WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sdt', $sdt);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':dia_chi', $dia_chi);
            

            $stmt->bindParam(':id', $id);
            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Loi' . $e->getMessage();
           return false;
        }
}
}