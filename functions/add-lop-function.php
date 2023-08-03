<?php
// add-lop-function.php

// Kiểm tra xem form đã được submit chưa
if (isset($_POST['submit_lop'])) {
    //include tệp dbconfig.php
    require_once "../includes/dbconfig.php";

    // Kiểm tra biến kết nối CSDL $conn đã tồn tại và có giá trị không
    if (isset($conn) && !empty($conn)) {
        // Lấy thông tin từ form
        $lop_name = $_POST['lop_name'];
        $lop_info = $_POST['lop_info'];
        $lop_pass = $_POST['lop_pass'];

        // Lấy thời gian hiện tại của Việt Nam
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $lop_time = date('Y-m-d H:i:s');

        // Thực hiện truy vấn để thêm lớp học vào bảng lop
        $sql = "INSERT INTO lop (lop_name, lop_info, lop_pass, lop_time) VALUES ('$lop_name', '$lop_info', '$lop_pass', '$lop_time')";

        // Thực thi truy vấn
        if (mysqli_query($conn, $sql)) {
            echo "Thêm lớp học thành công!";
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }

        // Đóng kết nối
        mysqli_close($conn);
    } else {
        echo "Lỗi kết nối CSDL!";
    }
}
?>
