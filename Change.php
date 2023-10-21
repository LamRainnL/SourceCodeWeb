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
    <title>Đổi mật khẩu</title>
</head>

<body>
    <div id="wrapper">
        <form action="/process/xulydoimatkhau.php" id="form-login" method="post" onsubmit="return validateForm();">
            <a href="trangchu.php" id="homeicon"><i class="fa fa-home" aria-hidden="true"></i> </a>
            <h1 class="form-heading">Đổi mật khẩu</h1>
            <div class="form-group">
                <input type="text" class="form-input" name="sdt" placeholder="Số điện thoại" onblur="validatePhoneNumber(this.value)" required>
                <!-- Kiểm tra sdt  -->
                <span id="phoneError" style="color: red;"></span>
                <script>
                    function validatePhoneNumber(phoneNumber) {
                        // Mẫu định dạng số điện thoại cho Việt Nam (10 chữ số, bắt đầu bằng "0" hoặc "+84")
                        var phonePattern = /^(?:0|\+84)[1-9]\d{8}$/;

                        if (phonePattern.test(phoneNumber)) {
                            document.getElementById('phoneError').textContent = '';
                        } else {
                            document.getElementById('phoneError').textContent = 'Số điện thoại không hợp lệ';
                        }
                    }
                </script>
                <!-- Kiểm tra, ngăn chặn việc nhập sai số điện thoại khi người dùng đăng nhập-->
                <script>
                    var formSubmitted = false; // Biến để theo dõi trạng thái submit

                    // Hàm kiểm tra số điện thoại
                    function validatePhoneNumber(phoneNumber) {
                        var phonePattern = /^(?:0|\+84)[1-9]\d{8}$/;
                        var phoneError = document.getElementById('phoneError');
                        var changeButton = document.getElementById('change-button');

                        if (phonePattern.test(phoneNumber)) {
                            phoneError.textContent = '';
                            if (!formSubmitted) {
                                changeButton.disabled = false; // Cho phép đổi mật khẩu nếu chưa submit
                            }
                        } else {
                            phoneError.textContent = 'Số điện thoại không hợp lệ';
                            if (!formSubmitted) {
                                changeButton.disabled = true; // Ngăn chặn đổi mật khẩu nếu chưa submit
                            }
                        }
                    }

                    // Hàm xử lý form submit
                    function handleSubmit() {
                        formSubmitted = true; // Đánh dấu form đã được submit
                    }
                </script>

            </div>
            <div class="form-group">
                <input type="password" id="oldpassword" class="form-input" name="oldpassword" placeholder="Mật khẩu cũ" required>
                <div class="eye" onclick="togglePasswordVisibility('oldpassword')">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-group">
                <input type="password" id="newpassword" class="form-input" name="newpassword" placeholder="Mật khẩu mới" required>
                <div class="eye" onclick="togglePasswordVisibility('newpassword')">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-group">
                <input type="password" id="confirm-password" class="form-input" name="confirm-password" placeholder="Nhập lại mật khẩu mới" required>
                <div class="eye" onclick="togglePasswordVisibility('confirm-password')">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <span id="password-error" style="color: red;"></span>
            <script>
                function togglePasswordVisibility(inputId) {
                    var passwordInput = document.getElementById(inputId);
                    var toggleIcon = passwordInput.nextElementSibling;

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleIcon.innerHTML = '<i class="far fa-eye-slash"></i>';
                    } else {
                        passwordInput.type = 'password';
                        toggleIcon.innerHTML = '<i class="far fa-eye"></i>';
                    }
                }

                var passwordInput = document.getElementById('newpassword');
                var confirmPasswordInput = document.getElementById('confirm-password');
                var passwordError = document.getElementById('password-error');

                confirmPasswordInput.addEventListener('input', function() {
                    var password = passwordInput.value;
                    var confirmPassword = confirmPasswordInput.value;

                    if (password !== confirmPassword) {
                        passwordError.textContent = 'Mật khẩu không khớp';
                    } else {
                        passwordError.textContent = '';
                    }
                });
            </script>
            <input type="submit" name="submit" value="Đổi mât khẩu" id="change-button" class="form-submit">
        </form>
    </div>

</body>

</html>