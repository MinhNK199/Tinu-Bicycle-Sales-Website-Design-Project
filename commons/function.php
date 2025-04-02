<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
    
}
function formatDate($date) {
    return date('d-m-Y', strtotime($date));
}

function deleteSessionError() {
    if (isset($_SESSION['flash'])) {
        //huy session sau khi tai trang
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
        // session_destroy();
    }
}
function uploadFile($file, $folderUpload)
{
    // Kiểm tra nếu thư mục upload chưa tồn tại, tạo mới thư mục
    if (!file_exists(PATH_ROOT . $folderUpload)) {
        mkdir(PATH_ROOT . $folderUpload, 0777, true);
    }

    // Tạo đường dẫn lưu trữ tạm thời cho file
    $pathStorage = $folderUpload . time() . $file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    // Thực hiện di chuyển file từ thư mục tạm đến thư mục đích
    if (move_uploaded_file($from, $to)) {
        return $pathStorage; // Trả về đường dẫn nếu upload thành công
    } else {
        return false; // Trả về false nếu upload thất bại
    }
}
function checkLoginAdmin() {
    
    if (!isset($_SESSION['user_admin'])) {
        // Đường dẫn đến trang đăng nhập admin
        require_once "views/auth/formlogin.php";
        exit();
    }
}

function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}