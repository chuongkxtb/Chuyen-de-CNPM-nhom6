<?php
	include 'inc/header.php';

?>
<?php
	if (!isset($_GET['idsp']) || $_GET['idsp'] == NULL) {
		echo "<script>window.location = '404.php'</script>";
	  } else {
		$id = $_GET['idsp'];
	  }
	  if ($_SERVER['REQUEST_METHOD'] == 'POST')
	
	  {
		$quantity = $_POST['quantity'];

	  
		$cart_insert1 = $ct->cart_insert($id,$quantity);
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
					
					<?php
        if (isset($cart_insert1)) {
            echo $cart_insert1;
        }

        ?>
			
					<h2><?php echo $result_detail['tensp']?></h2>
					<p><?php echo $fm->textShorten($result_detail['noidung'],100)?></p>					
					<div class="price">
						<p>Giá: <span><?php echo $result_detail['giadexuat']?></span></p>
						<p>Danh mục: <span><?php echo $result_detail['tenloaisp']?></span></p>
						<p>Thương hiệu:<span><?php echo $result_detail['tenhieusp']?></span></p>
					</div>
				<div class="add-cart">
	
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="" value="Buy Now"/>
					
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Chi tiết sản phẩm</h2>
			<p><?php echo $result_detail['noidung']?></p>
	    </div>
			<?php
				}
			}
			?>
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh mục sản phẩm</h2>
					<ul>
						<?php
							$show = $cat->show_category();
							if($show){
								while($result_cat=$show->fetch_assoc())
								{

							
						?>
						<li><a href="productbycat.php?idlsp=<?php echo $result_cat['idloaisp']?>"><?php echo $result_cat['tenloaisp']?></a></li>
						<?php
								}
							}
						?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>

<?php
	include 'inc/footer.php';
?>
