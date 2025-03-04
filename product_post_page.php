<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างโพสต์สินค้า</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
        <script src="./js/scriptppp.js"></script>

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

    <div class="container">
        <div class="signup-box">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                
                <main>
                <div class="image-upload">
                          <label for="file-input">
                           <div class="placeholder">+</div>
                           </label>
                     <input type="file" id="file-input" name="product-image" accept="image/*" style="display: none;">
                       <img id="preview-image" src="" alt="ตัวอย่างรูปภาพ" style="display: none; width: 200px; margin-top: 10px;">
                 <p>ใส่รูปที่ต้องการโพสต์สินค้า</p>
            </div>


                    <div class="form-inputs">
                        <div class="input-group">
                            <label for="product-name">ชื่อสินค้า</label>
                            <input type="post" id="product-name" name="product-name" required>
                        </div>
                        <div class="input-group">
                            <label for="product-description">รายละเอียดสินค้า</label>
                            <textarea  type="post"  id="product-description" name="product-description" required></textarea>
                        </div>
                        <div class="input-group">
                            <label for="product-price">ราคาสินค้า (ถ้ามี)</label>
                            <input type="post" type = "number" id="product-price" name="product-price" step="0.01" required >
                        </div>
                        <div class="input-group">
                            <label for="exchange-item">สินค้าที่ต้องการแลกเปลี่ยน</label>
                            <input type="post" id="exchange-item" name="exchange-item">
                        </div>
                    </div>
                    
                    <div class="buttons">
                        <button type="submit" class="confirm">ยืนยัน</button>
                        <button type="button" class="cancel">ยกเลิก</button>
                    </div>
                </main>

            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
