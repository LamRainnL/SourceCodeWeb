<?php
session_start();
if (isset($_POST['submit'])) {
	//Lấy dữ liệu từ Form
	$sdt = $_POST["sdt"];
	$pass = $_POST["password"];
	//Kết nối
	$kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
	//Xây dựng câu lệnh truy vấn
	$caulenh = "select * from users where Sdt='" . $sdt . "'";
	$result = mysqli_query($kn, $caulenh);
	$row = mysqli_fetch_array($result);
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
			$_SESSION['ten'] = $ten;
			// header("location:/trangchu.php");
			echo"<script> 
							alert('Đăng nhập thành công'); 
							window.location.href = '/trangchu.php';
						  </script>";
		}
	}
	mysqli_close($kn);

}
?>