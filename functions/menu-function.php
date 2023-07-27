<?php
// functions.php

// functions hiển thị danh sách món ăn
function displayFoodMenu($conn)
{
    // Bước 3: Truy vấn dữ liệu từ CSDL theo ID giảm dần
    $sql = "SELECT * FROM foods ORDER BY food_id DESC";

    // Thực thi truy vấn
    $result = mysqli_query($conn, $sql);

    // Kiểm tra và xử lý kết quả trả về
    if (mysqli_num_rows($result) > 0) {
        // Lặp qua từng hàng dữ liệu
        while ($row = mysqli_fetch_assoc($result)) {
            // Lấy thông tin món ăn
            $food_name = $row["food_name"];
            $food_price = $row["food_price"];
            $food_infor = $row["food_infor"];
            $food_image = $row["food_image"];

            // Hiển thị thông tin món ăn theo mẫu HTML
            echo '<div class="food-menu-box">';
            echo '<div class="food-menu-img">';
            echo '<img src="images/' . $food_image . '" alt="' . $food_name . '" class="img-responsive img-curve">';
            echo '</div>';

            echo '<div class="food-menu-desc">';
            echo '<h4>' . $food_name . '</h4>';
            echo '<p class="food-price">$' . $food_price . '</p>';
            echo '<p class="food-detail">' . $food_infor . '</p>';
            echo '<br>';
            echo '<a href="order.html" class="btn btn-primary">Order Now</a>';
            echo '</div>';

            echo '</div>';
        }
    } else {
        echo "Không có dữ liệu món ăn.";
    }

    // Đóng kết nối (nếu bạn muốn sử dụng function này độc lập, hãy thêm dòng này)
    mysqli_close($conn);
}
?>

<!-- Include file order.js -->
<script src="../js/order.js"></script>