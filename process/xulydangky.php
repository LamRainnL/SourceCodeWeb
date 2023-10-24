<?php 
  if(isset($_POST['submit']))
  {
  //LẤY DỮ LIỆU TỪ FORM
  $ten=$_POST["ten"];
  $sdt=$_POST["sdt"];
  $matkhau=$_POST["password"];
  $email=$_POST["email"];
  //1.KẾT NỐI
  $kn=mysqli_connect("localhost","root","","webtimtro") or die("Không kết nối được");
  //2.CHỌN CSDL
  //3.QUY ĐỊNH BẢNG MÃ KẾT NỐI CỦA MÌNH
  //4.XÂY DỰNG CÂU LỆNH TRUY VẤN
  $caulenh="insert into users (TenDangNhap,Email,Sdt,MatKhau) value ('".$ten."','".$email."','".$sdt."','".$matkhau."')";
  $caulenhcheck="select * from users where Sdt='".$sdt."'";
  $result=mysqli_query($kn,$caulenhcheck);
  $row=mysqli_fetch_array($result);
  //5.THỰC HIỆN CÂU LỆNH TRUY VẤN
    $kqcheck=mysqli_query($kn,$caulenhcheck);
	 if($row=mysqli_fetch_array($kqcheck)){
		echo "<script> 
				alert('Số điện thoại đã được đăng ký! Hãy đăng ký với số điện thoại khác');
					window.history.back();
				</script>";
	}
	 else{
		if($kq=mysqli_query($kn,$caulenh)){
			echo "<script>
					alert('Đăng ký thành công'); 
					window.location.href = '/Login.php';
				  </script>";
		}
		else{
			echo "<script> 
					alert('Đăng ký không thành công'); 
					window.history.back();
				  </script>";
		}
	}	
  //6.LẤY KẾT QUẢ TRẢ VỀ ĐỂ XỬ LÝ
  //8.ĐÓNG CSDL
  mysqli_close($kn);
}
?>