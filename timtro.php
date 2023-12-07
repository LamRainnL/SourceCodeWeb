<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/chothue.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tìm trọ</title>
</head>

<body>
    <?php
    require 'layout/header.php';
    ?>
    <div id="main">
        <div class="tongquat">
            <div class="top">Đăng bài tìm trọ</div>
            <hr>
            <div class="mid">
                <form action="/process/xulydangbaitimtro.php" method="post" enctype="multipart/form-data">
                    <div class="form-group"><label for="tieude">Tiêu Đề</label>
                        <input type="text" name="tieude" id="tieude" required><br>
                    </div>

                    <div class="form-group">
                        <label for="mota">Nội dung</label>
                        <textarea name="mota" id="mota"></textarea><br>
                    </div>
                    <div class="form-group">
                        <label for="mota">Thông tin liên hệ</label>
                        <input type="text" name="infor" id="infor" required><br>
                    </div>
                    <input type="submit" name="submit" value="Đăng Bài">
                </form>


            </div>
        </div>
    </div>
</body>

</html>
