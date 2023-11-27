<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Thông tin thanh toán</title>
        <link rel="shortcut icon" href="../../images/Favicon.png" type="image/x-icon" />
        <link rel="stylesheet" href="../../css/payment.css?v=<?php echo time(); ?>" />
    </head>

    <?php 
    session_start();
    include('../../../admin/config/config.php');
	require('../../../carbon/autoload.php');
	use Carbon\Carbon;
	use Carbon\CarbonInterval;
	$now= Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
	$user = (isset($_SESSION['dangky'])) ? $_SESSION['dangky'] : [];
    $MaTV=$user['MaTV'];
	$code_order=rand(1000,9999);
    $MaTT= $_POST['thanhtoan'];
    $ghichu=$_POST['ghichu'];
    $MaVC= $_POST['vanchuyen'];
    if(isset($_POST['dathang'])){
        $insert_cart="INSERT INTO DonHang(MaDH, TrangThaiDH, NgayDat, MaTV, MaHTTT, MaPT) VALUE('".$code_order."',1,'".$now."','".$MaTV."','".$MaTT."','".$MaVC."')";
	    $cart_query = mysqli_query($mysqli,$insert_cart);
        if($cart_query){
            foreach($_SESSION['giohang'] as $key => $value){
                $MaSP = $value['ma'];
                $soluong = $value['SoLuongSP'];
                $insert_order_details ="INSERT INTO ChiTietDH(SoLuong,GhiChu, MaSP, MaDH) VALUE('".$soluong."','".$ghichu."','".$MaSP."','".$code_order."')";
                mysqli_query($mysqli, $insert_order_details);
            }
        }
    }
	// unset($_SESSION['giohang']);
	// header('Location:../../index.php?quanly=giohang');

?>

    <body>
        <div class="web">
            <div class="header-payment">
                <a href="../../index.php">
                    <img class="icon-back" src="../../images/icons/back.svg" alt="" />
                </a>

                <!-- <img src="../images/payment.jpg" alt="" /> -->
            </div>
            <form method="POST" action="">
            <div class="content-payment">
                <div class="content-payment-left">
                    <div class="content-payment-left-grid">
                        <div class="infor-delivery">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4>Thông tin nhận hàng</h4>
                        </div>
                        <div class="delivery-content">
                            <h4 class="delivery-name"><?php echo $user['TenTV'] ?></h4>
                            <p><?php echo $user['DiaChiTV'] ?></p>
                            <p>Điện thoại: <?php echo $user['SDTTV'] ?></p>
                            <h4 class="delivery-note">Ghi chú</h4>
                            <textarea
                                name="ghichu"
                                placeholder="Nhập ghi chú (nếu có)"
                                required
                            ></textarea>
                        </div>
                    </div>

                    <div class="content-payment-left-grid2">
                        <div class="infor-delivery2">
                            <i class="fas fa-money-check-alt"></i>
                            <h4>Vận chuyển & Thanh toán</h4>
                        </div>
                        <div class="delivery-content2">
                            <h4>Hình thức vận chuyển</h4>
                            <?php
                            include('../../../admin/config/config.php');
                            $sql_htvc = "SELECT * FROM PhuongThucVanChuyen ORDER BY MaPT ASC";
                            $query_htvc = mysqli_query($mysqli, $sql_htvc);
                            ?>
                            <?php
                            while ($row_htvc = mysqli_fetch_array($query_htvc)) {
                            ?>
                            <div class="payment-methods">
                                <input name="vanchuyen"
                                    type="radio"
                                    value="<?php echo $row_htvc['MaPT'] ?>"
                                /><?php echo $row_htvc['TenPT'] ?>
                            </div>
                            <?php 
                            }
                            ?>
                            <!-- <div class="payment-methods">
                                <input type="radio" name="pthucvc" id="giaocham" value="cham" />Giao
                                hàng trong 48 giờ: 0 đ
                            </div> -->
                        </div>
                        <div class="delivery-content2">
                            <h4>Phương thức thanh toán</h4>
                            <?php
                            include('../../../admin/config/config.php');
                            $sql_ht = "SELECT * FROM HinhThucThanhToan ORDER BY MaHTTT ASC";
                            $query_ht = mysqli_query($mysqli, $sql_ht);
                            ?>
                            <?php
                        while ($row_ht = mysqli_fetch_array($query_ht)) {
                        ?>
                            <div class="payment-methods">
                                <input type="radio" name="thanhtoan" value="<?php echo $row_ht['MaHTTT'] ?>" /><?php echo $row_ht['TenHTTT'] ?>
                            </div>
                            <?php 
                        }
                        ?>
                        </div>
                    </div>
                    <!-- 
                    <div class="content-payment-left-grid">
                        <div class="infor-delivery">
                            <i class="fas fa-money-check-alt"></i>
                            <h4>thanh toán</h4>
                        </div>
                    </div> -->
                </div>
                <div class="content-payment-right">
                    <div class="content-payment-right-grid">
                        <div class="cart-delivery">
                            <h4>Đơn hàng</h4>
                            <a href="index.php?quanly=giohang">Sửa</a>
                        </div>
                        <div class="payment-list-donhang">
                            <?php
                            include('../../../admin/config/config.php');
                            foreach($_SESSION['giohang'] as $key => $value){
                                $thanhtien = $value['SoLuongSP'] * $value['GiaSP'];
				                $tongtien += $thanhtien;

                            ?>
                            <div class="list-item-donhang">
                                <div class="item-img-donhang">
                                    <img src="../../../admin/modules/quanlysp/uploads/<?php echo $value['AnhSP'] ?>"/>
                                </div>
                                <div class="item-info-donhang">
                                    <strong></strong>
                                    <div class="item-info-name">
                                        <?php echo $value['TenSP'] ?>
                                    </div>
                                    <div class="intem-info-qty">SL: <strong><?php echo $value['SoLuongSP'] ?></strong></div>
                                </div>
                                <div class="item-price-donhang">
                                    <span><?php echo number_format($thanhtien, 0, ',', '.') . 'đ'; ?></span>
                                </div>
                            </div>
                            <?php } ?>
                           
                            <div class="checkout-donhang">
                                <div class="checkout-tamtinh">
                                    Tạm tính:
                                    <p><?php echo number_format($tongtien, 0, ',', '.') . 'đ'; ?></p>
                                </div>
                                <div class="checkout-tamtinh">
                                    Phí vận chuyển:
                                    <p>0 đ</p>
                                </div>
                            </div>
                            <div class="checkout-dathang">
                                <div class="checkout-thanhtien">
                                    Thành tiền:
                                    <p><?php echo number_format($tongtien, 0, ',', '.') . 'đ'; ?></p>
                                </div>
                                
                                <button type="submit" name ="dathang">ĐẶT HÀNG</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </body>
    <script src="https://kit.fontawesome.com/72a902116d.js" crossorigin="anonymous"></script>
</html>
