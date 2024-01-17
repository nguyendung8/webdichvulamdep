<?php
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Triệt lông</title>
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
        .name {
            font-size: 19px;
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
         $select_service = mysqli_query($conn, "SELECT * FROM `dichvu` WHERE danhmucdichvu = 2") or die('query failed');
         if(mysqli_num_rows($select_service) > 0){
            while($fetch_service = mysqli_fetch_assoc($select_service)){
      ?>
               <div style="height: -webkit-fill-available;" method="post" class="box">
               <div class="product_item">
                   <img style="min-width: 210px; height: 224px" src="uploaded_img/<?php echo $fetch_service['hinhanh']; ?>" alt="">
                    <div class="product_info">
                        <div class="name"><?php echo $fetch_service['tendichvu']; ?></div>
                        <div class="price">Giá: <?php echo $fetch_service['dongia']; ?> VND</div>
                        <div class="origin">Mô tả: <?php echo $fetch_service['mota']; ?></div>
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