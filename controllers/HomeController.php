<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelLienHe;
    public $modelTinTuc;
    public $modelGioHang;
    public $modelDonHang;
    public $modelKhuyenMai;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelLienHe = new LienHe();
        $this->modelTinTuc = new TinTuc();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelKhuyenMai = new KhuyenMai();
    }
    // Trang chủ
    public function home()
    {
        $sanpham = $this->modelSanPham->getAll();
        require_once './views/home.php';
    }
    public function shop()
    {
        $sanpham = $this->modelSanPham->getAll2();
        $promoCodes = $this->modelKhuyenMai->getActivePromoCodes();
        require_once './views/shop.php';
    }
    public function singleproduct()
    {
        require_once './views/singleproduct.php';
    }



    // san pham chi tiet

    public function detaiSanPham()
    {
        $id = $_GET['san_pham_id'];
        $sanphams = $this->modelSanPham->getDetailData($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamCungDanhMuc($sanphams['danh_muc_id']);
        $listHinhAnh = $this->modelSanPham->getDetailImage($id);
        $binhluans = $this->modelSanPham->getCommentFromProduct($id);
        if (!$sanphams) {
            echo "ID sai";
            // header("Location: ?act=shop.php ");
            // exit();
        } else {
            require_once './views/detailSanPham.php';
        }
    }

    public function addGioHang()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['user_client'])) {
                $email = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                $errors = [];

                if (!$email) {
                    $errors[] = "Email không hợp lệ!";
                } else {
                    $san_pham_id = isset($_POST['san_pham_id']) ? $_POST['san_pham_id'] : null;
                    $so_luong_them = isset($_POST['so_luong']) ? (int)$_POST['so_luong'] : 0;

                    // Lấy thông tin sản phẩm để kiểm tra số lượng tồn
                    $sanPham = $this->modelSanPham->getDetailData($san_pham_id);
                    if (!$sanPham) {
                        $errors[] = "Sản phẩm không tồn tại!";
                    } else {
                        // Kiểm tra số lượng tồn kho
                        if ($so_luong_them > $sanPham['so_luong']) {
                            $errors[] = "Số lượng sản phẩm trong kho không đủ! Chỉ còn " . $sanPham['so_luong'] . " sản phẩm";
                        }

                        $gio_hang = $this->modelGioHang->getGioHangFromUser($email['id']);
                        if (!$gio_hang) {
                            $gio_hangId = $this->modelGioHang->addGioHang($email['id']);
                            if (!$gio_hangId) {
                                $errors[] = "Lỗi tạo giỏ hàng!";
                            }
                            $gio_hang = ['id' => $gio_hangId];
                        }

                        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gio_hang['id']);
                        $checkSanPham = false;
                        foreach ($chiTietGioHang as $detail) {
                            if ($detail['san_pham_id'] == $san_pham_id) {
                                $newSoLuong = $detail['so_luong'] + $so_luong_them;

                                // Kiểm tra tổng số lượng sau khi thêm
                                if ($newSoLuong > $sanPham['so_luong']) {
                                    $errors[] = "Số lượng sau khi thêm không hợp lệ! Chỉ còn " . $sanPham['so_luong'] . " sản phẩm";
                                    $newSoLuong = $sanPham['so_luong'];
                                }

                                if (!$this->modelGioHang->updateSoLuong($gio_hang['id'], $san_pham_id, $newSoLuong)) {
                                    $errors[] = "Lỗi thêm chi tiết giỏ hàng!";
                                }
                                $checkSanPham = true;
                                break;
                            }
                        }

                        if (!$checkSanPham) {
                            if (!$this->modelGioHang->addDetailGioHang($gio_hang['id'], $san_pham_id, $so_luong_them)) {
                                $errors[] = "Lỗi thêm chi tiết giỏ hàng!";
                            }
                        }
                    }
                }

                // Nếu có lỗi, lưu lỗi vào session
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    header("location: ?act=detail_san_pham&san_pham_id={$san_pham_id}"); // Chuyển hướng về trang sản phẩm
                    exit;
                }

                header("location: ?act=gio-hang");
                exit;
            } else {
                header("location: ?act=login");
                die;
            }
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $promoCodes = $this->modelKhuyenMai->getActivePromoCodes(); // Lấy mã khuyến mãi còn hạn

            if (!$email) {
                echo "Email không hợp lệ!";
                die;
            }

            $gio_hang = $this->modelGioHang->getGioHangFromUser($email['id']);
            if (!$gio_hang) {
                $gio_hangId = $this->modelGioHang->addGioHang($email['id']);
                if (!$gio_hangId) {
                    echo "Lỗi tạo giỏ hàng!";
                    die;
                }
                $gio_hang = ['id' => $gio_hangId];
            }

            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gio_hang['id']);
            $tongTienGioHang = $this->tinhTongTienGioHang($gio_hang['id']); // Tổng tiền chưa giảm giá

            $discount = $_SESSION['discount'] ?? 0; // Giá trị giảm giá từ session nếu đã được lưu
            $giaTriKhuyenMai = $tongTienGioHang * $discount;
            $tongThanhToan = $tongTienGioHang * (1 - $discount) + 50000; // Phí vận chuyển

            require_once "./views/gioHang.php";
        } else {
            header("location: ?act=login");
            die;
        }
    }

    public function updateGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['user_client'])) {
                $email = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                if (!$email) {
                    $_SESSION['errors']['email'] = "Email không hợp lệ!";
                    header("Location: ?act=gio-hang");
                    exit;
                }

                $gio_hang = $this->modelGioHang->getGioHangFromUser($email['id']);
                if (!$gio_hang) {
                    $_SESSION['errors']['gio_hang'] = "Không tìm thấy giỏ hàng!";
                    header("Location: ?act=gio-hang");
                    exit;
                }

                $so_luong = $_POST['so_luong'] ?? [];
                $promoCodeId = $_POST['promo_code_id'] ?? ''; // Lấy mã khuyến mãi từ form
                $errors = [];

                foreach ($so_luong as $id => $newSoLuong) {
                    $sanPham = $this->modelSanPham->getDetailData($id);
                    if (!$sanPham) {
                        $errors[] = "Không tìm thấy sản phẩm với ID: {$id}";
                        continue;
                    }
                    if ($newSoLuong > $sanPham['so_luong']) {
                        $errors[] = "Số lượng sản phẩm {$sanPham['ten_sp']} vượt quá tồn kho. Chỉ còn lại {$sanPham['so_luong']} sản phẩm có thể mua. Vui lòng chọn lại số lượng khả dụng";
                        continue;
                    }
                    $this->modelGioHang->updateSoLuong($gio_hang['id'], $id, $newSoLuong);
                }

                $discount = 0;
                if (!empty($promoCodeId)) {
                    $promo = $this->modelKhuyenMai->getPromoCodeById($promoCodeId);
                    if ($promo && $promo['trang_thai'] == 1) {
                        $discount = $promo['gia_tri'] / 100;
                        $_SESSION['discount'] = $discount;
                    } else {
                        $errors[] = "Mã khuyến mãi không hợp lệ hoặc đã hết hạn.";
                    }
                } else {
                    $_SESSION['discount'] = 0; // Không có mã khuyến mãi
                }

                $tongTienGioHang = $this->tinhTongTienGioHang($gio_hang['id'], $discount);

                $_SESSION['tongTienGioHang'] = $tongTienGioHang;

                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                }

                header("Location: ?act=gio-hang");
                exit;
            } else {
                header("Location: ?act=login");
                exit;
            }
        }
    }
    private function tinhTongTienGioHang($gioHangId, $discount = 0)
    {
        // Lấy tổng tiền trước khi áp dụng giảm giá và phí vận chuyển
        $tongTien = $this->modelGioHang->getTongTienGioHang($gioHangId, $discount);

        // Áp dụng giảm giá trước khi tính phí vận chuyển
        $tongTienSauKhuyenMai = $tongTien * (1 - $discount); // Áp dụng giảm giá

        // Thêm phí vận chuyển
        $phiVanChuyen = 50000; // Ví dụ phí vận chuyển cố định
        $tongThanhToan = $tongTienSauKhuyenMai + $phiVanChuyen;

        return $tongThanhToan;
    }
    public function destroyGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                if ($this->modelGioHang->deleteGioHang($id)) {
                    header('Location: ?act=gio-hang');
                    exit();
                } else {
                    echo "Lỗi khi xóa sản phẩm khỏi giỏ hàng!";
                }
            } else {
                echo "ID sản phẩm không hợp lệ!";
            }
        } else {
            echo "Yêu cầu không hợp lệ!";
        }
    }

    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $promoCodes = $this->modelKhuyenMai->getActivePromoCodes();
            if (!$user) {
                // Xử lý trường hợp email không tìm thấy (nên chuyển hướng hoặc hiển thị thông báo lỗi)
                echo "Email không hợp lệ!";
                die;
            }
            $gio_hang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if (!$gio_hang) {
                $gio_hangId = $this->modelGioHang->addGioHang($user['id']);
                if (!$gio_hangId) {
                    echo "Lỗi tạo giỏ hàng!"; // Xử lý lỗi thêm giỏ hàng
                    die;
                }
                $gio_hang = ['id' => $gio_hangId];
            }

            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gio_hang['id']);
            $discount = $_SESSION['discount'] ?? 0; // Giá trị giảm giá từ session nếu đã được lưu
            $tongTienGioHang = $this->tinhTongTienGioHang($gio_hang['id']);
            $giaTriKhuyenMai = $tongTienGioHang * $discount;
            $tongThanhToan = $tongTienGioHang * (1 - $discount) + 50000;
            // var_dump($chiTietGioHang);
            // die;
            // require_once "./views/gioHang.php";

            // header("location:?act=gio-hang");


        } else {
            header("location: ?act=login");  // Hiển thị thông báo lỗi chưa đăng nhập
            die;
        }
        require_once './views/thanh_toan.php';
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin người nhận từ form
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'] ?? 1;
            $ngay_dat = date('Y-m-d');
            $trang_thai_don_hang_id = 3; // Đang xử lý


            // Lấy thông tin người dùng từ phiên đăng nhập
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $nguoi_dung_id = $user['id'];
            $ma_don_hang = 'DH-' . rand(1000, 9999);
            $trang_thai_thanh_toan = 0;

            // Lấy giỏ hàng của người dùng
            $gio_hang = $this->modelGioHang->getGioHangFromUser($user['id']);
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gio_hang['id']);

            // Kiểm tra số lượng sản phẩm trước khi đặt hàng
            $errors = []; // Danh sách các lỗi
            foreach ($chiTietGioHang as $item) {
                $sanPham = $this->modelSanPham->getSanPhamFromId($item['san_pham_id']);
                if ($sanPham['so_luong'] < $item['so_luong']) {
                    $errors[] = "Sản phẩm " . $sanPham['ten_sp'] . " không đủ số lượng. Trong kho còn lại: " . $sanPham['so_luong'] . " vui lòng đặt lại đơn hàng khác.";
                }
            }

            if (!empty($errors)) {
                // Lưu lỗi vào session và quay lại trang thanh toán
                $_SESSION['errors'] = $errors;
                header("location: ?act=thanh-toan");
                exit;
            }

            // Nếu không có lỗi, lưu thông tin đơn hàng
            $donHang = $this->modelDonHang->addDonHang(
                $nguoi_dung_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $trang_thai_don_hang_id,
                $ma_don_hang,
                $trang_thai_thanh_toan
            );

            if ($donHang) {
                // Lưu sản phẩm vào chi tiết đơn hàng và giảm số lượng tồn kho
                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_ban'];

                    // Thêm chi tiết đơn hàng
                    $this->modelDonHang->addChiTietDonHang(
                        $donHang,
                        $item['san_pham_id'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );

                    // Giảm số lượng sản phẩm trong kho
                    $success = $this->modelSanPham->reduceProductQuantity($item['san_pham_id'], $item['so_luong']);
                }
            }

            if (!$donHang || !$success) {
                // Nếu tạo đơn hàng hoặc lưu chi tiết đơn hàng không thành công, xóa giỏ hàng
                $this->modelGioHang->clearDetailGioHang($gio_hang['id']);
                $this->modelGioHang->clearGioHang($nguoi_dung_id);
                $_SESSION['error'] = "Đặt hàng thất bại. Vui lòng thử lại.";
                header("location: ?act=thanh-toan");
                exit;
            }

            // Xóa giỏ hàng sau khi đặt hàng thành công
            $this->modelGioHang->clearDetailGioHang($gio_hang['id']);
            $this->modelGioHang->clearGioHang($nguoi_dung_id);

            // Chuyển hướng người dùng đến lịch sử mua hàng
            header("location: ?act=lich-su-mua-hang");
            exit;
        } else {
            // Nếu không phải là POST request, thông báo lỗi
            $_SESSION['error'] = "Đặt hàng không thành công. Vui lòng thử lại.";
            header("location: ?act=thanh-toan");
            exit;
        }
    }



    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            // lay thon gtin tai khoan dang nhap
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $nguoi_dung_id = $user['id'];

            // lay ra danh sach trang thai don hang
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // lay ra danh sach phuong thuc thanh toan
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            // echo "<pre>";
            // print_r($phuongThucThanhToan);
            // die;
            // lay ra danh sach tat ca don hang cua tai khoan
            $donHang = $this->modelDonHang->getDonHangFromUser($nguoi_dung_id);

            // echo "<pre>";
            // print_r($donHang);
            // die;
            require_once "./views/lichSuMuaHang.php";
        } else {
            var_dump('ban chua dang nhap');
            die;
        }
    }

    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            // lay thon gtin tai khoan dang nhap
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $nguoi_dung_id = $user['id'];

            // lay id don hang truyen tu url
            $don_hang_id = $_GET['id'];

            // lay ra danh sach trang thai don hang
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // lay ra danh sach phuong thuc thanh toan
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // lay ra thonng tin don hang theo id
            $donHang = $this->modelDonHang->getDonHangById($don_hang_id);

            // lay thong tin san pham cua don hang trog bang chi tiets don hang
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($don_hang_id);

            // echo "<pre>";
            // print_r($donHang);
            // print_r($chiTietDonHang);
            // die;

            if ($donHang['nguoi_dung_id'] != $nguoi_dung_id) {
                echo "Bạn không có quuyền truy cập đơn hàng này";
            }

            require_once "./views/chiTietMuaHang.php";
        } else {
            var_dump('ban chua dang nhap');
        }
    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            // lấy thông tin tài khoản đang đăng nhập
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $nguoi_dung_id = $user['id'];

            // lấy id đơn hàng từ URL
            $don_hang_id = $_GET['id'];

            // kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($don_hang_id);
            $errors = [];

            // Kiểm tra quyền của người dùng
            if ($donHang['nguoi_dung_id'] != $nguoi_dung_id) {
                $errors['nguoi_dung_id'] = "Bạn không có quyền truy cập đơn hàng này";
            }

            // Kiểm tra trạng thái đơn hàng (Chỉ có thể hủy đơn hàng với trạng thái "Chờ xác nhận")
            if ($donHang['trang_thai_don_hang_id'] != 3) {
                $errors['trang_thai_don_hang_id'] = "Bạn không thể hủy đơn hàng này";
            }

            // Nếu có lỗi, lưu lỗi vào session và chuyển hướng về trang trước đó
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=lich-su-mua-hang");
                exit();
            }

            // Lấy danh sách các sản phẩm trong đơn hàng
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHang($don_hang_id);

            // Cộng lại số lượng sản phẩm vào kho
            foreach ($chiTietDonHang as $item) {
                $this->modelSanPham->increaseProductQuantity($item['san_pham_id'], $item['so_luong']);
            }

            // Hủy đơn hàng 
            $this->modelDonHang->updateTrangThaiDonHang($don_hang_id, 9);

            // Chuyển hướng về lịch sử mua hàng
            header("location: ?act=lich-su-mua-hang");
            exit();
        } else {
            $_SESSION['errors'] = ["Bạn chưa đăng nhập"];
            header("Location: ?act=lich-su-mua-hang");
            exit();
        }
    }

    public function nhanDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            // lay thon gtin tai khoan dang nhap
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $nguoi_dung_id = $user['id'];

            // lay id don hang truyen tu url
            $don_hang_id = $_GET['id'];

            // kiem tra don hang
            $donHang = $this->modelDonHang->getDonHangById($don_hang_id);

            if ($donHang['nguoi_dung_id'] != $nguoi_dung_id) {
                echo "Bạn không có quyền nhân đơn hàng này";
                exit();
            }
            if ($donHang['trang_thai_don_hang_id'] != 6) {
                echo "đơn hàng nay khong the nhận ";
                exit();
            }

            // huy don hang 
            $this->modelDonHang->updateTrangThaiDonHang($don_hang_id, 8);
            header("location: ?act=lich-su-mua-hang");
            exit;
        } else {
            var_dump('ban chua dang nhap');
        }
    }

    public function postBinhLuan()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        var_dump($_SESSION); // Kiểm tra thông tin session

        // Bỏ qua kiểm tra đăng nhập


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user_client']) || !isset($_SESSION['user_client']['email'])) {
                $_SESSION['return_url'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
                // header("Location: ?act=shop.php");
                // exit();
                $san_pham_id = filter_input(INPUT_POST, 'san_pham_id', FILTER_VALIDATE_INT);
                $email = $_SESSION['user_client'];

                // Lấy ID người dùng dựa trên email
                $nguoi_dung_id = $this->modelTaiKhoan->getUserIdByEmail($email);
                if (!$nguoi_dung_id) {
                    echo "Không tìm thấy người dùng.";
                    exit();
                }

                $nguoi_dung_id = $nguoi_dung_id['id'];
                $noi_dung = htmlspecialchars(trim(filter_input(INPUT_POST, 'noi_dung')));
                $ngay_bl = date('Y-m-d H:i:s');
                $trang_thai = 1;
            }

            if ($san_pham_id && $noi_dung) {
                $sanphamModel = $this->modelSanPham;

                if ($sanphamModel->insertComment($san_pham_id, $nguoi_dung_id, $noi_dung, $ngay_bl, $trang_thai)) {
                    header("Location: ?act=detail_san_pham&san_pham_id=" . $san_pham_id);
                    exit();
                } else {
                    $error = $sanphamModel->getError();
                    echo "Có lỗi xảy ra khi gửi bình luận: " . ($error ?: "Lỗi không xác định.");
                }
            } else {
                echo "Vui lòng điền đầy đủ thông tin.";
            }
        } else {
            echo "Yêu cầu không hợp lệ.";
        }
    }




    // tim kiem
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = trim($_POST['sreach'] ?? '');

            if (!empty($search)) {
                $sanpham = $this->modelSanPham->search($search);
            } else {
                $sanpham = []; // Handle empty search case  
            }
            require_once 'views/home.php';
        }
    }
    public function search2()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search2 = trim($_POST['sreach2'] ?? '');

            if (!empty($search2)) {
                $sanpham = $this->modelSanPham->search2($search2);
            } else {
                $sanpham = []; // Handle empty search case  
            }

            require_once 'views/shop.php';
        }
    }
    public function Rangskik(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sapxep=$_POST['sapxep'];
        if($sapxep=='asc'){
            $sanpham = $this -> modelSanPham -> Rangskik();
        }else if($sapxep=='desc'){
            $sanpham = $this -> modelSanPham -> Rangskikhai();
        }else{
        $sanpham = $this -> modelSanPham -> getAll();
        }
        }
        require_once './views/home.php';
        
    }
    public function Rangskik2(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sapxep2=$_POST['sapxep2'];
        if($sapxep2=='asc2'){
            $sanpham = $this -> modelSanPham -> Rangskik2();
        }else if($sapxep2=='desc2'){
            $sanpham = $this -> modelSanPham -> Rangskikhai2();
        }else{
        $sanpham = $this -> modelSanPham -> getAll();
        }
        }
        require_once './views/shop.php';
        
    }
    public function Rangskik3(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sapxep3=$_POST['sapxep3'];
        if($sapxep3=='asc3'){
            $sanpham = $this -> modelSanPham -> Rangskik3();
        }else if($sapxep3=='desc3'){
            $sanpham = $this -> modelSanPham -> Rangskikhai3();
        }else if($sapxep3=='descc3'){
            $sanpham = $this -> modelSanPham -> Rangskikhaii3();
        }
        else{
        $sanpham = $this -> modelSanPham -> getAll2();
        require_once './views/shop.php';
        }
        }
        require_once './views/shop.php';
        
    }






    //đăng ký
    public function formLogin()
    {
        require_once './views/auth/login.php';
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay email va pass gui len form

            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];

            // var_dump($mat_khau);die;

            //xu ly kiem tra thong tin dang nhap

            $user = $this->modelTaiKhoan->checkLogin($email, $mat_khau);
            //    var_dump($user);die;
            if ($user == $email) { // truong hop dang nhap thanh cong
                // luu thong tin vao session
                $_SESSION['user_client'] = $user;

                header('location: ?act=/');
                exit();
            } else {
                // loi thi luu loi vao session
                $_SESSION['errors'] = $user;
                // var_dump($_SESSION['errors']);die;

                $_SESSION['flash'] = true;
                header('location: ?act=login');
            }
        }
    }
    public function formRegister()
    {
        require_once './views/auth/register.php';
    }

    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ POST
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $mat_khau = password_hash($_POST['mat_khau'], PASSWORD_BCRYPT);

            // Kiểm tra dữ liệu
            $errors = [];

            // Kiểm tra trường bắt buộc
            if (empty($ten_nguoi_dung)) {
                $errors['ten_nguoi_dung'] = "Tên người dùng không được để trống";
            }
            if (empty($email)) {
                $errors['email'] = "Email không được để trống";
            }
            // Kiểm tra xem email đã tồn tại chưa
            if ($this->modelTaiKhoan->emailExists($email)) {
                $errors['email'] = "Email đã tồn tại, vui lòng chọn email khác";
            }

            // Nếu có lỗi, lưu vào session và chuyển hướng về form đăng ký
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=register-client'); // Chuyển hướng về form
                exit(); // Dừng thực thi script
            } else {
                // Không có lỗi, tiến hành thêm người dùng vào CSDL
                $vai_tro = 0; // Vai trò mặc định
                $trang_thai = 1; // Trạng thái mặc định
                $this->modelTaiKhoan->postClient($ten_nguoi_dung, $email, $mat_khau, $vai_tro, $trang_thai);
                unset($_SESSION['errors']); // Xóa lỗi thành công
                header('Location: ?act=login'); // Chuyển hướng đến trang đăng nhập
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header('location: ?act=/');
        }
    }
    // Trang thong tin ca nhan

    public function formThongTinCaNhan()
    {
        $email = $_SESSION['user_client'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);

        if ($thongTin === null) {
            //Xử lý trường hợp không tìm thấy người dùng. Chuyển hướng hoặc hiển thị thông báo.
            $_SESSION['errors'] = ['error' => 'Không tìm thấy người dùng.'];
            header('location: ?act=error'); //Hoặc một trang khác phù hợp
            exit();
        }

        require_once './views/auth/thong_tin_ca_nhan.php';
        deleteSessionError();
    }
    public function editThongTinCaNhan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $id = $_POST['id'];
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $dia_chi = $_POST['dia_chi'];

            // Khởi tạo mảng lưu lỗi
            $errors = [];

            // Kiểm tra các trường thông tin
            if (empty($ten_nguoi_dung)) {
                $errors['ten_nguoi_dung'] = "Tên người dùng không được để trống";
            }

            if (empty($email)) {
                $errors['email'] = "Email không được để trống";
            }

            if (empty($sdt)) {
                $errors['sdt'] = "Số điện thoại không được để trống";
            } else {
                // Kiểm tra xem số điện thoại đã tồn tại chưa
                if ($this->modelTaiKhoan->isSDTExists($sdt, $id)) { // Truyền vào ID người dùng hiện tại
                    $errors['sdt'] = "Số điện thoại đã được sử dụng.";
                }
            }

            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = "Ngày sinh không được để trống";
            }

            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = "Giới tính không được để trống";
            }

            if (empty($dia_chi)) {
                $errors['dia_chi'] = "Địa chỉ không được để trống";
            }

            // Xử lý tải lên hình ảnh
            // $avatarPath = $thongTin['avartar']; // Đặt mặc định là ảnh đại diện hiện tại

            if (isset($_FILES['avartar']) && $_FILES['avartar']['error'] == UPLOAD_ERR_OK) {
                $targetDir = "uploads/";
                $fileName = basename($_FILES['avartar']['name']);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowedTypes = ['jpg', 'png', 'jpeg'];

                if (in_array($fileType, $allowedTypes)) {
                    // Kiểm tra định dạng cho phép trước khi di chuyển tệp
                    if (move_uploaded_file($_FILES['avartar']['tmp_name'], $targetFilePath)) {
                        $avatarPath = $targetFilePath; // Cập nhật đường dẫn nếu tải lên thành công
                    } else {
                        $errors['upload'] = "Đã xảy ra lỗi trong quá trình tải lên hình ảnh.";
                    }
                } else {
                    $errors['avartar'] = "Chỉ hỗ trợ các định dạng JPG, PNG, JPEG";
                }
            }

            // Lưu lỗi vào session nếu có
            $_SESSION['errors'] = $errors;

            // Nếu không có lỗi, thực hiện cập nhật thông tin người dùng
            if (empty($errors)) {
                $this->modelTaiKhoan->updateCaNhan($id, $ten_nguoi_dung, $email, $sdt, $ngay_sinh, $gioi_tinh, $dia_chi, $avatarPath);
                unset($_SESSION['errors']);
                header('location: ?act=form-thong-tin-ca-nhan');
                exit();
            } else {
                header('Location: ?act=form-thong-tin-ca-nhan');
                exit();
            }
        }
    }
    public function ressetPassword()
    {
        $id = $_GET['nguoi_dung_id'];
        $tai_khoan = $this->modelTaiKhoan->getDetailData($id);
        $mat_khau = password_hash('123456', PASSWORD_BCRYPT);
        $this->modelTaiKhoan->resetPassword($id, $mat_khau);
        if ($tai_khoan['vai_tro'] == 1) {

            header('location: ?act=nguoi-dungs');
            exit();
        } elseif ($tai_khoan['vai_tro'] == 0) {
            header('location: ?act=khach-hangs');
            exit();
        }
    }
    public function editmatkhauCaNhan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];

            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);

            $errors = [];

            $checkPass = password_verify($old_pass, $user['mat_khau']); // <-- Semicolon added here

            if (!$checkPass) {
                $errors['old_pass'] = 'Mật khẩu người dùng không đúng';
            }

            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu không trùng khớp';
            }

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Mật khẩu người dùng không được để trống';
            }

            if (empty($new_pass)) {
                $errors['new_pass'] = 'Mật khẩu mới không được để trống';
            }

            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Xác nhận mật khẩu không được để trống';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) { //Using empty() is clearer than !$errors
                $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $result = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                if ($result) {
                    $_SESSION['success'] = 'Đổi mật khẩu thành công!';
                    header('Location: ?act=form-thong-tin-ca-nhan');
                    exit;
                } else {
                    $errors['db_error'] = 'Lỗi cơ sở dữ liệu. Vui lòng thử lại.';
                    $_SESSION['errors'] = $errors; //Update errors after DB failure.
                }
            } else {
                $_SESSION['flash'] = true;
                header('Location: ?act=form-thong-tin-ca-nhan');
                exit;
            }
        }
    }



    // Trang liên hệ
    public function contact()
    {
        require_once './views/lienhes/lien-he.php';
    }


    // thêm vào csdl lien he
    public function addContact()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Lấy dữ liệu
            // $id = $_POST['id'];
            $email = $_POST['email'];
            $noi_dung = $_POST['noi_dung'];
            // tu dong luu ngay
            $ngay_tao = date('Y-m-d H:i:s');
            $trang_thai = 1;
            // Validate
            $errors = [];
            if (empty($email)) {
                $errors['email'] = "email không được để trống";
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = "Nội dung không được để trống";
            }


            if (empty($errors)) {
                $id = $this->modelLienHe->postLienHe($email, $noi_dung, $ngay_tao, $trang_thai);
                // var_dump($id);
                // die;
                $_SESSION['success'] = "Lien he thanh cong";
                header('location: ?act=lien-hes');

                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location: ?act=lien-hes');
                exit();
            }
        }
    }

    // Trang tin tuc
    public function new()
    {
        $tinTucs = $this->modelTinTuc->getAll();
        require_once './views/tintucs/tin-tuc.php';
    }

    public function detail()
    {
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
            require_once './views/tintucs/chi-tiet-tin-tuc.php';
        }
    }
}
