$(document).ready(function () {
    $('#eye').click(function () {
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('open')) {
            $(this).prev().attr('type', 'text');
        } else {
            $(this).prev().attr('type', 'password');
        }
    });
});
//Ghi nhớ pass
// Lấy ô checkbox "Ghi nhớ mật khẩu"
var rememberMeCheckbox = document.getElementById("remember-me");

// Lấy trường nhập mật khẩu
var passwordInput = document.querySelector('input[type="password"]');

// Kiểm tra xem người dùng đã đánh dấu "Ghi nhớ mật khẩu" hay không
rememberMeCheckbox.addEventListener("change", function () {
    if (this.checked) {
        // Lưu mật khẩu vào cookie hoặc localStorage
        localStorage.setItem("rememberedPassword", passwordInput.value);
    } else {
        // Xóa mật khẩu khỏi cookie hoặc localStorage
        localStorage.removeItem("rememberedPassword");
    }
});
//Kiểm tra xem có mật khẩu được ghi nhớ khi trang web được tải lại và điền nó vào trường mật khẩu nếu cần
document.addEventListener("DOMContentLoaded", function () {
    // Kiểm tra xem có mật khẩu được ghi nhớ hay không
    var rememberedPassword = localStorage.getItem("rememberedPassword");

    if (rememberedPassword) {
        // Nếu có, điền mật khẩu vào trường mật khẩu
        passwordInput.value = rememberedPassword;
        rememberMeCheckbox.checked = true;
    }
});
