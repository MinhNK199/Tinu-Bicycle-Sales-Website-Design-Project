    <?php

    class SanPhamController
    {
        // Khởi tạo kết nối đến Model
        public $modelSanPham;
        public $modelDanhMuc;

        public function __construct()
        {
            $this->modelSanPham = new SanPham();
            $this->modelDanhMuc = new DanhMuc();
        }

        public function index()
        {
            $sanPhams = $this->modelSanPham->getAll();
            require_once 'views/sanphams/list_san_pham.php';
        }

        public function create()
        {
            $danhMucs = $this->modelDanhMuc->getAll();
            require_once 'views/sanphams/create_san_pham.php';
        }

        public function store()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ma_sp = $_POST['ma_sp'];
                $anh_sp = $_FILES['anh_sp'];
                $ten_sp = $_POST['ten_sp'];
                $gia_nhap = $_POST['gia_nhap'];
                $gia_ban = $_POST['gia_ban'];
                $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
                $so_luong = $_POST['so_luong'];
                $mo_ta = $_POST['mo_ta'];
                $mo_ta_chi_tiet = $_POST['mo_ta_chi_tiet'];
                $danh_muc_id = $_POST['danh_muc_id'];
                $trang_thai = $_POST['trang_thai'];

                // Khởi tạo mảng lỗi
                $errors = [];
                if (empty($ma_sp)) $errors['ma_sp'] = "Mã sản phẩm không được để trống";
                if (empty($ten_sp)) $ten_sp['ten_sp'] = "Tên sản phẩm không được để trống";
                if (empty($gia_nhap)) $errors['gia_nhap'] = "Giá trị không được để trống";
                if (empty($gia_ban)) $errors['gia_ban'] = "Giá bán không được để trống";
                if (empty($so_luong)) $errors['so_luong'] = "Số lượng không được để trống";
                if (empty($mo_ta)) $errors['mo_ta'] = "Mô tả không được để trống";
                if (empty($mo_ta_chi_tiet)) $errors['mo_ta_chi_tiet'] = "Mô tả chi tiết không được để trống";
                if (empty($danh_muc_id)) $errors['danh_muc_id'] = "Danh mục phải được chọn";
                if (empty($trang_thai)) $errors['trang_thai'] = "Trạng thái phải được chọn";
                // Xử lý ảnh đại diện
                $file_thump = uploadFile($anh_sp, './uploads/');
                if ($file_thump === false) {
                    $errors['anh_sp'] = "Không thể tải ảnh lên. Kiểm tra thư mục đích và quyền truy cập.";
                }

                // Kiểm tra nếu không có lỗi, tiến hành lưu sản phẩm
                if (empty($errors)) {
                    $san_pham_id = $this->modelSanPham->postData(
                        $ma_sp,
                        $file_thump,
                        $ten_sp,
                        $gia_nhap,
                        $gia_ban,
                        $gia_khuyen_mai,
                        $so_luong,
                        $mo_ta,
                        $mo_ta_chi_tiet,
                        $danh_muc_id,
                        $trang_thai
                    );

                    // Xử lý album ảnh nếu có
                    $img_array = $_FILES['img_array'];
                    if (!empty($img_array['name'])) {
                        foreach ($img_array['name'] as $index => $value) {
                            $file = [
                                'name' => $img_array['name'][$index],
                                'type' => $img_array['type'][$index],
                                'tmp_name' => $img_array['tmp_name'][$index],
                                'error' => $img_array['error'][$index],
                                'size' => $img_array['size'][$index],
                            ];
                            $hinh_anh = uploadFile($file, './uploads/');
                            $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $hinh_anh);
                        }
                    }
                    header('Location: ?act=san-phams');
                    exit();
                } else {
                    $_SESSION['errors'] = $errors;
                    header('Location: ?act=form-add-san-pham');
                    exit();
                }
            }
        }

        public function edit()
        {
            // Kiểm tra nếu modelDanhMuc và modelSanPham đã được khởi tạo
            if (!isset($this->modelDanhMuc) || !isset($this->modelSanPham)) {
                echo "Model chưa được khởi tạo";
                return;
            }

            // Lấy danh sách danh mục sản phẩm
            $danhMucs = $this->modelDanhMuc->getAll();


            // Kiểm tra sự tồn tại và hợp lệ của ID sản phẩm
            if (isset($_GET['san_pham_id']) && is_numeric($_GET['san_pham_id'])) {
                $id = $_GET['san_pham_id'];

                // Lấy chi tiết sản phẩm theo ID
                $sanPham = $this->modelSanPham->getDetailData($id);
                $anhSanPPhams = $this->modelSanPham->getDetailImage($id);
                if (!$sanPham) {
                    echo "Không tìm thấy sản phẩm";
                    return;
                }

                // Nếu tìm thấy sản phẩm, hiển thị form chỉnh sửa sản phẩm
                require_once 'views/sanphams/form_edit_san_pham.php';
            } else {
                // Kiểm tra giá trị của san_pham_id khi không hợp lệ
                echo "ID không hợp lệ. Giá trị hiện tại của san_pham_id: ";
                var_dump(isset($_GET['san_pham_id']) ? $_GET['san_pham_id'] : "Không có san_pham_id trong URL");
            }
        }

        public function update()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $san_pham_id = $_POST['san_pham_id'] ?? '';
                $san_pham_old = $this->modelSanPham->getDetailData($san_pham_id);
                $old_file = $san_pham_old['anh_sp'];

                $ma_sp = $_POST['ma_sp'] ?? '';
                $anh_sp = $_FILES['anh_sp'] ??  null;

                $ten_sp = $_POST['ten_sp'] ?? '';
                $gia_nhap = $_POST['gia_nhap'] ?? '';
                $gia_ban = $_POST['gia_ban'] ?? '';
                $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
                $so_luong = $_POST['so_luong'] ?? '';
                $mo_ta = $_POST['mo_ta'] ?? '';
                $mo_ta_chi_tiet = $_POST['mo_ta_chi_tiet'] ?? '';
                $danh_muc_id = $_POST['danh_muc_id'] ?? '';
                $trang_thai = $_POST['trang_thai'] ?? '';

                // Khởi tạo mảng lỗi
                $errors = [];
                if (empty($ma_sp)) $errors['ma_sp'] = "Mã sản phẩm không được để trống";
                if (empty($ten_sp)) $ten_sp['ten_sp'] = "Tên sản phẩm không được để trống";

                if (empty($gia_nhap)) $errors['gia_nhap'] = "Giá trị không được để trống";
                if (empty($gia_ban)) $errors['gia_ban'] = "Giá bán không được để trống";
                if (empty($so_luong)) $errors['so_luong'] = "Số lượng không được để trống";
                if (empty($mo_ta)) $errors['mo_ta'] = "Mô tả không được để trống";
                if (empty($mo_ta_chi_tiet)) $errors['mo_ta_chi_tiet'] = "Mô tả chi tiết không được để trống";
                if (empty($danh_muc_id)) $errors['danh_muc_id'] = "Danh mục phải được chọn";
                if (empty($trang_thai)) $errors['trang_thai'] = "Trạng thái phải được chọn";
                // Xử lý ảnh đại diện
                // var_dump($errors);
                // die;
                if (isset($anh_sp) && $anh_sp['error'] ==  UPLOAD_ERR_OK) {
                    $new_file = uploadFile($anh_sp, './uploads/');
                    if (!empty($old_file)) {
                        deleteFile($old_file);
                    }
                } else {
                    $new_file = $old_file;
                };

                // Kiểm tra nếu không có lỗi, tiến hành lưu sản phẩm
                if (empty($errors)) {

                    $san_pham_id = $this->modelSanPham->updateData(
                        $san_pham_id,
                        $ma_sp,
                        $new_file,
                        $ten_sp,
                        $gia_nhap,
                        $gia_ban,
                        $gia_khuyen_mai,
                        $so_luong,
                        $mo_ta,
                        $mo_ta_chi_tiet,
                        $danh_muc_id,
                        $trang_thai
                    );

                    // Xử lý album ảnh nếu có

                    header('Location: ?act=san-phams');
                    exit();
                } else {
                    $_SESSION['errors'] = $errors;
                    header('Location: ?act=form-edit-san-pham&id_san_pham=' . $san_pham_id);
                    exit();
                }
            }
        }


        public function show()
        {
            if (!isset($_GET['san_pham_id']) || !is_numeric($_GET['san_pham_id'])) {
                echo "ID không hợp lệ.";
                return;
            }

            $id = $_GET['san_pham_id'];
            $sanPhams = $this->modelSanPham->getDetailData($id);
            $binhLuans = $this->modelSanPham->getCommentFromProduct($id);
            if (!$sanPhams) {
                echo "Không tìm thấy sản phẩm nào";
                return;
            }

            require_once 'views/sanphams/show_san_pham.php';
        }

        public function updateTrangThaiBinhLuan1()
        {

            $id_binh_luan = $_POST['id_binh_luan'];

            $name_view = $_POST['name_view'];
            $nguoi_dung_id = $_POST['nguoi_dung_id'];

            $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);

            if ($binhLuan) {
                $trang_thai_up_date = '';
                if ($binhLuan['trang_thai'] == 1) {
                    $trang_thai_up_date = 2;
                } else {
                    $trang_thai_up_date = 1;
                }
                $status = $this->modelSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_up_date);

                if ($status) {
                    if ($name_view == 'detail_khach') {

                        header("Location:?act=chi-tiet-khach-hang&nguoi_dung_id=" . $nguoi_dung_id);
                        exit();
                    } else {

                        header("Location:?act=show-san-pham&san_pham_id=" . $binhLuan['san_pham_id']);
                        exit();
                    }
                }
            }
        }

        public function destroy()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['san_pham_id'];
                $this->modelSanPham->deleteData($id);
                header('Location: ?act=san-phams');
                exit();
            }
        }
    }
