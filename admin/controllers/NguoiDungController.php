<?php

class NguoiDungController{
    // ket noi den file Model
    public $modelNguoiDung;

    public function __construct(){
        $this->modelNguoiDung = new NguoiDung();
    }

    // ham hien thi danh sach
    public function index(){
        // lay ra du lieu danh muc
        $nguoiDungs = $this->modelNguoiDung->getAll();
        // var_dump($danhMucs);

        // dua du lieu ra view
        require_once 'views/nguoidungs/list_nguoi_dung.php';
        
    }

    // ham hien thi form them
    // public function create(){

    //     require_once 'views/nguoidungs/create_nguoi_dung.php';
    // }   
    
    // ham xu ly them CSDL
    // public function store(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         //lay ra du lieu
    //         $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
    //         $email = $_POST['email'];
    //         $sdt = $_POST['sdt'];
    //         $dia_chi = $_POST['dia_chi'];
    //         $mat_khau = $_POST['mat_khau'];
    //         $ngay_sinh = $_POST['ngay_sinh'];
    //         $gioi_tinh = $_POST['gioi_tinh'];
    //         $avatar = $_POST['avatar'];
    //         $vai_tro = $_POST['vai_tro'];
    //         $trang_thai = $_POST['trang_thai'];

    //         //validate

    //         $errors = [];
    //         if(empty($ten_nguoi_dung)){
    //             $errors['ten_nguoi_dung'] = "ten nguoi dung khong duoc de trong";
    //         }
    //         if(empty($email)){
    //             $errors['email'] = "email khong duoc de trong";
    //         }
    //         if(empty($sdt)){
    //             $errors['sdt'] = "sdt khong duoc de trong";
    //         }
    //         if(empty($dia_chi)){
    //             $errors['dia_chi'] = "dia_chi dung khong duoc de trong";
    //         }
    //         if(empty($mat_khau)){
    //             $errors['mat_khau'] = "mat_khau khong duoc de trong";
    //         }
    //         if(empty($ngay_sinh)){
    //             $errors['ngay_sinh'] = "ngay_sinh khong duoc de trong";
    //         }
    //         if(empty($gioi_tinh)){
    //             $errors['gioi_tinh'] = "gioi_tinh khong duoc de trong";
    //         }
    //         if(empty($avatar)){
    //             $errors['avatar'] = "";
    //         }
    //         if(empty($vai_tro)){
    //             $errors['vai_tro'] = "vai_tro khong duoc de trong";
    //         }

    //         if(empty($trang_thai)){
    //             $errors['trang_thai'] = "trang thai khong duoc de trong";
    //         }

    //         // them du lieu
    //         if(empty($errors)){
    //             //neu ko co loi thi them du lieu
    //             //them vao CSDL
    //             $this->modelNguoiDung->postData(ten_nguoi_dung: $ten_nguoi_dung, email: $email, sdt: $sdt, dia_chi: $dia_chi, mat_khau: $mat_khau, ngay_sinh: $ngay_sinh, gioi_tinh: $gioi_tinh, avatar: $avatar, vai_tro: $vai_tro, trang_thai: $trang_thai);

    //             unset($_SESSION['errors']);
    //             header('location: ?act=nguoi-dungs');
    //             exit();
    //         }else{
    //             $_SESSION['errors'] = $errors;
    //             header('location: ?act=form-sua-nguoi-dung');
    //             exit();
    //         }
    //     }
    // }

    // ham hien thi form sua
    public function edit(){
        // lay thong tin chi tiet cua danh muc
        $id = $_GET['nguoi_dung_id'];
            // lay thong tin chi tiet cua danh muc
            $nguoiDung = $this->modelNguoiDung->getDetailData($id);

            // var_dump($nguoiDung);
            // die;
            require_once 'views/nguoidungs/edit_nguoi_dung.php';
        
    }

    // ham xu ly cap nhat du lieu vao CSDL
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            
            $vai_tro = $_POST['vai_tro'];
            $trang_thai = $_POST['trang_thai'];
            
            $errors = [];
            
            

            if(empty($errors)){
                //neu ko co loi thi them du lieu
                //them vao CSDL
                $this->modelNguoiDung->updatedata($id,$vai_tro,$trang_thai);
                    
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
         $nguoiDungs = $this->modelNguoiDung->getAll();
         // var_dump($danhMucs);
 
         // dua du lieu ra view
         require_once 'views/nguoidungs/detail_nguoi_dung.php';
         
    }
}