<?php
session_start();
include "config.php";

if (!isset($_GET['product_Id'])) {
    echo "ไม่พบสินค้า";
    exit;
}

$product_Id = intval($_GET['product_Id']); // ป้องกัน SQL Injection

$sql = "SELECT * FROM product WHERE product_Id = $product_Id"; // แก้ id เป็น product_Id
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "ไม่พบสินค้า";
    exit;
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["product_Name"]; ?></title>
    <link rel="stylesheet" href="./css/dt.css">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-container">
            <ul class="nav-links">
                <li><a href="main_product_post.php">หน้าแรก</a></li>
                <li><a href="#">สินค้า</a></li>
                <li><a href="#">เกี่ยวกับเรา</a></li>
                <li><a href="#">ติดต่อ</a></li>
            </ul>
        </div>
    </nav>

    <main class="product-detail">
    <div class="product-container">
    
            <img src="uploads/<?php echo $row["Image"]; ?>" alt="<?php echo $row["product_Name"]; ?>">
            <h1><?php echo $row["product_Name"]; ?></h1>
            <p><?php echo $row["product_detail"]; ?></p>
            <p><strong>ราคา:</strong> <span class="price"><?php echo $row["product_price"]; ?></span> บาท</p>
            <p><strong>สินค้าแลกเปลี่ยน:</strong> <span class="exchange"><?php echo $row["Product_exchanged"]; ?></span></p>

        </div>
    
</main>


</body>
</html>
