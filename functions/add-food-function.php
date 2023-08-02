<?php
// Include file dbconfig.php để có thể sử dụng các biến kết nối cơ sở dữ liệu
require_once "dbconfig.php";

if (isset($_POST['submit_food'])) {
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $food_info = $_POST['food_info'];

    // Xử lý và lưu hình ảnh vào thư mục "images"
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["food_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $newFileName = $target_dir . "food_" . time() . "." . $imageFileType;

    if (move_uploaded_file($_FILES["food_image"]["tmp_name"], $newFileName)) {
        // Lưu thông tin món ăn vào cơ sở dữ liệu
        $sql = "INSERT INTO foods (food_name, food_price, food_image, food_info) 
                VALUES ('$food_name', '$food_price', '$newFileName', '$food_info')";
        if (mysqli_query($conn, $sql)) {
            echo "Thêm món ăn thành công!";
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    } else {
        echo "Có lỗi khi tải lên hình ảnh.";
    }
}
?>
