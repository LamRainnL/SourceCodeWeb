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
                <form action="xulydangbai.php" method="post" enctype="multipart/form-data">
                    <div class="form-group"><label for="tieude">Tiêu Đề:</label>
                    <input type="text" name="tieude" id="tieude" required><br>
                    </div>
                    <div class="form-group">
                    <label for="loaihinhchothue">Loại Hình Cho Thuê:</label>
                    <select name="loaihinhchothue" id="loaihinhchothue">
                        <option value="NhaNguyenCan">Nhà Nguyên Căn</option>
                        <option value="PhongTro">Phòng Trọ</option>
                        <!-- Thêm các loại hình khác vào đây -->
                    </select><br>
                    </div>
                    <div class="form-group">
                    <label for="hinhanh">Hình Ảnh:</label>
                    <input type="file" name="hinhanh" id="hinhanh"><br>
                    </div>
                    <div class="form-group">
                    <label for="phuong">Phường:</label>
                    <input type="text" name="phuong" id="phuong"><br>
                    </div>
                    <div class="form-group">
                    <label for="diachicuthe">Địa Chỉ Cụ Thể:</label>
                    <input type="text" name="diachicuthe" id="diachicuthe"><br>
                    </div>
                    <div class="form-group">
                    <label for="dientich">Diện Tích:</label>
                    <input type="text" name="dientich" id="dientich"><br>
                    </div>
                    <div class="form-group">
                    <label for="sophong">Số Phòng:</label>
                    <input type="number" name="sophong" id="sophong"><br>
                    </div>
                    <div class="form-group">
                    <label for="gia">Giá:</label>
                    <input type="text" name="gia" id="gia"><br>
                    </div>
                    <div class="form-group">
                    <label for="mota">Mô Tả:</label>
                    <textarea name="mota" id="mota"></textarea><br>
                    </div>
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