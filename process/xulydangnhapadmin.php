<?php
session_start();
if (isset($_POST['submit'])) {
	//Lấy dữ liệu từ Form
	$tendn = $_POST["username"];
	$pass = $_POST["password"];
	//Kết nối
	$kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
	//Xây dựng câu lệnh truy vấn
	$admin = "select * from admins where TenDangNhap='" . $tendn . "'";
	$result = mysqli_query($kn, $admin);
	$row = mysqli_fetch_array($result);
	//-------------------------------------------------------------//
	//Kiểm tra tên tài khoản có tồn tại trong cơ sở dữ liệu không
	if (mysqli_num_rows($result) == 0) {
		echo "<script> 
					alert('Tên tài khoản không tồn tại'); 
					window.history.back();
				  </script>";
	} else {
		$mkcsdl = $row['MatKhau'];
		// Kiểm tra xem mật khẩu hiện tại có đúng hay không
		if ($pass != $mkcsdl) {
			// Mật khẩu hiện tại không đúng
			echo "<script> 
					alert('Mật khẩu hiện tại không đúng'); 
					window.history.back();
				  </script>";
		} else {
			$ten = $row['TenDangNhap'];
			$_SESSION['admin'] = $ten;
			echo"<script> 
							alert('Đăng nhập thành công'); 
							window.location.href = '/Admin/duyetbai.php';
						  </script>";
		}
	}
	mysqli_close($kn);

}
?>