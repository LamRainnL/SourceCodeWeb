<?php
session_start();
if (isset($_POST['submit'])) {
    $ho = $_POST["ho"];
    $ten = $_POST["ten"];
    $sdt = $_POST["sdt"];
    $email = $_POST["email"];

    $kn = mysqli_connect("localhost", "root", "", "webtimtro") or die("Không thể kết nối!");

    $sql = "SELECT * FROM users WHERE Id_User = " . $_SESSION['id'];
    $result = mysqli_query($kn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $updateFields = array();

        if ($ho != $row['Ho']) {
            $updateFields[] = "Ho = '$ho'";
        }

        if ($ten != $row['Ten']) {
            $updateFields[] = "Ten = '$ten'";
            $_SESSION['ten'] = $ten; // Cập nhật session với tên mới
        }

        if ($sdt != $row['Sdt']) {
            $checkQuery = "SELECT * FROM users WHERE Sdt = '$sdt'";
            $checkResult = mysqli_query($kn, $checkQuery);
            if (mysqli_num_rows($checkResult) > 0) {
                echo "<script> 
                    alert('Số điện thoại đã tồn tại trong cơ sở dữ liệu. Vui lòng sử dụng số điện thoại khác.');
                    window.history.back();
                </script>";
                exit; // Dừng việc thực hiện các cập nhật khác
            }
            $updateFields[] = "Sdt = '$sdt'";
        }

        if ($email != $row['Email']) {
            $updateFields[] = "Email = '$email'";
        }

        if (!empty($updateFields)) {
            $updateQuery = "UPDATE users SET " . implode(", ", $updateFields) . " WHERE Id_User = " . $_SESSION['id'];
            if (mysqli_query($kn, $updateQuery)) {
                echo "<script> 
                    alert('Thông tin đã được cập nhật.');
                    window.location.href = '/profile.php?id=" . $_SESSION['id'] . "';
                </script>";
            }
        } else {
            echo "<script> 
                alert('Không có thay đổi trong thông tin.');
                window.location.href = '/profile.php?id=" . $_SESSION['id'] . "';
            </script>";
        }
    } else {
        echo 'Không tìm thấy dữ liệu!';
    }

    mysqli_close($kn);
}
?>