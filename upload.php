<?php
session_start();
include "config.php"; // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product-name'];
    $productDescription = $_POST['product-description'];
    $productPrice = $_POST['product-price'];
    $exchangeItem = $_POST['exchange-item'];

    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageName = !empty($_FILES["product-image"]["name"]) ? basename($_FILES["product-image"]["name"]) : NULL;
    $targetFile = $uploadDir . $imageName;

    if ($imageName) {
        $check = getimagesize($_FILES["product-image"]["tmp_name"]);
        if ($check !== false) {
            if (!move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFile)) {
                echo "<script>alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์'); window.location.href='index.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('ไฟล์ที่อัปโหลดไม่ใช่รูปภาพ'); window.location.href='index.php';</script>";
            exit;
        }
    }

    $sql = "INSERT INTO product (product_Name, product_detail, product_price, Product_exchanged, Image) 
            VALUES ('$productName', '$productDescription', '$productPrice', '$exchangeItem', '$imageName')";

    if (!is_numeric($_POST['product-price'])) {
         echo "<script>alert('กรุณากรอกราคาเป็นตัวเลขเท่านั้น'); window.history.back();</script>";
        exit;
}

    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จ!'); window.location.href='main_product_post.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . mysqli_error($conn) . "'); window.location.href='main_product_post.php';</script>";
    }

    mysqli_close($conn);
}
?>
