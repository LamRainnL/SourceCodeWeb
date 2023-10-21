<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dangbai.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Đăng bài</title>
</head>

<body>
    <?php
    require 'layout/header.php';
    ?>
    <div id="main">
        <div class="tongquat">
            <div class="top">Bạn muốn đăng</div>
            <hr>
            <div class="mid">
                <form>
                    <div class="phanchinh">
                        <a href="chothue.php">
                            <div class="chothue">
                                <div class="media"><img src="/images/sale.png" alt="chothue"></div>
                                <div class="text">Cho thuê phòng</div>
                            </div>
                        </a>
                        <a href="timphong">
                            <div class="tim">
                                <div class="media"><img src="/images/rent.png" alt="tim"></div>
                                <div class="text">Tìm phòng</div>
                            </div>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>