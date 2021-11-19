<?php

?>
<div class="box_list">
	<div class="tieude">
		<h3>Loại sản phẩm</h3>
	</div>
	<ul class="list">
		<?php
		while ($dong_loai = mysqli_fetch_array($row_loai)) {
		?>
			<li><a href="index.php?quanly=loaisp&id=<?php echo $dong_loai['idloaisp'] ?>"><?php echo $dong_loai['tenloaisp'] ?></a></li>
		<?php
		}
		?>
	</ul>
</div>
<!--Ket thuc div box loai phu kien -->
