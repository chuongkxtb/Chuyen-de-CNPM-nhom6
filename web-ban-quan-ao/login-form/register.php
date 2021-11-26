<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Register</title>
</head>

<body>
    <div id="wrapper">
        <form action="" id="form-login">
            <h1 class="form-heading">Đăng ký</h1>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-input" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu">
                <div id="eye"><i class="far fa-eye"></i></div>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Nhập lại Mật khẩu">
                <div id="eye"><i class="far fa-eye"></i></div>
            </div>
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-input" placeholder="Email">
            </div>
            <div class="form-group">
                <i class="fas fa-phone"></i>
                <input type="text" class="form-input" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" class="form-input" placeholder="Địa chỉ">
            </div>
            <input type="submit" class="form-submit" value="Đăng ký">
            <a href="login.php">Đăng Nhập</a>

        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>

</html>