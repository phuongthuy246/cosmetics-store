<?php
if (isset($_GET['trang'])){
    $page=$_GET['trang'];
}else{
    $page ='1';
}
if ($page =='' || $page ==1){
    $begin = 0;
}else{
    $begin =($page*5)-5;
}
$sql_lietke_th = "SELECT * FROM ThuongHieu ORDER BY MaTH ASC LIMIT $begin,5";
$query_lietke_th = mysqli_query($mysqli, $sql_lietke_th);
?>

<div class="list_product">
	<p>Danh sách thương hiệu</p>
	<div class="list_product_btn">
		<form class="list_form_search" action="?action=quanlythuonghieu&query=timkiem" method="POST">
			<div class="product_btn_search">
				<input type="text"class="product_search_input"placeholder="Tìm kiếm thương hiệu..."name="keyword"style="border-right: none;"	/>
				<button class="btn_submit" type="submit" name="search" value="Tìm kiếm"><i class="fas fa-search"></i></button>
			</div>
		</form>	
		<button class="list_btn_add"><a class="btn_sub" href="?action=quanlythuonghieu&query=them"><i class="them_icon fas fa-plus"></i>Thêm mới</a></button>
	</div>
	<!-- <button class="btn_add"><a class="btn_sub" href="?action=quanlyloaisanpham&query=them"><i class="them_icon fas fa-plus"></i>Thêm loại sản phẩm</a></button> -->
	<table class="table_product"  style="border-collapse: collapse">
		<tr class="table_head">
			<th>STT</th>
			<th>Mã thương hiệu</th>
			<th>Tên thương hiệu</th>
			<th>Ảnh thương hiệu</th>
			<th>Thao tác</th>
		</tr>
		<?php
		$i = 0;
		while ($row = mysqli_fetch_array($query_lietke_th)) {
			$i++;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['MaTH'] ?></td>
				<td><?php echo $row['TenTH'] ?></td>
				<td><img src="modules/quanlyth/uploads/<?php echo $row['AnhTH']?>" width="150px"></td>
				<td>
					<a class="table_sua" href="?action=quanlythuonghieu&query=sua&MaTH=<?php echo $row['MaTH'] ?>"><i class="them_icon fas fa-edit"></i>Sửa</a>
				
					<a class="table_del" onclick="return Del('<?php echo $row['TenTH'] ?>')" href="modules/quanlyth/xuly.php?MaTH=<?php echo $row['MaTH'] ?>"><i class="them_icon fas fa-trash-alt"></i>Xoá</a>
				</td>
				
			</tr>
		<?php
		}
		?>
	</table>
</div>
<script>
	function Del(name) {
		return confirm("Bạn chắc chắn muốn xoá thương hiệu: " + name + "?");
	}
</script>
<div style="clear:both;"></div>
                <style type="text/css">
                    .paging {
                        display: flex;
                        justify-content: center;
                    }
                    ul.page_list {
                        padding-left: 0;
						margin: 15px 0 0 0;
                        list-style: none;
                    }
                    ul.page_list li {
                        float: left;
                        padding: 5px 13px;
                        margin: 5px;
                        background-color: #fff;
                        display: block;
						border: 1px solid #fff;
    					border-radius: 3px;
                    }
					ul.page_list li:hover {
                        border: 1px solid #e8e8e8;
    					border-radius: 3px;
						color: #ff902d;
                    }
                    ul.page_list li a {
                        color: #3f2529;
                        text-align: center; 
                        text-decoration: none;
                    }
					ul.page_list a:hover{
						color: #326e51;
						text-align: center; 
                        text-decoration: none;
					}

                </style>
                <?php
                    $sql_trang = mysqli_query($mysqli,"SELECT *FROM ThuongHieu ");
                    $row_count = mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/5);
                ?>
                <div class="paging">
                    <!-- <p style="padding-right: 10px;display: flex;align-items: center;">Tổng số trang <?php echo $trang ?> </p> -->
                    <ul class="page_list">
                        <?php 
                            for($i=1;$i<=$trang;$i++){
                        ?>
                            <li <?php if($i==$page){echo 'style="border: 1px solid #e8e8e8;
    						border-radius: 3px;"';}else{echo'';} ?>>
								<a <?php if($i==$page){echo 'style="color: #7cc68c"';}else{echo'';} ?> href="index.php?action=quanlythuonghieu&query=danhsach&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>