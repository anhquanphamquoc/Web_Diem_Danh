<?php
// functions.php

// functions hiển thị danh sách món ăn
function displayFoodMenu($conn)
{
    // Bước 3: Truy vấn dữ liệu từ CSDL theo ID giảm dần
    $sql = "SELECT * FROM lop ORDER BY lop_id DESC";

    // Thực thi truy vấn
    $result = mysqli_query($conn, $sql);

    // Kiểm tra và xử lý kết quả trả về
    if (mysqli_num_rows($result) > 0) {
        // Lặp qua từng hàng dữ liệu
        while ($row = mysqli_fetch_assoc($result)) {
            // Lấy thông tin món ăn
            $class_name = $row["lop_name"];
            $class_time = $row["lop_time"];
            $class_info = $row["lop_info"];

            // Hiển thị thông tin món ăn theo mẫu HTML
            echo '<div class="food-menu-box">';
            echo '<div class="food-menu-img">';
            echo '<img src="images/icon_GG.png" class="img-responsive img-curve">';
            echo '</div>';

            echo '<div class="food-menu-desc">';
            echo '<h4>' . $class_name . '</h4>';
            echo '<p class="food-price">' . $class_time . '</p>';
            echo '<p class="food-detail">' . $class_info . '</p>';
            echo '<br>';
            // id="order-link" là để hiện thông báo bạn chưa đăng nhập trong script của menu.php
            echo '<a class="btn btn-primary" id="order-link">Điểm danh</a>';
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

