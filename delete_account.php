<?php
require_once "includes/dbconfig.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $role = $_POST["role"];

    // Tùy thuộc vào giá trị của trường "role", sử dụng bảng phù hợp
    $table_name = ($role === 'admin') ? "admin_accounts" : "student_accounts";

    // Thực hiện câu truy vấn để xóa tài khoản từ bảng tương ứng
    $sql = "DELETE FROM $table_name WHERE username = '$username'";
    if (mysqli_query($conn, $sql)) {
        // Nếu thành công, chuyển hướng về trang xóa tài khoản và hiển thị thông báo
        header("Location: register.php?deleted=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
