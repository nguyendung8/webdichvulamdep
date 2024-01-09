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
    <section class="products">
      <h2>Sản phẩm</h2>
      <div class="product">
        <img src="htps://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/HTML5_logo.svg/1200px-HTML5_logo.svg.png"
          alt="Logo HTML5">
        <h3>Tên sản phẩm</h3>
        <p>Mô tả sản phẩm</p>
        <p>Giá: 100.000₫</p>
        <button>Mua ngay</button>
      </div>
      <div class="product">
        <img src="htps://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/CSS3_logo.svg/1200px-CSS3_logo.svg.png"
          alt="Logo CSS3">
        <h3>Tên sản phẩm</h3>
        <p>Mô tả sản phẩm</p>
        <p>Giá: 200.000₫</p>
        <button>Mua ngay</button>
      </div>
    </section>
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