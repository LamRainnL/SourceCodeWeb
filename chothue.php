<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chothue.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Đăng bài</title>
</head>

<body>
    <?php
    require 'header.php';
    ?>
    <div id="main">
        <div class="tongquat">
            <div class="top">Đăng bài cho thuê trọ</div>
            <hr>
            <div class="mid">
                <form action="xuly_dangbai.php" method="POST" enctype="multipart/form-data">
                    <label for="hinh_anh">Hình Ảnh Phòng Trọ:</label>
                    <input type="file" id="hinh_anh" name="hinh_anh[]" accept="image/*" multiple required>
                    <div id="image-preview"></div>

                    <label for="gia">Giá (VNĐ/tháng):</label>
                    <input type="number" id="gia" name="gia" required>

                    <label for="noi_that">Nội Thất:</label>
                    <input type="text" id="noi_that" name="noi_that" required>

                    <label for="dia_chi">Địa Chỉ:</label>
                    <input type="text" id="dia_chi" name="dia_chi" required>

                    <label for="dien_tich">Diện Tích (m²):</label>
                    <input type="number" id="dien_tich" name="dien_tich" required>

                    <label for="mo_ta">Mô Tả Thêm:</label>
                    <textarea id="mo_ta" name="mo_ta" rows="4" required></textarea>

                    <input type="submit" value="Đăng Bài">
                </form>

                <script>
                    // JavaScript để hiển thị xem trước các hình ảnh đã chọn
                    var hinhAnhInput = document.getElementById("hinh_anh");
                    var imagePreview = document.getElementById("image-preview");

                    hinhAnhInput.addEventListener("change", function() {
                        var files = hinhAnhInput.files;

                        // Xóa bất kỳ hình ảnh trước đó trong xem trước
                        imagePreview.innerHTML = "";

                        // Hiển thị các hình ảnh đã chọn
                        for (var i = 0; i < files.length; i++) {
                            var file = files[i];
                            if (file.type.match("image.*")) {
                                var image = document.createElement("img");
                                image.src = URL.createObjectURL(file);
                                image.classList.add("preview-image");
                                imagePreview.appendChild(image);
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>