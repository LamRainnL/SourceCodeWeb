<?php
session_start();

if (isset($_POST['submit'])) {
    $tieude = $_POST['tieude'];
    $mota = $_POST['mota'];
    $inf=$_POST['infor'];
    $trangthai = "pending";
    $thoigiandang = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
    $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
    mysqli_set_charset($kn, "utf8mb4");
    $caulenh = "INSERT INTO timtro (TenBaiViet, NoiDung, Id_User, status,ThoiGianDang,thongtinlienhe) VALUES ('$tieude', '$mota','" . $_SESSION['id'] . "', '$trangthai','$thoigiandang','$inf')";

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

    mysqli_close($kn);
}
?>
