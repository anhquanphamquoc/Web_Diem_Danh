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

// Sử dụng function kiểm tra tài khoản khi người dùng submit form đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Gọi function kiểm tra tài khoản
    $isValidAccount = kiemTraTaiKhoan($conn, $username, $password, $role);

    if ($isValidAccount) {
        // Thực hiện đăng nhập thành công, chuyển hướng đến trang dashboard tương ứng
        if ($role === 'admin') {
            header('Location: admin_dashboard.php');
        } elseif ($role === 'student') {
            header('Location: student_dashboard.php');
        }
        exit();
    } else {
        // Hiển thị thông báo lỗi đăng nhập không thành công
        return false;
    }
}
?>
