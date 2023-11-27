<?php
if (isset($_GET['trang'])){
    $page=$_GET['trang'];
}else{
    $page ='1';
}
if ($page =='' || $page ==1){
    $begin = 0;
}else{
    $begin =($page*10)-10;
}
$sql_pro = "SELECT * FROM SanPham, LoaiSPC, ThuongHieu WHERE SanPham.MaLSPC = LoaiSPC.MaLSPC AND SanPham.MaTH= ThuongHieu.MaTH AND SanPham.MaLSPC = '$_GET[ma]' ORDER BY MaSP ASC LIMIT $begin,10" ;
// $sql_pro = "SELECT * FROM SanPham WHERE SanPham.MaLSPC = '$_GET[ma]' ORDER BY MaSP ASC LIMIT $begin,8";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<?php
$sql_cate = "SELECT * FROM LoaiSPC,LoaiSP WHERE LoaiSPC.MaLSP=LoaiSP.MaLSP AND LoaiSPC.MaLSPC ='$_GET[ma]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<div class="nav">
 	<a class="nav_link" href="../client/index.php">Trang chủ</a>
 	<i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href=""><?php echo $row_title['TenLSP'] ?></a>
	 <i class="nav_icon fas fa-chevron-right"></i>
 	<a class="nav_link" href=""><?php echo $row_title['TenLSPC'] ?></a>
 	
 </div>
<ul class="products">
<?php
while ($row_pro = mysqli_fetch_array($query_pro)) {
?>
	<li>
		<div class="product_item">
			<div class="product_top">
				<a href="index.php?quanly=sanpham&ma=<?php echo $row_pro['MaSP'] ?>" class="product_thumb">
					<img src="../admin/modules/quanlysp/uploads/<?php echo $row_pro['AnhSP'] ?>" />
				</a>
			</div>
			<div class="product_infor">
				<div class="product_price"><?php echo number_format ($row_pro['GiaSP'],0,',','.').'đ' ?></div>
				<div class="product_id"><?php echo $row_pro['TenTH'] ?></div>
				<h2 href="index.php?quanly=sanpham&ma=<?php echo $row['MaSP'] ?>" class="product_name">
				<?php echo $row_pro['TenSP'] ?>
				</h2>
			</div>
		</div>
	</li>
	<?php
}
?>
</ul>
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
						color: #ff902d;
						text-align: center; 
                        text-decoration: none;
					}

                </style>
                <?php
                    $sql_trang = mysqli_query($mysqli,"SELECT *FROM SanPham WHERE SanPham.MaLSPC = '$_GET[ma]'");
                    $row_count = mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/10);
                ?>
                <div class="paging">
                    <!-- <p style="padding-right: 10px;display: flex;align-items: center;">Tổng số trang <?php echo $trang ?> </p> -->
                    <ul class="page_list">
                        <?php 
                            for($i=1;$i<=$trang;$i++){
                        ?>
                            <li <?php if($i==$page){echo 'style="border: 1px solid #e8e8e8;
    						border-radius: 3px;"';}else{echo'';} ?>>
								<a <?php if($i==$page){echo 'style="color: #ff902d"';}else{echo'';} ?> href="index.php?quanly=loaisanpham&ma=<?php echo $row_title['MaLSPC'] ?>&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>