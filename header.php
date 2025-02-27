
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
     <!-- Bootstrap CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <title>Document</title>
    <style>
      .bottom-contact {
        display: block;
        position: fixed;
        top: 40%;
        right: 0;
        background: #f9f9f9 !important;
        width: 80px;
        text-align: center;
        padding: 15px 5px;
        z-index: 99;
        box-shadow: 2px 1px 9px #dedede;
        border-top: 1px solid #eaeaea;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
      }
      .search-icon {
        position: absolute;
        left: 1px;
        top: 6px;
      }
      .box_search {
        padding-right: 0 !important;
      }
      .box_search input {
        margin-right: 0 !important;
      }
      .submit {
        padding: 10px 24px !important;
        color: #fff;
        background-color: #D64B95;
        cursor: pointer;
      }
      #chat-icon:hover {
          background: #0056b3;
      }

      #chat-form label {
          font-weight: bold;
      }
    </style>
    
</head>
<body>
<header>
    <div class="top1">
      <h1>SỨC KHỎE VÀ SẮC ĐẸP - TRUNG TÂM CHĂM SÓC DA VÀ TÓC</h1>
    </div>
    <div class="box_top">
      <form method="post" action="./product_search.php" class="box_search">
        <input type="text" placeholder="Search here ..." name="search" value="<?php if(isset($_POST['submit'])) echo $_POST['search'] ?>">
          <input type="submit" value="Tìm kiếm" class="submit" name="submit">
      </form>
      <a href="./home.php"><img src="./images/logo.png" alt=""></a>
      <div class="box_contact">
        <img src="./images/phone.png" alt="">
        <p>09866788999</p>
      </div>
    </div>
    <!-- <nav> -->
      <div class="wrapper">
        <nav style="max-width: fit-content;" class="menu">
          <ul class="clearfix">
            <li>
              <a href="#">DỊCH VỤ CHĂM SÓC DA <span class="arrow">&#9660;</span></a>
              <ul class="sub-menu">
                  <li><a href="./taydachet.php">TẨY DA CHẾT </a></li>
                <li><a href="./trietlong.php">TRIỆT LÔNG</a></li>
                <li><a href="./tamtrang.php">TẮM TRẮNG </a></li>
              </ul>
            </li>

            <li>
              <a href="#">THÀNH PHẦN <span class="arrow">&#9660;</span></a>

              <ul class="sub-menu">
                <li><a href="./vitaminc.php">VITAMIN C </a></li>
                <li><a href="./ahabha.php">AHA/BHA</a></li>
                <li><a href="./vitaminb5.php">VITAMIN B5</a></li>
              </ul>
            </li>

            <li>
              <a href="#">THƯƠNG HIỆU<span class="arrow">&#9660;</span></a>

              <ul class="sub-menu">
                <li><a href="./ogabi.php">OBAGI </a></li>
                <li><a href="./larocheposay.php">LA ROCHE POSAY</a></li>
                <li><a href="./martiderm.php">MARTIDERM</a></li>
              </ul>
            </li>
            <li>
              <a href="#">THỰC PHẨM UỐNG <span class="arrow">&#9660;</span></a>

              <ul class="sub-menu">
                <li><a href="./chongnang_depda.php">HỖ TRỢ CHỐNG NẮNG-ĐẸP DA </a></li>
                <li><a href="./trangda_monam.php">TRẮNG DA, MỜ NÁM, TÀN NHANG </a></li>
                <li><a href="./noitiet_sinhly.php">VIÊN UỐNG NỘI TIẾT, SINH LÝ </a></li>

              </ul>
            </li>
            <li>
              <a href="#">CHĂM SÓC BODY <span class="arrow">&#9660;</span></a>

              <ul class="sub-menu">
                <li><a href="./tamtrangbody.php">TẮM TRẮNG BODY </a></li>
                <li><a href="./chamsoctoc.php">CHĂM SÓC TÓC </a></li>
                <li><a href="./chamsocphukhoa.php">CHẮM SÓC PHỤ KHOA </a></li>

              </ul>
            </li>

            <li>
              <a href="#">TIN TỨC-LIÊN HỆ <span class="arrow">&#9660;</span></a>
              <ul class="sub-menu">
                <li><a href="./tintuc.php">TIN TỨC </a></li>
              </ul>
            </li>
            
            <li>
              <a href="#">ĐẶT LỊCH KHÁM <span class="arrow">&#9660;</span></a>
              <ul class="sub-menu">
                <li><a href="./bacsi.php">ĐỘI NGŨ CHUYÊN GIA </a></li>
                <li><a href="./lich_kham.php">LỊCH CỦA BẠN </a></li>
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
  <div class="bottom-contact">
    <ul>
      <li><a target="_blank" id="chatzalo" href="https://zalo.me/g/xiyvip052" rel="nofollow">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="2.25" y="3" width="23.5" height="22" rx="3.25" fill="white" stroke="#F5F6FA" stroke-width="0.5"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.89621 25.608H7.89625H7.89629C8.35601 25.6031 8.81555 25.5983 9.27454 25.5983L9.27245 25.5853L9.27456 25.598C9.37923 25.598 9.48389 25.6033 9.58856 25.6137H17.1506C17.7786 25.6137 18.4065 25.6149 19.0345 25.616H19.0353C20.291 25.6184 21.5467 25.6207 22.8025 25.6137H22.8286C24.5765 25.598 25.979 24.1746 25.9686 22.4267V19.3653C25.9686 19.3462 25.9699 19.3227 25.9713 19.298C25.9757 19.2211 25.9807 19.1332 25.9476 19.135C25.8534 19.1403 25.7049 19.1739 25.6525 19.2262C25.2512 19.4938 24.862 19.786 24.4728 20.0782L24.4728 20.0782C23.6944 20.6627 22.916 21.2471 22.0403 21.6344C18.6326 22.784 15.6187 22.8384 12.4197 22.0656C12.2447 22.002 12.1613 22.0091 12.0134 22.0218H12.0133H12.0133C11.918 22.0299 11.7959 22.0404 11.6051 22.0357C11.582 22.0366 11.558 22.0373 11.533 22.0381L11.5327 22.0381C11.2171 22.0479 10.759 22.0622 10.2113 22.3953C8.92917 22.7878 7.19024 22.8384 6.29163 22.7041C6.29543 22.7126 6.29786 22.7201 6.29974 22.727L6.29703 22.7213L6.29161 22.7095C6.27912 22.6954 6.26335 22.683 6.24808 22.671C6.19934 22.6325 6.1556 22.5981 6.23928 22.5264C6.2637 22.5107 6.28813 22.4944 6.31255 22.4781C6.36139 22.4455 6.41023 22.413 6.45907 22.3851C7.14462 21.9402 7.78831 21.4535 8.2122 20.7366C8.78846 20.0379 8.52135 19.7654 8.01214 19.246L7.99295 19.2264C5.51211 16.695 4.78212 14.0088 5.04087 10.3957C5.34963 8.41234 6.26021 6.70631 7.57375 5.22007C8.36919 4.31995 9.31641 3.59254 10.3526 2.98548C10.3675 2.97597 10.385 2.96821 10.4028 2.9603C10.4534 2.93776 10.5071 2.91391 10.5148 2.84418C10.5209 2.78911 10.4325 2.77092 10.4011 2.77092C9.81054 2.77092 9.22761 2.76564 8.64739 2.76039C7.49486 2.74995 6.35304 2.73961 5.18348 2.77094C3.50361 2.81804 1.97264 3.97498 2.00037 6.03645C2.00735 9.67897 2.00502 13.3192 2.0027 16.9586C2.00153 18.778 2.00037 20.5972 2.00037 22.4165C2.00037 24.1068 3.29298 25.525 4.9833 25.593C5.95293 25.6285 6.92498 25.6183 7.89615 25.608H7.89618H7.89621ZM6.35804 22.8239L6.37011 22.8403C6.45785 22.9182 6.54493 22.9968 6.6315 23.076C6.54752 22.9956 6.46077 22.9153 6.37012 22.8349L6.35804 22.8239ZM9.03696 25.3377C9.00782 25.3185 8.97977 25.298 8.95534 25.2736L8.9484 25.2721L8.95532 25.279C8.97975 25.3011 9.00781 25.3199 9.03696 25.3377ZM10.091 13.8868C10.3582 13.8868 10.62 13.8862 10.878 13.8856C11.3831 13.8845 11.8738 13.8833 12.3622 13.8868C12.7756 13.892 13.0006 14.0647 13.0425 14.3944C13.0896 14.8078 12.8489 15.0852 12.3988 15.0904C11.7631 15.0983 11.1304 15.0973 10.4962 15.0963C10.2846 15.096 10.0728 15.0957 9.8607 15.0957C9.7903 15.0957 9.72032 15.0965 9.65052 15.0974L9.65037 15.0974H9.65035C9.47638 15.0995 9.30355 15.1016 9.12806 15.0904C8.82453 15.0747 8.52624 15.0119 8.37971 14.6979C8.23318 14.384 8.33784 14.1014 8.53671 13.8449C9.34262 12.8192 10.1538 11.7883 10.9649 10.7626C11.012 10.6998 11.0591 10.637 11.1062 10.5794C11.0677 10.5139 11.0177 10.5193 10.969 10.5247C10.9516 10.5266 10.9343 10.5285 10.9178 10.5271C10.6352 10.5245 10.3513 10.5245 10.0674 10.5245C9.78351 10.5245 9.49961 10.5245 9.21702 10.5219C9.08619 10.5219 8.95536 10.5062 8.82976 10.48C8.53147 10.412 8.34831 10.1137 8.41634 9.8206C8.46344 9.62174 8.62044 9.45951 8.8193 9.41241C8.94489 9.38101 9.07572 9.36531 9.20655 9.36531C10.1381 9.36008 11.0748 9.36008 12.0063 9.36531C12.1738 9.36008 12.336 9.38101 12.4982 9.42288C12.8541 9.54324 13.0059 9.87293 12.8646 10.2183C12.739 10.5166 12.5401 10.773 12.3413 11.0295L12.3412 11.0295C11.6557 11.9034 10.9701 12.7721 10.2846 13.6356C10.227 13.7036 10.1747 13.7717 10.091 13.8868ZM16.1615 11.1338C16.2871 10.9716 16.418 10.8198 16.6325 10.7779C17.0459 10.6942 17.4332 10.9611 17.4384 11.3798C17.4541 12.4264 17.4489 13.4731 17.4384 14.5197C17.4384 14.7919 17.2605 15.0326 17.0041 15.1111C16.7424 15.2105 16.4441 15.132 16.2714 14.907C16.1825 14.7971 16.1458 14.7762 16.0202 14.8756C15.544 15.2628 15.005 15.3309 14.4241 15.1425C13.4926 14.8389 13.1105 14.1115 13.0059 13.2271C12.896 12.2694 13.2152 11.453 14.0735 10.9506C14.7852 10.5267 15.5074 10.5634 16.1615 11.1338ZM15.2771 11.8926C15.3559 11.8959 15.433 11.9105 15.5063 11.9356C15.6641 11.9865 15.8044 12.0873 15.9051 12.2276C16.1982 12.6253 16.1982 13.2794 15.9051 13.6772C15.8528 13.7452 15.7952 13.8028 15.7324 13.8499C15.5719 13.9686 15.3837 14.0236 15.1984 14.0195C15.0235 14.017 14.8475 13.9617 14.6962 13.8497C14.6334 13.8026 14.5758 13.7451 14.5235 13.6771C14.3927 13.4939 14.3194 13.2741 14.3089 13.0438C14.3037 12.306 14.7067 11.8612 15.2771 11.8926ZM19.7882 13.0753C19.7463 11.7304 20.6307 10.7256 21.8867 10.689C23.2212 10.6471 24.1945 11.542 24.2364 12.8503C24.2783 14.1743 23.4671 15.1111 22.2164 15.2367C20.8505 15.3727 19.7672 14.3837 19.7882 13.0753ZM21.1017 12.9504C21.0914 13.2118 21.1699 13.468 21.3267 13.6824L21.3282 13.6843C21.3697 13.7411 21.4164 13.7927 21.4732 13.834C21.5503 13.8948 21.6348 13.9403 21.7229 13.9709C21.9086 14.0362 22.1142 14.0366 22.303 13.9664C22.4475 13.914 22.5795 13.8225 22.6813 13.6938L22.6821 13.6929L22.6897 13.6828C22.836 13.4881 22.9094 13.2266 22.9104 12.9643C22.9117 12.7304 22.8551 12.4963 22.7413 12.3077C22.7246 12.2799 22.7066 12.2531 22.6874 12.2275C22.5408 12.0286 22.3106 11.903 22.0646 11.8978C22.0238 11.8955 21.9838 11.8957 21.9448 11.8982C21.4598 11.9287 21.1234 12.3172 21.1027 12.893C21.102 12.9117 21.1017 12.9306 21.1017 12.9496L21.1017 12.9504ZM19.3276 12.0339C19.3276 12.3043 19.3282 12.5747 19.3288 12.8451C19.33 13.3858 19.3311 13.9266 19.3276 14.4674C19.3329 14.8389 19.0398 15.1477 18.6682 15.1582C18.6054 15.1582 18.5374 15.1529 18.4746 15.1372C18.213 15.0692 18.0141 14.7919 18.0141 14.4622V10.3017C18.0141 10.2195 18.0135 10.1379 18.0129 10.0565C18.0118 9.8943 18.0106 9.73284 18.0141 9.56906C18.0193 9.1661 18.2758 8.90443 18.663 8.90443C19.0607 8.8992 19.3276 9.16086 19.3276 9.57952C19.3311 10.1239 19.33 10.6707 19.3288 11.2167V11.2168L19.3288 11.22C19.3282 11.4916 19.3276 11.7631 19.3276 12.0339Z" fill="url(#paint0_linear)"/>
        <defs>
        <linearGradient id="paint0_linear" x1="13.9873" y1="2.75" x2="13.9873" y2="25.6184" gradientUnits="userSpaceOnUse">
        <stop stop-color="#3A8BFF"/>
        <stop offset="1" stop-color="#035ADA"/>
        </linearGradient>
        </defs>
        </svg>
        <br><span>Zalo</span> </a>
      </li>
      <!-- <li style="margin-top: 8px;"><a target="_blank" id="chatfb" href="https://www.facebook.com/profile.php?id=100035841726026" rel="nofollow">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 13.1619C2 6.96726 7.42345 1.94556 14.1136 1.94556C20.8038 1.94556 26.2273 6.96726 26.2273 13.1619C26.2273 19.3565 20.8038 24.3782 14.1136 24.3782C12.9059 24.3782 11.7397 24.2138 10.639 23.9091L6.5144 26.1728V21.8962C3.76152 19.8402 2 16.6917 2 13.1619ZM12.6498 13.8316L15.7604 17.1491L22.4367 10.0616L16.4432 13.3792L13.2568 10.0616L6.58048 17.1491L12.6498 13.8316Z" fill="url(#paint0_linear)"/>
        <defs>
        <linearGradient id="paint0_linear" x1="13.9169" y1="25.8179" x2="13.9169" y2="2.18157" gradientUnits="userSpaceOnUse">
        <stop stop-color="#1D77E2"/>
        <stop offset="1" stop-color="#2CB7FF"/>
        </linearGradient>
        </defs>
        </svg>
        <br><span>Messenger</span> </a>
      </li> -->
      <li style="margin-top: 8px;"><a target="_blank" id="goidien" href="0911627214" rel="nofollow">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.84191 2.11467C6.98073 2.16191 7.19487 2.27215 7.31783 2.35092C8.07127 2.84709 10.1692 5.51291 10.8553 6.8439C11.2479 7.60387 11.3787 8.16697 11.2558 8.58438C11.1289 9.03328 10.9187 9.26957 9.97885 10.0217C9.60207 10.3248 9.2491 10.6359 9.19363 10.7187C9.05085 10.9235 8.9358 11.325 8.9358 11.6086C8.93983 12.2662 9.3681 13.4594 9.93123 14.3768C10.3674 15.0895 11.1487 16.0031 11.9221 16.7041C12.8302 17.531 13.6313 18.0941 14.5355 18.539C15.6974 19.1139 16.4073 19.2597 16.9268 19.0195C17.0577 18.9604 17.1965 18.8816 17.2401 18.8462C17.2798 18.8108 17.5851 18.4406 17.9183 18.0311C18.5607 17.2277 18.7074 17.0978 19.1476 16.9482C19.7068 16.7592 20.2779 16.8104 20.8529 17.1018C21.2892 17.3263 22.2409 17.913 22.8556 18.3382C23.6646 18.9013 25.3936 20.3032 25.6277 20.5828C26.0401 21.0868 26.1115 21.7325 25.8339 22.4453C25.5404 23.1974 24.3983 24.6071 23.6012 25.2096C22.8794 25.753 22.3678 25.9617 21.6937 25.9932C21.1385 26.0207 20.9085 25.9735 20.1986 25.6821C14.6307 23.4022 10.185 20 6.6555 15.3258C4.81146 12.8845 3.40756 10.3524 2.44782 7.72597C1.88869 6.1942 1.86094 5.5287 2.32091 4.74509C2.51924 4.41434 3.36394 3.59527 3.97862 3.13851C5.00182 2.38244 5.47371 2.10284 5.85047 2.02411C6.10823 1.96897 6.55634 2.01228 6.84191 2.11467Z" fill="url(#paint0_linear)"/>
        <defs>
        <linearGradient id="paint0_linear" x1="14" y1="2" x2="14.0665" y2="24.1159" gradientUnits="userSpaceOnUse">
        <stop stop-color="#8AD336"/>
        <stop offset="1" stop-color="#509600"/>
        </linearGradient>
        </defs>
        </svg>
        <br><span>Gọi ngay</span> </a>
     </li>
    </ul>
    <!-- Nút mở chat -->
    <div id="chat-icon" onclick="toggleChat()" style="position: fixed; bottom: 20px; right: 20px; background: #007bff; color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; justify-content: center; align-items: center; cursor: pointer; z-index: 1000;">
        <i class="fas fa-comment-dots" style="font-size: 24px;"></i>
    </div>

<!-- Khung chat -->
<div id="chat-box" class="card shadow-lg border-0" style="position: fixed; bottom: 90px; right: 20px; width: 350px; display: none; z-index: 1000;">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Chăm sóc khách hàng</h4>
        <button class="btn btn-sm btn-light" onclick="toggleChat()" style="font-size: 17px;">&times;</button>
    </div>
    <div class="card-body" id="chat-messages" style="height: 300px; overflow-y: auto">
        <!-- Tin nhắn sẽ được hiển thị ở đây -->
    </div>
    <div class="card-footer bg-white">
        <form id="messageForm" class="d-flex">
            <textarea class="form-control me-2" style="font-size: 17px;" id="message" name="message" rows="1" placeholder="Nhập tin nhắn..." required></textarea>
            <button type="submit" class="btn btn-primary ml-1" style="font-size: 17px;">Gửi</button>
        </form>
    </div>
</div>
  </div>

  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleChat() {
        let chatBox = document.getElementById("chat-box");
        chatBox.style.display = (chatBox.style.display === "none" || chatBox.style.display === "") ? "block" : "none";
    }

    function fetchMessages() {
        $.ajax({
            url: "fetch_messages.php",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    $("#chat-messages").html(""); // Xóa tin nhắn cũ trước khi load mới
                    response.messages.forEach(msg => {
                        let alignment = msg.sender_id == response.current_user ? "justify-content-end" : "justify-content-start";
                        let bgColor = msg.sender_id == response.current_user ? "bg-primary text-white" : "bg-light";

                        $("#chat-messages").append(`
                            <div class="d-flex ${alignment} mb-2">
                                <div class="p-2 rounded ${bgColor}" style="max-width: 75%; font-size: 15px;">
                                    ${msg.message}
                                </div>
                            </div>
                        `);
                    });
                    $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
                }
            }
        });
    }

    $("#messageForm").submit(function (event) {
        event.preventDefault();
        let message = $("#message").val().trim();
        if (message !== "") {
            $.ajax({
                url: "send_message.php",
                type: "POST",
                data: { message: message },
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        fetchMessages(); // Load lại tin nhắn sau khi gửi
                        $("#message").val("").focus();
                    }
                }
            });
        }
    });

    setInterval(fetchMessages, 3000); // Cập nhật tin nhắn mỗi 3 giây
</script>

</body>
</html>