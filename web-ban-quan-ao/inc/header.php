<?php
include 'lib/session.php';
Session::init();
?>
<?php
	include_once 'lib/database.php';
	include_once 'helpers/format.php';

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});
   $db = new Database();
   $fm = new Format();
   $cat = new category();
   $br = new brand();
   $pd = new product();
   $ct = new cart();
   $cs = new customer();
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Shop quần áo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img style="height: 70px;" src="images/logo.jpg" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				<form action="search.php" method="post">
				    	<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
				    	<input type="submit" name="search_product" value="Tìm kiếm"> 
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product"></span>
							</a>
						</div>
			      </div>
				  <?php 
				if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					
					Session::destroy();
				}
			?>
		   <div class="login">
		   <?php
			$login_check = Session::get('customer_login'); 
			if($login_check==false){
				echo '<a href="login.php">Đăng nhập</a></div>';

			}else{
				echo '<a href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a></div>';
			

			}
			?>	   
		 
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	        	Danh mục sản phẩm
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	        	<?php
	        	$cate = $cat->show_category();
	        	if($cate){
	      			while($result_new = $cate->fetch_assoc()){

	      		?>
	        	
	          <li>

	          	<a href="productbycat.php?catid=<?php echo $result_new['idloaisp'] ?>"><?php echo $result_new['tenloaisp'] ?></a>
	          </li>
	          <?php
	          	}
	          } 
	          ?>

	        </ul>

	      </li>
		  <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	        	Thương hiệu
	        <span class="caret"></span></a>
	         <ul class="dropdown-menu">
	        	<?php
	        	$brand = $br->show_brand_home();
	        	if($brand){
	      			while($result_new = $brand->fetch_assoc()){

	      		?>
	        	
	          <li>

	          	<a href="topbrands.php?brandid=<?php echo $result_new['idhieusp'] ?>"><?php echo $result_new['tenhieusp'] ?></a>
	          </li>
	          <?php
	          	}
	          } 
	          ?>

	        </ul>
	    </li>
	  <li><a href="cart.php"> Giỏ Hàng</a></li>
	 
	  <div class="clear"></div>
	</ul>
</div>