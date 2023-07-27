// Trong file order.js
// Tạo sự kiện onclick button "OrderNow" trong menu-function.php -> hiển thị ở menu.php
function orderNowClick() {
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    // Nếu chưa đăng nhập, hiển thị thông báo "Bạn chưa đăng nhập"
    // Nếu đã đăng nhập, chuyển hướng đến trang order.html bình thường
    var isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;
    if (!isLoggedIn) {
        alert("Bạn chưa đăng nhập");
    } else {
        //thay đổi cái order.html cho giao diện order.php sau
        window.location.href = "order.html";
    }
}
