<?php
   include '../tophearder.php';
    include '../../classes/brand.php';
 
?>
<?php
	$br = new brand();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$namebr = $_POST['tenhieusp'];
    $status = $_POST['tinhtrang'];

		$insertbr = $br->insert_brand($namebr,$status);

	}
?>
<div class="button_themsp">
<a href="lietke.php">Liệt kê sp</a> 
</div>
<?php
  if(isset($insertbr)){
    return $insertbr;
  }

?>
<form action="them.php" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Thêm hiệu sản phẩm</td>
  </tr>
  <tr>
    <td width="97">Tên hiệu sp</td>
    <td width="87"><input type="text" name="tenhieusp"></td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td><select name="tinhtrang">
      <option value="1">Kích hoạt</option>
      <option value="2">Không kích hoạt</option>
      </select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="Update">
    </div></td>
  </tr>
</table>
</form>


