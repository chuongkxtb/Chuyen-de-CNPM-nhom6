
<?php
	include 'inc/header.php';
	
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insertCustomers = $cs->insert_customers($_POST);
        
    }
?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-form/css/reset.css">
    <link rel="stylesheet" href="login-form/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Register</title>
</head>

<body>
    <div id="wrapper">
   
        <form action="" method="POST">
            <h1> <?php
    		if(isset($insertCustomers)){
    			echo $insertCustomers;
    		}
    		?></h1>
            <h1 class="form-heading">Đăng ký</h1>
          
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" name="tenkhachhang" class="form-input" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" name="matkhau" class="form-input" placeholder="Mật khẩu">
                <div id="eye"><i class="far fa-eye"></i></div>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Nhập lại Mật khẩu">
                <div id="eye"><i class="far fa-eye"></i></div>
            </div>
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email"  class="form-input" placeholder="Email">
            </div>
            <div class="form-group">
                <i class="fas fa-phone"></i>
                <input type="text" name="dienthoai" class="form-input" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" name="diachinhan" class="form-input" placeholder="Địa chỉ">
            </div>
            <input type="submit" name="submit" class="form-submit" value="Đăng ký">
            <a href="login.php">Đăng Nhập</a>

        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="login-form/js/app.js"></script>

<?php
	include 'inc/footer.php';
 ?>