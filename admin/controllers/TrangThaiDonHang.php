<?php

class TrangThaiDonHangController{
    // ket noi den file Model
    public $modelTrangThaiDonHang;

    public function __construct(){
        $this->modelTrangThaiDonHang = new TrangThaiDonHang();
    }

    // ham hien thi danh sach
    public function index(){
        // lay ra du lieu danh muc
        $trangThaiDonHangs = $this->modelTrangThaiDonHang->getAll();
        // var_dump($danhMucs);

        // dua du lieu ra view
        require_once 'views/trangthaidonhangs/list_trang_thai_don_hang.php';
        
    }

    

    // ham xoa du lieu
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['trang_thai_don_hang_id'];
            // var_dump($id);

            // xoa trang thai don hang
            $deleteTrangThaiDonHang = $this->modelTrangThaiDonHang->deleteData($id);
            header('location: ?act=trang-thai-don-hangs');
            exit();
        }
    }
}
