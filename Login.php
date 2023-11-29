<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/logincss.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="/js/loginscript.js"></script>
    <title>Đăng nhập</title>
</head>

<body>
    <div id="wrapper">
        <form action="process/xulydangnhap.php" id="form-login" method="post" onsubmit="return handleSubmit()">
            <a href="trangchu.php" id="homeicon"><i class="fa fa-home" aria-hidden="true"></i> </a>
            <h1 class="form-heading">Đăng Nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="sdt" placeholder="Số điện thoại" onblur="validatePhoneNumber(this.value)" required>
                <!-- Kiểm tra sdt  -->
                <span id="phoneError" style="color: red;"></span>
                <script>
                    var loginTimer; // Biến để theo dõi thời gian nhấn giữ
                    var formSubmitted = false;

                    function validatePhoneNumber(phoneNumber) {
                        var phonePattern = /^(?:0|\+84)[1-9]\d{8}$/;
                        var phoneError = document.getElementById('phoneError');
                        var changeButton = document.getElementById('login-button');

                        if (phonePattern.test(phoneNumber)) {
                            phoneError.textContent = '';
                            if (!formSubmitted) {
                                changeButton.disabled = false;
                            }
                        } else {
                            phoneError.textContent = 'Số điện thoại không hợp lệ';
                            if (!formSubmitted) {
                                changeButton.disabled = true;
                            }
                        }
                    }

                    function handleMouseDown() {
                        // Kiểm tra xem có phải là lần nhấn đầu tiên hay không
                        if (!formSubmitted) {
                            loginTimer = setTimeout(function () {
                                // Nếu nhấn giữ trong 3 giây, chuyển hướng đến trang admin_login
                                alert('Bạn đã nhấn giữ nút đăng nhập trong 3 giây. Bạn sẽ được chuyển hướng đến trang Đăng nhập dành cho Admin.');
                                window.location.href = 'admin_login.php';

                                // Tránh form submit khi chuyển hướng bằng JavaScript
                                formSubmitted = true;
                                document.getElementById('form-login').submit();
                            }, 3000);
                        }
                    }

                    function handleMouseUp() {
                        // Hủy thời gian nhấn giữ nếu nhả nút trước khi đạt 3 giây
                        clearTimeout(loginTimer);
                    }

                    function handleSubmit() {
                        // Ngăn chặn form submit nếu đã nhấn giữ nút
                        if (formSubmitted) {
                            return false;
                        }

                        // Thực hiện các bước xử lý đăng nhập thông thường
                        // ...
                    }
                </script>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="password" placeholder="Mật khẩu" required>
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-group1">
                <a href="Change.php" class="change"><label>Đổi mật khẩu</label></a>
            </div>
            <input type="submit" name="submit" value="Đăng nhập" id="login-button" class="form-submit"
                onmousedown="handleMouseDown()" onmouseup="handleMouseUp()">
            <div class="form-group2">
                <span>
                    Bạn chưa có tài khoản? <a href="Signup.php">Đăng ký</a>
                </span>
            </div>
        </form>
    </div>
</body>

</html>
