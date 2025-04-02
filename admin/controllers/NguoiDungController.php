<?php

class NguoiDungController{
    // ket noi den file Model
    public $modelNguoiDung;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct(){
        $this->modelNguoiDung = new NguoiDung();
        $this->modelDonHang = new DonHang();
        $this->modelSanPham = new SanPham();
    }

    // ham hien thi danh sach
    public function index(){
        // lay ra du lieu danh muc
        $nguoiDungs = $this->modelNguoiDung->getAll(1);
        // var_dump($nguoiDungs);die;

        // dua du lieu ra view
        require_once 'views/taikhoans/nguoidungs/list_nguoi_dung.php';
        
    }

    // ham hien thi form them
    public function create(){

        require_once 'views/taikhoans/nguoidungs/create_nguoi_dung.php';
    }   
    
    // ham xu ly them CSDL
    public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lay ra du lieu
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            //validate

            $errors = [];
            if(empty($ten_nguoi_dung)){
                $errors['ten_nguoi_dung'] = "ten nguoi dung khong duoc de trong";
            }
            if(empty($email)){
                $errors['email'] = "email khong duoc de trong";
            }

            $_SESSION['errors'] = $errors;
            
            // them du lieu
            if(empty($errors)){
                //neu ko co loi thi them du lieu
                //them vao CSDL

                // dat password mac dinh cho nguoi dung
                $mat_khau = password_hash('123456', PASSWORD_BCRYPT);
                // var_dump($mat_khau);die;
                $vai_tro = 1;
                $this->modelNguoiDung->postData($ten_nguoi_dung, $email, $mat_khau, $vai_tro);

                unset($_SESSION['errors']);
                header('location: ?act=nguoi-dungs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-add-nguoi-dung');
                exit();
            }
        }
    }

    // ham hien thi form sua
    public function edit(){
        // lay thong tin chi tiet cua danh muc
        $id = $_GET['nguoi_dung_id'];
            // lay thong tin chi tiet cua danh muc
            $nguoiDung = $this->modelNguoiDung->getDetailData($id);

            // var_dump($nguoiDung);
            // die;
            require_once 'views/taikhoans/nguoidungs/edit_nguoi_dung.php';
        
    }

    // ham xu ly cap nhat du lieu vao CSDL
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $vai_tro = $_POST['vai_tro'];
            $trang_thai = $_POST['trang_thai'];
            
            $errors = [];
            
            

            if(empty($errors)){
                //neu ko co loi thi them du lieu
                //them vao CSDL
                $this->modelNguoiDung->updatedata($id, $ten_nguoi_dung, $email, $sdt, $vai_tro, $trang_thai);
                    
                unset($_SESSION['errors']);
                header('location: ?act=nguoi-dungs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-nguoi-dung');
                exit();
            }
            }
    }

    // ham xoa du lieu
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['nguoi_dung_id'];
            // var_dump($id);

            // xoa danh muc
            $deleteNguoiDung = $this->modelNguoiDung->deleteData($id);
            header('location: ?act=nguoi-dungs');
            exit();
        }
    }
    public function details(){
         // lay ra du lieu danh muc
         $nguoiDungs = $this->modelNguoiDung->getOne();
         // var_dump($danhMucs);
 
         // dua du lieu ra view
         require_once 'views/taikhoans/nguoidungs/detail_nguoi_dung.php';
         
    }


    public function ressetPassword(){
        $id = $_GET['nguoi_dung_id'];
        $tai_khoan = $this->modelNguoiDung->getDetailData($id);
        $mat_khau = password_hash('123456', PASSWORD_BCRYPT);
        $this->modelNguoiDung->resetPassword($id, $mat_khau);
        if($tai_khoan['vai_tro'] == 1){
        
        header('location: ?act=nguoi-dungs');
        exit();
        }elseif($tai_khoan['vai_tro'] == 0){
            header('location: ?act=khach-hangs');
            exit();

        }
    }   


    public function listKhachHang(){
        // lay ra du lieu danh muc
        $khachHangs = $this->modelNguoiDung->getAll(0);
        // var_dump($nguoiDungs);die;

        // dua du lieu ra view
        require_once 'views/taikhoans/quantris/list_khach_hang.php';
        
    }

    public function editKhachHang(){
        // lay thong tin chi tiet cua danh muc
            $id = $_GET['nguoi_dung_id'];
            // lay thong tin chi tiet cua danh muc
            $khachHangs = $this->modelNguoiDung->getDetailData($id);

            // var_dump($nguoiDung);
            // die;
            require_once 'views/taikhoans/quantris/edit_khach_hang.php';
        
    }

    public function updateKhachHang(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            
            $vai_tro = $_POST['vai_tro'];
            $trang_thai = $_POST['trang_thai'];
            
            $errors = [];
            
            

            if(empty($errors)){
                //neu ko co loi thi them du lieu
                //them vao CSDL
                $this->modelNguoiDung->updateKhachHang($id, $vai_tro, $trang_thai);
                    
                unset($_SESSION['errors']);
                header('location: ?act=khach-hangs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-khach-hang');
                exit();
            }
            }
    }


    public function detailsKhachHang(){
        $id = $_GET['nguoi_dung_id'];
        $khachHangs = $this->modelNguoiDung->getDetailData($id);

        $donHangs = $this->modelDonHang->getDonHangByKhachHang($id); 
        $binhLuans = $this->modelSanPham->getCommentFromCustomer($id);

        require_once 'views/taikhoans/quantris/detail_khach_hang.php';
    }


    public function formLogin(){
        require_once 'views/auth/formlogin.php'; 

        deleteSessionError();   
    }


    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lay email va pass gui len form

            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            
            // var_dump($mat_khau);die;

            //xu ly kiem tra thong tin dang nhap

            $user = $this->modelNguoiDung->checkLogin($email, $mat_khau); 
        //    var_dump($user);die;
            if($user == $email){// truong hop dang nhap thanh cong
                // luu thong tin vao session
                $_SESSION['user_admin'] = $user;

                header('location: ?act=/');
                exit();
            }else{
                // loi thi luu loi vao session
                $_SESSION['errors'] = $user;
                // var_dump($_SESSION['errors']);die;

                $_SESSION['flash'] = true;
                header('location: ?act=login-admin');
            }
    }
}

public function logout(){
    if(isset($_SESSION['user_admin'])){
        unset($_SESSION['user_admin']);
        header('location: ?act=login-admin');
    }
}


public function formEditCaNhanQuanTri(){
    $email = $_SESSION['user_admin'];
    $thongTin = $this->modelNguoiDung->getTaiKhoanFormEmail($email);
    // var_dump($thongTin);die;
    require_once 'views/taikhoans/canhan/formEdit.php';
    deleteSessionError();
}

public function postEditMatKhauCaNhan(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        $user = $this->modelNguoiDung->getTaiKhoanFormEmail($_SESSION['user_admin']);

        $errors = [];

        $checkPass = password_verify($old_pass, $user['mat_khau']); // <-- Semicolon added here

        if(!$checkPass){
            $errors['old_pass'] = 'Mật khẩu người dùng không đúng';
        }

        if($new_pass !== $confirm_pass){
            $errors['confirm_pass'] = 'Mật khẩu không trùng khớp';
        }

        if(empty($old_pass)){
            $errors['old_pass'] = 'Mật khẩu người dùng không được để trống';
        }

        if(empty($new_pass)){
            $errors['new_pass'] = 'Mật khẩu mới không được để trống';
        }

        if(empty($confirm_pass)){
            $errors['confirm_pass'] = 'Xác nhận mật khẩu không được để trống';
        }

        $_SESSION['errors'] = $errors;

        if(empty($errors)){ //Using empty() is clearer than !$errors
            $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
            $result = $this->modelNguoiDung->resetPassword($user['id'], $hashPass);
            if ($result) {
                $_SESSION['success'] = 'Đổi mật khẩu thành công!';
                header('Location: ?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit;
            } else {
                $errors['db_error'] = 'Lỗi cơ sở dữ liệu. Vui lòng thử lại.';
                $_SESSION['errors'] = $errors; //Update errors after DB failure.
            }
        } else {
            $_SESSION['flash'] = true;
            header('Location: ?act=form-sua-thong-tin-ca-nhan-quan-tri');
            exit;
        }
    }
}

public function postEditCaNhanQuanTri(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //lay ra du lieu
        $id = $_POST['id'];
        $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $ngay_sinh = $_POST['ngay_sinh'];
        $gioi_tinh = $_POST['gioi_tinh'];
        $dia_chi = $_POST['dia_chi'];
        
        
        $errors = [];
        
        if(empty($ten_nguoi_dung)){
            $errors['ten_nguoi_dung'] = "ten nguoi dung khong duoc de trong";
        }
        if(empty($email)){
            $errors['email'] = "email khong duoc de trong";
        }
        if(empty($sdt)){
            $errors['sdt'] = "sdt khong duoc de trong";
        }
        if(empty($ngay_sinh)){
            $errors['ngay_sinh'] = "ngay sinh khong duoc de trong";
        }
        if(empty($gioi_tinh)){
            $errors['gioi_tinh'] = "gioi tinh khong duoc de trong";
        }
        if(empty($dia_chi)){
            $errors['dia_chi'] = "dia chi khong duoc de trong";
        }
        
        $_SESSION['errors'] = $errors;
        if(empty($errors)){
            $this->modelNguoiDung->updateCaNhan($id, $ten_nguoi_dung, $email, $sdt, $ngay_sinh, $gioi_tinh, $dia_chi);
            unset($_SESSION['errors']);
            header('location: ?act=form-sua-thong-tin-ca-nhan-quan-tri');
            exit();
        }
}


}


}