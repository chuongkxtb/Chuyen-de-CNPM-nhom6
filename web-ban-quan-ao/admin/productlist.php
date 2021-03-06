<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/brand.php' ?>
<?php include_once '../classes/category.php' ?>
<?php include_once '../classes/product.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php

 $pd = new product();
 $fm = new Format();
	if(isset($_GET['delid']))
  {
    $id = $_GET['delid'];
    $deletepd = $pd->delete_product($id);
  }


?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block">
        <?php
        if(isset($deletepd)){
        	echo $deletepd;
        }
        ?> 
            <table class="data display datatable" >
			<thead>
			<tr>
    <td>ID</td>
    <td>Tên sản phẩm</td>
    <td>Mã sp</td>
    <td>Hình ảnh</td>
    <td>Giá đề xuất</td>
    <td>Giá giảm</td>
    <td>Số lượng</td>
    <td>Loại hàng</td>
     <td>Nhà SX</td>
    <td>Tình trạng</td>
    <td>Nội dung</td>
    <td>Quản lý</td>

  </tr>
			</thead>
			<tbody>
			<?php

 
      $show_product = $pd->show_product();
      if($show_product)
      {
 
        while($result = $show_product->fetch_assoc()){
   


      ?> 
  <tr class="odd gradeX">

  <td><?php  echo $result['idsanpham']?></td>
  <td><?php echo $result['tensp'] ?></td>
  <td><?php echo $result['masp'] ?></td>
  <td><img src="uploads/<?php echo $result['hinhanh'] ?>" width="80" />
  </td>
  <td><?php echo number_format($result['giadexuat']) ?></td>
  <td><?php echo number_format($result['giagiam']) ?></td>
  <td><?php echo $result['soluong'] ?></td>
   <td><?php echo $result['tenloaisp'] ?></td>
  <td><?php echo $result['tenhieusp'] ?></td> 
  <td><?php
									if ($result['tinhtrang'] == 1) {
										echo 'Nổi bật';
									} else {
										echo 'Không Nổi bật';
									}
									?></td>
    <td><?php echo $fm->textShorten($result['noidung'],100) ?></td> 
    
   <td>
     <a href="productedit.php?idsanpham=<?php echo $result['idsanpham'] ?>">Edit</a> || 
   <a onclick="return confirm('you are want to delete')" href="?delid=<?php echo $result['idsanpham'] ?>">Delete</a> 
  </td>
</tr>
				<?php
						}
					}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
