<?php

class DanhMucController{
    // ket noi den file Model
    public $modelDanhMuc;

    public function __construct(){
        $this->modelDanhMuc = new DanhMuc();
    }

    // ham hien thi danh sach
    public function index(){
        // lay ra du lieu danh muc
        $danhMucs = $this->modelDanhMuc->getAll();
        // var_dump($danhMucs);

        // dua du lieu ra view
        require_once 'views/danhmucs/list_danh_muc.php';
        
    }

    public function search() {
        if (isset($_POST['kyw']) && !empty($_POST['kyw'])) {
            // Xuất lý trường hợp có từ khóa tìm kiếm
            $kyw = "%" . $_POST['kyw'] . "%";
            $danhMucs = $this->modelDanhMuc->search($kyw); // hàm tìm kiếm tất cả danh mục (bạn cần thêm hàm này vào model)

            // Truyền dữ liệu sang view
            require_once 'views/danhmucs/list_danh_muc.php';
        }
        else {
             
            
            // Xử lý trường hợp không có từ khóa tìm kiếm, ví dụ: hiển thị danh sách tất cả
            $danhMucs = $this->modelDanhMuc->getAll(); // hàm lấy tất cả danh mục (bạn cần thêm hàm này vào model)

            // Truyền dữ liệu sang view
            require_once 'views/danhmucs/list_danh_muc.php';
        }
        
    }   
    
    // public function search() {
    //     if (isset($_POST['kyw']) && !empty($_POST['kyw'])) {
    //         $kyw = "%" . $_POST['kyw'] . "%"; //Thêm % để tìm kiếm như một phần của chuỗi
    //         $danhMucs = $this->modelDanhMuc->search($kyw);
    //         $coKetQua = !empty($danhMucs); // Biến để kiểm tra xem có kết quả không
    
    //     } else {
    //         $danhMucs = $this->modelDanhMuc->getAll();
    //         $coKetQua = !empty($danhMucs); // Biến để kiểm tra xem có kết quả không
    //     }
    
    //     require_once 'views/danhmucs/list_danh_muc.php'; //Truyền biến coKetQua vào view
    // }
    // ham xu ly them CSDL
    public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lay ra du lieu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            //validate

            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = "ten danh muc khong duoc de trong";
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = "trang thai khong duoc de trong";
            }

            // them du lieu
            if(empty($errors)){
                //neu ko co loi thi them du lieu
                //them vao CSDL
                $this->modelDanhMuc->postData($ten_danh_muc, $trang_thai);

                unset($_SESSION['errors']);
                header('location: ?act=danh-mucs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-add-danh-muc');
                exit();
            }
        }
    }

    // ham hien thi form sua
    public function edit(){
        
            
            $id = $_GET['danh_muc_id'];
            
            $danhMuc = $this->modelDanhMuc->getDetailData($id);
                
            //do giu lieu ra form

            require_once 'views/danhmucs/edit_danh_muc.php';
        
            
    }

    // ham xu ly cap nhat du lieu vao CSDL
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lay ra du lieu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            //validate

            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = "ten danh muc khong duoc de trong";
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = "trang thai khong duoc de trong";
            }

            // them du lieu
            if(empty($errors)){
                //neu ko co loi thi them du lieu
                //them vao CSDL
                $this->modelDanhMuc->updateData($id,$ten_danh_muc, $trang_thai);

                unset($_SESSION['errors']);
                header('location: ?act=danh-mucs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-danh-muc');
                exit();
            }
        }
    
}

    // ham xoa du lieu
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['danh_muc_id'];
            // var_dump($id);

            // xoa danh muc
            $deleteDanhMuc = $this->modelDanhMuc->deleteData($id);
            header('location: ?act=danh-mucs');
            exit();
        }
    }
}

