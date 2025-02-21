<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sender_id = $_SESSION['user_id'];
    $select_admin = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 'admin'");
    $admin = mysqli_fetch_assoc($select_admin);
    $receiver_id = $admin['id'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($message)) {
        $query = "INSERT INTO message (sender_id, receiver_id, message, status) 
                  VALUES ('$sender_id', '$receiver_id', '$message', 'sent')";
        if (mysqli_query($conn, $query)) {
            echo json_encode(['status' => 'success', 'message' => 'Tin nhắn đã được gửi!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi khi gửi tin nhắn.']);
        }
    }
}
