<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/trangphongchitiet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phòng</title>
</head>

<body>
    <?php
    require 'layout/header.php';
    $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
    mysqli_set_charset($kn, "utf8mb4");

    $id = $_GET['id'];
    $sql = "SELECT * FROM phongtro WHERE Id_PhongTro=$id";
    $result = mysqli_query($kn, $sql);
    $sql_user = "SELECT * FROM users WHERE Id_User='" . $_SESSION['id'] . "'";
    $result_user = mysqli_query($kn, $sql_user);

    echo "<div class='main'>";
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $phuong = $row['Phuong'];

        // Câu lệnh truy vấn để lấy các phòng trọ cùng phường
        $sql_cungphuong = "SELECT * FROM phongtro WHERE Phuong='$phuong' AND Id_PhongTro != $id";
        $result_cungphuong = mysqli_query($kn, $sql_cungphuong);

        // <!-- Phần bên trái -->
        echo "<div class='left-section'>
            <div class='picture'>
                <img src='/process/{$row['HinhAnh']}' alt='Hình ảnh phòng trọ'>
                <h1>{$row['TieuDe']}</h1>
                <br>
            </div>
            <div class='room-info'>
                <h2>Thông tin chính</h2><br>
                <hr>
                <table>
                    <tr>
                        <td><b>Loại hình</b></td>
                        <td><b>Diện tích</b></td>
                        <td><b>Số phòng</b></td>
                        <td><b>Giá thuê</b></td>
                    </tr>
                    <tr>
                        <td>{$row['LoaiHinhChoThue']}</td>
                        <td>{$row['DienTich']} m²</td>
                        <td>{$row['SoPhong']} phòng</td>
                        <td>{$row['Gia']} VNĐ/tháng</td>
                    </tr>
                </table>
                <hr>
                <ul>
                    <li><b>Phường</b>: {$row['Phuong']}</li>
                    <li><b>Địa chỉ cụ thể</b>: {$row['DiaChiCuThe']}</li>
                    <li><b>Mô tả thêm</b>: {$row['MoTa']}</li>
                </ul>
            </div>
            <!-- Bản đồ -->
            <div class='map-container'>
                <div id='map' style='height: 0px;'></div>
            </div>  
        </div>";
    }
    if ($result_user === false) {
        die("Lỗi truy vấn: " . mysqli_error($kn));
    }
    if (mysqli_num_rows($result_user) > 0) {
        $row_user = mysqli_fetch_assoc($result_user);
        // <!-- Phần bên phải -->
        echo "<div class='right-section'>
            <div class='info-container'>
                <!-- Thông tin liên hệ -->
                <div class='thongtinlienhe'>
                    <div class='hoten'>
                        <p>{$row_user['Ho']} {$row_user['Ten']}</p>
                    </div>  
                    <hr>
                    <div class='sdt'>
                        <i class='fa fa-phone' aria-hidden='true' class='icon'></i>
                        <a href='tel:+{$row_user['Sdt']}'>{$row_user['Sdt']}</a>
                    </div>
                </div>";

        if (mysqli_num_rows($result_cungphuong) > 0) {
            echo "<div class='danhsach'>
                <p>Danh sách phòng trọ cùng phường:</p><br><hr><br>";

            while ($row_cungphuong = mysqli_fetch_assoc($result_cungphuong)) {
                echo "<div class='phongcungphuong'>
                    <h3><a href='/trangphongchitiet.php?id={$row_cungphuong['Id_PhongTro']}'>{$row_cungphuong['TieuDe']}</a></h3>
                  </div>";
            }
            echo "</div>";
        } else {
            echo "<br><p>Không có phòng trọ nào cùng phường.</p>";
        }

        echo "</div>"; // Đóng div 'info-container'
        echo "</div>"; // Đóng div 'right-section'
    }
    echo "</div>"; // Đóng div 'main'
    mysqli_close($kn);
    require 'layout/footer.php';
    ?>

    <!-- <script>
        function initMap() {
            var geocoder = new google.maps.Geocoder();
             var address = 'đại chỉ cụ thể';

            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status === 'OK') {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 16,
                        center: results[0].geometry.location
                    });

                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        title: 'Địa chỉ cụ thể'
                    });
                } else {
                    console.error('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        initMap();
    </script> -->
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABlFsaRMal0ZDHQjg65jnUbqGS9gTTDTs&callback=initMap"></script> -->
    <!-- Thêm vào cuối trang body hoặc trước thẻ </body> -->

</body>

</html>