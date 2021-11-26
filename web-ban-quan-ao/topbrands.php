<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3><?php $pd_cat = $pd->products()->fetch_assoc(); echo $pd_cat['tenhieusp']?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
					$pd_cat = $pd->products();
					if($pd_cat){
						while($result = $pd_cat->fetch_assoc()){

					
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?></h2>
					 <p><?php echo $fm->textShorten($result['noidung'],20)?></p>
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
    		<h3><?php $pd_cat = $pd->products1()->fetch_assoc(); echo $pd_cat['tenhieusp']?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
					$pd_cat = $pd->products1();
					if($pd_cat){
						while($result = $pd_cat->fetch_assoc()){

					
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?></h2>
					 <p><?php echo $fm->textShorten($result['noidung'],20)?></p>
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
    		<h3><?php $pd_cat = $pd->products2()->fetch_assoc(); echo $pd_cat['tenhieusp']?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
					$pd_cat = $pd->products2();
					if($pd_cat){
						while($result = $pd_cat->fetch_assoc()){

			
		        ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?></h2>
					 <p><?php echo $fm->textShorten($result['noidung'],20)?></p>
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