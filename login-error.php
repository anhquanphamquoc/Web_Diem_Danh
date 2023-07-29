<?php
// Kết nối đến CSDL XAMPP
/*
$conn = mysqli_connect("localhost", "root", "", "db_webdatmonan");

// Kiểm tra xem có lỗi kết nối không
if (!$conn) {
    die("Không thể kết nối đến CSDL: " . mysqli_connect_error());
}*/
require_once "./includes/dbconfig.php";

// Include file chứa function kiểm tra tài khoản
include './functions/kiemtradangnhap.php';

// Biến lưu trữ thông báo đăng nhập không thành công
$loginError = "";

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
            header('Location: admin.php');
        } elseif ($role === 'student') {
            header('Location: menu-log.php');
        }
        exit();
    } else {
        // Hiển thị thông báo lỗi đăng nhập không thành công
        header('Location: login-error.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="./css/css_template/login.css">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <h6 style="color:red">Đăng nhập không thành công</h6>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="row align-items-center remember">
                        <input type="radio" name="role" value="student" required> Student
                        <input type="radio" name="role" value="admin" required> Admin
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Chưa có tài khoản? Vui lòng liên hệ căn tin
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
