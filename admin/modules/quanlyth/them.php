<div class="add_product">
	<p>Thêm thương hiệu</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlyth/xuly.php" enctype="multipart/form-data" >
				<tr>
					<td>Mã thương hiệu:</td>
					<td><input type="text" name="MaTH"></td>
				</tr>
				<tr>
					<td>Tên thương hiệu:</td>
					<td><input type="text" name="TenTH"></td>
				</tr>
				<tr>
					<td>Ảnh thương hiệu:</td>
					<td><input type="file" name="AnhTH"></td>
				</tr>
				<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="reset" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="themth" value="Lưu"></div></td>
				</tr>
			</form>
		</table>
	</div>
</div>