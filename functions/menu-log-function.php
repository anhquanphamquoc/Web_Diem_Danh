<?php
// functions.php

// Function hiển thị danh sách món ăn
function displayFoodMenu($conn)
{
    $sql = "SELECT * FROM foods ORDER BY food_id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $food_name = $row["food_name"];
            $food_price = $row["food_price"];
            $food_infor = $row["food_infor"];
            $food_image = $row["food_image"];

            echo '<div class="food-menu-box">';
            echo '<div class="food-menu-img">';
            echo '<img src="images/' . $food_image . '" alt="' . $food_name . '" class="img-responsive img-curve">';
            echo '</div>';

            echo '<div class="food-menu-desc">';
            echo '<h4>' . $food_name . '</h4>';
            echo '<p class="food-price">$' . $food_price . '</p>';
            echo '<p class="food-detail">' . $food_infor . '</p>';
            echo '<br>';
            // Thêm nút "Order Now" và thuộc tính data-foodname chứa tên món ăn
            echo '<a class="btn btn-primary btn-order" data-foodname="' . $food_name . '" data-foodprice="' . $food_price . '">Order Now</a>';
            echo '</div>';

            echo '</div>';
        }
    } else {
        echo "Không có dữ liệu món ăn.";
    }

    mysqli_close($conn);
}
?>
