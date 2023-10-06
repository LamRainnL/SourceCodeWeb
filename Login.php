<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logincss.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="loginscript.js"></script>
    <title>Đăng nhập</title>
</head>

<body>
    <div id="wrapper">
        <form action="xulylogin.php" id="form-login" method="post">
            <a href="trangchu.php" id="homeicon"><i class="fa fa-home" aria-hidden="true"></i>            </a>
            <h1 class="form-heading">Đăng Nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="username" placeholder="Số điện thoại"
                    onblur="validatePhoneNumber(this.value)" required>
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
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="password" placeholder="Mật khẩu" required>
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-group1">
                <div class="savepass">
                    <input type="checkbox" id="remember-me"> <label for="remember-me">Ghi nhớ mật khẩu</label>
                </div>
                <a href="" class="change"><label>Đổi mật khẩu</label></a>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
            <div class="form-group2">
                <span>
                    Bạn chưa có tài khoản? <a href="Signup.php">Đăng ký</a>
                </span>
            </div>
        </form>
    </div>

</body>

</html>