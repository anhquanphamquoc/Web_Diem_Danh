<?php
// add-food-action.php
require_once "dbconfig.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["food_name"]) && isset($_POST["food_price"]) && isset($_POST["food_info"])) {
  // Lấy thông tin món ăn từ form
  $food_name = $_POST["food_name"];
  $food_price = $_POST["food_price"];
  $food_info = $_POST["food_info"];

  // Kiểm tra xem đã chọn hình ảnh hay chưa
  if (isset($_FILES["food_image"])) {
    $file_name = $_FILES["food_image"]["name"];
    $file_tmp = $_FILES["food_image"]["tmp_name"];
    $file_destination = "./images/" . $file_name;

    // Di chuyển hình ảnh vào thư mục "images"
    move_uploaded_file($file_tmp, $file_destination);

    // TODO: Thực hiện lưu thông tin vào cơ sở dữ liệu (ví dụ: sử dụng MySQLi)

    // Kiểm tra kết nối
    if ($conn->connect_error) {
      die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Chuẩn bị truy vấn SQL
    $sql = "INSERT INTO foods (food_name, food_price, food_image, food_info) VALUES ('$food_name', '$food_price', '$file_destination', '$food_info')";

    // Thực hiện truy vấn
    if ($conn->query($sql) === TRUE) {
      echo "success";
    } else {
      echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
  }
}
?>
