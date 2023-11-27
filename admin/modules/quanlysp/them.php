<div class="add_product">
	<p>Thêm sản phẩm</p>
	<div class="grid_add_product">
		<table class="table_add_product" style="border-collapse: collapse">
			<form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
				<tr>
					<td>Danh mục</td>
					<td>
						<select name="loaisanpham">
							<?php
							$sql_loaisanpham = "SELECT * FROM LoaiSPC ORDER BY MaLSPC ASC";
							$query_loaisanpham = mysqli_query($mysqli, $sql_loaisanpham);
							while ($row_loaisanpham = mysqli_fetch_array($query_loaisanpham)) {
							?>
								<option value="<?php echo $row_loaisanpham['MaLSPC'] ?>"><?php echo $row_loaisanpham['TenLSPC'] ?></option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Thương hiệu</td>
					<td>
						<select name="thuonghieu">
							<?php
							$sql_thuonghieu = "SELECT * FROM ThuongHieu ORDER BY MaTH ASC";
							$query_thuonghieu = mysqli_query($mysqli, $sql_thuonghieu);
							while ($row_thuonghieu = mysqli_fetch_array($query_thuonghieu)) {
							?>
								<option value="<?php echo $row_thuonghieu['MaTH'] ?>"><?php echo $row_thuonghieu['TenTH'] ?></option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Mã sản phẩm</td>
					<td><input type="text" name="MaSP"></td>
				</tr>
				<tr>
					<td>Tên sản phẩm</td>
					<td><input type="text" name="TenSP"></td>
				</tr>
				<tr>
					<td>Ảnh sản phẩm</td>
					<td><input type="file" name="AnhSP"></td>
				</tr>
				<tr>
					<td>Giá sản phẩm</td>
					<td><input type="text" name="GiaSP"></td>
				</tr>
				<tr>
					<td>Số lượng sản phẩm</td>
					<td><input type="text" name="SoLuongSP"></td>
				</tr>
				<tr>
					<td>Thông tin sản phẩm</td>
					<td><textarea rows="5" name="ThongTinSP" style="resize: none"></textarea></td>
				</tr>
				<tr>
					<td>Thành phần sản phẩm</td>
					<td><textarea rows="5" name="ThanhPhanSP" style="resize: none"></textarea></td>
				</tr>
				<tr>
					<td>Hướng dẫn sử dụng</td>
					<td><textarea rows="5" name="HuongDanSD" style="resize: none"></textarea></td>
				</tr>
				<!-- <tr7
					<td>Trạng thái</td>
					<td>
						<select>
							<option>Kích hoạt</option>
							<option>Ẩn</option>
						</select>
					</td>
				</tr> -->
				<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="submit" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="themsp" value="Lưu"></div></td>
				</tr>
			</form>
		</table>
	</div>
</div>