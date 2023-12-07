<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/trangdanhsachphongtro.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kết quả lọc</title>
</head>

<body>
    <?php
    require 'layout/header.php';
    ?>
    <!-- ---------danh sách phòng trọ----------->
    <div class="main">
        <hr width="100%">
        <div class="thanhphan">
            <?php
            $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
            mysqli_set_charset($kn, "utf8mb4");
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $caulenh1 = "SELECT * FROM phongtro WHERE status='approved'";
                $phuong = mysqli_real_escape_string($kn, $_POST['phuong']);
                if (isset($_POST['phuong']) && $_POST['phuong'] != 0) {
                    $phuong = $_POST['phuong'];
                    $caulenh1 .= " AND Phuong = '$phuong'";
                }

                if (isset($_POST['gia']) && $_POST['gia'] != 0) {
                    $gia = $_POST['gia'];

                    switch ($gia) {
                        case 1:
                            //điều kiện cho giá dưới 1 triệu
                            $caulenh1 .= " AND Gia < 1000000";
                            break;
                        case 2:
                            $caulenh1 .= " AND Gia BETWEEN 1000000 AND 3000000";
                            break;
                        case 3:
                            $caulenh1 .= " AND Gia BETWEEN 3000000 AND 7000000";
                            break;
                        case 4:
                            $caulenh1 .= " AND Gia BETWEEN 7000000 AND 15000000";
                            break;
                    }
                }

                if (isset($_POST['dientich']) && $_POST['dientich'] != 0) {
                    $dientich = $_POST['dientich'];

                    switch ($dientich) {
                        case 1:
                            $caulenh1 .= " AND DienTich = 50";
                            break;
                        case 2:
                            $caulenh1 .= " AND DienTich BETWEEN 50 AND 100";
                            break;
                        case 3:
                            $caulenh1 .= " AND DienTich BETWEEN 100 AND 200";
                            break;
                        case 4:
                            $caulenh1 .= " AND DienTich BETWEEN 200 AND 300";
                            break;
                    }
                }
                $caulenh1 .= " ORDER BY ThoiGianDang DESC";
                $result1 = mysqli_query($kn, $caulenh1);
                // Kiểm tra xem có kết quả từ truy vấn hay không
                if (!$result1) {
                    die('Câu truy vấn bị lỗi: ' . mysqli_error($kn));
                }
                    $hasResults = false; // Biến để kiểm tra có kết quả hay không
                    while ($row = mysqli_fetch_array($result1)) {
                        $hasResults = true; // Đã có kết quả
                        $id_pt = $row["Id_PhongTro"];
                        echo "<div class='tongquat'>
                <a href='trangphongchitiet.php?id=$id_pt'>
                    <div class='noidung'>
                        <div class='top'>
                            <img src='/process/" . $row["HinhAnh"] . "' alt='hinhanh'/>
                        </div>
                        <div class='bottom'>
                            <h4>" . $row["MoTa"] . " phường " . $row["Phuong"] . "</h4>
                            <p>Số phòng: " . $row["SoPhong"] . "</p>
                            <p>Diện tích: " . $row["DienTich"] . " m²</p>
                            <p style='color:#4a67b7; font-weight: 700; font-size: 18px'>" . $row["Gia"] . " VNĐ</p>
                        </div>
                    </div>
                </a>       
            </div>";
                    }

                    // Hiển thị thông báo nếu không có kết quả
                    if (!$hasResults) {
                        echo "<p>Không có phòng khả dụng!</p>";
                    }
                // Đóng kết nối đến cơ sở dữ liệu
                mysqli_close($kn);
            }
            ?>
        </div>
    </div>
    <?php
    require 'layout/footer.php';
    ?>
</body>

</html>