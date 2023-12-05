<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<?php
session_start();

if (isset($_POST['submit'])) {
  // Lấy dữ liệu từ biểu mẫu
  $tieude = $_POST['tieude'];
  $id_loaihinhchothue = $_POST['loaihinhchothue'];
  $phuong = $_POST['phuong'];
  $diachicuthe = $_POST['diachicuthe'];
  $dientich = $_POST['dientich'];
  $sophong = $_POST['sophong'];
  $gia = $_POST['gia'];
  $mota = $_POST['mota'];
  $trangthai = "pending";
  $hinhanhsource = "";

  $uploadDir = "upimg/"; // Thư mục để lưu trữ hình ảnh
  $fileName = time() . "_" . $_FILES["hinhanh"]["name"]; // Tạo tên tệp duy nhất
  $uploadFile = $uploadDir . $fileName; // Định nghĩa biến $uploadFile
  // Xử lý tải lên hình ảnh (đã có mã của bạn)
  if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $uploadFile)) {
    $hinhanhsource = $uploadFile;
  } else {
    echo "Lỗi khi tải lên hình ảnh.";
  }

  // ...

  //1.KẾT NỐI
  $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
  mysqli_set_charset($kn, "utf8");
  mysqli_set_charset($kn, "utf8mb4");

  // Lấy thông tin từ bảng danhmuc dựa trên id_danhmuc
  $tenloaihinhchothue_query = "SELECT tendanhmuc FROM danhmuc WHERE id_danhmuc = $id_loaihinhchothue";
  $result_loaihinhchothue = mysqli_query($kn, $tenloaihinhchothue_query);

  if ($result_loaihinhchothue) {
    $row_loaihinhchothue = mysqli_fetch_assoc($result_loaihinhchothue);
    $tenloaihinhchothue = $row_loaihinhchothue['tendanhmuc'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigiandang = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
    $caulenh = "INSERT INTO phongtro (TieuDe, LoaiHinhChoThue, HinhAnh, DiaChiCuThe, Phuong, Gia, DienTich, SoPhong, Mota, Id_DanhMuc, Id_User, status, ThoiGianDang)
            VALUES ('$tieude', '$tenloaihinhchothue', '$hinhanhsource', '$diachicuthe', '$phuong', '$gia', '$dientich', '$sophong', '$mota', '$id_loaihinhchothue', '" . $_SESSION['id'] . "', '$trangthai', '$thoigiandang')";

    $result = mysqli_query($kn, $caulenh);

    if ($result) {
      echo "<script>
                alert('Bài đăng đã được gửi và đang chờ duyệt.'); 
                window.location.href = '/trangchu.php';
            </script>";
    } else {
      echo "<script> 
                alert('Lỗi khi đăng bài: " . mysqli_error($kn) . "'); 
                window.history.back();
            </script>";
    }
  } else {
    echo "<script> 
            alert('Lỗi khi lấy thông tin danh mục: " . mysqli_error($kn) . "'); 
            window.history.back();
        </script>";
  }

  mysqli_close($kn);
}
