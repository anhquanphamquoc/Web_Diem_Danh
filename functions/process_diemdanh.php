<?php
// process_diemdanh.php
require_once "../includes/dbconfig.php";

// Đặt múi giờ mặc định cho script
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_POST['submit'])) {
    // Lấy thông tin được gửi từ form điểm danh
    $lop_id = $_POST['lop_id'];
    $password = $_POST['password'];
    $lop_time = $_POST['lop_time'];

    // Thực hiện kết nối CSDL (Đảm bảo bạn có kết nối CSDL ở đây)

    // Lấy thông tin lớp học từ CSDL dựa vào lop_id
    $sql = "SELECT * FROM lop WHERE lop_id = $lop_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Lớp học được tìm thấy
        $row = mysqli_fetch_assoc($result);
        $lop_pass = $row['lop_pass'];
        $lop_name = $row['lop_name']; // Thêm lop_name vào để kiểm tra

        $lop_id = $row['lop_id'];

        // Kiểm tra mật khẩu điểm danh
        if ($password === $lop_pass) {
            // Mật khẩu điểm danh chính xác, xử lý việc điểm danh ở đây
            // Ví dụ: ghi lại thông tin điểm danh vào CSDL hoặc thực hiện các thao tác khác

            // Lấy thông tin người dùng từ session (đã lưu ở trang đăng nhập)
            session_start();
            $username = $_SESSION['username'];

            // Kiểm tra xem username đã điểm danh hay chưa
            $sql_check_diemdanh = "SELECT * FROM diemdanh WHERE username = '$username' AND lop_id = '$lop_id'";
            $result_check_diemdanh = mysqli_query($conn, $sql_check_diemdanh);

            if (mysqli_num_rows($result_check_diemdanh) > 0) {
                // Người dùng đã điểm danh
                echo "Bạn đã điểm danh rồi.";
            } else {
                // Lấy thông tin lớp học từ CSDL
                $lop_time = $row['lop_time'];

                // Lưu thông tin điểm danh vào bảng diemdanh
                $diemdanh_time = date("Y-m-d H:i:s"); // Lấy thời gian hiện tại
                $sql_insert = "INSERT INTO diemdanh (username, lop_name, lop_time, diemdanh_time, lop_id) VALUES ('$username', '$lop_name', '$lop_time', '$diemdanh_time', '$lop_id')";
                mysqli_query($conn, $sql_insert);

                echo "Điểm danh thành công!";
            }
        } else {
            // Mật khẩu điểm danh không chính xác
            echo "Mật khẩu điểm danh không đúng.";
        }
    } else {
        // Lớp học không tồn tại
        echo "Lớp học không tồn tại.";
    }

    // Đóng kết nối CSDL (Đảm bảo bạn đã đóng kết nối ở đây)
}
?>
