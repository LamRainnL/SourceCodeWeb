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



    <?php
    $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");

    $caulenh = "select * from timtro where status='pending'";
    $result = mysqli_query($kn, $caulenh);
    $caulenh1 = "select * from phongtro where status='pending'";
    $result1 = mysqli_query($kn, $caulenh1);
    echo "<div class='container'>
        <div class='column'>
<h1>Danh sách bài đăng tìm trọ chờ duyệt</h1>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='tongquat'>
    <div class='noidung'>
        <h2>" . $row["TenBaiViet"] . "</h2>
        <p>" . $row["NoiDung"] . "</p>
    </div>
    <div class='xuly'>
        <form method='POST' action='approve_post.php'>
            <input type='hidden' name='post_id' value='" . $row["Id_TimTro"] . "'>
            <button type='submit' name='submit' class='approve-button'>
                <i class='fas fa-check'></i> Duyệt
            </button>
        </form>
        <form method='POST' action='delete_post.php'>
            <input type='hidden' name='post_id' value='" . $row["Id_TimTro"] . "'>
            <button type='submit' name='submit' class='delete-button'>
                <i class='fas fa-trash'></i> Từ chối
            </button>
        </form>
    </div>
</div>";
    }
    echo ' </div>';
    echo "<div class='column'>
    <h1>Danh sách bài đăng cho thuê trọ chờ duyệt</h1>";

    while ($row = mysqli_fetch_array($result1)) {
        echo "<div class='tongquat'>
    <div class='noidung'>
        <h2>" . $row["TieuDe"] . "</h2>
        <p>" . $row["LoaiHinhChoThue"] . "</p>
        <img src=" . $row["HinhAnh"] . "alt='hinhanh'/>
        <p>" . $row["DiaChiCuThe"] . "</p>
        <p>" . $row["Phuong"] . "</p>
        <p>" . $row["Gia"] . "</p>
        <p>" . $row["DienTich"] . "</p>
        <p>" . $row["SoPhong"] . "</p>
        <p>" . $row["MoTa"] . "</p>
    </div>
    <div class='xuly'>
        <form method='POST' action='approve_post1.php'>
            <input type='hidden' name='post_id' value='" . $row["Id_PhongTro"] . "'>
            <button type='submit' name='submit' class='approve-button'>
                <i class='fas fa-check'></i> Duyệt
            </button>
        </form>
        <form method='POST' action='delete_post1.php'>
            <input type='hidden' name='post_id' value='" . $row["Id_PhongTro"] . "'>
            <button type='submit' name='submit' class='delete-button'>
                <i class='fas fa-trash'></i> Từ chối
            </button>
        </form>
    </div>
</div>";
    }
    echo '</div>
        </div>';
    mysqli_close($kn);
    ?>
</body>

</html>