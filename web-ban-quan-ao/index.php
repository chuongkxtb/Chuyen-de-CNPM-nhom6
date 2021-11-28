<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>

<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>SẢN PHẨM NỔI BẬT</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
					$pd_ft = $pd->product_ft();
					$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
        			$current_page = !empty($_GET['page'])?$_GET['page']:1;
					$offset = ($current_page - 1) * $item_per_page;
				
       
				
					$totalRecords =  $pd->get_all_product(); 
					$totalRecords = mysqli_num_rows($totalRecords);
					$totalPages = ceil($totalRecords / $item_per_page);
					
					if($pd_ft){
						$gia = 0;
						while($result=$pd_ft->fetch_assoc()){
							$gia= $result['giadexuat'] - $result['giagiam'];
					
					
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
				
					 <a href="details.php?idsp=<?php echo $result['idsanpham']?>"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?></h2>
					 <p><?php echo $fm->textShorten($result['noidung'],20)?></p>
					 <p><span class="price"><?php  echo $gia?></span></p>
				     <div class="button"><span><a href="details.php?idsp=<?php echo $result['idsanpham']?>" class="details">Details</a></span></div>
				</div>
				<?php
					}
				}
				?>
			</div>
			<?php
			include 'phantrang.php';
			?>


			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>SẢN PHẨM MỚI</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	
			<div class="section group">
			<?php
					$pd_new = $pd->product_new();
					$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
        			$current_page = !empty($_GET['page'])?$_GET['page']:1; 
					$offset = ($current_page - 1) * $item_per_page;
				
       
				
					$totalRecords =  $pd->get_all_product(); 
					$totalRecords = mysqli_num_rows($totalRecords);
					$totalPages = ceil($totalRecords / $item_per_page);
					if($pd_new){
						$gia =0;
						while($result=$pd_new->fetch_assoc()){
							$gia= $result['giadexuat'] - $result['giagiam'];
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?idsp=<?php echo $result['idsanpham']?>"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?> </h2>
					 <p><?php echo $fm->textShorten($result['noidung'],20)?></p>
					 <p><span class="price"><?php echo $gia?></span></p>
				     <div class="button"><span><a href="details.php?idsp=<?php echo $result['idsanpham']?>" class="details">Details</a></span></div>
				</div>
				
				<?php
					}
				}
				?>	
			</div>
			
			<?php
			include 'phantrang.php';
			?>
		
    </div>
 </div>

 <?php
	include 'inc/footer.php';
 ?>
