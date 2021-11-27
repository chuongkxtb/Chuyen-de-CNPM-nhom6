<?php 
	include 'inc/header.php';

?>

 <div class="main">
    <div class="content">
    	<?php
	     	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $tukhoa = $_POST['tukhoa'];
			        $search_product = $pd->search_product($tukhoa);
			        
			    }
	      	?>
    	<div class="content_top">
    		
    		<div class="heading">	
    		<h3>Từ khóa tìm kiếm : <?php echo $tukhoa ?></h3>
    		</div>
    		
    		<div class="clear"></div>

    	</div>
    	
	      <div class="section group">
	      	<?php
	      	
	      	 if($search_product){
	      	 	while($result = $search_product->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['hinhanh'] ?>" width="200px" alt="" /></a>
					 <h2><?php echo $result['tensp'] ?></h2>
					 <p><?php echo $fm->textShorten($result['noidung'],50); ?></p>
					 <p><span class="price"><?php echo $result['giadexuat']." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['idsanpham'] ?>" class="details">Details</a></span></div>
				</div>
			<?php
			}

		}else{
			echo 'không tìm thấy';
		}
			?>
			</div>

	
	
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
 ?>
