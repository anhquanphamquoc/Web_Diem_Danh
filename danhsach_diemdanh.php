<!-- danhsach_diemdanh.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách điểm danh</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="./css/css_template/style.css">
</head>

<body>
    
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.gif" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="admin.php">Home</a>
                    </li>
                    <li>
                        <a href="register.php">Sign Up/Delete</a>
                    </li>
                    <li>
                        <a href="add-lop.php">Add Class</a>
                    </li>
                    <li>
                        <a href="index.php">Log Out</a>
                    </li>
                    <li>
                        <a>
                            <?php
                            session_start();
                            if (isset($_SESSION['username'])) {
                                $username = $_SESSION['username'];
                                // Hiển thị 'username'
                                echo '<img src="./images/cat-icon.png" width="40px"> ' . $username;
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- Work List Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Danh sách đặt món</h2>

            <?php
            // Include tệp menu-function.php và dbconfig.php
            require_once "includes/dbconfig.php";
            require_once 'functions/admin-function.php';

            // Kiểm tra xem người dùng đã nhấn vào nút "Xem danh sách" tương ứng với lớp nào hay chưa
            if (isset($_GET['lop_id'])) {
                $lop_id = $_GET['lop_id'];

                // Gọi hàm hiển thị danh sách điểm danh dựa vào lop_id
                displayDiemDanhList($conn, $lop_id);
            } else {
                // Gọi hàm hiển thị danh sách món ăn
                displayFoodMenu($conn);
            }
            ?>

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="https://www.facebook.com/kesan.bongdem.79/"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="https://img.icons8.com/color/48/youtube-play.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
    <!-- Thêm javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>
