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

    public function details(){
        // Lấy ID của liên hệ từ URL
        $id = $_GET['lien_he_id'];
    
        // Lấy dữ liệu chi tiết của liên hệ từ model
        $lienHe = $this->modelLienHe->getDetailData($id);
    
        // Kiểm tra nếu không tìm thấy 
        if (!$lienHe) {
            echo "Không tìm thấy bài viết";
            return;
        } else {
            // Truyền dữ liệu vào view 
            require_once 'views/lienhes/chi_tiet_lien_he.php';
        }
}
    
    // ham hien thi form sua
    public function edit(){
        if (isset($_GET['lien_he_id'])) {
            $id = $_GET['lien_he_id'];
            $lienHe = $this->modelLienHe->getDetailData($id);
            // Kiểm tra nếu không tìm thấy bài viết
            if (!$lienHe) {
                echo "Không tìm thấy bài viết";
                return;
            }
            require_once 'views/lienhes/sua_lien_he.php';
        } else {
            echo "ID bài viết không hợp lệ.";
        }
    }
    // // ham hien thi form sua
    // public function details(){
    //     // lay thong tin chi tiet cua danh muc
    //     $lienHes = $this->modelLienHe->getAll();
    //     require_once 'views/lienhes/chi_tiet_lien_he.php';

    // }

    // ham xu ly cap nhat du lieu vao CSDL
    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $email = $_POST['email'];
                $noi_dung = $_POST['noi_dung'];
                $ngay_tao = $_POST['ngay_tao'];
                $trang_thai = $_POST['trang_thai'];
    
                // Validate
                $errors = [];
                if (empty($email)) {
                    $errors['email'] = "Email liên hệ không được để trống";
                }
                if (empty($noi_dung)) {
                    $errors['noi_dung'] = "Nội dung không được để trống";
                }
                if (empty($ngay_tao)) {
                    $errors['ngay_tao'] = "Ngày tạo không được để trống";
                }
                if (empty($trang_thai)) {
                    $errors['trang_thai'] = "Trạng thái không được để trống";
                }
    
                // Nếu không có lỗi, cập nhật vào CSDL
                if (empty($errors)) {
                    $this->modelLienHe->updateData($id, $email, $noi_dung, $ngay_tao, $trang_thai);
                    header('location: ?act=lien-hes');
                    exit();
                } else {
                    $_SESSION['errors'] = $errors;
                    header('location: ?act=form-sua-lien-he');
                    exit();
                }
            } else {
                echo "ID không hợp lệ.";
            }
        }
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
