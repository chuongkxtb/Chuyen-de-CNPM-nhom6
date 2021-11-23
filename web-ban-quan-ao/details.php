<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php
	if (!isset($_GET['idsp']) || $_GET['idsp'] == NULL) {
		echo "<script>window.location = '404.php'</script>";
	  } else {
		$id = $_GET['idsp'];
	  }

?>
 <div class="main">
    <div class="content">
		<?php
			$pd_detail = $pd->product_detail($id);
			if($pd_detail){
				while($result_detail = $pd_detail->fetch_assoc()){

			
		?>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="images/<?php echo $result_detail['hinhanh']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_detail['tensp']?></h2>
					<p><?php echo $fm->textShorten($result_detail['noidung'],100)?></p>					
					<div class="price">
						<p>Price: <span><?php echo $result_detail['giadexuat']?></span></p>
						<p>Category: <span><?php echo $result_detail['tenloaisp']?></span></p>
						<p>Brand:<span><?php echo $result_detail['tenhieusp']?></span></p>
					</div>
				<div class="add-cart">
					<form action="cart.php" method="post">
						<input type="number" class="buyfield" name="" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result_detail['noidung']?></p>
	    </div>
			<?php
				}
			}
			?>
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<li><a href="productbycat.php">Mobile Phones</a></li>
						
    				</ul>
    	
 				</div>
 		</div>
 	</div>

<?php
	include 'inc/footer.php';
?>
