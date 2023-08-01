// add-food.js

function addFood() {
    var form = document.getElementById("addFoodForm");
    var formData = new FormData(form);
  
    // Gửi yêu cầu xác nhận trước khi thêm món ăn
    if (confirm("Bạn có chắc chắn muốn thêm món ăn không?")) {
      // Thực hiện gửi dữ liệu lên server nếu xác nhận
      var request = new XMLHttpRequest();
      request.open("POST", "../functions/add-food-action.php");
      request.send(formData);
  
      // Xử lý sự kiện khi nhận được phản hồi từ server (nếu cần)
      request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
          // Xử lý phản hồi từ server (nếu cần)
          alert("Món ăn đã được thêm thành công!");
          window.location.href = "admin.php"; // Chuyển về trang admin sau khi thêm thành công
        }
      };
    }
  }
  