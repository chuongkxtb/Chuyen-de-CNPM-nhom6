<?php
	include 'inc/header.php';
	
?>
<?php
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
	echo "<script>window.location = '404.php'</script>";
  } else {
	$id = $_GET['catid'];
  }
?>
 <div class="main">
    <div class="content">
	<?php
	     	 $name_cat = $cat->get_name_by_cat($id);
	      	 if($name_cat){
	      	 	while($result_name = $name_cat->fetch_assoc()){
	      	?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Danh mục <?php echo $result_name['tenloaisp']?> gồm các sản phẩm :</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<?php
			}}
			?>
	      <div class="section group">
		  <?php
			$pd_cat = $cat->product_cat($id);
			if($pd_cat){
				$gia =0;
				while($result = $pd_cat->fetch_assoc()){
					$gia= $result['giadexuat'] - $result['giagiam'];
			
		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?> </h2>
					 <p><?php echo $fm->textShorten($result['noidung'],20)?></p>
					 <p><span class="price"><?php echo $gia?></span></p>
				     <div class="button"><span><a href="details.php?idsp=<?php echo $result['idsanpham']?>" class="details">Details</a></span></div>
				</div>
				
				<?php
					}
				}else{
					echo 'Danh mục hiện tại chưa có sản phẩm';
				}
				?>	

	
	
    </div>
 </div>

 <?php
	include 'inc/footer.php';
 ?>