<!-- add-food.php -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Thêm món ăn</title>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="./css/css_template/add-food.css">
</head>
<body>

  <!-- Giao diện thêm món ăn -->
  <div class="main-container">
    <div class="main-forms">
      <a style="color:red; font-size:20px" href="admin.php">Trở về trang Admin</a>
      <div class="signup-form">
        <form class="sign-back" id="addFoodForm" enctype="multipart/form-data">
          <h1>Thêm món ăn</h1>
          <div class="signup-row">
            <i class="fa"></i>
            <input type="text" name="food_name" placeholder="FOOD NAME">
          </div>
          <div class="signup-row">
            <i class="fa"></i>
            <input type="text" name="food_price" placeholder="FOOD PRICE">
          </div>
          <div class="signup-row">
            <i class="fa"></i>
            <input type="text" name="food_info" placeholder="FOOD INFO">
          </div>
          <div class="form-bottom">
            <input type="file" name="food_image" id="food_image">
          </div>
          <div class="signup-row">
            <br>
            <button type="button" style="font-size: 30px;" onclick="addFood()">Thêm món ăn</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
