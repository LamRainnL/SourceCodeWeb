<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/trangdanhsachphongtro.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Danh sách các phòng</title>
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
                c.addEventListener("click", function (e) {
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
            a.addEventListener("click", function (e) {
                /*khi 1 hộp chọn dc đóng vào, hãy đóng mọi hộp khác, và mở/đóng hộp chọn hiện tại*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
            /*1 hàm sẽ đóng tất cả các hộp chọn trong tài liệu, ngoại trừ hộp chọn hiện tại*/
            var x, y, i, xl, yl, arrNo = [];
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
    <!-- PAGE CONTENT : END -->
 
    <!---------danh sách phòng trọ----------->
<div class = "main">    
    <hr width="100%">
    <div class = "room-list">                 
            <div class = "room-item">
                <div class = "row">
                    <div class = "room">
                        
                        <div class = "room-title">
                            <a href = "trangphongchitiet.php"><h4>Phòng Trọ Mới Thoáng Mát Gần Trường Học</h4></a>
                        </div>
                        <div class = "picture">
                            <div class = "row">
                                <a href = "trangphongchitiet.php">
                                    <img class = "room-img" src = "https://noithatnhadepviet.vn/upload/news/1-thiet-ke-nha-tro-7286.jpg" alt = "ảnh phòng trọ">
                                </a>
                            </div>
                        </div>
                        <div class = "room-infor">                                           
                            <div class = "item-address">
                                <span>Địa chỉ: </span>
                                <a>64 Nguyễn Nhac, Ngô Mây, Quy Nhơn</a>
                            </div>
                            <div class = "item-area">
                            
                                    <span>Diện tích: </span>
                                    <a>15m2</a>
                            </div> 
                            <div class = "item-vs">
                                <span>Vệ sinh: </span>
                                <a>Riêng</a>
                            </div>  
                            
                            <div class = "item-price">
                                <span>Giá cả: </span>
                                <a>2.000.000 Đ/Tháng</a>
                            </div>
                            <div class = "item-utilities">
                                <span>Tiện ích: </span>
                                <a>Chỗ để xe, máy giặt, sân phơi, internet</a>
                            </div>
                        </div>                                  
                    </div>                              
                </div>  
            </div> 
                </div>
        </div>                    
    <?php
    require 'layout/footer.php';
    ?>
</body>
</html>