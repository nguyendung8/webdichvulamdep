<?php
include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
    exit();
}

// Lấy danh sách user có tin nhắn
$users_query = mysqli_query($conn, "
    SELECT DISTINCT users.id, users.name, users.email 
    FROM `message`
    JOIN `users` ON message.sender_id = users.id
    WHERE message.receiver_id = '$admin_id'
    ORDER BY users.name ASC
") or die('Query failed');

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin nhắn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/admin_style.css">
    <style>
      li {
         font-size: 18px;
      }
      a {
         text-decoration: none;
      }
        #chat-box {
        height: 400px;
        overflow-y: auto;
        padding: 10px;
        display: flex;
        flex-direction: column;
      }

      .message-container {
         display: flex;
         margin-bottom: 10px;
         max-width: 75%;
      }

      .admin-message {
         font-size: 14px;
         align-self: flex-end;
         background-color: #007bff;
         color: white;
         padding: 10px;
         border-radius: 10px;
         text-align: right;
      }

      .user-message {
         font-size: 14px;
         align-self: flex-start;
         background-color: #f1f1f1;
         color: black;
         padding: 10px;
         border-radius: 10px;
         text-align: left;
      }

      .message-time {
         font-size: 12px;
         color: rgba(255, 255, 255, 0.7);
         display: block;
         margin-top: 5px;
      }

      .user-message .message-time {
         color: gray;
      }
   </style>
</head>

<body>
   <?php include 'admin_header.php'; ?>
    <div>
        <div class="container mt-4">
            <h1 class="title">Quản Lý Tin Nhắn</h1>

            <!-- Danh sách người gửi -->
            <div class="row">
                <div class="col-md-4">
                    <h3 style="font-size: 24px;">Danh sách tin nhắn</h3>
                    <ul class="list-group">
                        <?php
                        if (mysqli_num_rows($users_query) > 0) {
                            while ($user = mysqli_fetch_assoc($users_query)) {
                                echo '<li class="list-group-item">
                                    <a href="admin_messages.php?user_id=' . $user['id'] . '" class="text-decoration-none">
                                        <strong>' . $user['name'] . '</strong> - ' . $user['email'] . '
                                    </a>
                                </li>';
                            }
                        } else {
                            echo '<li class="list-group-item text-center">Chưa có tin nhắn nào.</li>';
                        }
                        ?>
                    </ul>
                </div>

                <!-- Khu vực chat -->
                <div class="col-md-8">
                    <?php
                    if (isset($_GET['user_id'])) {
                        $selected_user = $_GET['user_id'];

                        // Lấy tin nhắn giữa admin và user đã chọn
                        $messages_query = mysqli_query($conn, "
                            SELECT * FROM `message`
                            WHERE (sender_id = '$selected_user' AND receiver_id = '$admin_id')
                               OR (sender_id = '$admin_id' AND receiver_id = '$selected_user')
                            ORDER BY created_at ASC
                        ") or die('Query failed');
                    ?>
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 style="font-size: 20px;">Hội thoại với 
                                    <?php 
                                    $user_info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM users WHERE id = '$selected_user'"));
                                    echo $user_info['name']; 
                                    ?>
                                </h5>
                            </div>
                            <div class="card-body" id="chat-box" style="height: 400px; overflow-y: auto;">
                                <?php
                                if (mysqli_num_rows($messages_query) > 0) {
                                    while ($msg = mysqli_fetch_assoc($messages_query)) {
                                        $is_admin = ($msg['sender_id'] == $admin_id);
                                        $message_class = $is_admin ? 'admin-message' : 'user-message';

                                        echo '<div class="message-container ' . $message_class . '">
                                                <div class="' . $message_class . '">
                                                    ' . $msg['message'] . '
                                                    <span class="message-time">' . $msg['created_at'] . '</span>
                                                </div>
                                            </div>';
                                    }
                                } else {
                                    echo '<p class="text-center">Chưa có tin nhắn.</p>';
                                }
                                ?>
                            </div>
                            <div class="card-footer">
                                <form id="messageForm" method="post">
                                    <div class="d-flex">
                                        <input type="hidden" name="receiver_id" value="<?php echo $selected_user; ?>">
                                        <textarea class="form-control me-2" style="font-size: 16px;" id="message" name="message" rows="1" placeholder="Nhập tin nhắn..." required></textarea>
                                        <button type="submit" name="send_message" style="background-color: #0d6efd;" class="btn btn-primary">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php
                        if (isset($_POST['send_message'])) {
                            $receiver_id = $_POST['receiver_id'];
                            $message = mysqli_real_escape_string($conn, $_POST['message']);

                            // Thêm tin nhắn vào CSDL
                            $insert_query = mysqli_query($conn, "
                                INSERT INTO `message` (sender_id, receiver_id, message, status) 
                                VALUES ('$admin_id', '$receiver_id', '$message', 'sent')
                            ") or die('Query failed');

                            if ($insert_query) {
                                echo '<script>window.location.href="admin_messages.php?user_id=' . $receiver_id . '";</script>';
                            }
                        }
                        ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Cuộn xuống tin nhắn mới nhất khi mở chat
        window.onload = function () {
            let chatBox = document.getElementById("chat-box");
            if (chatBox) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        };
    </script>
</body>

</html>
