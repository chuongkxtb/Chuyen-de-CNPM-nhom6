<?php
     include '../tophearder.php';
    include '../../classes/category.php';
 
?>
<?php

if(!isset($_GET['idloaisp']) || $_GET['idloaisp'] == NULL)
{
  echo "<script>window.location = 'sua.php'</script>";
}else
{
  $id = $_GET['idloaisp'];
}
$cat = new category();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $namecat = $_POST['tenloaisp'];
  $status = $_POST['tinhtrang'];

  $updatecat = $cat->update_category($namecat,$status,$id);

}	
	
?>
  
<div class="button_themsp">
<a href="lietke.php">Liệt kê sp</a> 
</div>
<?php
  if(isset($updatecat)){
    return $updatecat;
  }
?>
<?Php
   $get_catname = $cat->getcatbyid($id);
   if($get_catname){
     while($result = $get_catname->fetch_assoc()){

   
?>
<form action="" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center; font-size:25px">Sửa loại sản phẩm</td>
  </tr>
  <tr>
    <td width="97">id loại sp</td>
    <td width="87"><input type="text" value="<?php echo $result['idloaisp']?>" name="idloaisp"></td>
  </tr>
  <tr>
    <td width="97">Tên loại sp</td>
    <td width="87"><input type="text" value="<?php echo $result['tenloaisp']?>" name="tenloaisp"></td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td><select name="tinhtrang">
    <?php
	if($result['tinhtrang'] == 1){
	?>
      <option value="1" selected="selected">Kích hoạt</option>
      <option value="2">Không kích hoạt</option>
      <?php
	}else{
	?>
      <option value="1">Kích hoạt</option>
      <option value="2" selected="selected">Không kích hoạt</option>
      <?php
	}
	 ?>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="update">
    </div></td>
  </tr>
</table>
</form>
<?php
  }
}
?>


