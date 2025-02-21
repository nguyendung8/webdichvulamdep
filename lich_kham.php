<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

// Lấy danh sách lịch khám của người dùng
$appointments = mysqli_query($conn, "SELECT lich.status, lich.id, lich.date, lich.name, lich.phone, bacsi.name AS doctor_name, bacsi.position, bacsi.image FROM lich JOIN bacsi ON lich.doctor_id = bacsi.id WHERE lich.user_id = '$user_id' ORDER BY lich.date DESC") or die('Query failed');

if (isset($_POST['cancel_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
    mysqli_query($conn, "DELETE FROM lich WHERE id = '$appointment_id'") or die('Query failed');
    echo "<script>alert('Đã hủy lịch khám!'); window.location.href='lich_kham.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Lịch Khám Của Bạn</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Lịch Khám Của Bạn</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Bác Sĩ</th>
                    <th>Ngày & Giờ Khám</th>
                    <th>Họ Tên</th>
                    <th>Số Điện Thoại</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($appointments) > 0) {
                    while ($appointment = mysqli_fetch_assoc($appointments)) { ?>
                        <tr>
                            <td>
                                <img src="doctor_img/<?php echo $appointment['image']; ?>" alt="Bác sĩ" width="50" height="50" class="rounded-circle">
                                <?php echo $appointment['doctor_name']; ?>
                            </td>
                            <td><?php echo date("d/m/Y H:i", strtotime($appointment['date'])); ?></td>
                            <td><?php echo $appointment['name']; ?></td>
                            <td><?php echo $appointment['phone']; ?></td>
                            <td><?php echo $appointment['status'] == 0 ? 'Chưa xác nhận' : 'Đã xác nhận'; ?></td>
                            <?php if ($appointment['status'] == 0) { ?>
                            <td>
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
                                    <button type="submit" name="cancel_appointment" class="btn btn-danger btn-sm">Hủy</button>
                                </form>
                            </td>
                            <?php } else { ?>
                            <td>
                                <button class="btn btn-secondary btn-sm" disabled>Không thể hủy</button>
                            </td>
                            <?php } ?>
                        </tr>
                <?php }} else { echo "<tr><td colspan='6' class='text-center'>Bạn chưa có lịch khám nào.</td></tr>"; } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
