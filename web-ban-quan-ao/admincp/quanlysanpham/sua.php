<?php

    include '../../classes/product.php';
 
?>
<?php

if(!isset($_GET['idsanpham']) || $_GET['idsanpham'] == NULL)
{
  echo "<script>window.location = 'sua.php'</script>";
}else
{
  $id = $_GET['idsanpham'];
}
$pd = new product();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $namecat = $_POST['tensp'];
  $status = $_POST['tinhtrang'];

  $updatecat = $pd->update_product($_POST,$_FILES,$id);

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
   $get_catname = $pd->getcatbyid($id);
   if($get_catname){
     while($result = $get_catname->fetch_assoc()){

   
?>
<form action="" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Sửa sản phẩm</td>
  </tr>
  <tr>
    <td width="97">Tên sản phẫm</td>
    <td width="87"><input type="text" name="tensp" value="<?php echo $result['tensp'] ?>"></td>
  </tr>
  <tr>
    <td>Mã SP</td>
    <td><input type="text" name="masp" value="<?php echo $result['masp'] ?>"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" /><img src="uploads/<?php echo $result['hinhanh'] ?>" width="80" height="80"></td>
  </tr>
  <tr>
    <td>Giá đề xuất</td>
    <td><input type="text" name="giadexuat" value="<?php echo $result['giadexuat'] ?>"></td>
  </tr>
  <tr>
    <td>Giá giảm</td>
    <td><input type="text" name="giagiam" value="<?php echo $result['giagiam'] ?>"></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><textarea name="noidung" cols="40" rows="10"><?php echo $result['noidung'] ?></textarea></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong" value="<?php echo $result['soluong'] ?>"></td>
  </tr>
  <!-- <tr>
 
    <td>Loại sản phẩm</td>
    <td><select name="loaisp">

    </select></td>
  </tr>
  <tr>
     
    <td>Tên nhà sx</td>
    <td><select name="nhasx">

    </select></td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td><select name="tinhtrang">
   
    <option value="1">Kích hoạt</option>
     <option value="2">Không kích hoạt</option>
    </select></td>
  </tr> -->
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Sửa sản phẩm">
    </div></td>
  </tr>
</table>
</form>

<?php
  }
}
?>

