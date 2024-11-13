<?php

class LienHeController{
    // ket noi den file Model
    public $modelLienHe;

    public function __construct(){
        $this->modelLienHe = new LienHe();
    }

    // ham hien thi danh sach
    public function index(){
        //echo 123;
        // lay ra du lieu lien he
        $lienHes = $this->modelLienHe->getAll();
        // var_dump($lienHes);

        // // dua du lieu ra view
        require_once 'views/lienhes/list_lien_he.php';
        
    }

    // // ham hien thi form them
    // public function create(){

    //     require_once 'views/lienhes/create_lien_he.php';
    // }   
    
    // // ham xu ly them CSDL
    // public function store(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         //lay ra du lieu
    //         $ten_danh_muc = $_POST['ten_danh_muc'];
    //         $trang_thai = $_POST['trang_thai'];

    //         //validate

    //         $errors = [];
    //         if(empty($ten_lien_he)){
    //             $errors['ten_lien_he'] = "ten lien he khong duoc de trong";
    //         }

    //         if(empty($trang_thai)){
    //             $errors['trang_thai'] = "trang thai khong duoc de trong";
    //         }

    //         // them du lieu
    //         if(empty($errors)){
    //             //neu ko co loi thi them du lieu
    //             //them vao CSDLgit
    //             $this->modelLienHe->postData($ten_danh_muc, $trang_thai);

    //             unset($_SESSION['errors']);
    //             header('location: ?act=lien-hes');
    //             exit();
    //         }else{
    //             $_SESSION['errors'] = $errors;
    //             header('location: ?act=form-add-lien-he');
    //             exit();
    //         }
    //     }
    // }

    // ham hien thi form sua
    public function details(){
        // lay thong tin chi tiet cua danh muc
        $lienHes = $this->modelLienHe->getAll();
        require_once 'views/lienhes/chi_tiet_lien_he.php';

    }

    // ham xu ly cap nhat du lieu vao CSDL
    public function update(){
        
    }

    // ham xoa du lieu
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['lien_he_id'];
            // var_dump($id);

            // xoa lien he
            $deleteLienHe = $this->modelLienHe->deleteData($id);
            header('location: ?act=lien-hes');
            exit();
        }
    }
}
