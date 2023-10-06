<?php
// Khởi tạo session
session_start();

// Xóa toàn bộ thông tin phiên làm việc
session_unset();
session_destroy();

// Chuyển hướng về trang chủ
header('Location: trangchu.php');
exit;
?>