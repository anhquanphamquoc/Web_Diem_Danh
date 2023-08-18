<?php
// functions/admin-function.php

// Hàm đếm số lượng lớp học trong CSDL
function countClass($conn)
{
    $sql = "SELECT COUNT(*) AS total FROM lop";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Hàm lấy danh sách lớp học dựa vào vị trí bắt đầu và số lượng lớp học trên mỗi trang
function getClassList($conn, $start_index, $items_per_page)
{
    $sql = "SELECT * FROM lop ORDER BY lop_id DESC LIMIT $start_index, $items_per_page";
    $result = mysqli_query($conn, $sql);
    $class_list = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $class_list[] = $row;
    }
    return $class_list;
}

// Hàm hiển thị danh sách lớp học
function displayClassList($class_list)
{
    foreach ($class_list as $class) {
        // Lấy thông tin lớp học
        $class_id = $class["lop_id"]; // Lấy lop_id
        $class_name = $class["lop_name"];
        $class_time = $class["lop_time"];
        $class_info = $class["lop_info"];

        // Hiển thị thông tin lớp học theo mẫu HTML
        echo '<div class="food-menu-box">';
        echo '<div class="food-menu-img">';
        echo '<img src="images/Logo_HCMUP.png" class="img-responsive img-curve">';
        echo '</div>';

        echo '<div class="food-menu-desc">';
        echo '<h4>' . $class_name . '</h4>';
        echo '<p class="food-price">' . $class_time . '</p>';
        echo '<p class="food-detail">' . $class_info . '</p>';
        echo '<br>';
        // Thêm lop_id vào URL để gửi thông tin lop_id khi nhấn nút "Xem danh sách"
        echo '<a class="btn btn-primary" href="danhsach_diemdanh.php?lop_id=' . $class_id . '">Xem danh sách</a>';
        echo '</div>';

        echo '</div>';
    }
}

// Hàm hiển thị danh sách điểm danh dựa vào lop_id
function displayDiemDanhList($conn, $lop_id)
{
    // Truy vấn danh sách điểm danh dựa vào lop_id
    $sql = "SELECT * FROM diemdanh WHERE lop_id = $lop_id";

    // Thực thi truy vấn
    $result = mysqli_query($conn, $sql);

    // Kiểm tra và xử lý kết quả trả về
    if (mysqli_num_rows($result) > 0) {
        // Lặp qua từng hàng dữ liệu
        while ($row = mysqli_fetch_assoc($result)) {
            // Lấy thông tin điểm danh
            $username = $row["username"];
            $lop_name = $row["lop_name"];
            $lop_time = $row["lop_time"];
            $diemdanh_time = $row["diemdanh_time"];

            // Hiển thị thông tin điểm danh theo mẫu HTML giống food-menu-box
            echo '<div class="food-menu-box">';
            echo '<div class="food-menu-img">';
            echo '<img src="images/People.gif" class="img-responsive img-curve">';
            echo '</div>';

            echo '<div class="food-menu-desc">';
            echo '<h4>' . $lop_name . '</h4>';
            echo '<p class="food-price">' . $lop_time . '</p>';
            echo '<p class="food-detail">Thời gian điểm danh: ' . $diemdanh_time . '</p>';
            echo '<br>';
            echo '<p><strong>Username:</strong> ' . $username . '</p>';
            echo '</div>';

            echo '</div>';
        }
    } else {
        echo "Không có dữ liệu điểm danh.";
    }
}
?>
