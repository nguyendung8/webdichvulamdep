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
  <header>
    <div class="top1">
      <h1>SỨC KHỎE VÀ SẮC ĐẸP - TRUNG TÂM CHĂM SÓC DA VÀ TÓC</h1>
    </div>
    <div class="box_top">
      <div class="box_search">
        <input type="text" placeholder="Serach here ...">
        🔍
      </div>
      <img src="./images/logo.png" alt="">
      <div class="box_contact">
        <img src="./images/phone.png" alt="">
        <p>09866788999</p>
      </div>
    </div>
<!-- <nav> -->
    <div class="wrapper">
      <nav class="menu">
        <ul class="clearfix">
          <li>
            <a href="#">SẢN PHẨM CHĂM SÓC DA <span class="arrow">&#9660;</span></a>
            <ul class="sub-menu">
              <li><a href="#">TẨY TRANG</a></li>
              <li><a href="#">SỮA RỬA MẶT</a></li>
              <li><a href="#">TẨY DA CHẾT </a></li>
              <li><a href="#">KEM CHỐNG NẮNG</a></li>
            </ul>
          </li>

          <li>
            <a href="#">THÀNH PHẦN <span class="arrow">&#9660;</span></a>

            <ul class="sub-menu">
              <li><a href="#">VITAMIN C </a></li>
              <li><a href="#">AHA/BHA</a></li>
              <li><a href="#">VITAMIN B5</a></li>
              <li><a href="#">NIACINAMIDE</a></li>
            </ul>
          </li>

          <li>
            <a href="#">THƯƠNG HIỆU<span class="arrow">&#9660;</span></a>

            <ul class="sub-menu">
              <li><a href="#">OBAGI </a></li>
              <li><a href="#">LA ROCHE POSAY</a></li>
              <li><a href="#">MARTIDERM</a></li>
              <li><a href="#">Avenne</a></li>
            </ul>
          </li>
          <li>
            <a href="#">THỰC PHẨM UỐNG <span class="arrow">&#9660;</span></a>

            <ul class="sub-menu">
              <li><a href="#">HỖ TRỢ CHỐNG NẮNG-ĐẸP DA </a></li>
              <li><a href="#">TRẮNG DA, MỜ NÁM, TÀN NHANG </a></li>
              <li><a href="#">VIÊN UỐNG NỘI TIẾT, SINH LÝ </a></li>

            </ul>
          </li>
          <li>
            <a href="#">CHĂM SÓC BODY <span class="arrow">&#9660;</span></a>

            <ul class="sub-menu">
              <li><a href="#">TẮM TRẮNG BODY </a></li>
              <li><a href="#">CHĂM SÓC TÓC </a></li>
              <li><a href="#">CHẮM SÓC PHỤ KHOA </a></li>

            </ul>
          </li>

          <li>
            <a href="#">TIN TỨC-LIÊN HỆ <span class="arrow">&#9660;</span></a>
            <ul class="sub-menu">
              <li><a href="#">TIN TỨC </a></li>
            </ul>
          </li>
          <li>
            <a href="logout.php" >ĐĂNG XUẤT</a>
          </li>
        </ul>
      </nav>
    </div>
  <!-- </nav> -->
  </header>
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
  <footer>
    <p>Copyright &copy; 2023</p>
  </footer>


</body>

</html>