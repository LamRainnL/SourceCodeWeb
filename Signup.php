<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/logincss.css">
    <!-- <link rel="stylesheet" href="script.js"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="/js/loginscript.js"></script>
    <title>Đăng ký</title>
</head>

<body>
    <div id="wrapper">
        <form action="" id="form-login" method="POST" onsubmit="return validateForm();">
            <a href="trangchu.php" id="homeicon"><i class="fa fa-home" aria-hidden="true"></i></a>
            <h1 class="form-heading">Đăng Ký</h1>
            <div class="form-group" style="display: flex; justify-content: space-between;">
                <div>
                    <input type="text" class="form-input" placeholder="Họ" required>
                </div>
                <div>
                    <input type="text" class="form-input" placeholder="Tên" required>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-input" id="phone" placeholder="Số điện thoại" onblur="validatePhoneNumber(this.value)" required>
                <span id="phoneError" style="color: red;"></span>
            </div>
            <!-- Kiểm tra sdt khi người dùng nhập -->
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
                function validatePhoneNumber(phoneNumber) {
                    // Mẫu định dạng số điện thoại cho Việt Nam (10 chữ số, bắt đầu bằng "0" hoặc "+84")
                    var phonePattern = /^(?:0|\+84)[1-9]\d{8}$/;
                    var phoneError = document.getElementById('phoneError');
                    var loginButton = document.getElementById('signup-button');

                    if (phonePattern.test(phoneNumber)) {
                        phoneError.textContent = '';
                        loginButton.disabled = false; // Cho phép đăng nhập
                    } else {
                        phoneError.textContent = 'Số điện thoại không hợp lệ';
                        loginButton.disabled = true; // Ngăn đăng nhập
                    }
                }
            </script>
            <div class="form-group">
                <input type="text" class="form-input" id="email" placeholder="Email" required>
                <span id="emailError" style="color: red;"></span>
            </div>
            <!-- Kiểm tra email khi người dùng nhập -->
            <script>
                var emailInput = document.getElementById('email');
                var emailError = document.getElementById('emailError');

                emailInput.addEventListener('input', function() {
                    var email = emailInput.value;
                    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                    if (emailPattern.test(email)) {
                        emailError.textContent = '';
                    } else {
                        emailError.textContent = 'Email không hợp lệ';
                    }
                });
            </script>
            <!-- Kiểm tra định dạng email khi người dùng nhấn đăng ký -->
            <script>
                function validateForm() {
                    var email = emailInput.value;
                    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                    if (!emailPattern.test(email)) {
                        emailError.textContent = 'Email không hợp lệ';
                        return false; // Ngăn chặn gửi form nếu email không hợp lệ
                    }

                    // Kiểm tra các điều kiện khác ở đây nếu cần

                    return true; // Cho phép gửi form nếu tất cả điều kiện đều đúng
                }
            </script>

            <div class="form-group">
                <input type="password" id="password" class="form-input" name="password" placeholder="Mật khẩu" required>
                <div class="eye" onclick="togglePasswordVisibility('password')">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-group">
                <input type="password" id="confirm-password" class="form-input" name="confirm-password" placeholder="Nhập lại mật khẩu" required>
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

                var passwordInput = document.getElementById('password');
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
            <input type="submit" value="Đăng ký" id="signup-button" class="form-submit">
            <div class="form-group2">
                <span>
                    Bạn đã có tài khoản? <a href="Login.php">Đăng nhập</a>
                </span>
            </div>
        </form>
    </div>

</body>

</html>