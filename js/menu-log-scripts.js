// Tập tin menu-log-scripts.js

// Sử dụng biến username trong tập tin .js
console.log(username);

// Thực hiện các thao tác sau khi tài liệu HTML đã được tải hoàn toàn
$(document).ready(function() {
    // Bắt sự kiện khi người dùng nhấn nút "Order Now"
    $(".btn-order").on("click", function() {
        var foodName = $(this).data("foodname");
        var foodPrice = $(this).data("foodprice");
        var trangthai = 0; // Thêm thuộc tính trạng thái và gán giá trị trạng thái là 0
        
        var confirmation = confirm("Bạn có chắc chắn muốn đặt món " + foodName + " không?");
        
        if (confirmation === true) {
            // Chuỗi dữ liệu gửi lên máy chủ, bao gồm cả food_name, trangthai và username
            var data = "food_price=" + encodeURIComponent(foodPrice) + "&food_name=" + encodeURIComponent(foodName) + "&trangthai=" + encodeURIComponent(trangthai) + "&username=" + encodeURIComponent(username);
            
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "order-one-only.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                console.log("readyState: " + xhr.readyState);
                console.log("status: " + xhr.status);
                console.log("responseText: " + xhr.responseText);
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === "success") {
                            alert("Đặt món thành công!");
                        } else {
                            alert("Có lỗi xảy ra, vui lòng thử lại sau.");
                        }
                    } else {
                        alert("Có lỗi xảy ra, vui lòng thử lại sau.");
                    }
                }
            };
            xhr.send(data);
        } else {
            // Nếu người dùng không đồng ý đặt món, không làm gì cả
        }
    });
});
