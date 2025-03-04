<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสินค้า</title>
    <link rel="stylesheet" href="./css/mpp.css">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-container">
            <ul class="nav-links">
                <li><a href="#">หน้าแรก</a></li>
                <li><a href="#">สินค้า</a></li>
                <li><a href="#">เกี่ยวกับเรา</a></li>
                <li><a href="#">ติดต่อ</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="add-item" id="addItemButton" onclick="location.href='product_post_page.php'"> 
            <div class="placeholder">
                <span>+</span> 
            </div>
        </div>

        <div class="item-list">
            <?php
            // ดึงข้อมูลสินค้าจากฐานข้อมูล
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="item">';
                    echo '<a href="product_detail.php?product_Id='.$row["product_Id"].'">'; // เปลี่ยนเป็น product_Id
                    echo '<img src="uploads/'.$row["Image"].'" alt="'.$row["product_Name"].'">';
                    echo '<h2>'.$row["product_Name"].'</h2>';
                    echo '</a>';
                    echo '<p><strong>ราคา:</strong> '.$row["product_price"].' บาท</p>';
                    echo '<p><strong>สินค้าแลกเปลี่ยน:</strong> '.$row["Product_exchanged"].'</p>';
                    echo '<div class="like-button"></div>';
                    echo '</div>';
                }
            } else {
                echo "<p>ไม่มีสินค้าในระบบ</p>";
            }

            // ปิดการเชื่อมต่อฐานข้อมูล
            $conn->close();
            ?>
        </div>
    </main>

</body>
</html>
