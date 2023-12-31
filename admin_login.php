<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #login-form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        #login-form h2 {
            text-align: center;
            color: #333333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            background-color: #3498db;
            color: #ffffff;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #2980b9;
        }
        #login-form {
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        #login-form h2 {
            color: #3498db;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            border: 1px solid #3498db;
        }

        .form-group input[type="submit"] {
            background-color: #3498db;
            color: #ffffff;
            border: 1px solid #3498db;
        }

        .form-group input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
    <title>Đăng nhập dành cho Admin</title>
</head>

<body>
    <div id="login-form">
        <h2>Đăng Nhập</h2>
        <form action="process/xulydangnhapadmin.php" method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Đăng nhập">
            </div>
        </form>
    </div>
</body>

</html>