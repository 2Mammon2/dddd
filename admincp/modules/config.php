<?php
    // Thông tin cấu hình
    $tenmaychu = 'localhost';
    $tentaikhoan = 'root';
    $pass = '';
    $csdl = 'demo';

    // Kết nối với cơ sở dữ liệu
    $conn = mysqli_connect($tenmaychu, $tentaikhoan, $pass, $csdl);

    // Kiểm tra kết nối
    if (!$conn) {
        die('Không thể kết nối đến MySQL: ' . mysqli_connect_error());
    }

    echo 'Kết nối thành công với cơ sở dữ liệu!';
?>
