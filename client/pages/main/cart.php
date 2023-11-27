 <!-- Gio-hang -->
 <?php
session_start();
?>


 <div class="nav">
 	<a class="nav_link" href="../client/index.php">Trang chủ</a>
 	<i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href="">Giỏ hàng</a>
	
 	
 </div>
 <p class="cart_order_text">Giỏ hàng</p>
 <div class="cart">
 	<table class="cart_order">
	 <?php
		if (isset($_SESSION['giohang'])) {
		?>
 		<tr class="cart_order_header">
 			<th style="padding-left: 10px">Sản phẩm</th>
 			<th style="width: 15%">Giá tiền</th>
 			<th style="width: 15%;padding-left: 10px;">Số lượng</th>
 			<th>Thành tiền</th>
 		</tr>
		 <?php
			
			$tongtien = 0;
			foreach ($_SESSION['giohang'] as $cart_item) {
				$thanhtien = $cart_item['SoLuongSP'] * $cart_item['GiaSP'];
				$tongtien += $thanhtien;
				$i++;
			?>
 		<tr>
 			<td class="cart_grid_product">
 				<img class="cart_img_product" src="../admin/modules/quanlysp/uploads/<?php echo $cart_item['AnhSP']; ?>" alt="" />
 				<div class="cart_detail_product">
 					<h5 class="cart_thuonghieu"><?php echo $cart_item['MaTH']; ?></h5>
 					<p><?php echo $cart_item['TenSP']; ?></p>
 					<div class="cart_action">
 						<a class="cart_action_heart" href=""><i class="far fa-heart"></i> Yêu thích</a>
 						<a class="cart_action_del" href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['ma'] ?>"><i class="far fa-trash-alt"></i> Xoá</a>
 					</div>
 				</div>
 			</td>
 			<td><?php echo number_format($cart_item['GiaSP'], 0, ',', '.') . 'đ'; ?></td>
 			<td>
			 	<a class="cart_giam" href="pages/main/themgiohang.php?giam=<?php echo $cart_item['ma'] ?>"><i class="icon_quantity fas fa-minus"></i></a>
						<?php echo $cart_item['SoLuongSP']; ?>
				<a class="cart_tang" href="pages/main/themgiohang.php?tang=<?php echo $cart_item['ma'] ?>"><i class="icon_quantity fas fa-plus"></i></a>
 			</td>
 			<td><?php echo number_format($thanhtien, 0, ',', '.') . 'đ'; ?></td>
 		</tr>
 		<?php
			}
			?>
 	
 		<tr>
 			<td class="cart_grid_product">
 				<a class="continue_order" href="../client/index.php"><i class="fas fa-caret-left"></i> Tiếp tục mua hàng</a>
 			</td>
 		</tr>
		
			

		<?php
		}
		?>
 	</table>
 	<div class="cart_order_right">
 		<div class="cart_title_bill">Hoá đơn của bạn</div>
 		<div class="cart_bill">
 			<div class="cart_tamtinh">
 				Tạm tính:
 				<b class="cart_bill_right"><?php echo number_format($tongtien, 0, ',', '.') . 'đ'; ?></b>
 			</div>
 			<div class="cart_discount">
 				Giảm giá:
 				<b class="cart_bill_right">- 0đ</b>
 			</div>
 			<!-- <div class="cart_discount_detail">
 				<p class="cart_discount_detail_title">Khuyến mãi đã nhận được:</p>
 				
 				<p>Tặng: Bông tẩy trang Ya Samaya 120 Miếng (Hết quà tặng 15k)</p>
 			</div> -->
 		</div>
 		<div class="cart_bill_total">
 			Tổng cộng:
 			<b class="cart_total_right"><?php echo number_format($tongtien, 0, ',', '.') . 'đ'; ?></b>
 			<p style="color: rgb(160, 159, 159)">(Đã bao gồm VAT)</p>
 		</div>
 		<button class="cart_order_submit"><a href="./pages/main/payment.php" style="color: white;text-decoration:none;">Tiến hành đặt hàng<a></button>
 	</div>
	
 </div>