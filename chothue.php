<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/chothue.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Đăng bài</title>
</head>

<body>
    <?php
    require 'layout/header.php';
    ?>
    <div id="main">
        <div class="tongquat">
            <div class="top">Đăng bài cho thuê trọ</div>
            <hr>
            <div class="mid">
                <form action="/process/xulydangbaichothue.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tieude">Tiêu Đề:</label>
                        <input type="text" name="tieude" id="tieude" required><br>
                    </div>
                    <div class="form-group">
                        <label for="loaihinhchothue">Loại Hình Cho Thuê:</label>
                        <?php
                        $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
                        mysqli_query($kn, "SET NAMES 'utf8'");
                        $sql = "SELECT * FROM danhmuc";
                        $result = mysqli_query($kn, $sql);
                        if (mysqli_num_rows($result)) {
                            echo '<select name="loaihinhchothue" id="loaihinhchothue" required>';
                            while ($row = mysqli_fetch_array($result)) {
                                $ma = $row['Id_DanhMuc'];
                                $ten = $row['TenDanhMuc'];
                                echo "<option value='$ma'>$ten</option>";
                            }
                        }
                        echo '</select><br>';
                        mysqli_close($kn);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="hinhanh">Hình Ảnh:</label>
                        <input type="file" name="hinhanh" id="hinhanh" multiple required><br>
                    </div>
                    <div class="image-preview">
                        <ul id="image-list"></ul>
                    </div>
                    <div class="form-group">
                        <label for="phuong">Phường:</label>
                        <div class="custom-select" style="width: 200px; margin-top: 10px;">
                            <select name="phuong" id="phuong" required>
                                <option value="" disabled selected hidden>Chọn phường</option>
                                <!-- Các option sẽ được thêm bằng mã JavaScript -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="diachicuthe">Địa Chỉ Cụ Thể:</label>
                        <input type="text" name="diachicuthe" id="diachicuthe" required><br>
                    </div>
                    <div class="form-group">
                        <label for="dientich">Diện Tích(m²):</label>
                        <input type="number" name="dientich" id="dientich" required><br>
                    </div>
                    <div class="form-group">
                        <label for="sophong">Số Phòng:</label>
                        <input type="number" name="sophong" id="sophong" required><br>
                    </div>
                    <div class="form-group">
                        <label for="gia">Giá(VND):</label>
                        <input type="number" name="gia" id="gia" required><br>
                    </div>
                    <div class="form-group">
                        <label for="mota">Mô Tả:</label>
                        <textarea name="mota" id="mota" required></textarea><br>
                    </div>
                    <input type="submit" name="submit" value="Đăng Bài">
                </form>
                <script>
                    // JavaScript để hiển thị xem trước các hình ảnh đã chọn
                    var hinhAnhInput = document.getElementById("hinhanh");
                    var imageList = document.getElementById("image-list");

                    hinhAnhInput.addEventListener("change", function () {
                        var files = hinhAnhInput.files;

                        // Xóa bất kỳ hình ảnh trước đó trong danh sách xem trước
                        imageList.innerHTML = "";

                        // Hiển thị các hình ảnh đã chọn
                        for (var i = 0; i < files.length; i++) {
                            var file = files[i];
                            if (file.type.match("image.*")) {
                                var listItem = document.createElement("li");
                                var image = document.createElement("img");
                                image.src = URL.createObjectURL(file);
                                image.classList.add("preview-image");
                                listItem.appendChild(image);
                                imageList.appendChild(listItem);
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var wards = [
            "Ngô Mây", "Nguyễn Văn Cừ", "Quang Trung", "Đống Đa",
            "Bùi Thị Xuân", "Ghềnh Ráng", "Hải Cảng", "Lê Hồng Phong",
            "Lê Lợi", "Lý Thường Kiệt", "Nhơn Bình", "Nhơn Phú",
            "Thị Nại", "Trần Hưng Đạo", "Trần Phú", "Trần Quang Diệu"
        ];

        var selectPhuong = document.getElementById("phuong");

        // Thêm các option vào dropdown từ mảng "wards"
        wards.forEach(function (ward) {
            var option = document.createElement("option");
            option.value = ward;
            option.textContent = ward;
            selectPhuong.appendChild(option);
        });
    });
</script>

</body>

</html>
