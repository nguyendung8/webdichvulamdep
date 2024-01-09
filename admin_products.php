<?php

   include 'config.php';

   session_start();

   $admin_id = $_SESSION['admin_id']; //tạo session admin

   if(!isset($admin_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }

   if(isset($_POST['add_product'])){//thêm sách mới từ submit form name='add_product'

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $cate_id= $_POST['category'];
      $price = $_POST['price'];
      $origin = $_POST['origin'];
      $describe = $_POST['describe'];
      $image = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = 'uploaded_img/'.$image;

      $select_product_name = mysqli_query($conn, "SELECT tenhang FROM `mathang` WHERE tenhang = '$name'") or die('query failed');//truy vấn kiểm tra sách đã tồn tại chưa

      if(mysqli_num_rows($select_product_name) > 0){
         $message[] = 'Sản phẩm đã tồn tại.';
      }else{//chưa thì thêm mới
         $add_product_query = mysqli_query($conn, "INSERT INTO `mathang`(tenhang, danhmuchang, nguongoc, dongia, mota, hinhanh) VALUES('$name', '$cate_id', '$origin', '$price', '$describe', '$image')") or die('query failed');

         if($add_product_query){
            if($image_size > 2000000){//kiểm tra kích thước ảnh
               $message[] = 'Kích thước ảnh quá lớn, hãy cập nhật lại ảnh!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);//lưu file ảnh xuống
               $message[] = 'Thêm sản phẩm thành công!';
            }
         }else{
            $message[] = 'Thêm sản phẩm không thành công!';
         }
      }
   }

   if(isset($_GET['delete'])){//xóa sản phẩm từ onclick <a></a> href='delete'
      $delete_id = $_GET['delete'];
      $delete_image_query = mysqli_query($conn, "SELECT hinhanh FROM `mathang` WHERE mahang = '$delete_id'") or die('query failed');
      $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
      unlink('uploaded_img/'.$fetch_delete_image['hinhanh']);//xóa file ảnh của sản phẩm cần xóa
      mysqli_query($conn, "DELETE FROM `mathang` WHERE mahang = '$delete_id'") or die('query failed');
      echo '<script>alert("Xóa sản phẩm thành công!");</script>';
      header('location:admin_products.php');
   }

   if(isset($_POST['update_product'])){//cập nhật sản phẩm từ form submit name='update_product'

      $update_p_id = $_POST['update_p_id'];
      $update_name = $_POST['update_name'];
      $update_category = $_POST['update_category'];
      $update_price = $_POST['update_price'];
      $update_origin = $_POST['update_origin'];

      mysqli_query($conn, "UPDATE `mathang` SET tenhang = '$update_name', danhmuchang='$update_category', dongia = '$update_price', nguongoc= '$update_origin' WHERE mahang = '$update_p_id'") or die('query failed');
      header('location:admin_products.php');

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sản phẩm</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="add-products">

   <h1 class="title">Sản  phẩm</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Thêm sản phẩm</h3>
      <input type="text" name="name" class="box" placeholder="Tên sản phẩm" required>
      <select name="category" class="box">
         <option value="1">Hỗ trợ chống nắng, đẹp da</option>";
         <option value="2">Trắng da, mờ nám, tàn nhang</option>";
         <option value="3">Viên uống nội tiết, sinh lý</option>";
      </select>
      <input type="text" name="origin" class="box" placeholder="Nguồn gốc" required>
      <input type="number" min="0" name="price" class="box" placeholder="Giá sản phẩm" required>
      <textarea name="describe" class="box" placeholder="Mô tả" required></textarea>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="Thêm" name="add_product" class="btn">
   </form>

</section>

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `mathang`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
               <div style="height: -webkit-fill-available;" class="box">
                  <img style="height: 23rem !important" style="border-radius: 4px;" src="uploaded_img/<?php echo $fetch_products['hinhanh']; ?>" alt="">
                  <div class="name"><?php echo $fetch_products['tenhang']; ?></div>
                  <div class="price"><span>Giá: <?php echo number_format($fetch_products['dongia'],0,',','.'  ); ?></span> VND</div>
                  <a href="admin_products.php?update=<?php echo $fetch_products['mahang']; ?>" class="option-btn">Cập nhật</a>
                  <a href="admin_products.php?delete=<?php echo $fetch_products['mahang']; ?>" class="delete-btn" onclick="return confirm('Xóa sản phẩm này?');">Xóa</a>
               </div>
      <?php
            }
      }else{
         echo '<p class="empty">Không có sản phẩm nào được thêm!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){//hiện form update từ onclick <a></a> href='update'
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `mathang` WHERE mahang = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
               <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['mahang']; ?>">
                  <img src="uploaded_img/<?php echo $fetch_update['hinhanh']; ?>" alt="">
                  <input type="text" name="update_name" value="<?php echo $fetch_update['tenhang']; ?>" class="box" required placeholder="Tên sản phẩm">
                  <select name="update_category" class="box">
                     <option value="<?php echo $fetch_update['danhmuchang']?>">
                        <?php
                           if($fetch_update['danhmuchang'] == 1) echo 'Hỗ trợ chống nắng, đẹp da';
                           else if($fetch_update['danhmuchang'] == 2) echo 'Trắng da, mờ nám, tàn nhang';
                           else echo 'Viên uống nội tiết, sinh lý';
                        ?>
                     </option>
                     <?php 
                        if($fetch_update['danhmuchang'] == 1) {
                     ?>
                     <option value="2">Trắng da, mờ nám, tàn nhang</option>";
                     <option value="3">Viên uống nội tiết, sinh lý</option>";
                     <?php } else if($fetch_update['danhmuchang'] == 2) { ?>
                           <option value="1">Hỗ trợ chống nắng, đẹp da</option>";
                           <option value="3">Viên uống nội tiết, sinh lý</option>";
                     <?php }else {  ?>
                        <option value="1">Hỗ trợ chống nắng, đẹp da</option>";
                        <option value="2">Trắng da, mờ nám, tàn nhang</option>";
                     <?php
                     }
                     ?>
                  </select>
                  <input type="text" name="update_origin" value="<?php echo $fetch_update['nguongoc']; ?>" class="box" required placeholder="Nguồn gốc">
                  <input type="number" name="update_price" value="<?php echo $fetch_update['dongia']; ?>" class="box" required placeholder="Giá sản phẩm">
                  <input type="submit" value="update" name="update_product" class="btn">
                  <input type="reset" value="cancel" id="close-update" class="option-btn">
               </form>
   <?php
            }
         }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>

<script src="js/admin_script.js"></script>
<script>
   let closeBtn = document.querySelector('#close-update');
   closeBtn.addEventListener('click', function() {
      document.querySelector(".edit-product-form").style.display = "none";
   });
</script>

</body>
</html>