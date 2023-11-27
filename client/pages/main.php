<div class="body">
	<div class="container-web">

		<!-- San-pham-trang-index -->
		<?php
		if (isset($_GET['quanly'])) {
			$tam = $_GET['quanly'];
		} else {
			$tam = '';
		}
		if ($tam == 'loaisanpham') {
			include("main/categogy.php");
		} elseif ($tam == 'sanpham') {
			include("main/product.php");
		} elseif ($tam == 'timkiem') {
			include("main/search.php");
		} elseif ($tam == 'giohang') {
			include("main/cart.php");
		} elseif ($tam == 'tintuc') {
			include("main/tintuc.php");
		}
        elseif ($tam == 'donhang') {
			include("main/donhang.php");
		}
        elseif ($tam == 'sanphamyt') {
			include("main/yeuthich.php");
        } else {
			include("sidebar/banner.php");
			include("main/index.php");
		}

		?>


		<!-- Gio-hang -->
		<!-- <p class="cart_order_text">Giỏ hàng (3 sản phẩm)</p>
                    <div class="cart">
                        <table class="cart_order">
                            <tr class="cart_order_header">
                                <th style="padding-left: 10px">Sản phẩm</th>
                                <th style="width: 15%">Giá tiền</th>
                                <th style="width: 12%">Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            <tr>
                                <td class="cart_grid_product">
                                    <img class="cart_img_product" src="./images/taytrang.jpeg" alt="" />
                                    <div class="cart_detail_product">
                                        <h5>MAYBELLINE</h5>
                                        <p>Nước Tẩy Trang Bioderma Dành Cho Da Nhạy Cảm 500ml</p>
                                        <div class="cart_action">
                                            <a class="cart_action_heart" href=""
                                                ><i class="far fa-heart"></i> Yêu thích</a
                                            >
                                            <a class="cart_action_del" href=""
                                                ><i class="far fa-trash-alt"></i> Xoá</a
                                            >
                                        </div>
                                    </div>
                                </td>
                                <td>216.000đ</td>
                                <td>
                                    <input
                                        type="number"
                                        class="cart_order_quantity"
                                        name="quantity"
                                        min="1"
                                        max="10"
                                        value="1"
                                    />
                                </td>
                                <td>455.556đ</td>
                            </tr>
                            <tr>
                                <td class="cart_grid_product">
                                    <img class="cart_img_product" src="./images/kemat.jpeg" alt="" />
                                    <div class="cart_detail_product">
                                        <h5>MAYBELLINE</h5>
                                        <p>Nước Tẩy Trang Bioderma Dành Cho Da Nhạy Cảm 500ml</p>
                                        <div class="cart_action">
                                            <a class="cart_action_heart" href=""
                                                ><i class="far fa-heart"></i> Yêu thích</a
                                            >
                                            <a class="cart_action_del" href=""
                                                ><i class="far fa-trash-alt"></i> Xoá</a
                                            >
                                        </div>
                                    </div>
                                </td>
                                <td>216.000đ</td>
                                <td>
                                    <input
                                        type="number"
                                        class="cart_order_quantity"
                                        name="quantity"
                                        min="1"
                                        max="10"
                                        value="1"
                                    />
                                </td>
                                <td>455.556đ</td>
                            </tr>
                            <tr>
                                <td class="cart_grid_product">
                                    <img class="cart_img_product" src="./images/kemat.jpeg" alt="" />
                                    <div class="cart_detail_product">
                                        <h5>MAYBELLINE</h5>
                                        <p>Nước Tẩy Trang Bioderma Dành Cho Da Nhạy Cảm 500ml</p>
                                        <div class="cart_action">
                                            <a class="cart_action_heart" href=""
                                                ><i class="far fa-heart"></i> Yêu thích</a
                                            >
                                            <a class="cart_action_del" href=""
                                                ><i class="far fa-trash-alt"></i> Xoá</a
                                            >
                                        </div>
                                    </div>
                                </td>
                                <td>216.000đ</td>
                                <td>
                                    <input
                                        type="number"
                                        class="cart_order_quantity"
                                        name="quantity"
                                        min="1"
                                        max="10"
                                        value="1"
                                    />
                                </td>
                                <td>455.556đ</td>
                            </tr>
                            <tr>
                                <td class="cart_grid_product">
                                    <img class="cart_img_product" src="./images/kemat.jpeg" alt="" />
                                    <div class="cart_detail_product">
                                        <h5>MAYBELLINE</h5>
                                        <p>Nước Tẩy Trang Bioderma Dành Cho Da Nhạy Cảm 500ml</p>
                                        <div class="cart_action">
                                            <a class="cart_action_heart" href=""
                                                ><i class="far fa-heart"></i> Yêu thích</a
                                            >
                                            <a class="cart_action_del" href=""
                                                ><i class="far fa-trash-alt"></i> Xoá</a
                                            >
                                        </div>
                                    </div>
                                </td>
                                <td>216.000đ</td>
                                <td>
                                    <input
                                        type="number"
                                        class="cart_order_quantity"
                                        name="quantity"
                                        min="1"
                                        max="10"
                                        value="1"
                                    />
                                </td>
                                <td>455.556đ</td>
                            </tr>
                            <tr>
                                <td class="cart_grid_product">
                                    <a class="continue_order" href=""
                                        ><i class="fas fa-caret-left"></i> Tiếp tục mua hàng</a
                                    >
                                </td>
                            </tr>
                        </table>
                        <div class="cart_order_right">
                            <div class="cart_title_bill">Hoá đơn của bạn</div>
                            <div class="cart_bill">
                                <div class="cart_tamtinh">
                                    Tạm tính:
                                    <b class="cart_bill_right">654.000đ</b>
                                </div>
                                <div class="cart_discount">
                                    Giảm giá:
                                    <b class="cart_bill_right">59.000đ</b>
                                </div>
                                <div class="cart_discount_detail">
                                    <p class="cart_discount_detail_title">Khuyến mãi đã nhận được:</p>
                                    <p>
                                        Bill 499 tặng Gel rửa mặt Effaclar 50ml trị giá 195k (SL có hạn)
                                    </p>
                                    <p>Boong tẩy trang Ya Samaya 120 Miếng (Hết quà tặng 15k)</p>
                                </div>
                            </div>
                            <div class="cart_bill_total">
                                Tổng cộng:
                                <b class="cart_total_right">595.000đ</b>
                                <p style="color: rgb(160, 159, 159)">(Đã bao gồm VAT)</p>
                            </div>
                            <button class="cart_order_submit">Tiến hành đặt hàng</button>
                        </div>
                    </div> -->
	</div>
</div>