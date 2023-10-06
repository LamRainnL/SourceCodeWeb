<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="trangphongchitiet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <title>Chi tiết phòng</title>
</head>

<body>
    <?php
    require 'header.php';
    ?>
    <main>
        <hr width="85%" />
        <div class="containers">
            <div class="row">
                <div class="main-content">
                    <div class="title" style="padding-top: 20px;">
                        <h3>Phòng Trọ Thoáng Mát Gần Trường Học</h3>
                    </div>

                    <!-----ảnh chi tiết phòng trọ---->

                    <div class="slideshow-container">

                        <div class="mySlides fade">
                            <img src="https://noithatnhadepviet.vn/upload/news/1-thiet-ke-nha-tro-7286.jpg" alt="ảnh phòng trọ" style="width:100%">
                        </div>

                        <div class="mySlides fade">
                            <img src="https://lh5.googleusercontent.com/zDC4UXtqBSwGw3zh8AsMTu1kJg3WxIRlobMJJ7QYyLSap3nIDQ_vzXVVfo-3o83HZKKzQ46mguLH5OvnHFEu0cXbWy9xNeaglSGHhTX3G8Sytywdj2cqICzX-oiZynHP5CeLXEu_uYHE95kUcec-Q4dE8vyc0gA0EzDoyNP61JjApqvAdEax_t2kIe2cTt0Q" alt="ảnh phòng trọ" style="width:100%">
                        </div>

                        <div class="mySlides fade">
                            <img src="https://noithatnhadepviet.vn/upload/elfinder/h%C3%ACnh%20thi%E1%BA%BFt%20k%E1%BA%BF/hinh%20support%205/2-thiet-ke-nha-tro-12m2.jpg" alt="ảnh phòng trọ" style="width:100%">
                        </div>
                    </div>
                    <br>

                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>

                    <script>
                        let slideIndex = 1;
                        showSlides(slideIndex);

                        function plusSlides(n) {
                            showSlides(slideIndex += n);
                        }

                        function currentSlide(n) {
                            showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                            let i;
                            let slides = document.getElementsByClassName("mySlides");
                            let dots = document.getElementsByClassName("dot");
                            if (n > slides.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = slides.length
                            }
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " active";
                        }
                    </script>

                    <!----------------->
                    <div class="main-infor" style="padding-top: 20px; padding-bottom: 20px;">
                        <div class="pull-left">
                            <div class="address">
                                <span class="infor-label">Địa chỉ </span>
                                <span class="infor-data">64 Nguyễn Nhạc, Ngô Mây, Quy Nhơn</span>
                            </div>
                            <div class="size">
                                <span class="infor-label">Diện tích </span>
                                <a href="" class="infor-data">15m2</a>
                                <span class="infor-label" style="margin-left: 30px;">Loại phòng</span>
                                <span class="infor-data">Phòng trọ</span>
                            </div>
                            <div class="foor">
                                <span class="infor-label">Số tầng</span>
                                <span class="infor-data">1</span>
                            </div>
                            <div class="bedroom">
                                <span class="infor-label">Phòng ngủ</span>
                                <span class="infor-data">1</span>
                                <span class="infor-label" style="margin-left: 30px;">Vệ sinh</span>
                                <span class="infor-data">Riêng</span>
                            </div>
                        </div>

                        <div class="pull-right" style="text-align: center;">
                            <h4 style="padding-top:13px">Thông tin liên hệ
                                <hr width="85%">
                            </h4>

                            <div class="agent-contact">
                                <i class="fa fa-phone" aria-hidden="true" style="padding-top: 10px; padding-bottom:10px">0345440835</i>
                                <p style="color: brown;">2.000.000 Đ/Tháng</p>
                            </div>
                        </div>
                    </div>
                    <!-------Thông tin phòng trọ----------->
                    <div class="infor" style="padding-bottom: 20px;">
                        <p><b>THÔNG TIN CHI TIẾT</b>
                            <hr width="100%">
                        </p>
                        <p>PHÒNG TRỌ THOÁNG MÁT GẦN TRƯỜNG HỌC</p>
                        <p>
                            CHỈ TỪ 2,5 triệu đồng mỗi tháng bạn đã sở hữu được một chiếc phòng trọ siêu xịn sò
                            <br> Nội thất trong phòng kệ sách, kệ vật dụng, quạt treo tường, nệm.
                            <br> Ngoài ra còn có phòng bếp, nhà vệ sinh, các thiết bị điện đa dụng khác như máy giặt,
                            tủ lạnh, lò vi sóng, lò nướng,...
                            <br> - Phí dịch vụ:
                        <p>+ Điện: Theo giá nhà nước: 2.500Đ|KWh</p>
                        <p>+ Nước: 6.000Đ| Khối</p>
                        <p>+ Rác:10.0000Đ</p>

                        Địa chỉ: 64 Nguyễn Nhạc, Ngô Mây, Quy Nhơn
                        <br> SĐT: 0345440835

                        </p>
                    </div>

                    <!-----Bản đồ vị trí-->
                    <div class="location">
                        <p><b>BẢN ĐỒ VỊ TRÍ</b>
                            <hr width="100%" />
                        </p>
                        <iframe style="margin-bottom: 20px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.2422446333353!2d109.21663657485657!3d13.764259897005354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316f6c93478147fd%3A0xe32f6d2981345c1b!2zNjQgTmd1eeG7hW4gTmjhuqFjLCBOZ8O0IE3DonksIFRow6BuaCBwaOG7kSBRdWkgTmjGoW4sIELDrG5oIMSQ4buLbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1695361484841!5m2!1svi!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>


            </div>
            <!--------------sidebar------------->
            <div class="sidebar">
                <div class="shop-infor">

                    <h3 style="text-align: center;">Về chúng tôi</h3>
                    <img style="margin-left: 9px;margin-right: 9px;" class="logo-img-sidebar" src="images/homelogo.png" />

                    <p style="margin-left: 9px;margin-right: 9px;">QuyNhonHome là website đăng tin cho thuê hàng đầu, cho phép người cho thuê dễ dàng đăng tin cho thuê nhà, nhà trọ, phòng trọ, căn hộ chung cư.
                        Người thuê
                        có thể tìm kiếm nhà trọ, nhà cho thuê,... một cách dễ dàng, tiện lợi.
                    </p>
                    <p style="margin-left: 9px;margin-right: 9px;">QuyNhonHome có trách nhiệm chuyển tải thông tin. Chúng tôi không có trách nhiệm về các tin này.</p>
                </div>

                <div class="shop-phone">
                    <h3 style="text-align: center;">
                        Thông tin liên hệ
                    </h3>
                    <div style="margin-left: 9px;margin-right: 9px;">

                        <p><i class="fa fa-phone" aria-hidden="true"></i>SDT: 0254987639</p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i>Email: Quynhonhome@gmail.com</p>
                        <p><i class="fa fa-facebook" aria-hidden="true"></i>Facebook: Quynhonhome.facebook.com</p>
                    </div>
                </div>
                <div class="sidebar-img">
                    <img src="https://xaynhatro.net/wp-content/uploads/2018/06/f70f05c965f280acd9e3.jpg" />
                </div>
                <div class="sidebar-img">
                    <img src="http://media.phongtot.vn/xc5tx4cj/ads-3-min.png" />
                </div>
            </div>
        </div>
    </main>
    <?php
    require 'footer.php'
    ?>
</body>

</html>