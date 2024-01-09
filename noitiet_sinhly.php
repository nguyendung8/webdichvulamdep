<?php
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Viên uống nội tiết, sinh lý</title>
    <style>
        .box-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin: 50px 100px;
        }
        .box {
        }
        .name {
            font-size: 19px;
            font-weight: 600;
        }
        .product_item {
            display: flex;
            gap: 50px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 23px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }
        .price {
            font-size: 18px;
            color: red;
            margin-top: 3px;
        }
        .origin {
            font-size: 18px;
            margin-top: 3px;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="box-container">
      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `mathang` WHERE danhmuchang = 3") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
               <div style="height: -webkit-fill-available;" method="post" class="box">
               <div class="product_item">
                   <img style="min-width: 210px; height: 224px" src="uploaded_img/<?php echo $fetch_products['hinhanh']; ?>" alt="">
                    <div class="product_info">
                        <div class="name"><?php echo $fetch_products['tenhang']; ?></div>
                        <div class="price">Giá: <?php echo $fetch_products['dongia']; ?> VND</div>
                        <div class="origin">Nguồn gốc - Xuất xứ: <?php echo $fetch_products['nguongoc']; ?></div>
                        <div class="origin">Mô tả: <?php echo $fetch_products['mota']; ?></div>
                    </div>
               </div>
               </div>
      <?php
            }
         }else{
            echo '<p class="empty">Chưa có sản phẩm được bán!</p>';
         }
      ?>
   </div>
<?php include 'footer.php'; ?>
    
</body>
</html>