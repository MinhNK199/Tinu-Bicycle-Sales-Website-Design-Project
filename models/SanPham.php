<?php

class SanPham
{
    private $conn;
    private $error;

    // Kết nối CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY id DESC limit 8';


            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy danh sách sản phẩm: " . $e->getMessage());
            return [];
        }
    }


    public function insertComment($san_pham_id, $nguoi_dung_id, $noi_dung, $ngay_bl, $trang_thai)
    {
        try {
            $sql = "INSERT INTO binh_luans (san_pham_id, nguoi_dung_id, noi_dung, ngay_bl,trang_thai) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);

            var_dump([$san_pham_id, $nguoi_dung_id, $noi_dung, $ngay_bl, $trang_thai]); // Thêm dòng này để kiểm tra các giá trị

            $stmt->execute([$san_pham_id, $nguoi_dung_id, $noi_dung, $ngay_bl, $trang_thai]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            error_log("Lỗi khi thêm bình luận: " . $e->getMessage());
            return false;
        }
    }

    public function getProductById($san_pham_id)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $san_pham_id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy chi tiết sản phẩm: " . $e->getMessage());
        }
    }

    public function getError()
    {
        return $this->error;
    }
    public function getActivePromoCodes()
    {
        try {
            $currentDate = date('Y-m-d');
            $sql = "
            SELECT
                id, 
                ten_khuyen_mai, 
                ma_khuyen_mai, 
                ngay_ket_thuc,
                gia_tri,
                trang_thai 
            FROM 
                khuyen_mais 
            WHERE 
                (trang_thai = 1 ) 
                AND ngay_ket_thuc >= :currentDate
        ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':currentDate', $currentDate);
            $stmt->execute();

            // Trả về mảng chứa dữ liệu
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi getActivePromoCodes: " . $e->getMessage());
            return [];
        }
    }

    public function getDetailData($id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy chi tiết sản phẩm: " . $e->getMessage());
            return false;
        }
    }
    public function getDetailImage($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams                           
                    WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy hình ảnh sản phẩm: " . $e->getMessage());
            return false;
        }
    }
    public function getCommentFromProduct($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, nguoi_dungs.ten_nguoi_dung 
                    FROM binh_luans
                    INNER JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id
                    WHERE binh_luans.san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy danh sách bình luận: " . $e->getMessage());
            return [];
        }
    }
    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();
            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['vai_tro'] == 0) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    } else {
                        return "Tài khoản bị cấm";
                    }
                } else {
                    return "Tài khoản không có quyền đăng nhập";
                }
            } else {
                return "Sai tài khoản hoặc mật sai";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getListSanPhamCungDanhMuc($danh_muc_id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams 
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                WHERE san_phams.danh_muc_id = :danh_muc_id 
                LIMIT 2'; // Thêm LIMIT 1 để chỉ lấy một sản phẩm
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy danh sách sản phẩm: " . $e->getMessage());
            return [];
        }
    }

    // do ra du lieu moi nhat
    public function getAll2()
    {
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY id DESC';


            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy danh sách sản phẩm: " . $e->getMessage());
            return [];
        }
    }
    // tim kiem
    public function search($search)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE ten_sp LIKE :search OR gia_ban LIKE :search OR danh_muc_id LIKE :search";
            $stmt = $this->conn->prepare($sql);
            $searchParam = '%' . $search . '%';
            $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function search2($search2)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE ten_sp LIKE :search2 OR gia_ban LIKE :search2 OR danh_muc_id LIKE :search2";
            $stmt = $this->conn->prepare($sql);
            $search2Param = '%' . $search2 . '%';
            $stmt->bindParam(':search2', $search2Param, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function Rangskik()
    {
        try {
            $sql = "SELECT * FROM san_phams ORDER BY gia_ban DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function Rangskikhai()
    {
        try {
            $sql = "SELECT * FROM san_phams ORDER BY gia_ban ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function Rangskik2()
    {
        try {
            $sql = "SELECT * FROM san_phams ORDER BY gia_ban DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function Rangskikhai2()
    {
        try {
            $sql = "SELECT * FROM san_phams ORDER BY gia_ban ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }

    public function Rangskik3(): array
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE danh_muc_id = 9";
            $stmt = $this->conn->prepare(query: $sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }

    public function Rangskikhai3(): array
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE danh_muc_id = 1";
            $stmt = $this->conn->prepare(query: $sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function Rangskikhaii3(): array
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE danh_muc_id = 10";
            $stmt = $this->conn->prepare(query: $sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e";
        }
    }
    public function reduceProductQuantity($san_pham_id, $so_luong_ban)
    {
        try {
            $sql = "UPDATE san_phams 
                    SET so_luong = so_luong - :so_luong_ban 
                    WHERE id = :san_pham_id AND so_luong >= :so_luong_ban";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':so_luong_ban' => $so_luong_ban
            ]);

            // Kiểm tra xem số lượng đã được giảm hay chưa
            if ($stmt->rowCount() > 0) {
                return true; // Thành công
            } else {
                return false; // Không đủ số lượng hoặc lỗi khác
            }
        } catch (PDOException $e) {
            error_log("Lỗi giảm số lượng sản phẩm: " . $e->getMessage());
            return false;
        }
    }
    public function increaseProductQuantity($san_pham_id, $so_luong_them)
    {
        try {
            $sql = "UPDATE san_phams SET so_luong = so_luong + :so_luong_them WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':so_luong_them' => $so_luong_them,
                ':san_pham_id' => $san_pham_id
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi tăng số lượng sản phẩm: " . $e->getMessage());
            return false;
        }
    }

    public function getSanPhamFromId($san_pham_id)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id' => $san_pham_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn-san-pham-id: " . $e->getMessage());
            return false;
        }
    }
}
