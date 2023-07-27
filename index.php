<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Trang đặt món ăn</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
  require_once "includes/dbconfig.php";
  require_once "includes/functions.php";
  ?>
  <!-- Giao diện trang chủ -->
  <?php include "menu.php"; ?>
  <!-- Giao diện đăng nhập -->
  <?/*php include "login.php"; */?> 
  <!-- Giao diện hiển thị giỏ hàng -->
  <?php include "cart.php"; ?>
  <!-- Giao diện đặt hàng -->
  <?php include "orders.php"; ?>
</body>
</html>
