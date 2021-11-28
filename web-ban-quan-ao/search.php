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
    	
	      <div class="section group" style="margin-top: 20px;">
	      	<?php
	      	
	      	 if($search_product==true && $tukhoa != ""){
	      	 	while($result = $search_product->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="images/<?php echo $result['hinhanh']?>" alt="" /></a>
					 <h2><?php echo $result['tensp']?> </h2>
					 <p><?php echo $fm->textShorten($result['noidung'],20)?></p>
					 <p><span class="price"><?php echo $result['giadexuat']?></span></p>
				     <div class="button"><span><a href="details.php?idsp=<?php echo $result['idsanpham']?>" class="details">Details</a></span></div>
				</div>
			<?php
			}

		}else{
			echo "<span  style ='color:red; font-size: 20px; margin-left: 20px;'>Không tìm thấy sản phẩm nào</span>";
		}
			?>
			</div>

	
	
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
 ?>
