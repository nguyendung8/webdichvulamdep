<?php
include 'config.php';
session_start();

if (isset($_POST['submit_booking'])) {
    $doctor_id = $_POST['doctor_id'];
    $user_id = $_SESSION['user_id'];
    $date = $_POST['date_time'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $insert_query = "INSERT INTO `lich` (doctor_id, user_id, date, name, phone) VALUES ('$doctor_id', '$user_id', '$date', '$name', '$phone')";
    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Đặt lịch thành công!');</script>";
    } else {
        echo "<script>alert('Lỗi khi đặt lịch!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Danh Sách Bác Sĩ</title>
    <link rel="stylesheet" href="./css/user_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }
        .container {
            width: 90%;
            margin: 30px auto;
        }
        .title {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }
        .doctor-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
            padding: 20px 0;
        }
        .doctor-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
        }
        .doctor-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }
        .doctor-card h3 {
            margin-top: 10px;
            font-size: 20px;
            color: #333;
        }
        .doctor-card p {
            font-size: 16px;
            color: #666;
            margin: 5px 0;
        }
        .btn-appointment {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 10px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-appointment:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <h1 class="title">Danh Sách Đội Ngũ Chuyên Gia</h1>
    <div class="doctor-list">
        <?php
        $select_doctors = mysqli_query($conn, "SELECT * FROM `bacsi`") or die('Query failed');
        if (mysqli_num_rows($select_doctors) > 0) {
            while ($doctor = mysqli_fetch_assoc($select_doctors)) {
                ?>
                <div class="doctor-card">
                    <img src="doctor_img/<?php echo $doctor['image']; ?>" alt="Bác sĩ <?php echo $doctor['name']; ?>">
                    <h3><?php echo $doctor['name']; ?></h3>
                    <p>Vị trí: <?php echo $doctor['position']; ?></p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal" onclick="setDoctorId(<?php echo $doctor['id']; ?>)">Đặt lịch khám</button>
                    </div>
                <?php
            }
        } else {
            echo "<p style='text-align:center; font-size:18px;'>Hiện chưa có bác sĩ nào!</p>";
        }
        ?>
    </div>
</div>

<!-- Modal Đặt lịch khám -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Đặt lịch khám</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" id="doctor_id" name="doctor_id">
                    <div class="mb-3">
                        <label for="date_time" class="form-label">Chọn ngày & giờ khám</label>
                        <input type="datetime-local" class="form-control" name="date_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và Tên</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_booking" class="btn btn-success">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<script>
    function setDoctorId(id) {
        document.getElementById('doctor_id').value = id;
    }
</script>
</body>
</html>
