<?php
require_once "includes/dbconfig.php";

function getOrderDetails($conn)
{
    $sql = "SELECT orders.order_id, student_accounts.username, GROUP_CONCAT(order_items.foods) AS foods, SUM(orders.total_price) AS total_price, orders.trangthai
            FROM orders
            INNER JOIN student_accounts ON orders.student_id = student_accounts.student_id
            INNER JOIN order_items ON orders.order_id = order_items.order_id
            GROUP BY orders.order_id
            ORDER BY orders.order_id DESC"; // Sắp xếp các order theo thứ tự giảm dần của order_id
    $result = mysqli_query($conn, $sql);

    // Kiểm tra và xử lý kết quả trả về
    if ($result && mysqli_num_rows($result) > 0) {
        while ($order_details = mysqli_fetch_assoc($result)) {
            $order_id = $order_details['order_id'];
            $username = $order_details['username'];
            $total_price = $order_details['total_price'];
            $foods = $order_details['foods'];
            $trangthai = $order_details['trangthai'];

            // Kiểm tra giá trị trangthai để xác định background color
            $background_color = ($trangthai == 0) ? "red" : "green";

            echo '<div class="food-menu-box" style="background-color: ' . $background_color . ';">';
            echo '<div class="food-menu-img">';
            echo '<img src="images/food_image.jpg" alt="' . $username . '" class="img-responsive img-curve">';
            echo '</div>';

            echo '<div class="food-menu-desc">';
            echo '<h4>' . $username . '</h4>';
            echo '<p class="food-price">$' . $total_price . '</p>';
            // Tách danh sách các món ăn thành mảng
            $foods_array = explode(",", $foods);

            // In ra danh sách các món ăn
            echo '<p class="food-detail">Danh sách món ăn:<br>';
            foreach ($foods_array as $food) {
                echo '- ' . trim($food) . '<br>';
            }
            echo '</p>';
            echo '</div>';

            // Thêm nút bấm để cập nhật trạng thái trangthai khi bấm vào
            echo '<button onclick="updateOrderStatus(' . $order_id . ')">Cập nhật trạng thái</button>';

            echo '</div>';
        }
    } else {
        echo "Không tìm thấy thông tin đơn hàng.";
    }

    mysqli_close($conn);
}
