<?php 
  if(isset($_POST['submit']))
  {
  // Lấy dữ liệu từ biểu mẫu
  $tieude = $_POST['tieude'];
  $loaihinhchothue = $_POST['loaihinhchothue'];
  $phuong = $_POST['phuong'];
  $diachicuthe = $_POST['diachicuthe'];
  $dientich = $_POST['dientich'];
  $sophong = $_POST['sophong'];
  $gia = $_POST['gia'];
  $mota = $_POST['mota'];
  $trangthai="pending";
  //1.KẾT NỐI
  $kn=mysqli_connect("localhost","root","","webtimtro") or die("Không kết nối được");
  //2.CHỌN CSDL
  //3.QUY ĐỊNH BẢNG MÃ KẾT NỐI CỦA MÌNH
  //4.XÂY DỰNG CÂU LỆNH TRUY VẤN
  $caulenh="insert into phongtro (TieuDe,LoaiHinhChoThue,HinhAnh,DiaChiCuThe,Phuong,Gia,DienTich,SoPhong,Mota,status) value ('".$tieude."','".$loaihinhchothue."','".$email."','".$sdt."','".$matkhau."')";
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