<?php
// functions.php

// Function hiển thị danh sách món ăn
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
            $lop_name = $row["lop_name"];
            $lop_time = $row["lop_time"];
            $lop_info = $row["lop_info"];
            $lop_pass = $row["lop_pass"]; // Thêm cột lop_pass trong CSDL để lưu mật khẩu điểm danh

            // Hiển thị thông tin món ăn theo mẫu HTML
            echo '<div class="food-menu-box">';
            echo '<div class="food-menu-img">';
            echo '<img src="images/Logo_HCMUP.png" class="img-responsive img-curve">';
            echo '</div>';

            echo '<div class="food-menu-desc">';
            echo '<h4>' . $lop_name . '</h4>';
            echo '<p class="food-price">' . $lop_time . '</p>';
            echo '<p class="food-detail">' . $lop_info . '</p>';

            // Thêm phần nhập mật khẩu điểm danh
            echo '<form action="functions/process_diemdanh.php" method="POST">';
            echo '<input type="password" name="password" placeholder="Mật khẩu điểm danh">';
            echo '<input type="hidden" name="lop_id" value="' . $row["lop_id"] . '">';
            echo '<button type="submit" name="submit">Điểm danh</button>';
            echo '</form>';

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

?>
