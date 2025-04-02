<?php

class DonHangController{
    // ket noi den file Model
    public $modelDonhang;

    public function __construct(){
        $this->modelDonHang = new DonHang();
    }

    // ham hien thi danh sach
    public function index(){
        // lay ra du lieu 
        $donHangs = $this->modelDonHang->getAll();
        

        // dua du lieu ra view
        require_once 'views/donhangs/list_don_hang.php';
        
    }

    public function details(){
        
        $don_hang_id = $_GET['don_hang_id'];

        // lay thong tin cua bang don_hangs

        $donHang = $this->modelDonHang->getDetailData($don_hang_id);

        // lay danh sach san pham da dat cua don hang o bang chi_tiet_don_hangs

        $donHangChiTiet = $this->modelDonHang->getDonHangChiTiet($don_hang_id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        // var_dump($donHangChiTiet);
        // die;
        // dua du lieu ra view
        require_once 'views/donhangs/chi_tiet_don_hang.php';
        // var_dump($don_hang_id);
        // die;

       
    }

    // public function search() {
    //     if (isset($_POST['kyw']) && !empty($_POST['kyw'])) {
    //         // Xuất lý trường hợp có từ khóa tìm kiếm
    //         $kyw = "%" . $_POST['kyw'] . "%";
    //         $danhMucs = $this->modelDanhMuc->search($kyw); // hàm tìm kiếm tất cả danh mục (bạn cần thêm hàm này vào model)

    //         // Truyền dữ liệu sang view
    //         require_once 'views/danhmucs/list_danh_muc.php';
    //     }
    //     else {
             
            
    //         // Xử lý trường hợp không có từ khóa tìm kiếm, ví dụ: hiển thị danh sách tất cả
    //         $danhMucs = $this->modelDanhMuc->getAll(); // hàm lấy tất cả danh mục (bạn cần thêm hàm này vào model)

    //         // Truyền dữ liệu sang view
    //         require_once 'views/danhmucs/list_danh_muc.php';
    //     }
        
    // }   
    
   
   

    // ham hien thi form sua
    public function edit(){
        
            
            $id = $_GET['don_hang_id'];
            
            $donHang = $this->modelDonHang->getDetailData($id);
                
            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

            //do giu lieu ra form

            require_once 'views/donhangs/edit_don_hang.php';
        
            
    }

    // ham xu ly cap nhat du lieu vao CSDL
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lay ra du lieu
            
            $don_hang_id = $_POST['don_hang_id'];
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $trang_thai_don_hang_id = $_POST['trang_thai_don_hang_id'];

            //validate
 
            $errors = [];
            if(empty($ten_nguoi_nhan)){
                $errors['ten_nguoi_nhan'] = "khong duoc de trong";
            }

            if(empty($sdt_nguoi_nhan)){
                $errors['sdt_nguoi_nhan'] = "khong duoc de trong";
            }
            if(empty($email_nguoi_nhan)){
                $errors['email_nguoi_nhan'] = "khong duoc de trong";
            }
            if(empty($dia_chi_nguoi_nhan)){
                $errors['dia_chi_nguoi_nhan'] = "khong duoc de trong";
            }
            if(empty($trang_thai_don_hang_id)){
                $errors['trang_thai_don_hang_id'] = "khong duoc de trong";
            }


            // them du lieu
            if(empty($errors)){
                //neu ko co loi thi them du lieu
                //them vao CSDL
                $this->modelDonHang->updateData($ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $trang_thai_don_hang_id, $don_hang_id);

                unset($_SESSION['errors']);
                header('location: ?act=don-hangs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-don-hang=&don_hang_id='.$don_hang_id);
                exit();
            }
        }
    
}

//     // ham xoa du lieu
//     public function destroy(){
//         if($_SERVER['REQUEST_METHOD'] == 'POST'){
//             $id = $_POST['danh_muc_id'];
//             // var_dump($id);

//             // xoa danh muc
//             $deleteDanhMuc = $this->modelDanhMuc->deleteData($id);
//             header('location: ?act=danh-mucs');
//             exit();
//         }
//     }

        
}

