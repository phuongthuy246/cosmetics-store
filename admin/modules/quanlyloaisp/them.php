<div class="add_product">
	<p>Thêm loại sản phẩm</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlyloaisp/xuly.php">
				<tr>
					<td>Mã loại sản phẩm</td>
					<td><input type="text" name="MaLSP"></td>
				</tr>
				<tr>
					<td>Tên loại sản phẩm</td>
					<td><input type="text" name="TenLSP"></td>
				</tr>
				<tr>
					<td>Mô tả loại sản phẩm</td>
					<td><textarea rows="5" name="MoTaLSP"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="submit" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="themloaisp" value="Lưu"></div></td>
				</tr>
			</form>
		</table>
	</div>
</div>