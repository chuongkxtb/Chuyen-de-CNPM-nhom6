<?php

    include '../../classes/product.php';
 
?>
<?php
	$pd = new product();
	if($_SERVER['REQUEST_METHOD']=='POST'){


		$insertproduct = $pd->insert_product($_POST,$_FILES);

	}
?>

<div class="button_themsp">
<a href="lietke.php">Liệt kê sp</a> 
</div>
<form action="them.php" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Thêm  sản phẩm</td>
  </tr>
  <tr>
    <td width="97">Tên sản phẫm</td>
    <td width="87"><input type="text" name="tensp"></td>
  </tr>
  <tr>
    <td>Mã SP</td>
    <td><input type="text" name="masp"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" /></td>
  </tr>
  <tr>
    <td>Giá đề xuất</td>
    <td><input type="text" name="giadexuat"></td>
  </tr>
  <tr>
    <td>Giá giảm</td>
    <td><input type="text" name="giagiam"></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><textarea name="noidung" cols="40" rows="10"></textarea></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong"></td>
  </tr>
  <tr>

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
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="Thêm sản phẩm">
    </div></td>
  </tr>
</table>
</form>


