<?php
     
      include '../tophearder.php';
      include '../sidebar.php';
      include '../../classes/category.php';
      
 ?>
<?php
 $cat = new category();
	if(isset($_GET['delid']))
  {
    $id = $_GET['delid'];
    $deletecat = $cat->delete_category($id);
  }
 

?>
 
 <div class="content">

<div class="box_contains">

<div class="button_themsp">
<a href="them.php">Thêm Mới</a> 
</div>

<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>Tên loại sản phẩm</td>
    <td>Tình trạng</td>
    <td colspan="2">Quản lý</td>
  </tr>

  <?php
      $show_cat = $cat->show_category();
      if($show_cat)
      {
        $i = 0;
        while($result = $show_cat->fetch_assoc()){
          $i++;
        
      
  ?>
  <tr>
    <td><?php  echo $result['idloaisp']?></td>
    <td><?php echo $result['tenloaisp'] ?></td>
    <td><?php
	if($result['tinhtrang'] == 1 ){
		echo 'Kích hoạt';
	}else{
		echo 'Không kích hoạt';
	}
    ?></td>
    <td><a href="sua.php?idloaisp=<?php echo $result['idloaisp'] ?>">Edit</a> || <a onclick="return confirm('you are want to delete')" href="?delid=<?php echo $result['idloaisp'] ?>">Delete</a> </td> 
  </tr>
  <?php
        }
  }
  ?>
</table>

    </div>
 </div>
    <div class="clear"></div>
    <?php
  if(isset($deletecat)){
    return $deletecat;
  }
?>
