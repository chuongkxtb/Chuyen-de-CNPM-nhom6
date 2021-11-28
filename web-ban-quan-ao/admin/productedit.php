<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../classes/brand.php' ?>
<?php include_once '../classes/category.php' ?>
<?php include_once '../classes/product.php' ?>

<?php
$pd = new product();
if (!isset($_GET['idsanpham']) || $_GET['idsanpham'] == NULL) {
  echo "<script>window.location = 'productedit.php'</script>";
} else {
  $id = $_GET['idsanpham'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


  $updatepd = $pd->update_product($_POST, $_FILES, $id);
}
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa sản phẩm</h2>
    <div class="block">
      <?php
      if (isset($updatepd)) {
        echo $updatepd;
      }
      ?>
      <?Php
      $get_catname = $pd->getcatbyid($id);
      if ($get_catname) {
        while ($result_pd = $get_catname->fetch_assoc()) {

      ?>

          <form action="" method="post" enctype="multipart/form-data">
            <h3>&nbsp;</h3>
            <table width="600" border="1">
              <tr>
                <td colspan="2" style="text-align:center;font-size:25px;">Sửa sản phẩm</td>
              </tr>
              <tr>
                <td width="97">Tên sản phẫm</td>
                <td width="87"><input type="text" name="tensp" value="<?php echo $result_pd['tensp'] ?>"></td>
              </tr>
              <tr>
                <td>Mã SP</td>
                <td><input type="text" name="masp" value="<?php echo $result_pd['masp'] ?>"></td>
              </tr>
              <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanh" /><img src="uploads/<?php echo $result_pd['hinhanh'] ?>" width="80" height="80"></td>
              </tr>
              <tr>
                <td>Giá đề xuất</td>
                <td><input type="text" name="giadexuat" value="<?php echo $result_pd['giadexuat'] ?>"></td>
              </tr>
              <tr>
                <td>Giá giảm</td>
                <td><input type="text" name="giagiam" value="<?php echo $result_pd['giagiam'] ?>"></td>
              </tr>
              
              <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Nội dung</label>
                    </td>
                    <td>
                        <textarea name="noidung" class="tinymce"><?php echo $result_pd['noidung'] ?></textarea>
                    </td>
                </tr>
              <tr>
                <td>Số lượng</td>
                <td><input type="text" name="soluong" value="<?php echo $result_pd['soluong'] ?>"></td>
              </tr>
              <tr>
                <td>
                  <label>Danh Mục</label>
                </td>
                <td>
                  <select id="select" name="loaisp">
                    <option>------Chọn Danh Mục------</option>
                    <?php
                    $cat = new category();
                    $catlist = $cat->show_category();

                    if ($catlist) {
                      while ($result = $catlist->fetch_assoc()) {
                    ?>
                        <option 
                        <?php
                            if($result['idloaisp']==$result_pd['idloaisp']){ echo 'selected';  }
                            ?>
                        value="<?php echo $result['idloaisp'] ?>"><?php echo $result['tenloaisp'] ?></option>
                    <?php
                      }
                    }
                    ?>

                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Thương hiệu</label>
                </td>
                <td>
                  <select id="select" name="hieusp">
                    <option>------Chọn Thương Hiệu------</option>
                    <?php
                    $brand = new brand();
                    $brandlist = $brand->show_brand();

                    if ($brandlist) {
                      while ($result = $brandlist->fetch_assoc()) {
                    ?>
                        <option 
                        <?php
                            if($result['idhieusp']==$result_pd['idhieusp']){ echo 'selected';  }
                            ?>
                        value="<?php echo $result['idhieusp'] ?>"><?php echo $result['tenhieusp'] ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Tình trạng</td>
                <td><select id="select" name="tinhtrang">
                            <option>Tinh trang</option>
                            <?php
                            if($result['tinhtrang']==1){
                            ?>
                            <option selected value="1">Nổi bật</option>
                            <option value="0">không Nổi bật</option>
                            <?php
                        }else{
                            ?>
                            <option value="1">Nổi bật</option>
                            <option selected value="0">không Nổi bật</option>
                            <?php
                            }
                            ?>
                        </select></td>
              </tr>
              <tr>
              <td></td>
                <td >
                
                    <input type="submit" name="submit" value="Sửa">
             
                </td>
              </tr>
            </table>
          </form>

          <?php
        }

        }
            ?>
    </div>
  </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
  });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>


