// Tập tin menu-log-scripts.js


// Thực hiện các thao tác sau khi tài liệu HTML đã được tải hoàn toàn
$(document).ready(function() {
    // Bắt sự kiện khi người dùng nhấn nút "Order Now"
    $(".order-link").on("click", function() {
        alert("Bạn chưa đăng nhập!");
    });
});
