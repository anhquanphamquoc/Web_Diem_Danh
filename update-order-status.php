<?php
require_once "includes/dbconfig.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $orderId = $_POST['order_id'];
    $trangthai = $_POST['trangthai'];

    // Cập nhật trạng thái của order trong cơ sở dữ liệu
    $sql = "UPDATE order_one_only SET trangthai = '$trangthai' WHERE order_one_only_id = '$orderId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Cập nhật thành công
        echo "success";
    } else {
        // Lỗi khi cập nhật
        echo "error";
    }
}
?>
