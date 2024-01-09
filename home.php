<?php

   include 'config.php';

   session_start();

   $user_id = $_SESSION['user_id']; //tạo session người dùng thường

   if(!isset($user_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
<?php include 'header.php'; ?>
  <div class="banner">
    <img src="./images/24.jpg" alt="">
  </div>

  <main>
    <section class="contact">
      <h2>Liên hệ</h2>
      <p>Địa chỉ: 123 Main Street</p>
      <p>Số điện thoại: 0912345678</p>
      <p>Email: info@example.com</p>
    </section>
  </main>
  <?php include 'footer.php'; ?>
</body>

</html>