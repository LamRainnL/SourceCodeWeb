<?php
session_start();
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="/js/header.js"></script>
</head>
<!-- HEADER TOP : START -->
<div id="header">
    <div class="header-top">
        <div class="information">
            <div>
                <i class="fa fa-phone" aria-hidden="true" class="icon"></i>
                <a href="tel:+84387374815"> Hotline: 0387374815</a>
            </div>
            <div>
                <i class="fa fa-envelope" aria-hidden="true" class="icon"></i>
                <a href="mailto:qnhome@gmail.com"> Email: qnhome@gmail.com</a>
            </div>
        </div>

        <?php
        //kiểm tra xem biến session đã tồn tại hay chưa
        if (isset($_SESSION["ten"])) {
            $conn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không thể kết nối");
            $sql = "select * from users";
            mysqli_query($conn, "SET NAMES 'utf8'");
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_array($result);
                    //Nếu tồn tại thì thay đổi nội dung của chỗ đăng nhập
                    echo '<div class="account" id="account" >
                    Hii,  ' . $_SESSION['ten'] . ' !
                    <div class="account-content-container">
                        <div class="account-content">
                            <a href="profile.php?id='.$_SESSION['id'].'">Hồ sơ của bạn</a> </br>
                            <hr>
                            <a href="logout.php" id="logout">Đăng xuất  <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                        </div>
                    </div>
                 </div>';
                
            }
            //Nếu tồn tại thì thay đổi nội dung của chỗ đăng nhập
            echo '
            <div class="top-right-container">
                <div id="dangbai"><a href="dangbai.php">Đăng Bài</a></div>
                <div class="account" id="account" >
                        Hii,  ' . $_SESSION["ten"] . ' !
                        <div class="account-content-container">
                            <div class="account-content">
                                <a href="profile.php">Hồ sơ của bạn</a> </br>
                                <hr>
                                <a href="logout.php" id="logout">Đăng xuất  <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
            </div>
            ';
        } else {
            echo '
        <div class="user-control">
            <ul>
                <li>
                    <i class="fa fa-user" aria-hidden="true"></i><a href="Signup.php"> Đăng ký</a>
                </li>
                <li>
                    <i class="fa fa-sign-in" aria-hidden="true"><a href="Login.php"> Đăng nhập</a></i>
                </li>
            </ul>
        </div>
    
		    ';
        }
        ?>
    </div>
    <script>
        document.getElementById('account').addEventListener('click', function() {
            var accountContentContainer = this.querySelector('.account-content-container');
            if (accountContentContainer.classList.contains('open')) {
                accountContentContainer.classList.remove('open');
            } else {
                accountContentContainer.classList.add('open');
            }
        });
    </script>

    <!-- HEADER TOP : END -->
    <!-- HEADER BOTTOM : START-->
    <div class="menu">
        <div class="logo">
            <a href="trangchu.php"><img src="/images/homelogo.png" alt="logo" /></a>
        </div>
        <div class="search">
            <form class="search" action="" method="GET">
                <input type="text" name="search" id="search" placeholder="">
                <button type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <script type="text/javascript">
            var placeholderText = "Bạn có thể tìm trọ hoặc phòng tại đây..";
            var placeholderElement = document.getElementById("search");
            var index = 0;
            setInterval(function() {
                // Lặp lại từ đầu nếu đã hiển thị tất cả ký tự
                if (index >= placeholderText.length) {
                    index = 0;
                }
                // Hiển thị một ký tự mới
                placeholderElement.placeholder = placeholderText.substring(0, index + 1);
                index++;
            }, 100); // Thời gian hiển thị mỗi ký tự (đơn vị: milliseconds)
        </script>
        <div class="list-menu">
            <div class="child"><a href="trangchu.php">TRANG CHỦ</a></div>
            <div class="child"><a href="trangdanhsachphongtro.php">PHÒNG TRỌ</a></div>
            <div class="child"><a href="#can_ho">CĂN HỘ</a></div>
            <div class="child"><a href="#nha_nguyen_can">SLEEP BOX</a></div>
            <div class="child"><a href="#nha_nguyen_can">NHÀ NGUYÊN CĂN</a></div>

        </div>
    </div>
</div>