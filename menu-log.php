<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang web điểm danh</title>
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
            <div style="align: center">
                <img src="images/webDiemDanh.png" alt="">
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="menu-log.php">Home</a>
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
                                echo '<img src="./images/icons8-user-50.png" width="40px"> ' . $username;
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

    <!-- fOOD sEARCH Section Starts Here -->
    <!-- <section class="food-search text-center">
        <div class="container">
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Tìm lớp học.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section> -->
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <!-- <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <a href="category-foods.html">
                <div class="box-3 float-container">
                    <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">
                    <h3 class="float-text text-white">Pizza</h3>
                </div>
            </a>

            <a href="#">
                <div class="box-3 float-container">
                    <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve">
                    <h3 class="float-text text-white">Burger</h3>
                </div>
            </a>

            <a href="#">
                <div class="box-3 float-container">
                    <img src="images/momo.jpg" alt="Momo" class="img-responsive img-curve">
                    <h3 class="float-text text-white">Momo</h3>
                </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section> -->
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Danh sách lớp</h2>

            <?php
            //include tệp menu-log-function.php
            require_once "includes/dbconfig.php";
            require_once "functions/menu-log-function.php";
            // Hiển thị danh sách món ăn
            displayFoodMenu($conn);
            ?>

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="#">Hiển thị tất cả lớp</a>
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
            <p>All rights reserved. Designed By <a href="#">Neko</a></p>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- footer Section Ends Here -->
    <?php
        session_start();
        if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        }
    ?>
    <!-- Thêm mã JavaScript -->
    <!-- Start Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    session_start();
    $username = $_SESSION['username'];
    ?>
    <script type="text/javascript">
        var username = "<?php echo $username; ?>";
    </script>
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/menu-log-scripts.js"></script>
    <!-- End Scripts -->
</body>
</html>
