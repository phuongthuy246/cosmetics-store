<div class="add_product">
	<p>Thêm loại sản phẩm cụ thể</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlyloaispct/xuly.php">
			<tr>
					<td>Loại sản phẩm</td>
					<td>
						<select name="loaisanpham">
							<?php
							$sql_loaisanpham = "SELECT * FROM LoaiSP ORDER BY MaLSP ASC";
							$query_loaisanpham = mysqli_query($mysqli, $sql_loaisanpham);
							while ($row_loaisanpham = mysqli_fetch_array($query_loaisanpham)) {
							?>
								<option value="<?php echo $row_loaisanpham['MaLSP'] ?>"><?php echo $row_loaisanpham['TenLSP'] ?></option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Mã loại sản phẩm cụ thể</td>
					<td><input type="text" name="MaLSPC"></td>
				</tr>
				<tr>
					<td>Tên loại sản phẩm cụ thể</td>
					<td><input type="text" name="TenLSPC"></td>
				</tr>
				<tr>
					<td>Mô tả loại sản phẩm cụ thể</td>
					<td><textarea rows="5" name="MoTaLSPC"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="submit" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="themloaispct" value="Lưu"></div></td>
				</tr>
			</form>
		</table>
	</div>
</div>