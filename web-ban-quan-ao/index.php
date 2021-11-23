<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>

<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
					$pd_ft = $pd->product_ft();
					if($pd_ft){
						while($result=$pd_ft->fetch_assoc()){

					
					
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?></h2>
					 <p><?php echo $fm->textShorten($result['noidung'])?></p>
					 <p><span class="price"><?php echo $result['giadexuat']?></span></p>
				     <div class="button"><span><a href="details.php?idsp=<?php echo $result['idsanpham']?>" class="details">Details</a></span></div>
				</div>
				<?php
					}
				}
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	
			<div class="section group">
			<?php
					$pd_new = $pd->product_new();
					if($pd_new){
						while($result=$pd_new->fetch_assoc()){

			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?> </h2>
					 <p><span class="price"><?php echo $result['giadexuat']?></span></p>
				     <div class="button"><span><a href="details.php?idsp=<?php echo $result['idsanpham']?>" class="details">Details</a></span></div>
				</div>
				
				<?php
					}
				}
				?>	
			</div>
    </div>
 </div>

 <?php
	include 'inc/footer.php';
 ?>
