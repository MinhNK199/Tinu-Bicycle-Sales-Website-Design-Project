<?php

class BanNerController
{
    //kết nối đến fite model
    public $modelBanNer;

    public function __construct()
    {
        $this->modelBanNer = new BanNer();
    }
    //hàm hiển thị form thêm
    public function index_banner(){
        
        //lấy ra dữ liệu banner
        $banNers = $this->modelBanNer->getAll();
     //   var_dump($banNers);

        //đưa dữ liệu ra view
        require_once './views/banner/list_banner.php';
    }

    //hàm hiển thị form thêm
    public function create_banner(){
        require_once './views/banner/create_banner.php';

    }

     //hàm sử lý thêm vào CSDL
     public function store_banner(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $tieu_de = $_POST['tieu_de'];
        $trang_thai = $_POST['trang_thai'];

        // Xử lý upload file
        $hinh_anh = $_FILES['hinh_anh'];
        $uploadDirectory = './uploads/'; // Thư mục để lưu trữ file đã upload
        
        // Kiểm tra và tạo thư mục nếu chưa tồn tại
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $filePath = $uploadDirectory . basename($hinh_anh['name']);
        $imageFileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $errors = [];

        // Kiểm tra các lỗi khi upload
        if(empty($tieu_de)) {
            $errors['tieu_de'] = 'Tiêu đề là bắt buộc';
        }
        if(empty($trang_thai)) {
            $errors['trang_thai'] = 'Trạng thái là bắt buộc';
        }
        if($hinh_anh['error'] != UPLOAD_ERR_OK) {
            $errors['hinh_anh'] = 'Có lỗi khi tải lên ảnh';
        }

        // Kiểm tra loại file
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if(!in_array($imageFileType, $allowedTypes)) {
            $errors['hinh_anh'] = 'Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF';
        }

        // Thêm dữ liệu nếu không có lỗi
        if(empty($errors)) {
            if(move_uploaded_file($hinh_anh['tmp_name'], $filePath)) {
                // Lưu vào cơ sở dữ liệu
                $this->modelBanNer->postData($tieu_de, $filePath, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=banners');
                exit();
            } else {
                $errors['hinh_anh'] = 'Không thể di chuyển file lên server';
            }
        } else {
            $_SESSION['errors'] = $errors;
            header('Location: ?act=form-them-banner');
            exit();
        }
    }
}

      //hàm hiển thị form chỉnh sửa
    public function edit_banner(){
        //lấy id
        $id = $_GET['banner_id'];
        //lấy thông tin chi tiết của banner
        $banNers = $this->modelBanNer->getDetailData($id);

       //đổ dữ liệu ra form
       require_once './views/banner/edit_banner.php';

    }

     //hàm sử lý cập nhật dữ liệu vào CSDL
     public function update_banner() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get data from the form
            $id = $_POST['id'];
            $tieu_de = $_POST['tieu_de'];
            $trang_thai = $_POST['trang_thai'];
    
            // Handle image upload (only if a new image is provided)
            $hinh_anh = ''; // Initialize as empty string, assuming no new image initially.
            if (!empty($_FILES['hinh_anh']['name'])) { //Check if a new image is uploaded.
                $uploadDirectory = './uploads/';
                if (!is_dir($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }
                $filePath = $uploadDirectory . basename($_FILES['hinh_anh']['name']);
                $imageFileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                $errors = [];
    
                // Validate image type
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($imageFileType, $allowedTypes)) {
                    $errors['hinh_anh'] = 'Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF';
                }
                //Validate upload
                if($_FILES['hinh_anh']['error'] != UPLOAD_ERR_OK){
                    $errors['hinh_anh'] = 'Có lỗi khi tải lên ảnh';
                }
    
                if (empty($errors)) {
                    if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $filePath)) {
                        $hinh_anh = $filePath; // Update $hinh_anh with the new path.
                    } else {
                        $errors['hinh_anh'] = 'Không thể di chuyển file lên server';
                    }
                }
            } else {
                 //If no new image is uploaded, keep the old path
                $hinh_anh = $_POST['old_hinh_anh']; // Assumes you're also passing the old image path (see below)
            }
    
    
            // Validate other fields
            $errors = []; // Reset errors array because we might have new errors from image upload.
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tiêu đề là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
    
            // Update database
            if (empty($errors)) {
                $this->modelBanNer->updateData($id, $tieu_de, $hinh_anh, $trang_thai);
                unset($_SESSION['errors']);
                header('location: ?act=banners');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-banner&banner_id=' . $id); // Add banner_id to the URL
                exit();
            }
        }
    }
    

      //hàm xóa dữ liệu trong CSDL
    public function destroy_banner(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['banner_id'];
            
            //xóa banner
           $deleteBanNer = $this->modelBanNer->deleteData($id);

           header('location: ?act=banners');
           exit();
        }

    }
  
}