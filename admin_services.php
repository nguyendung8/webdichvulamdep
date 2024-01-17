<?php

   include 'config.php';

   session_start();

   $admin_id = $_SESSION['admin_id']; //tạo session admin

   if(!isset($admin_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }

   if(isset($_POST['add_service'])){//thêm sách mới từ submit form name='add_service'

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $cate_id= $_POST['category'];
      $price = $_POST['price'];
      $describe = $_POST['describe'];
      $image = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = 'uploaded_img/'.$image;

      $select_serive_name = mysqli_query($conn, "SELECT tendichvu FROM `dichvu` WHERE tendichvu = '$name'") or die('query failed');//truy vấn kiểm tra sách đã tồn tại chưa

      if(mysqli_num_rows($select_serive_name) > 0){
         $message[] = 'dịch vụ đã tồn tại.';
      }else{//chưa thì thêm mới
         $add_service_query = mysqli_query($conn, "INSERT INTO `dichvu`(tendichvu, danhmucdichvu, dongia, mota, hinhanh) VALUES('$name', '$cate_id', '$price', '$describe', '$image')") or die('query failed');

         if($add_service_query){
            if($image_size > 2000000){//kiểm tra kích thước ảnh
               $message[] = 'Kích thước ảnh quá lớn, hãy cập nhật lại ảnh!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);//lưu file ảnh xuống
               $message[] = 'Thêm dịch vụ thành công!';
            }
         }else{
            $message[] = 'Thêm dịch vụ không thành công!';
         }
      }
   }

   if(isset($_GET['delete'])){//xóa dịch vụ từ onclick <a></a> href='delete'
      $delete_id = $_GET['delete'];
      $delete_image_query = mysqli_query($conn, "SELECT hinhanh FROM `dichvu` WHERE madichvu = '$delete_id'") or die('query failed');
      $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
      unlink('uploaded_img/'.$fetch_delete_image['hinhanh']);//xóa file ảnh của dịch vụ cần xóa
      mysqli_query($conn, "DELETE FROM `dichvu` WHERE madichvu = '$delete_id'") or die('query failed');
      echo '<script>alert("Xóa dịch vụ thành công!");</script>';
      header('location:admin_services.php');
   }

   if(isset($_POST['update_product'])){//cập nhật dịch vụ từ form submit name='update_product'

      $update_p_id = $_POST['update_p_id'];
      $update_name = $_POST['update_name'];
      $update_category = $_POST['update_category'];
      $update_price = $_POST['update_price'];

      mysqli_query($conn, "UPDATE `dichvu` SET tendichvu = '$update_name', danhmucdichvu='$update_category', dongia = '$update_price' WHERE madichvu = '$update_p_id'") or die('query failed');
      header('location:admin_services.php');

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dịch vụ chăm sóc da</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="add-products">

   <h1 class="title">Dịch vụ</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Thêm dịch vụ</h3>
      <input type="text" name="name" class="box" placeholder="Tên dịch vụ" required>
      <select name="category" class="box">
         <option value="1">Tẩy da chết</option>";
         <option value="2">Triệt lông</option>";
         <option value="3">Tắm trắng</option>";
      </select>
      <input type="number" min="0" name="price" class="box" placeholder="Giá dịch vụ" required>
      <textarea name="describe" class="box" placeholder="Mô tả" required></textarea>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="Thêm" name="add_service" class="btn">
   </form>

</section>

<section class="show-products">

   <div class="box-container">

      <?php
         $select_services = mysqli_query($conn, "SELECT * FROM `dichvu`") or die('query failed');
         if(mysqli_num_rows($select_services) > 0){
            while($fetch_services = mysqli_fetch_assoc($select_services)){
      ?>
               <div style="height: -webkit-fill-available;" class="box">
                  <img style="height: 23rem !important" style="border-radius: 4px;" src="uploaded_img/<?php echo $fetch_services['hinhanh']; ?>" alt="">
                  <div class="name"><?php echo $fetch_services['tendichvu']; ?></div>
                  <div class="price"><span>Giá: <?php echo number_format($fetch_services['dongia'],0,',','.'  ); ?></span> VND</div>
                  <a href="admin_services.php?update=<?php echo $fetch_services['madichvu']; ?>" class="option-btn">Cập nhật</a>
                  <a href="admin_services.php?delete=<?php echo $fetch_services['madichvu']; ?>" class="delete-btn" onclick="return confirm('Xóa dịch vụ này?');">Xóa</a>
               </div>
      <?php
            }
      }else{
         echo '<p class="empty">Không có dịch vụ nào được thêm!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){//hiện form update từ onclick <a></a> href='update'
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `dichvu` WHERE madichvu = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
               <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['madichvu']; ?>">
                  <img src="uploaded_img/<?php echo $fetch_update['hinhanh']; ?>" alt="">
                  <input type="text" name="update_name" value="<?php echo $fetch_update['tendichvu']; ?>" class="box" required placeholder="Tên dịch vụ">
                  <select name="update_category" class="box">
                     <option value="<?php echo $fetch_update['danhmucdichvu']?>">
                        <?php
                           if($fetch_update['danhmucdichvu'] == 1) echo 'Tẩy da chết';
                           else if($fetch_update['danhmucdichvu'] == 2) echo 'Triệt lông';
                           else echo 'Tắm trắng';
                        ?>
                     </option>
                     <?php 
                        if($fetch_update['danhmucdichvu'] == 1) {
                     ?>
                     <option value="2">Triệt lông</option>";
                     <option value="3">Tắm trắng</option>";
                     <?php } else if($fetch_update['danhmucdichvu'] == 2) { ?>
                           <option value="1">Tẩy da chết</option>";
                           <option value="3">Tắm trắng</option>";
                     <?php }else {  ?>
                        <option value="1">Tẩy da chết</option>";
                        <option value="2">Triệt lông</option>";
                     <?php
                     }
                     ?>
                  </select>
                  <input type="number" name="update_price" value="<?php echo $fetch_update['dongia']; ?>" class="box" required placeholder="Giá dịch vụ">
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