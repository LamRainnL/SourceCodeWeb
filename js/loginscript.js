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
    var rememberMeCheckbox = document.getElementById('remember-me');
    var phoneNumberInput = document.querySelector('input[name="sdt"]');
    var passwordInput = document.querySelector('input[name="password"]');

    // Khôi phục thông tin đăng nhập từ localStorage nếu đã lưu trước đó
    if (localStorage.getItem('rememberedPhoneNumber')) {
        phoneNumberInput.value = localStorage.getItem('rememberedPhoneNumber');
        passwordInput.value = localStorage.getItem('rememberedPassword');
    }

    document.getElementById('form-login').addEventListener('submit', function (event) {
        if (rememberMeCheckbox.checked) {
            // Nếu checkbox "Ghi nhớ mật khẩu" đã được chọn
            localStorage.setItem('rememberedPhoneNumber', phoneNumberInput.value);
            localStorage.setItem('rememberedPassword', passwordInput.value);
        }
    });

