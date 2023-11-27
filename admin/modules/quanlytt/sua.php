<?php
$sql_sua_tt = "SELECT * FROM TinTuc WHERE MaTT='$_GET[MaTT]' LIMIT 1";
$query_sua_tt = mysqli_query($mysqli, $sql_sua_tt);
?>
<div class="add_product">
	<p>Sửa tin tức</p>
	<div class="grid_add_product">
		<table class="table_add_product"  style="border-collapse: collapse">
			<form method="POST" action="modules/quanlytt/xuly.php?MaTT=<?php echo $_GET['MaTT'] ?>" enctype="multipart/form-data">
				<?php
				while ($dong = mysqli_fetch_array($query_sua_tt)) {
				?>
					<!-- <tr>
					<td>Mã loại sản phẩm</td>
					<td><input type="text" value="<?php echo $dong['MaLSP'] ?>"name="Ma_LSP"></td>
				</tr> -->
				<tr>
					<td>Loại tin tức</td>
					<td>
					<select name="loaitintuc">
								<?php
								$sql_loaitt = "SELECT * FROM LoaiTT ORDER BY MaLTT ASC";
								$query_loaitt = mysqli_query($mysqli, $sql_loaitt);
								while ($row_loaitt = mysqli_fetch_array($query_loaitt)) {
									if ($row_loaitt['MaLTT'] == $dong['MaLTT']) {
								?>
										<option selected value="<?php echo $row_loaitt['MaLTT'] ?>"><?php echo $row_loaitt['TenLTT'] ?></option>
									<?php
									} else {
									?>
										<option value="<?php echo $row_loaitt['MaLTT'] ?>"><?php echo $row_loaitt['TenLTT'] ?></option>
								<?php
									}
								}
								?>
							</select>
					</td>
				</tr>
					<tr>
						<td>Tên tin tức</td>
						<td><input type="text" value="<?php echo $dong['TenTT'] ?>" name="TenTT"></td>
					</tr>
					<tr>
						<td>Ảnh tin tức</td>
						<td><input type="file" name="AnhTT">
							<img src="modules/quanlytt/uploads/<?php echo $dong['AnhTT'] ?>" width="150px"></td>
					</tr>
					<tr>
						<td>Mô tả tin tức</td>
						<td><textarea rows="5" name="MoTaTT" ><?php echo $dong['MoTaTT'] ?></textarea></td>
					</tr>

					<tr>
						<td>Nội dung tin tức</td>
						<td><textarea rows="5" name="NoiDungTT" ><?php echo $dong['NoiDungTT'] ?></textarea></td>
					</tr>
					<tr>
					<td colspan="2" >
						<div class="table_td"><input class="add_submit_thoat" type="reset" name="" value="Huỷ">
						<input class="add_submit" type="submit" name="suatt" value="Lưu"></div></td>
				</tr>
				<?php
				}
				?>
			</form>
		</table>
	</div>
</div>