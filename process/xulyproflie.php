<?php
session_start();
if(isset($_POST['submit'])){
//Lấy dữ liệu từ form
$ho=$_POST["ho"];
$ten=$_POST["ten"];
$sdt=$_POST["sdt"];
$email=$_POST["email"];

	//Kết nối
	$kn=mysqli_connect("localhost","root","","webtimtro") or die ("Không thể kết nối!");
	//Xây dựng câu lệnh truy vấn
	$sql = "SELECT * FROM users where Id_User = " . $_SESSION['id']."";
	$result=mysqli_query($kn,$sql);
	$row = mysqli_fetch_array($result);
   // Cập nhật họ
$updateho = "UPDATE users SET TenDangNhap = '".$ho."' WHERE Id_User = " . $_SESSION['id']."";

// Cập nhật tên
$updateten = "UPDATE users SET TenDangNhap = '".$ten."' WHERE Id_User = " . $_SESSION['id']."";

// Cập nhật số điện thoại
$updatesdt = "UPDATE users SET Sdt = '".$sdt."' WHERE Id_User = " . $_SESSION['id']."";

// Cập nhật email
$updateemail = "UPDATE users SET Email = '".$email."' WHERE Id_User = " . $_SESSION['id']."";
	if(mysqli_query($kn,$updateho)){
		echo"<script> 
				alert('Thông tin đã được cập nhật.');
                window.location.href = '/profile.php?id=".$_SESSION['id']."';
			</script>";
	}
    if(mysqli_query($kn,$updateten))
    {
        $ten = $row['TenDangNhap'];
        $_SESSION['ten'] = $ten;
        echo"<script> 
        alert('Thông tin đã được cập nhật.');
        window.location.href = '/profile.php?id=".$_SESSION['id']."';
    </script>";
    }
    if(mysqli_query($kn,$updatesdt)){
        echo"<script> 
        alert('Thông tin đã được cập nhật.');
        window.location.href = '/profile.php?id=".$_SESSION['id']."';
    </script>";
    }
    if(mysqli_query($kn,$updateemail)){
        echo"<script> 
        alert('Thông tin đã được cập nhật.');
        window.location.href = '/profile.php?id=".$_SESSION['id']."';
    </script>";
    }
	//Đóng kết nối
	mysqli_close($kn);
}
