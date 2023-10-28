<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/logincss.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="/js/profile.js"></script>
    <title>Profile</title>
</head>

<body>
    <div id="wrapper">
        <form action="process/xulyproflie.php" id="form-login" method="POST" onsubmit="return validateForm();">
            <a href="trangchu.php" id="homeicon"><i class="fa fa-home" aria-hidden="true"></i></a>
            <h1 class="form-heading">Hồ sơ cá nhân</h1>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không thể kết nối");

            // Lấy ID từ đường dẫn URL
            $id = $_GET['id'];
            // Truy vấn CSDL để lấy thông tin người dùng
            $sql = "SELECT * FROM users WHERE Id_User = $id";
            mysqli_query($conn, "SET NAMES 'utf8'");
            $result = mysqli_query($conn, $sql);
            // Kiểm tra lỗi trong truy vấn SQL
            if ($result === false) {
                die("Lỗi truy vấn: " . mysqli_error($conn));
            }
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $ho = $row['Ho'];
                $ten = $row['Ten'];
                $email = $row['Email'];
                $sdt = $row['Sdt'];
            ?>
                <div class="form-group" style="display: flex; justify-content: space-between;">
                    <div>
                        <input type="text" class="form-input" name="ho" placeholder="Họ" value="<?= htmlentities($ho) ?>" required>
                    </div>
                    <div>
                        <input type="text" class="form-input" name="ten" placeholder="Tên" value="<?= htmlentities($ten) ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" id="phone" name="sdt" placeholder="Số điện thoại" onblur="validatePhoneNumber(this.value)" value="<?= htmlentities($sdt) ?>" required>
                    <span id="phoneError" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" id="email" name="email" placeholder="Email" value="<?= htmlentities($email) ?>" required>
                    <span id="emailError" style="color: red;"></span>
                </div>
            <?php
            } else {
                echo 'Không tìm thấy dữ liệu!';
            }

            mysqli_close($conn);
            ?>

            <input type="submit" name="submit" value="Update" id="update-button" class="form-submit">

        </form>
    </div>

</body>

</html>