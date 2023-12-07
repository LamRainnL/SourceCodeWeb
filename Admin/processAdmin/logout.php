<?php
// Khởi tạo session
session_start();

// Xóa toàn bộ thông tin phiên làm việc
session_unset();
session_destroy();

// Chuyển hướng về trang chủ
echo"<script> 
		alert('Đã kết thúc phiên làm việc.'); 
		window.location.href = '/trangchu.php';
	</script>";
exit;
?>