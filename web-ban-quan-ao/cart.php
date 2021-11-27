 <?php
	include 'inc/header.php';
	
 ?>
 <?php
if(isset($_GET['idcart'])){
	$idcart = $_GET['idcart']; 
	$delcart = $ct->del_product_cart($idcart);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['submit'])) {
 
	$quantity = $_POST['quantity'];
	$idcart = $_POST['idcart'];
	  
	$update_quantity = $ct->cart_update($idcart,$quantity);
	if($quantity<=0){
		$delcart = $ct->del_product_cart($idcart);
	}
}
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng </h2>
					<?php
						if(isset($update_quantity)){
							echo $update_quantity;
						}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên</th>
								<th width="10%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$cart_sh = $ct->cart_show();
								if($cart_sh){
								   $tong_tien = 0;
								   $vat = 0;
								   $qty=0;
									while($result = $cart_sh->fetch_assoc()){

								
							?>
							<tr>
								<td><?php echo $result["name_sp"] ?></td>
								<td><img src="images/<?php echo $result["image"] ?>" alt=""/></td>
								<td><?php echo $result["price"] ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="idcart" value="<?php echo $result["idcart"] ?>" />
										<input type="number" name="quantity" min = "0" value="<?php echo $result["quantity"] ?>" />
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php 
						    	$t = $result["price"]*$result["quantity"];

								echo $t; ?></td>
								<td><a onclick="return confirm('Bạn có muốn xóa không?');" href="?idcart=<?php echo $result['idcart'] ?>">Xóa</a></td>
							</tr>
							
							<?php
							$t = $result["price"]*$result["quantity"];
							$tong_tien += $t;
							
							
							$qty = $qty + $result['quantity'];
								}
							}
							?>
						</table>
						<?php
							$check_cart = $ct->check_cart();
								if($check_cart){
								?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
								<?php 

									echo $fm->format_currency($tong_tien)." "."VNĐ";
									Session::set('sum',$tong_tien);
									Session::set('qty',$qty);
									?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
							$vat = $tong_tien*0.1;
							$grand_total = $tong_tien + $vat;
							echo $grand_total; ?></td>
							</tr>
					   </table>
					   <?php
					}else{
						echo 'Giỏ hàng của bạn đang trống';
					}
					  ?>
					</div>
					<!-- <div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div> -->
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
?>