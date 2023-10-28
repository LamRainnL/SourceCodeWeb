// <!-- Kiểm tra sdt khi người dùng nhập -->

function validatePhoneNumber(phoneNumber) {
    // Mẫu định dạng số điện thoại cho Việt Nam (10 chữ số, bắt đầu bằng "0" hoặc "+84")
    var phonePattern = /^(?:0|\+84)[1-9]\d{8}$/;

    if (phonePattern.test(phoneNumber)) {
        document.getElementById('phoneError').textContent = '';
    } else {
        document.getElementById('phoneError').textContent = 'Số điện thoại không hợp lệ';
    }
}
// <!-- Kiểm tra, ngăn chặn việc nhập sai số điện thoại khi người dùng đăng nhập-->
function validatePhoneNumber(phoneNumber) {
    // Mẫu định dạng số điện thoại cho Việt Nam (10 chữ số, bắt đầu bằng "0" hoặc "+84")
    var phonePattern = /^(?:0|\+84)[1-9]\d{8}$/;
    var phoneError = document.getElementById('phoneError');
    var loginButton = document.getElementById('update-button');

    if (phonePattern.test(phoneNumber)) {
        phoneError.textContent = '';
        loginButton.disabled = false; // Cho phép đăng nhập
    } else {
        phoneError.textContent = 'Số điện thoại không hợp lệ';
        loginButton.disabled = true; // Ngăn đăng nhập
    }
}
// <!-- Kiểm tra email khi người dùng nhập -->
var emailInput = document.getElementById('email');
var emailError = document.getElementById('emailError');

emailInput.addEventListener('input', function () {
    var email = emailInput.value;
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (emailPattern.test(email)) {
        emailError.textContent = '';
    } else {
        emailError.textContent = 'Email không hợp lệ';
    }
});
// <!-- Kiểm tra định dạng email khi người dùng nhấn đăng ký -->
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
