<?php
   //nhúng vào các trang quản trị
   if(isset($message)){
      foreach($message as $message){//in ra thông báo trên cùng khi biến message được gán giá trị từ các trang quản trị
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>';
      }
   }
?>
<link rel="stylesheet" href="./css/admin_style.css">
<header class="header">

   <div class="flex">
      <a href="admin_products.php" class="logo">Quản lý</a>
      <nav style="margin-bottom: 0px !important;min-height: unset !important;" class="navbar">
         <a style="text-decoration: none !important;" href="admin_products.php">Sản phẩm</a>
         <a style="text-decoration: none !important;" href="admin_services.php">Dịch vụ chăm sóc da</a>
         <a style="text-decoration: none !important;" href="admin_doctors.php">Bác sĩ</a>
         <a style="text-decoration: none !important;" href="admin_schedules.php">Lịch khám</a>
         <a style="text-decoration: none !important;" href="admin_messages.php">Tin nhắn</a>
      </nav>
         <a href="logout.php" class="delete-btn">Đăng xuất</a>
   </div>

</header>