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
  <style>
    .qc {
      display: flex;
      margin-top: 50px;
      justify-content: center;
      gap: 96px;
    }
    .banner-img {
      width: 549px;
    }
    .title_new {
      text-align: center;
    }
    .list_news {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
<?php include 'header.php'; ?>
  <div class="banner">
    <img src="./images/24.jpg" alt="">
  </div>
   <div class="qc">
    <a href="https://suckhoevasacdep.net/vien-uong-duong-trang-da-diamond-white-ngoc-trinh.html" target="_blank"><img src="./images/banner1.png" alt="" class="banner-img"></a>
    <a href="https://https//suckhoevasacdep.net/kem-moc-qua-pure-han-quoc-chinh-hang-trang-da-mo-nam.html" target="_blank"><img src="./images/banner2.png" alt="" class="banner-img">></a>
   </div>
   <div class="news">
    <h1 class="title_new">Tin mới cập nhật</h1>
    <div class="list_news">
      <a href="https://suckhoevasacdep.net/mam-dau-nanh-la-gi-uong-co-tac-dung-gi-sau-bao-lau-thi-co-ket-qua.html" target="_blank"><img src="./images/new1.png" alt="" class="new-img"></a>
      <a href="https://suckhoevasacdep.net/huong-dan-su-dung-bo-ba-san-pham-obagi-tri-nam-trang-da-hieu-qua-nhat.html" target="_blank"><img src="./images/new2.png" alt="" class="new-img"></a>
      <a href="https://suckhoevasacdep.net/huong-dan-chi-tiet-cac-buoc-su-dung-retinol-obagi-cho-nguoi-moi-bat-dau.html" target="_blank"><img src="./images/new3.png" alt="" class="new-img"></a>
    </div>
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