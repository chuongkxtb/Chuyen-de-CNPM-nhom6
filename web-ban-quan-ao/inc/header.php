<?php
		include 'lib/session.php';
		Session::init();
?>
<?php
	include_once 'lib/database.php';
	include_once 'heplers/format.php';

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});
	$db = new Database();
	$fm = new Format();
	$pd = new product();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="slider/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="slider/owlcarousel/assets/owl.theme.default.min.css">
    <script src="slider/jquery.min.js"></script>
    <script src="slider/owlcarousel/owl.carousel.min.js"></script>
	<title>Website bán quần áo</title>
</head>

	<div class="header">
		<a href="index.php">
			<img src="imgs/logo.png" alt="logo">
		</a>
		<div class="lg-lu">
			<a href="login-form/login.php">Đăng nhập</a>
			<a href="login-form/register.php">Đăng ký</a>
		</div>
		<div style="clear: both;"></div>
		<?php
		include('slider/slider.php');
		?>
	</div>