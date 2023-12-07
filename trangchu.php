<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/trangchu.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>QuyNhonHome</title>
</head>

<body>
    <?php
    require 'layout/header.php';
    ?>
    <!-- PAGE CONTENT : START -->
    <div class="page-homeqn-content">
        <div class="filter">
            <form id="filterForm" action="trangloc.php" method="post" style="align-items:center; margin-top: 6px;" onsubmit="return filterData();">
                <div class="filter-list">
                    <div class="custom-select" style="width: 174px">
                        <select id="phuong" name="phuong" class="select">
                            <option value="0" style="border-radius: 20px">
                                Chọn tên phường
                            </option>
                            <option value="Ngô Mây">Ngô Mây</option>
                            <option value="Nguyễn Văn Cừ">Nguyễn Văn Cừ</option>
                            <option value="Quang Trung">Quang Trung</option>
                            <option value="Đống Đa">Đống Đa</option>
                            <option value="Bùi Thị Xuân">Bùi Thị Xuân</option>
                            <option value="Ghềnh Ráng">Ghềnh Ráng</option>
                            <option value="Hải Cảng">Hải Cảng</option>
                            <option value="Lê Hồng Phong">Lê Hồng Phong</option>
                            <option value="Lê Lợi">Lê Lợi</option>
                            <option value="Lý Thường Kiệt">Lý Thường Kiệt</option>
                            <option value="Nhơn Bình">Nhơn Bình</option>
                            <option value="Nhơn Phú">Nhơn Phú</option>
                            <option value="Thị Nại">Thị Nại</option>
                            <option value="Trần Hưng Đạo">Trần Hưng Đạo</option>
                            <option value="Trần Phú">Trần Phú</option>
                            <option value="Trần Quang Diệu">Trần Quang Diệu</option>
                        </select>
                    </div>

                    <div class="custom-select" style="width: 200px; margin-left: 10px">
                        <select id="gia" name="gia" class="select">
                            <option value="0">Chọn khoảng giá</option>
                            <option value="1">Dưới 1 triệu</option>
                            <option value="2">1 - 3 triệu</option>
                            <option value="3">3 - 7 triệu</option>
                            <option value="4">7 - 15 triệu</option>
                            <option value="5">Trên 15 triệu</option>
                        </select>
                    </div>

                    <div class="custom-select" style="width: 200px; margin-left: 10px">
                        <select id="dientich" name="dientich" class="select">
                            <option value="0">Chọn diện tích</option>
                            <option value="1">50m²</option>
                            <option value="2">50 - 100m²</option>
                            <option value="3">100 - 200m²</option>
                            <option value="4">200 - 300m²</option>
                            <option value="5">Trên 300m²</option>
                        </select>
                    </div>
                    <button type="button" onclick="filterData()">Lọc <i class="fa fa-search"></i></button>
                    <!-- Script để kiểm tra trước khi gửi form -->
                    <script>
                        function filterData() {
                            var phuong = document.getElementById("phuong").value;
                            var gia = document.getElementById("gia").value;
                            var dientich = document.getElementById("dientich").value;
                            console.log("phuong: " + phuong);
                            console.log("gia: " + gia);
                            console.log("dientich: " + dientich);

                            // Kiểm tra nếu không có thông tin nào được chọn
                            if (phuong == 0 && gia == 0 && dientich == 0) {
                                alert("Vui lòng chọn ít nhất một thông tin để lọc.");
                                return false;
                            } else {
                                // Nếu có thông tin, thực hiện submit form
                                document.getElementById("filterForm").submit();
                            }
                        }
                    </script>
                </div>
            </form>

        </div>
        <!-- script cho bộ lọc -->
        <script>
            var x, i, j, l, ll, selElmnt, a, b, c;
            /*tìm kiếm bất kì phần tử nào có lớp "custon-select"*/
            x = document.getElementsByClassName("custom-select");
            l = x.length;
            for (i = 0; i < l; i++) {
                selElmnt = x[i].getElementsByTagName("select")[0];
                ll = selElmnt.length;
                /*đối với mỗi phần tử, tạo 1 DIV mới đóng vai trò là mục đã chọn*/
                a = document.createElement("DIV");
                a.setAttribute("class", "select-selected");
                a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                x[i].appendChild(a);
                /*đối với mỗi phần tử, tạo 1 DIV mới chứa danh sách tùy chọn*/
                b = document.createElement("DIV");
                b.setAttribute("class", "select-items select-hide");
                for (j = 1; j < ll; j++) {
                    /*cho mỗi tùy chọn trong phần tử chọn ban đầu, tạo 1 div mới sẽ oạt động như 1 tùy chọn*/
                    c = document.createElement("DIV");
                    c.innerHTML = selElmnt.options[j].innerHTML;
                    c.addEventListener("click", function(e) {
                        /*khi 1 mục dc nhấp vài, hãy cập nhật hộp chọn ban đầy và mục đã chọn*/
                        var y, i, k, s, h, sl, yl;
                        s =
                            this.parentNode.parentNode.getElementsByTagName("select")[0];
                        sl = s.length;
                        h = this.parentNode.previousSibling;
                        for (i = 0; i < sl; i++) {
                            if (s.options[i].innerHTML == this.innerHTML) {
                                s.selectedIndex = i;
                                h.innerHTML = this.innerHTML;
                                y =
                                    this.parentNode.getElementsByClassName(
                                        "same-as-selected"
                                    );
                                yl = y.length;
                                for (k = 0; k < yl; k++) {
                                    y[k].removeAttribute("class");
                                }
                                this.setAttribute("class", "same-as-selected");
                                break;
                            }
                        }
                        h.click();
                    });
                    b.appendChild(c);
                }
                x[i].appendChild(b);
                a.addEventListener("click", function(e) {
                    /*khi 1 hộp chọn dc đóng vào, hãy đóng mọi hộp khác, và mở/đóng hộp chọn hiện tại*/
                    e.stopPropagation();
                    closeAllSelect(this);
                    this.nextSibling.classList.toggle("select-hide");
                    this.classList.toggle("select-arrow-active");
                });
            }

            function closeAllSelect(elmnt) {
                /*1 hàm sẽ đóng tất cả các hộp chọn trong tài liệu, ngoại trừ hộp chọn hiện tại*/
                var x,
                    y,
                    i,
                    xl,
                    yl,
                    arrNo = [];
                x = document.getElementsByClassName("select-items");
                y = document.getElementsByClassName("select-selected");
                xl = x.length;
                yl = y.length;
                for (i = 0; i < yl; i++) {
                    if (elmnt == y[i]) {
                        arrNo.push(i);
                    } else {
                        y[i].classList.remove("select-arrow-active");
                    }
                }
                for (i = 0; i < xl; i++) {
                    if (arrNo.indexOf(i)) {
                        x[i].classList.add("select-hide");
                    }
                }
            }
            /*nếu người dùng nhấp vào bất cứ nơi nào bên ngoài hộp chọn, đóng tất cả các hộp chọn*/
            document.addEventListener("click", closeAllSelect);
        </script>
    </div>
    <!-- PAGE CONTENT : END -->
    <!-- MAIN : START -->
    <div id="main">
        <!-- <section id="sidebar">
            <section class="link-list">
                <span class="title">Xem theo giá</span>
                <hr>
                <ul class="price">
                    <li><a href="#">Dưới 1 triệu</a></li>
                    <li><a href="#">1 - 3 triệu</a></li>
                    <li><a href="#">3 - 7 triệu</a></li>
                    <li><a href="#">7 - 15 triệu</a></li>
                    <li><a href="#">15 - 25 triệu</a></li>
                    <li><a href="#">25 - 50 triệu</a></li>
                    <li><a href="#">50 - 75 triệu</a></li>
                </ul>
            </section>
            <section class="link-list">
                <span class="title">Xem theo diện tích</span>
                <hr>
                <ul class="price">
                    <li><a href="#">15m2</a></li>
                    <li><a href="#">15 - 20m2</a></li>
                    <li><a href="#">20 - 30m2</a></li>
                    <li><a href="#">30 - 50m2</a></li>
                    <li><a href="#">50 - 70m2</a></li>
                    <li><a href="#">70 - 100m2</a></li>
                </ul>
            </section>
        </section> -->
        <!-- MAIN CONTENT : START -->
        <div class="main-content">
            <div class="top-list">
                <div class="title-content">
                    <h1>BÀI VIẾT MỚI</h1>
                    <a href="baidangtimtromoi.php">Bài đăng tìm trọ mới</a>
                </div>
                <?php
                $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không kết nối được");
                mysqli_set_charset($kn, "utf8mb4");
                // Số bài viết trên mỗi trang
                $postsPerPage = 4;
                // Xác định trang hiện tại từ biến $_GET
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                // Tính offset để xác định bắt đầu của mỗi trang
                $offset = ($page - 1) * $postsPerPage;
                //Câu lệnh truy vấn
                $caulenh = "SELECT * from phongtro where status='approved' ORDER BY ThoiGianDang DESC";
                $result = mysqli_query($kn, $caulenh);
                $caulenh1 = "SELECT * from phongtro where status='approved' ORDER BY ThoiGianDang DESC LIMIT $postsPerPage OFFSET $offset";
                $result1 = mysqli_query($kn, $caulenh1);
                //Tính số lượng bài viết có trên trang
                $sumPostsOnPage = mysqli_num_rows($result);
                $hasresult = false;
                echo "<div class='container'>
                            <div class='column'>
                            <h1>Bài đăng cho thuê trọ</h1>
                            <hr>";
                if ($result1) {
                    while ($row = mysqli_fetch_array($result1)) {
                        $hasresult = true;

                        $id_pt = $row["Id_PhongTro"];
                        echo "<div class='tongquat'>
                                <a href='trangphongchitiet.php?id=$id_pt'>
                                    <div class='noidung'>
                                        <div class='left'>
                                            <img src='/process/" . $row["HinhAnh"] . "' alt='hinhanh'/>
                                        </div>
                                        <div class='right'>
                                            <h2>" . $row["TieuDe"] . "</h2>
                                            <p>Phường: " . $row["Phuong"] . "</p>
                                            <p>Giá thuê: " . $row["Gia"] . " VNĐ</p>
                                            <p>Số phòng: " . $row["SoPhong"] . "</p>
                                            <p>Diện tích: " . $row["DienTich"] . " m²</p>
                                            <p class='timeup'>Đã đăng: " . $row["ThoiGianDang"] . "</p>
                                        </div>
                                    </div>
                                </a>       
                            </div><hr>";
                    }
                    if (!$hasresult) {
                        echo '<p>Chưa có bài đăng mới!</p>';
                    }
                } else {
                    echo "Lỗi truy vấn!" . mysqli_error($kn);
                }

                echo '</div>';
                // Tính tổng số trang dựa trên số lượng bài viết và số bài viết trên mỗi trang
                $sumPostsOnPage = ceil($sumPostsOnPage / $postsPerPage);
                // Hiển thị liên kết phân trang
                echo '<div class="tongphantrang">
                    <div class="phantrang">';
                for ($i = 1; $i <= $sumPostsOnPage; $i++) {
                    echo '<a href="?page=' . $i . '"';
                    if ($i == $page) {
                        echo ' class="active"';
                    }
                    echo '>' . $i . '</a>';
                }
                echo '</div>
                    </div>
                </div>';
                mysqli_close($kn);
                ?>
            </div>
        </div>
    </div>
    <section id="support-container">
        <div class="bg-support">
            <img src="images/bg-support.jpg" alt="support image">
        </div>
        <div class="title-support">
            <p>Liên hệ với chúng tôi nếu bạn cần hỗ trợ</p>
        </div>
        <div class="content-support">
            <div class="content-support-contact">
                <span>HỖ TRỢ 1</span>
                <a target="_blank" href="tel: +8487374815" class="contact-info">Hotline: 0387374815</a>
                <a target="_blank" href="https://chat.zalo.me/0387374815" class="contact-info">Zalo: 0387374815</a>
            </div>
            <div class="content-support-contact">
                <span>HỖ TRỢ 2</span>
                <a target="_blank" href="tel: +8445440835" class="contact-info">Hotline: 0387374815</a>
                <a target="_blank" href="https://chat.zalo.me/0387374815" class="contact-info">Zalo: 0387374815</a>
            </div>
            <div class="content-support-contact">
                <span>HỖ TRỢ 3</span>
                <a target="_blank" href="tel: +8487374815" class="contact-info">Hotline: 0387374815</a>
                <a target="_blank" href="https://chat.zalo.me/0387374815" class="contact-info">Zalo: 0387374815</a>
            </div>
            <div class="content-support-contact">
                <span>PHẢN ÁNH/KHIẾU NẠI</span>
                <a target="_blank" href="tel: +8487374815" class="contact-info">Hotline: 0387374815</a>
                <a target="_blank" href="https://chat.zalo.me/0387374815" class="contact-info">Zalo: 0387374815</a>
            </div>
        </div>
    </section>
    <?php
    require 'layout/footer.php';
    ?>
</body>

</html>