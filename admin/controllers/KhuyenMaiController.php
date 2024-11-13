<?php

class KhuyenMaiController {
    // Khởi tạo kết nối đến Model
    public $modelKhuyenMai;

    public function __construct() {
        $this->modelKhuyenMai = new KhuyenMai();
    }

    public function index() {
        $khuyenMais = $this->modelKhuyenMai->getAll();
        require_once 'views/khuyenmais/list_khuyen_mai.php';
    }

    public function create() {
        require_once 'views/khuyenmais/create_khuyen_mai.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $gia_tri = $_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];

            $errors = [];
            
            if (empty($ten_khuyen_mai)) $errors['ten_khuyen_mai'] = "Tên khuyến mãi không được để trống";
            if (empty($ma_khuyen_mai)) $errors['ma_khuyen_mai'] = "Mã khuyến mãi không được để trống";
            if (empty($gia_tri)) {
                $errors['gia_tri'] = "Giá trị không hợp lệ";
            } else {
                // Kiểm tra chuỗi chỉ chứa các chữ số
                if (!preg_match('/^\d+$/', $gia_tri)) {
                    $errors['gia_tri'] = "Giá trị chỉ được chứa các chữ số";
                }
            }
            if (empty($ngay_bat_dau)) $errors['ngay_bat_dau'] = "Ngày bắt đầu không được để trống";
            if (empty($ngay_ket_thuc)) $errors['ngay_ket_thuc'] = "Ngày kết thúc không được để trống";
            if (empty($mo_ta)) $errors['mo_ta'] = "Mô tả không được để trống";
            if (empty($trang_thai)) $errors['trang_thai'] = "Trạng thái không được để trống";

            if (empty($errors)) {
                $this->modelKhuyenMai->postData($ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai);
                header('Location: ?act=khuyen-mais');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-add-khuyen-mai');
                exit();
            }
        }
    }

    public function edit() {
        if (isset($_GET['khuyen_mai_id'])) {
            $id = $_GET['khuyen_mai_id'];
            $khuyenMai = $this->modelKhuyenMai->getDetailData($id); 
            if (!$khuyenMai) {
                echo "Không tìm thấy khuyến mãi";
                return;
            }
            require_once 'views/khuyenmais/form_edit_khuyen_mai.php';
        } else {
            echo "ID không hợp lệ";
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $gia_tri = $_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];

            $errors = [];
            if (empty($ten_khuyen_mai)) $errors['ten_khuyen_mai'] = "Tên không được để trống";
            if (empty($ma_khuyen_mai)) $errors['ma_khuyen_mai'] = "Mã không được để trống";
            if (empty($gia_tri)) $errors['gia_tri'] = "Giá trị không được để trống";
            if (empty($ngay_bat_dau)) $errors['ngay_bat_dau'] = "Ngày bắt đầu không được để trống";
            if (empty($ngay_ket_thuc)) $errors['ngay_ket_thuc'] = "Ngày kết thúc không được để trống";
            if (empty($mo_ta)) $errors['mo_ta'] = "Mô tả không được để trống";
                

            if (empty($errors)) {
                $this->modelKhuyenMai->updateData($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai);
                header('Location: ?act=khuyen-mais');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-edit-khuyen-mai');
                exit();
            }
        }
    }
public function show(){
    // Lấy ID của tin tức từ URL
    $id = $_GET['khuyen_mai_id'];

    // Lấy dữ liệu chi tiết của tin tức từ model
    $khuyenMai = $this->modelKhuyenMai->getDetailData($id);

    // Kiểm tra nếu không tìm thấy tin tức
    if (!$khuyenMai) {
        echo "Không tìm thấy khuyến mãi nào";
        return;
    } else {
        // Truyền dữ liệu vào view show_tin_tuc.php
        require_once 'views/khuyenmais/show_khuyen_mai.php';
    }
}

    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['khuyen_mai_id'];
            $this->modelKhuyenMai->deleteData($id);
            header('Location: ?act=khuyen-mais');
            exit();
        }
    }
}
