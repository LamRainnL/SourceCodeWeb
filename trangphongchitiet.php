<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/trangphongchitiet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    $sql_user = "SELECT * FROM users WHERE Id_Users='" . $_SESSION['id'] . "'";
    $result = mysqli_query($kn, $sql);
    $result_user = mysqli_query($kn, $sql_user);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);

        echo "<div class='main'>
            <!-- Phần bên trái -->
            <div class='left-section'>
                <div class='picture'>
                    <img src='/process/{$row['HinhAnh']}' alt='Hình ảnh phòng trọ'>
                </div>
                <div class='room-info'>
                    <h2>Thông tin chính</h2>
                    <p>Diện tích: {$row['DienTich']}<sup>2</sup></p>
                    <p>Số phòng: {$row['SoPhong']} phòng</p>
                    <p>Giá thuê: {$row['Gia']} VNĐ/tháng</p>
                </div>
                <!-- Bản đồ -->
                <div class='map-container'>
                    <div id='map' style='height: 400px;'></div>
                </div>
                
            </div>
        </div>";
    }
    if (mysqli_num_rows($result_user)) {
        $row_user = mysqli_fetch_assoc($result_user);
        // <!-- Phần bên phải -->
        echo " <div class='right-section'>
            <!-- Thông tin liên hệ -->
            <h3>Thông tin liên hệ</h3>
            <p>Email: {$row_user['Email']}</p>
            <p>Điện thoại: {$row_user['DienThoai']}</p>
        </div>";
    }

    mysqli_close($kn);
    require 'layout/footer.php';
    ?>
    <script>
        function initMap() {
            var geocoder = new google.maps.Geocoder();
            var address = '<?php echo $row['DiaChiCuThe']; ?>';

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
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABlFsaRMal0ZDHQjg65jnUbqGS9gTTDTs&callback=initMap"></script>
</body>

</html>