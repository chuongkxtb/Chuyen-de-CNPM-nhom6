 <?php
	include 'inc/header.php';
	
 ?>
 <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
	$quantity = $_POST['quantity'];
	$idcart = $_POST['idcart'];
	  
	$update_quantity = $ct->cart_update($idcart,$quantity);
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
					<?php
						if(isset($update_quantity)){
							echo $update_quantity;
						}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$cart_sh = $ct->cart_show();
								if($cart_sh){
								   $tong_tien = 0;
								   $vat = 0;
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
								<td><a href="">X</a></td>
							</tr>
							
							<?php
							$t = $result["price"]*$result["quantity"];
							$tong_tien += $t;
							$vat = $tong_tien*0.1;
							$grand_total = $tong_tien + $vat;
								}
							}
							?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php 
								echo $tong_tien; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
			
							echo $grand_total; ?></td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include 'inc/footer.php';
?>