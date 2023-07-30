// Function để cập nhật trạng thái của order
function updateOrderStatus(orderId) {
    // Chuỗi dữ liệu gửi lên máy chủ, bao gồm order_id và trạng thái mới (1)
    var data = "order_id=" + orderId + "&trangthai=1";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update-order-status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response === "success") {
                    alert("Cập nhật trạng thái thành công!");
                    // Tùy chỉnh lại giao diện hoặc load lại trang nếu cần thiết
                } else {
                    alert("Có lỗi xảy ra, vui lòng thử lại sau.");
                }
            } else {
                alert("Có lỗi xảy ra, vui lòng thử lại sau.");
            }
        }
    };
    xhr.send(data);
}
