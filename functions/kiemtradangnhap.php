<?php
// Hàm kiểm tra tài khoản
function kiemTraTaiKhoan($conn, $username, $password, $role)
{
    // Chuyển mật khẩu thành chuỗi đã mã hóa (ví dụ: MD5, SHA-256,...)
    // Trong thực tế, nên sử dụng mã hóa an toàn hơn như bcrypt
    $hashed_password = md5($password);

    // Kiểm tra vai trò người dùng (admin hay sinh viên)
    if ($role === 'admin') {
        $table_name = 'admin_accounts';
    } elseif ($role === 'student') {
        $table_name = 'student_accounts';
    } else {
        // Nếu vai trò không hợp lệ, không kiểm tra và trả về lỗi
        return false;
    }

    // Thực hiện truy vấn SQL để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM $table_name WHERE username = '$username' AND password = '$hashed_password'";

    // Thực thi truy vấn
    $result = mysqli_query($conn, $sql);

    // Kiểm tra và xử lý kết quả trả về
    if (mysqli_num_rows($result) > 0) {
        // Đăng nhập thành công, trả về true
        return true;
    } else {
        // Đăng nhập không thành công, trả về false
        return false;
    }
}
?>
