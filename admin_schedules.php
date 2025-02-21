<?php
include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

// Xác nhận lịch khám
if (isset($_GET['confirm'])) {
    $appointment_id = $_GET['confirm'];
    mysqli_query($conn, "UPDATE `lich` SET status = 1 WHERE id = '$appointment_id'") or die('Query failed');
    echo "<script>alert('Lịch khám đã được xác nhận!');</script>";
    header('location:admin_schedules.php');
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Lịch Khám</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      a {
         text-decoration: none !important;
      }
      th {
         font-size: 20px !important;
      }
      td {
         font-size: 17px !important;
      }
    </style>
</head>
<body>

<?php include 'admin_header.php'; ?>

<div class="container mt-4">
    <h1 class="text-center mb-4">Danh Sách Lịch Khám</h1>
    
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Bác sĩ</th>
                <th>Bệnh nhân</th>
                <th>Số điện thoại</th>
                <th>Ngày & Giờ</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $appointments = mysqli_query($conn, "SELECT lich.*, bacsi.name AS doctor_name FROM `lich`
                JOIN `bacsi` ON lich.doctor_id = bacsi.id
                ORDER BY lich.date ASC") or die('Query failed');
            
            if (mysqli_num_rows($appointments) > 0) {
                while ($row = mysqli_fetch_assoc($appointments)) {
                    $status_text = $row['status'] == 1 ? "Đã xác nhận" : "Chờ xác nhận";
                    $status_class = $row['status'] == 1 ? "badge bg-success" : "badge bg-warning";
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['doctor_name']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($row['date'])); ?></td>
                        <td><span class="<?php echo $status_class; ?>"><?php echo $status_text; ?></span></td>
                        <td>
                            <?php if ($row['status'] == 0) { ?>
                                <a href="admin_schedules.php?confirm=<?php echo $row['id']; ?>" style="background-color: #198754;" class="btn btn-success btn-sm" onclick="return confirm('Xác nhận lịch khám này?');">
                                    Xác nhận
                                </a>
                            <?php } else { ?>
                                <button class="btn btn-secondary btn-sm" disabled>Đã xác nhận</button>
                            <?php } ?>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="7" class="text-center">Chưa có lịch khám nào.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
