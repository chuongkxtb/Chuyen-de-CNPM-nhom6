<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php' ?>
<?php
$br = new brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $namebr = $_POST['tenhieusp'];
  $status = $_POST['tinhtrang'];

  $insertbr = $br->insert_brand($namebr, $status);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>THÊM THƯƠNG HIỆU</h2>

        <div class="block copyblock"> 
         <form method="post">
            <table class="form">					
                <tr>
                <td>Tên thương hiệu :</td>
                    <td>
                        <input type="text" placeholder="Thêm thương hiệu..." name="tenhieusp" class="large" />
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
                    <td>        <?php
    if (isset($insertbr)) {
      echo $insertbr;
    }

    ?></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>