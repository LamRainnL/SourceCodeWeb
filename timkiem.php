<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/trangdanhsachphongtro.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kết quả tìm kiếm</title>
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
           if (isset($_GET['search'])) {
            $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
            $keyword = mysqli_real_escape_string($kn, $_GET['search']);
            mysqli_set_charset($kn, "utf8mb4");
        
            // Xây dựng câu lệnh truy vấn
            $sql = "SELECT * FROM phongtro
                    WHERE MATCH(full_text_search_column) AGAINST ('$keyword' IN NATURAL LANGUAGE MODE) and phongtro.status='approved'";
            
            $kq = mysqli_query($kn, $sql);
        
            if (!$kq) {
                die('Câu truy vấn bị lỗi: ' . mysqli_error($kn));
            }
        
            $hasResults = false; // Biến để kiểm tra có kết quả hay không
        
            while ($row = mysqli_fetch_array($kq)) {
                $hasResults = true; // Đã có kết quả
                $id_pt = $row["Id_PhongTro"];
                echo "<div class='tongquat'>
                    <a href='trangphongchitiet.php?id=$id_pt'>
                        <div class='noidung'>
                            <div class='top'>
                                <img src='/process/" . $row["HinhAnh"] . "' alt='hinhanh'/>
                            </div>
                            <div class='bottom'>
                                <h4>" . $row["MoTa"] . " phường ". $row["Phuong"] ."</h4>
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
                echo "<p>Không có phòng khả dụng cho từ khóa '$keyword'.</p>";
            }
        
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