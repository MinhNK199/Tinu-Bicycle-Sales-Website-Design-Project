<?php

class TinTucController{
    // ket noi den file Model
    public $modelTinTuc;

    public function __construct(){
        $this->modelTinTuc = new TinTuc();
    }

    // ham hien thi danh sach
    public function index(){
        // lay ra du lieu tin tuc
        $tinTucs = $this->modelTinTuc->getAll();
        // var_dump($tinTucs);

        // dua du lieu ra view
        require_once 'views/tintucs/list_tin_tuc.php';
        
    }

    // ham hien thi form them
    public function create(){

        require_once 'views/tintucs/create_tin_tuc.php';
    }   
    
    // ham xu ly them CSDL
    public function store(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Lấy dữ liệu
        $tieu_de = $_POST['tieu_de'];
        $noi_dung = $_POST['noi_dung'];
        $ngay_dang = $_POST['ngay_dang'];
        $trang_thai = $_POST['trang_thai'];
        
        // Validate
        $errors = [];
        if(empty($tieu_de)){
            $errors['tieu_de'] = "Tiêu đề tin tức không được để trống";
        }
        if(empty($noi_dung)){
            $errors['noi_dung'] = "Nội dung không được để trống";
        }
        if(empty($ngay_dang)){
            $errors['ngay_dang'] = "Ngày đăng không được để trống";
        }
        if(empty($trang_thai)){
            $errors['trang_thai'] = "Trạng thái không được để trống";
        }

        // Nếu không có lỗi, thêm vào CSDL
        if(empty($errors)){
            $this->modelTinTuc->postData($tieu_de, $noi_dung, $ngay_dang, $trang_thai);
            header('location: ?act=tin-tucs');
            exit();
        } else {
            $_SESSION['errors'] = $errors;
            header('location: ?act=form-add-tin-tuc');
            exit();
        }
    }
}


    // ham hien thi form sua
    public function edit(){
    if (isset($_GET['tin_tuc_id'])) {
        $id = $_GET['tin_tuc_id'];
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        // Kiểm tra nếu không tìm thấy bài viết
        if (!$tinTuc) {
            echo "Không tìm thấy bài viết";
            return;
        }
        require_once 'views/tintucs/form_edit_tin_tuc.php';
    } else {
        echo "ID bài viết không hợp lệ.";
    }
}

    // ham xu ly cap nhat du lieu vao CSDL
    public function update(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $tieu_de = $_POST['tieu_de'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_dang = $_POST['ngay_dang'];
            $trang_thai = $_POST['trang_thai'];

            // Validate
            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = "Tiêu đề tin tức không được để trống";
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = "Nội dung không được để trống";
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = "Ngày đăng không được để trống";
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = "Trạng thái không được để trống";
            }

            // Nếu không có lỗi, cập nhật vào CSDL
            if (empty($errors)) {
                $this->modelTinTuc->updateData($id, $tieu_de, $noi_dung, $ngay_dang, $trang_thai);
                header('location: ?act=tin-tucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-edit-tin-tuc');
                exit();
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }
}


   public function show(){
    // Lấy ID của tin tức từ URL
    $id = $_GET['tin_tuc_id'];

    // Lấy dữ liệu chi tiết của tin tức từ model
    $tinTuc = $this->modelTinTuc->getDetailData($id);

    // Kiểm tra nếu không tìm thấy tin tức
    if (!$tinTuc) {
        echo "Không tìm thấy bài viết";
        return;
    } else {
        // Truyền dữ liệu vào view show_tin_tuc.php
        require_once 'views/tintucs/show_tin_tuc.php';
    }
}

    // ham xoa du lieu
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['tin_tuc_id'];
            // var_dump($id);

            // xoa tin tuc
            $deleteTinTuc = $this->modelTinTuc->deleteData($id);
            header('location: ?act=tin-tucs');
            exit();
        }
    }
}