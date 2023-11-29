<?php
session_start();

if (isset($_POST['submit'])) {
    $tieude = $_POST['tieude'];
    $mota = $_POST['mota'];
    $trangthai = "pending";
    $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
    mysqli_set_charset($kn, "utf8mb4");
    $caulenh = "INSERT INTO timtro (TenBaiViet, NoiDung, Id_User, status) VALUES ('$tieude', '$mota','" . $_SESSION['id'] . "', '$trangthai')";

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
