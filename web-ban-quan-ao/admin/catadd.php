<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/category.php' ?>
<?php
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namecat = $_POST['tenloaisp'];
    $status = $_POST['tinhtrang'];

    $insertcat = $cat->insert_category($namecat, $status);
}
?>
  
<div class="grid_10">
    <div class="box round first grid">
        <h2>THÊM LOẠI SẢN PHẨM</h2>

        <div class="block copyblock"> 
         <form method="post">
            <table class="form">					
                <tr>
                <td>Tên loại sản phẩm :</td>
                    <td>
                        <input type="text" placeholder="Thêm loại sản phẩm..." name="tenloaisp" class="large" />
                    </td>
                </tr>
                
                <tr>
            <td>Tình trạng :</td>
            <td><select name="tinhtrang">
                <option value="1">Kích hoạt</option>
                <option value="2">Không kích hoạt</option>
              </select></td>
          </tr>
				 <tr> 
                    <td>
                        <input type="submit"  name="submit" Value="Thêm" />
                    </td>
                    <td>     
                    <?php
        if (isset($insertcat)) {
            echo $insertcat;
        }

        ?></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>