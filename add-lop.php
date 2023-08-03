<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Thêm lớp học</title>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="./css/css_template/add-food.css">
</head>
<body>

  <!-- Giao diện thêm lớp học -->
  <div class="main-container">
    <div class="main-forms">
      <a style="color:red; font-size:20px" href="admin.php">Trở về trang Admin</a>
      <div class="signup-form">
        <form class="sign-back" action="./functions/add-lop-function.php" method="POST" enctype="multipart/form-data">
          <h1>Thêm lớp học</h1>
          <div class="signup-row">
            <i class="fa"></i>
            <input type="text" name="lop_name" placeholder="Tên lớp">
          </div>
          <div class="signup-row">
            <i class="fa"></i>
            <input type="text" name="lop_info" placeholder="Thông tin lớp">
          </div>
          <div class="signup-row">
            <i class="fa"></i>
            <input type="password" name="lop_pass" placeholder="Mật khẩu">
          </div>
          <div class="signup-row">
            <br>
            <button type="submit" name="submit_lop" style="font-size: large">Thêm lớp học</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
