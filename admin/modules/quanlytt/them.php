<div class="add_product">
	<p>Thêm tin tức</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlytt/xuly.php" enctype="multipart/form-data" >
			<tr>
					<td>Loại tin tức</td>
					<td>
						<select name="loaitintuc">
							<?php
							$sql_loaitintuc = "SELECT * FROM LoaiTT ORDER BY MaLTT ASC";
							$query_loaitintuc = mysqli_query($mysqli, $sql_loaitintuc);
							while ($row_loaitintuc = mysqli_fetch_array($query_loaitintuc)) {
							?>
								<option value="<?php echo $row_loaitintuc['MaLTT'] ?>"><?php echo $row_loaitintuc['TenLTT'] ?></option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Mã tin tức</td>
					<td><input type="text" name="MaTT"></td>
				</tr>
				<tr>
					<td>Tên tin tức</td>
					<td><input type="text" name="TenTT"></td>
				</tr>
				
				<tr>
					<td>Ảnh tin tức</td>
					<td><input type="file" name="AnhTT"></td>
				</tr>
				<tr>
					<td>Mô tả tin tức</td>
					<td><textarea rows="5" name="MoTaTT" style="resize: none"></textarea></td>
				</tr>
				<tr>
					<td>Nội dung tin tức</td>
					<td><textarea rows="5" name="NoiDungTT" style="resize: none"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="reset" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="themtt" value="Lưu"></div></td>
				</tr>
			</form>
		</table>
	</div>
</div>