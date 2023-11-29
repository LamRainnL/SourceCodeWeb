<?php
if (isset($_POST['submit'])) {
	//Lấy dữ liệu từ form
	$sdt = $_POST["sdt"];
	$oldpass = $_POST["oldpassword"];
	$newpass = $_POST["newpassword"];
	//Kết nối
	$kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không thể kết nối!");
	mysqli_set_charset($kn, "utf8");
	mysqli_set_charset($kn, "utf8mb4");
	//Xây dựng câu lệnh truy vấn
	$checksdt = "SELECT * FROM users WHERE Sdt = '" . $sdt . "'";
	$result = mysqli_query($kn, $checksdt);
	//Kiểm tra tên tài khoản có tồn tại trong cơ sở dữ liệu không
	if (mysqli_num_rows($result) == 0) {
		echo "<script> 
					alert('Tên tài khoản không tồn tại'); 
					window.history.back();
				  </script>";
	} else {
		$row = mysqli_fetch_array($result);
		$mkcsdl = $row['MatKhau'];
		// Kiểm tra xem mật khẩu hiện tại có đúng hay không
		if ($oldpass != $mkcsdl) {
			// Mật khẩu hiện tại không đúng
			echo "<script> 
					alert('Mật khẩu hiện tại không đúng'); 
					window.history.back();
				  </script>";
		} else {
			// Cập nhật mật khẩu mới của người dùng
			$updatepass = "UPDATE users SET MatKhau = '" . $newpass . "' WHERE Sdt = '" . $sdt . "'";
			if (mysqli_query($kn, $updatepass)) {
				echo "<script> 
						alert('Mật khẩu đã được cập nhật.'); 
						window.location.href = '/Login.php';
					</script>";
			}
		}
	}
	//Đóng kết nối
	mysqli_close($kn);
}
