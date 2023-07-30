<?php
require_once "includes/dbconfig.php";

function getOrderDetails($conn)
{
    $sql = "SELECT * FROM order_one_only ORDER BY order_one_only_id DESC";// Sắp xếp các order theo thứ tự giảm dần của order_one_only_id
    $result = mysqli_query($conn, $sql);

    // Kiểm tra và xử lý kết quả trả về
    if ($result && mysqli_num_rows($result) > 0) {
        while ($order_details = mysqli_fetch_assoc($result)) {
            $order_id = $order_details['order_one_only_id'];
            $username = $order_details['username'];
            $food_price = $order_details['food_price'];
            $food_name = $order_details['food_name'];
            $trangthai = $order_details['trangthai'];

            // Kiểm tra giá trị trangthai để xác định background color
            $background_color = ($trangthai == 0) ? "red" : "green";

            echo '<div class="food-menu-box" style="background-color: ' . $background_color . ';">';
            echo '<div class="food-menu-img">';
            echo '<img src="images/food_image.jpg" alt="' . $username . '" class="img-responsive img-curve">';
            echo '</div>';

            echo '<div class="food-menu-desc">';
            echo '<h4>' . $username . '</h4>';
            echo '<p class="food-price">$' . $food_price . '</p>';
            echo '<p class="food-detail">' . $food_name . '</p>';
            echo '<br>';
            // Thêm nút bấm để cập nhật trạng thái trangthai khi bấm vào
            echo '<a class="btn btn-primary" onclick="updateOrderStatus(' . $order_id . ')">Xác nhận</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Không tìm thấy thông tin đơn hàng.";
    }

    mysqli_close($conn);
}
?>
