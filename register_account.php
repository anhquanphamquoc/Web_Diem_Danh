<?php
require_once "includes/dbconfig.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Tùy thuộc vào giá trị của trường "role", sử dụng bảng phù hợp
    $table_name = ($role === 'admin') ? "admin_accounts" : "student_accounts";

    // Thực hiện câu truy vấn để thêm tài khoản mới vào bảng tương ứng
    $sql = "INSERT INTO $table_name (username, pass) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        // Nếu thành công, chuyển hướng về trang đăng ký tài khoản và hiển thị thông báo
        header("Location: register.php?success=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
