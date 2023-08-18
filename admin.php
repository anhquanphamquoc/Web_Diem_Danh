<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="./css/css_template/style.css">
</head>

<body>
    
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logoWeb.jpg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <div style="align: center width: 10px">
                <img src="images/webDiemDanh.png" alt="">
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
                                echo '<img src="./images/icons8-admin-50.png" width="40px"> ' . $username;
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
            <h2 class="text-center">Danh sách lớp</h2>

            <?php
            //include tệp dbconfig.php và các function
            require_once "includes/dbconfig.php";
            require_once 'functions/admin-function.php';

            // Kiểm tra số trang hiện tại (mặc định là 1)
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

            // Số lượng lớp học hiển thị trên mỗi trang
            $items_per_page = 4;

            // Lấy tổng số lớp học trong CSDL
            $total_items = countClass($conn);

            // Tính toán tổng số trang dựa vào tổng số lớp học và số lượng lớp học trên mỗi trang
            $total_pages = ceil($total_items / $items_per_page);

            // Tính toán vị trí bắt đầu của dữ liệu trên trang hiện tại
            $start_index = ($current_page - 1) * $items_per_page;

            // Lấy danh sách lớp học dựa vào vị trí bắt đầu và số lượng lớp học trên mỗi trang
            $class_list = getClassList($conn, $start_index, $items_per_page);

            // Hiển thị danh sách lớp học
            displayClassList($class_list);

            // Hiển thị phân trang
            if ($total_pages > 1) {
                echo '<div class="pagination">';
                if ($current_page > 1) {
                    echo '<a href="admin.php?page=' . ($current_page - 1) . '">Previous </a>';
                }
                for ($page = 1; $page <= $total_pages; $page++) {
                    echo '<a href="admin.php?page=' . $page . '"';
                    if ($page == $current_page) {
                        echo ' class="active"';
                    }
                    echo '>' .  '</a>';
                }
                if ($current_page < $total_pages) {
                    echo '<a href="admin.php?page=' . ($current_page + 1) . '"> Next </a>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </section>
    <!-- Work List Section Ends Here -->

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
