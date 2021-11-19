<?php
     
      include '../tophearder.php';
      include '../sidebar.php';
      include '../../classes/brand.php';
      
 ?>
 <?php
 $br = new brand();
	if(isset($_GET['delid']))
  {
    $id = $_GET['delid'];
    $deletebr = $br->delete_brand($id);
  }
 

?>
<div class="button_themsp">
<a href="them.php">Thêm Mới</a> 
</div>

<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>Tên hiệu sản phẩm</td>
    <td>Tình trạng</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
      $show_br = $br->show_brand();
      if($show_br)
      {
        $i = 0;
        while($result = $show_br->fetch_assoc()){
          $i++;
        
      
  ?>
  <tr>
    <td><?php  echo $result['idhieusp']?></td>
    <td><?php echo $result['tenhieusp'] ?></td>
    <td><?php
	if($result['tinhtrang'] == 1 ){
		echo 'Kích hoạt';
	}else{
		echo 'Không kích hoạt';
	}
    ?></td>
        <td><a href="sua.php?idhieusp=<?php echo $result['idhieusp'] ?>">Edit</a> || <a onclick="return confirm('you are want to delete')" href="?delid=<?php echo $result['idhieusp'] ?>">Delete</a> </td> 
  </tr>
  <?php
        }
  }
  ?>
</table>
<?php
  if(isset($deletebr)){
    return $deletebr;
  }
?>