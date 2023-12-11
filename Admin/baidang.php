<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập với tài khoản admin chưa
if (!isset($_SESSION['admin'])) {
    echo "<script> 
				alert('Bạn chưa có đủ quyền truy cập!'); 
                window.location.href = '/trangchu.php';
          </script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/quanlybaidang.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Quản lý bài đăng</title>
</head>

<body>
    <br>
    <div style="float: left; margin-left: 20px;"><a href="/Admin/processAdmin/logout.php" id="logout" style="color: black;">  <i class="fa fa-sign-out" aria-hidden="true"></i></a></div>
    <div style="float: right; margin-right: 20px;">
        <a href="/Admin/duyetbai.php">Bài đăng chờ duyệt</a>
    </div>
    <br>
    <?php
    $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
    mysqli_set_charset($kn, "utf8");
    mysqli_set_charset($kn, "utf8mb4");
    $caulenh = "SELECT * from timtro where status='approved' ORDER BY ThoiGianDang DESC";
    $result = mysqli_query($kn, $caulenh);
    $caulenh1 = "SELECT * from phongtro where status='approved' ORDER BY ThoiGianDang DESC";
    $result1 = mysqli_query($kn, $caulenh1);
    echo "<div class='container'>
        <div class='column'>
        <h1>Danh sách bài đăng tìm trọ</h1>";
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='tongquat'>
        <div>
            <h2>" . $row["TenBaiViet"] . "</h2></br>
            <p>" . $row["NoiDung"] . "</p>
        </div>
        <div class='xuly'>
            <form method='POST' action='/Admin/processAdmin/delete_post.php'>
                <input type='hidden' name='post_id' value='" . $row["Id_TimTro"] . "'>
                <button type='submit' name='submit' class='delete-button'>
                    <i class='fas fa-trash'></i> Xóa
                </button>
            </form>
        </div>
        </div>";
        }
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($kn);
    }

    echo ' </div>';
    echo "<div class='column'>
    <h1>Danh sách bài đăng cho thuê trọ</h1>";
    if ($result1) {
        while ($row = mysqli_fetch_array($result1)) {
            echo "<div class='tongquat'>
        <div class='noidung'>
        <div class='left'>
            <img src='/process/" . $row["HinhAnh"] . "' alt='hinhanh'/>
        </div>
        <div class='right'>
            <h2>" . $row["TieuDe"] . "</h2>
            <p>Phường: " . $row["Phuong"] . "</p>
            <p>Giá thuê: " . $row["Gia"] . " VNĐ</p>
            <p>Số phòng: " . $row["SoPhong"] . "</p>
            <p>Diện tích: " . $row["DienTich"] . " m²</p>
        </div>
    </div>
    <div class='xuly'>
        <form method='POST' action='/Admin/processAdmin/delete_post1.php'>
            <input type='hidden' name='post_id' value='" . $row["Id_PhongTro"] . "'>
            <button type='submit' name='submit' class='delete-button'>
                <i class='fas fa-trash'></i> Xóa
            </button>
        </form>
    </div>
</div>";
        }
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($kn);
    }

    echo '</div>
        </div>';
    mysqli_close($kn);
    ?>
</body>

</html>