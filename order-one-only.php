<?php
require_once "includes/dbconfig.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $foodName = $_POST['food_name'];
    $foodPrice = $_POST['food_price'];
    $trangthai = $_POST['trangthai'];
    $username = $_SESSION['username'];
    

    // Thực hiện insert dữ liệu vào bảng order-one-only
    $sql = "INSERT INTO order_one_only (food_name, trangthai, username, food_price) VALUES ('$foodName', '$trangthai', '$username', '$foodPrice')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Insert thành công
        echo "success";
    } else {
        // Lỗi khi insert
        echo "error";
        /*
        // Nếu có lỗi xảy ra, lấy ID của bản ghi vừa insert
        $getIdSql = "SELECT order_id FROM order_one_only WHERE food_name = '$foodName' AND trangthai = '$trangthai' AND username = '$username' AND food_price = '$foodPrice' ORDER BY order_id DESC LIMIT 1";
        $getIdResult = mysqli_query($conn, $getIdSql);

        if ($getIdResult && mysqli_num_rows($getIdResult) > 0) {
            $row = mysqli_fetch_assoc($getIdResult);
            $orderId = $row['order_id'];

            // Thực hiện xóa bản ghi vừa insert dựa vào ID
            $deleteSql = "DELETE FROM order_one_only WHERE order_id = '$orderId'";
            $deleteResult = mysqli_query($conn, $deleteSql);

            if ($deleteResult) {
                echo " - Dữ liệu đã bị xóa.";
            } else {
                echo " - Không thể xóa dữ liệu.";
            }
        }*/
    }
}
?>
