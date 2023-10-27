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
            <div class="filter-list">
                <div class="custom-select" style="width: 174px">
                    <select class="select">
                        <option value="0" style="border-radius: 20px">
                            Chọn tên phường
                        </option>
                        <option value="1">Ngô Mây</option>
                        <option value="2">Nguyễn Văn Cừ</option>
                        <option value="3">Quang Trung</option>
                        <option value="4">Đống Đa</option>
                        <option value="5">Bùi Thị Xuân</option>
                        <option value="6">Ghềnh Ráng</option>
                        <option value="7">Hải Cảng</option>
                        <option value="8">Lê Hồng Phong</option>
                        <option value="9">Lê Lợi</option>
                        <option value="10">Lý Thường Kiệt</option>
                        <option value="11">Nhơn Bình</option>
                        <option value="12">Nhơn Phú</option>
                        <option value="13">Thị Nại</option>
                        <option value="14">Trần Hưng Đạo</option>
                        <option value="15">Trần Phú</option>
                        <option value="16">Trần Quang Diệu</option>
                    </select>
                </div>

                <div class="custom-select" style="width: 200px; margin-left: 10px">
                    <select class="select">
                        <option value="0">Chọn khoảng giá</option>
                        <option value="1">Dưới 1 triệu</option>
                        <option value="2">1 - 3 triệu</option>
                        <option value="3">3 - 7 triệu</option>
                        <option value="4">7 - 15 triệu</option>
                        <option value="5">15 - 25 triệu</option>
                        <option value="6">25 - 50 triệu</option>
                        <option value="7">50 - 70 triệu</option>
                        <option value="8">70 - 100 triệu</option>
                    </select>
                </div>

                <div class="custom-select" style="width: 200px; margin-left: 10px">
                    <select class="select">
                        <option value="0">Chọn diện tích</option>
                        <option value="1">15m2</option>
                        <option value="2">15 - 20m2</option>
                        <option value="3">20 - 30 m2</option>
                        <option value="4">30 - 50m2</option>
                        <option value="5">50 - 70 m2</option>
                        <option value="6">70 - 100m2</option>
                    </select>
                </div>
                <button>Lọc <i class="fa fa-search"></i></button>
            </div>
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
        <section id="sidebar">
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
        </section>
        <!-- MAIN CONTENT : START -->
        <div class="main-content">
            <div class="top-list">
                <div class="title-content">
                    <h1>BÀI VIẾT MỚI</h1>
                </div>
                <ul class="list-item">
                    <a href="trangphongchitiet.php">
                        <li>
                            <div class="card">
                                <div class="image">
                                    <img src="/images/demo2.jpg" alt="image" />
                                </div>
                                <div class="text">
                                    <h3>
                                        Cho thuê phòng mới diện tích 35m2, giá 5tr/tháng có sẵn
                                        đầy đủ nội thất
                                    </h3>
                                    <span class="price">3.000.000 VNĐ</span>
                                    <span class="area">15m²</span>
                                    <p class="location">
                                        <i class="fa fa-thumb-tack" aria-hidden="true"></i> 02/64
                                        An Dương Vương
                                    </p>
                                    <p class="description">
                                        Chính chủ cho thuê phòng trọ t.Phòng trọ rộng rãi, thoáng
                                        mát, an ninh, tiện ích đầy đủ , tổng diện tích 15m²
                                    </p>
                                </div>
                            </div>
                        </li>
                    </a>
                </ul>
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