<?php
   include 'config.php';
   session_start();

   $admin_id = $_SESSION['admin_id'];

   if (!isset($admin_id)) {
      header('location:login.php');
   }

   // Thêm bác sĩ
   if (isset($_POST['add_doctor'])) {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $position = mysqli_real_escape_string($conn, $_POST['position']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
      $info = mysqli_real_escape_string($conn, $_POST['info']);

      $image = $_FILES['image']['name'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = 'doctor_img/'.$image;

      $check_doctor = mysqli_query($conn, "SELECT name FROM `bacsi` WHERE name = '$name'") or die('query failed');

      if (mysqli_num_rows($check_doctor) > 0) {
         $message[] = 'Bác sĩ đã tồn tại.';
      } else {
         if (move_uploaded_file($image_tmp_name, $image_folder)) {
            $add_doctor_query = mysqli_query($conn, "INSERT INTO `bacsi`(name, position, phone, info, image) VALUES('$name', '$position', '$phone', '$info', '$image')") or die('query failed');
            if ($add_doctor_query) {
               $message[] = 'Thêm bác sĩ thành công!';
            } else {
               $message[] = 'Thêm bác sĩ thất bại!';
            }
         } else {
            $message[] = 'Tải ảnh thất bại!';
         }
      }
   }

   // Xóa bác sĩ
   if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $select_image = mysqli_query($conn, "SELECT image FROM `bacsi` WHERE id = '$delete_id'") or die('query failed');
      $fetch_image = mysqli_fetch_assoc($select_image);

      if ($fetch_image['image'] != '' && file_exists('doctor_img/'.$fetch_image['image'])) {
         unlink('doctor_img/'.$fetch_image['image']);
      }

      mysqli_query($conn, "DELETE FROM `bacsi` WHERE id = '$delete_id'") or die('query failed');
      echo '<script>alert("Xóa bác sĩ thành công!");</script>';
      header('location:admin_doctors.php');
   }

   // Cập nhật bác sĩ
   if (isset($_POST['update_doctor'])) {
      $update_id = $_POST['update_id'];
      $update_name = $_POST['update_name'];
      $update_position = $_POST['update_position'];
      $update_phone = $_POST['update_phone'];

      mysqli_query($conn, "UPDATE `bacsi` SET name = '$update_name', position = '$update_position', phone = '$update_phone', info = '$update_info' WHERE id = '$update_id'") or die('query failed');

      header('location:admin_doctors.php');
   }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quản lý Bác sĩ</title>
   <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="add-products">
   <h1 class="title">Quản lý Bác sĩ</h1>
   <form action="" method="post" enctype="multipart/form-data">
      <h3>Thêm Bác sĩ</h3>
      <input type="text" name="name" class="box" placeholder="Tên bác sĩ" required>
      <input type="text" name="position" class="box" placeholder="Vị trí" required>
      <input type="text" name="phone" class="box" placeholder="Số điện thoại" required>
      <textarea name="info" class="box" placeholder="Thông tin chi tiết" required></textarea>
      <input type="file" name="image" class="box" accept="image/*" required>
      <input type="submit" value="Thêm" name="add_doctor" class="btn">
   </form>
</section>

<section class="show-products">
   <div class="box-container">
      <?php
         $select_doctors = mysqli_query($conn, "SELECT * FROM `bacsi`") or die('query failed');
         if (mysqli_num_rows($select_doctors) > 0) {
            while ($fetch_doctor = mysqli_fetch_assoc($select_doctors)) {
      ?>
               <div class="box">
                  <img src="doctor_img/<?php echo $fetch_doctor['image']; ?>" alt="Ảnh bác sĩ">
                  <div class="name"><?php echo $fetch_doctor['name']; ?></div>
                  <div class="position">Vị trí: <?php echo $fetch_doctor['position']; ?></div>
                  <div class="phone">SĐT: <?php echo $fetch_doctor['phone']; ?></div>
                  <a href="admin_doctors.php?update=<?php echo $fetch_doctor['id']; ?>" class="option-btn">Cập nhật</a>
                  <a href="admin_doctors.php?delete=<?php echo $fetch_doctor['id']; ?>" class="delete-btn" onclick="return confirm('Xóa bác sĩ này?');">Xóa</a>
               </div>
      <?php
            }
         } else {
            echo '<p class="empty">Chưa có bác sĩ nào!</p>';
         }
      ?>
   </div>
</section>

<section class="edit-product-form">
   <?php
      if (isset($_GET['update'])) {
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `bacsi` WHERE id = '$update_id'") or die('query failed');
         if (mysqli_num_rows($update_query) > 0) {
            while ($fetch_update = mysqli_fetch_assoc($update_query)) {
   ?>
               <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="update_id" value="<?php echo $fetch_update['id']; ?>">
                  <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required>
                  <input type="text" name="update_position" value="<?php echo $fetch_update['position']; ?>" class="box" required>
                  <input type="text" name="update_phone" value="<?php echo $fetch_update['phone']; ?>" class="box" required>
                  <input type="submit" value="Cập nhật" name="update_doctor" class="btn">
                  <input type="reset" value="cancel" id="close-update" class="option-btn">
               </form>
   <?php
            }
         }
      } else {
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
